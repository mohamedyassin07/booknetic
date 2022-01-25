<?php

namespace BookneticApp\Backend\Customforms;

use BookneticApp\Providers\Helper;
use BookneticApp\Providers\Permission;

class Middleware extends \BookneticApp\Providers\Middleware
{

	public static function handle()
	{
	    if( Permission::canUseBooknetic() )
        {
            if( Helper::_post('action', '')=='get_custom_field_choices' )
            {
                return true;
            }
        }
		if( Permission::isAdministrator() )
		{
			if( !Helper::isSaaSVersion() )
			{
				return true;
			}

			if( Permission::getPermission( 'custom_forms' ) === 'on' )
			{
				return true;
			}

			return false;
		}

		return false;
	}

	public function boot()
	{
		// add menu...
		$this->createMenu(bkntc__('Custom Forms'))
			->setIcon('fa fa-magic')
			->setOrder(17)
			->show();

	}

}