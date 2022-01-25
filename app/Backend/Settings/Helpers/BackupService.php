<?php

namespace BookneticApp\Backend\Settings\Helpers;

use BookneticApp\Backend\Customforms\Model\FormInput;
use BookneticApp\Providers\DB;
use BookneticApp\Providers\Helper;

class BackupService
{

	/**
	 * @var \ZipArchive
	 */
	private static $zip;

	private static $backupName = 'Happy-Data.Booknetic';

	public static function export()
	{
		self::$zip = new \ZipArchive();

		$zipFilePath = Helper::uploadedFile(self::$backupName, '');

		if ( self::$zip->open( $zipFilePath, \ZipArchive::CREATE) !== true )
		{
			Helper::response( false, bkntc__('Could not create a zip file!') );
		}

		$options = DB::DB()->get_results('SELECT `option_name`, `option_value`, `autoload` FROM `'.DB::DB()->base_prefix.'options` WHERE `option_name` LIKE \'bkntc_%\' AND `option_name` NOT IN (\'bkntc_purchase_code\', \'bkntc_plugin_version\')', ARRAY_A);

		$tableData = [];
		foreach ( Helper::pluginTables() AS $tableName )
		{
			$tableData[ $tableName ] = DB::fetchAll( $tableName );
		}

		self::$zip->addFromString('sql/options.json', json_encode( $options ));
		self::$zip->addFromString('sql/tables.json', json_encode( $tableData ));

		$upload_path = Helper::uploadedDir('');
		self::addDir( $upload_path );

		self::$zip->close();
	}

	public static function download()
	{
		$file = Helper::uploadedFile( self::$backupName, '' );

		if( !file_exists( $file ) )
		{
			return;
		}

		ob_end_clean();

		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"Happy-Data.Booknetic\"");
		header("Content-length: " . filesize($file));
		header("Pragma: no-cache");
		header("Expires: 0");

		readfile( $file );

		unlink( $file );
		exit();
	}

	private static function addDir( $real_path, $local_path = '' )
	{
		$dir = opendir( $real_path );

		while ( $filename = readdir( $dir ) )
		{
			if ( $filename == '.' || $filename == '..' || $filename == self::$backupName )
				continue;

			$path		= $real_path . '/' . $filename;
			$localpath	= $local_path ? ($local_path . '/' . $filename) : $filename;

			if (is_dir($path))
			{
				self::$zip->addEmptyDir( $localpath );
				self::addDir( $path, $localpath);
			}
			else if (is_file($path))
			{
				self::$zip->addFile( $path, $localpath );
			}
		}

		closedir($dir);
	}

	public static function restore( $file_path )
	{
		$zip = new \ZipArchive();

		if ( $zip->open( $file_path ) !== true )
		{
			Helper::response( false, bkntc__('Unable to read the backup file!1') );
		}

		if( $zip->locateName('sql/options.json') === false || $zip->locateName('sql/tables.json') === false )
		{
			Helper::response( false, bkntc__('Unable to read the backup file!2') );
		}

		set_time_limit( 0 );

		// Empty the booknetic folder
		self::rmDir( Helper::uploadedDir('') );

		$newBookneticDir = Helper::uploadedDir('');

		$filesToExtract = [ 'sql/options.json', 'sql/tables.json' ];

		$allowedFileExtensions = self::allowedFileTypes();
		for ($i = 0; $i < $zip->numFiles; $i++)
		{
			$filename	= $zip->getNameIndex( $i );
			$extension	= strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );

			if( in_array( $extension, $allowedFileExtensions ) )
			{
				$filesToExtract[] = $filename;
			}
		}

		$zip->extractTo( $newBookneticDir, $filesToExtract );
		$zip->close();

		$options = file_get_contents( Helper::uploadedFile('options.json', 'sql') );
		$options = json_decode( $options, true );
		unlink( Helper::uploadedFile('options.json', 'sql') );

		$tables = file_get_contents( Helper::uploadedFile('tables.json', 'sql') );
		$tables = json_decode( $tables, true );
		unlink( Helper::uploadedFile('tables.json', 'sql') );

		rmdir( Helper::uploadedDir('sql') );

		// Truncate tables...
		$tablesToDelete = Helper::pluginTables();
		DB::DB()->query("SET FOREIGN_KEY_CHECKS = 0;");
		foreach( $tablesToDelete AS $tableName )
		{
			DB::DB()->query("TRUNCATE TABLE `" . DB::table( $tableName ) . "`");
		}

		// Delete current options...
		DB::DB()->query('DELETE FROM `'.DB::DB()->base_prefix.'options` WHERE `option_name` LIKE \'bkntc_%\' AND `option_name` NOT IN (\'bkntc_purchase_code\', \'bkntc_plugin_version\')');

		// Restore options...
		if( is_array( $options ) && !empty( $options ) )
		{
			foreach ( $options AS $option )
			{
				if( !is_array( $option ) || !isset($option['option_name']) || in_array( $option['option_name'], ['bkntc_purchase_code', 'bkntc_plugin_version'] ) )
					continue;

				DB::DB()->insert( DB::DB()->base_prefix . 'options', $option );
			}
		}

		// Restore data of tables
		if( is_array( $tables ) && !empty( $tables ) )
		{
			foreach ( $tables AS $tableName => $tableData )
			{
				if( !is_array( $tableData ) )
					continue;

				foreach ( $tableData AS $row )
				{
					if( !is_array( $row ) )
						continue;

					DB::DB()->insert( DB::table( $tableName ), $row );
				}
			}
		}

		DB::DB()->query("SET FOREIGN_KEY_CHECKS = 1;");

		Helper::response( true );
	}

	private static function rmDir( $dir )
	{
		$files = scandir( $dir );
		foreach ( $files as $filename )
		{
			if ( $filename == '.' || $filename == '..' )
				continue;

			if( is_dir( $dir . '/' . $filename ) )
			{
				self::rmDir( $dir . '/' . $filename );
			}
			else
			{
				unlink( $dir . '/' . $filename );
			}
		}

		rmdir( $dir );
	}

	private static function allowedFileTypes()
	{
		$fileInputs = FormInput::where('type', 'file')->fetchAll();
		$allowedFormats = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'jpg', 'jpeg', 'png', 'gif', 'mp4', 'zip', 'rar', 'csv'];

		foreach ( $fileInputs AS $fileInput )
		{
			$fileOptions = json_decode( $fileInput['options'] , true );

			if( isset( $fileOptions['allowed_file_formats'] ) && !empty( $fileOptions['allowed_file_formats'] ) && is_string( $fileOptions['allowed_file_formats'] ) )
			{
				$allowedFormats = array_merge( $allowedFormats, explode(',', str_replace(' ', '', $fileOptions['allowed_file_formats'])) );
			}
		}

		return array_unique( Helper::secureFileFormats( $allowedFormats ) );
	}

}