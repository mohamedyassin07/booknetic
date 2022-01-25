<?php


namespace BookneticApp\Frontend\Controller;

use BookneticApp\Backend\Appointments\Helpers\AppointmentService;
use BookneticApp\Backend\Appointments\Model\Appointment;
use BookneticApp\Backend\Appointments\Model\AppointmentCustomer;
use BookneticApp\Backend\Customers\Model\Customer;
use BookneticApp\Backend\Customforms\Model\FormInput;
use BookneticApp\Backend\Customforms\Model\FormInputChoice;
use BookneticApp\Backend\Emailnotifications\Helpers\SendEmail;
use BookneticApp\Backend\Locations\Model\Location;
use BookneticApp\Backend\Services\Model\Service;
use BookneticApp\Backend\Services\Model\ServiceCategory;
use BookneticApp\Backend\Services\Model\ServiceExtra;
use BookneticApp\Backend\Services\Model\ServiceStaff;
use BookneticApp\Backend\Smsnotifications\Helpers\SendSMS;
use BookneticApp\Backend\Staff\Model\Staff;
use BookneticApp\Backend\Whatsappnotifications\Helpers\SendMessage;
use BookneticApp\Integrations\GoogleCalendar\GoogleCalendarService;
use BookneticApp\Integrations\PaymentGateways\Square;
use BookneticApp\Integrations\PaymentGateways\Mollie;
use BookneticApp\Integrations\PaymentGateways\Stripe;
use BookneticApp\Integrations\WooCommerce\WooCommerceService;
use BookneticApp\Integrations\Zoom\ZoomService;
use BookneticApp\Providers\Curl;
use BookneticApp\Providers\Date;
use BookneticApp\Providers\DB;
use BookneticApp\Frontend;
use BookneticApp\Providers\FrontendAjax;
use BookneticApp\Providers\Helper;
use BookneticApp\Providers\Permission;
use BookneticApp\Integrations\PaymentGateways\Paypal;

class Ajax extends FrontendAjax
{

	use ClientPanelAjax;

	private static $categories;

	public function __construct()
	{

	}

	public static function get_data_location( $return_as_array = false )
	{
		$staff		= Helper::_post('staff', 0, 'int');
		$service	= Helper::_post('service', 0, 'int');

		$queryAdd = '';
		if( $staff > 0 )
		{
			$queryAdd .= " AND FIND_IN_SET(`id`, (SELECT IFNULL(`locations`, '') FROM `".DB::table('staff')."` WHERE `id`='{$staff}'))";
		}
		else if( $service > 0 )
		{
			$queryAdd .= " AND FIND_IN_SET(`id`, (SELECT GROUP_CONCAT(IFNULL(`locations`, '')) FROM `".DB::table('staff')."` WHERE `id` IN (SELECT `staff_id` FROM `".DB::table('service_staff')."` WHERE `service_id`='{$service}')))";
		}

		$locations	= DB::DB()->get_results(
			"SELECT * FROM `" . DB::table('locations') . "` tb1 WHERE is_active=1 {$queryAdd} ".DB::tenantFilter()." ORDER BY id",
			ARRAY_A
		);

		if( $return_as_array )
		{
			return $locations;
		}

		parent::view('booking_panel.locations', [
			'locations'		=>	$locations
		]);
	}

	public static function get_data_staff()
	{
		$location			= Helper::_post('location', 0, 'int');
		$service			= Helper::_post('service', 0, 'int');
		$service_extras		= Helper::_post('service_extras', [], 'arr');
		$date				= Helper::_post('date', '', 'str');
		$time				= Helper::_post('time', '', 'str');

		$extras_arr			= [];

		foreach ( $service_extras AS $extra_id => $quantity )
		{
			if( !(is_numeric($quantity) && $quantity > 0) )
				continue;

			$extra_inf = ServiceExtra::where('service_id', $service)->where('id', $extra_id)->fetch();

			if( $extra_inf && $extra_inf['max_quantity'] >= $quantity )
			{
				$extra_inf['quantity'] = $quantity;
				$extras_arr[] = $extra_inf;
			}
		}

		$queryAdd = '';
		if( $location > 0 )
		{
			$queryAdd .= " AND FIND_IN_SET( '{$location}', `locations` )";
		}
		if( $service > 0 )
		{
			$queryAdd .= " AND (SELECT count(0) FROM `".DB::table('service_staff')."` WHERE staff_id=tb1.id AND service_id='{$service}')";
		}

		$staff	= DB::DB()->get_results(
			"SELECT * FROM `" . DB::table('staff') . "` tb1 WHERE is_active=1 {$queryAdd} ".DB::tenantFilter()." ORDER BY id",
			ARRAY_A
		);

		if( !empty( $date ) && !empty( $time ) )
		{
			$onlyAvailableStaffList = [];

			foreach ( $staff AS $staffInf )
			{
				if( AppointmentService::checkStaffAvailability( $service, $extras_arr, $staffInf['id'], $date, $time ) )
				{
					$onlyAvailableStaffList[] = $staffInf;
				}
			}

			$staff = $onlyAvailableStaffList;
		}

		parent::view('booking_panel.staff', [
			'staff'		=>	$staff
		]);
	}

	public static function get_data_service()
	{
		$staff	    = Helper::_post('staff', 0, 'int');
		$location	= Helper::_post('location', 0, 'int');
		$category	= Helper::_post('category', 0, 'int');

		$queryAttrs = [ $staff ];
		if( $category > 0 )
        {
            $categoriesFiltr = Helper::getAllSubCategories( $category );
        }

		$locationFilter = '';
		if( $location > 0 && !( $staff > 0 ) )
		{
			$locationFilter = " AND tb1.`id` IN (SELECT `service_id` FROM `".DB::table('service_staff')."` WHERE `staff_id` IN (SELECT `id` FROM `".DB::table('staff')."` WHERE FIND_IN_SET('{$location}', IFNULL(`locations`, ''))))";
		}

		$services = DB::DB()->get_results(
			DB::DB()->prepare( "
				SELECT
					tb1.*,
					IFNULL(tb2.price, tb1.price) AS real_price,
					(SELECT count(0) FROM `" . DB::table('service_extras') . "` WHERE service_id=tb1.id AND `is_active`=1) AS extras_count
				FROM `" . DB::table('services') . "` tb1 
				".( $staff > 0 ? 'INNER' : 'LEFT' )." JOIN `" . DB::table('service_staff') . "` tb2 ON tb2.service_id=tb1.id AND tb2.staff_id=%d
				WHERE tb1.`is_active`=1 AND (SELECT count(0) FROM `" . DB::table('service_staff') . "` WHERE service_id=tb1.id)>0 ".DB::tenantFilter()." ".$locationFilter."
				" . ( $category > 0 && !empty( $categoriesFiltr ) ? "AND tb1.category_id IN (". implode(',', $categoriesFiltr) . ")" : "" ) . "
				ORDER BY tb1.category_id, tb1.id", $queryAttrs ),
			ARRAY_A
		);

		foreach ( $services AS $k => $service )
		{
			$services[$k]['category_name'] = self::__getServiceCategoryName( $service['category_id'] );
		}

		parent::view('booking_panel.services', [
			'services'		=>	$services
		]);
	}

	public static function get_data_service_extras()
	{
		$service	= Helper::_post('service', 0, 'int');

		$serviceInf	= Service::get( $service );
		$extras		= ServiceExtra::where('service_id', $service)->where('is_active', 1)->where('max_quantity', '>', 0)->orderBy('id')->fetchAll();

		parent::view('booking_panel.extras', [
			'extras'		=>	$extras,
			'service_name'	=>	esc_html( $serviceInf['name'] )
		]);
	}

	public static function get_data_date_time()
	{
		$staff			= Helper::_post('staff', 0, 'int');
		$location		= Helper::_post('location', 0, 'int');
		$service		= Helper::_post('service', 0, 'int');
		$month			= Helper::_post('month', (int)Date::format('m'), 'int', [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ]);
		$year			= Helper::_post('year', Date::format('Y'), 'int');
		$service_extras	= Helper::_post('service_extras', [], 'arr');

		$date_start		= Date::dateSQL( $year . '-' . $month . '-01' );
		$date_end		= Date::format('Y-m-t', $year . '-' . $month . '-01' );

		if( empty( $staff ) )
		{
			$staff = -1;
		}

		if( empty( $service ) )
		{
			Helper::response( false, bkntc__('Fistly You have to select Service, Staff and Date fields!') );
		}

		// check for "Limited booking days" settings...
		$available_days_for_booking = Helper::getOption('available_days_for_booking', '365');
		if( $available_days_for_booking > 0 )
		{
			$limitEndDate = Date::epoch('+' . $available_days_for_booking . ' days');

			if( Date::epoch( $date_end ) > $limitEndDate )
			{
				$date_end = Date::dateSQL( $limitEndDate );
			}
		}

		$serviceInf = Service::get( $service );
		$isRecurring = $serviceInf['is_recurring'];

		if( $isRecurring )
		{
			$data = null;

			if( $serviceInf['repeat_type'] == 'weekly' )
			{
				$service_type = 'recurring_weekly';
			}
			else if( $serviceInf['repeat_type'] == 'monthly' )
			{
				$service_type = 'recurring_monthly';
			}
			else
			{
				$service_type = 'recurring_daily';
			}
		}
		else
		{
			$service_type = 'non_recurring';
			$extras_arr = [];

			foreach ( $service_extras AS $extra_id => $quantity )
			{
				if( !(is_numeric($quantity) && $quantity > 0) )
					continue;

				$extra_inf = ServiceExtra::where('service_id', $service)->where('id', $extra_id)->fetch();

				if( $extra_inf && $extra_inf['max_quantity'] >= $quantity )
				{
					$extra_inf['quantity'] = $quantity;

					$extras_arr[] = $extra_inf;
				}

			}

			$data = AppointmentService::getCalendar( $staff, $service, $location, $extras_arr, $date_start, $date_end, true, null, false, true, true );
		}

		if( is_array( $data ) )
		{
			$data['hide_available_slots'] = Helper::getOption('hide_available_slots', 'off');
		}

		parent::view('booking_panel.date_time_' . $service_type, [
			'date_based'	=>	$serviceInf['duration'] >= 1440,
			'service_max_capacity'		=>  (int) $serviceInf['max_capacity'] > 0 ? (int) $serviceInf['max_capacity'] : 1
		], [
			'data'			    =>	$data,
			'service_type'	    =>	$service_type,
			'time_show_format'  =>  Helper::getOption('time_view_type_in_front', '1'),
			'service_info'	    =>	[
				'date_based'		=>	$serviceInf['duration'] >= 1440,
				'repeat_type'		=>	htmlspecialchars( $serviceInf['repeat_type'] ),
				'repeat_frequency'	=>	htmlspecialchars( $serviceInf['repeat_frequency'] ),
				'full_period_type'	=>	htmlspecialchars( $serviceInf['full_period_type'] ),
				'full_period_value'	=>	(int)$serviceInf['full_period_value'],
				'max_capacity'		=>  (int) $serviceInf['max_capacity'] > 0 ? (int) $serviceInf['max_capacity'] : 1,
			]
		]);
	}

	public static function get_data_recurring_info($service=false,$staff=false,$location=false,$service_extras=false,$time=false,$recurring_start_date=false,$recurring_end_date=false,$recurring_times=false)
	{

		$service				=	Helper::_post('service', 0, 'integer');
		$staff					=	Helper::_post('staff', 0, 'integer');
		$location				=	Helper::_post('location', 0, 'integer');
		$service_extras			=	Helper::_post('service_extras', [], 'arr');
		$time					=	Helper::_post('time', '', 'string');

		$recurring_start_date	=	Helper::_post('recurring_start_date', '', 'string');
		$recurring_end_date		=	Helper::_post('recurring_end_date', '', 'string');
		$recurring_times		=	Helper::_post('recurring_times', '', 'string');

		if( empty( $service ) )
		{
			Helper::response(false, bkntc__('Please select service'));
		}

		$serviceInf = Service::get( $service );

		if( !$serviceInf || $serviceInf['is_recurring'] == 0 )
		{
			Helper::response(false, bkntc__('Please select service'));
		}

		if( $staff == -1 )
		{
			$availableStaffIDs = AppointmentService::staffByService( $service, $location, true, $recurring_start_date );

			if( !empty( $availableStaffIDs ) )
			{
				$staff = reset($availableStaffIDs);
			}
		}

		$extras_arr = [];

		foreach ( $service_extras AS $extra_id => $quantity )
		{
			if( !(is_numeric($quantity) && $quantity > 0) )
				continue;

			$extra_inf = ServiceExtra::where('service_id', $service)->where('id', $extra_id)->fetch();

			if( $extra_inf && $extra_inf['max_quantity'] >= $quantity )
			{
				$extra_inf['quantity'] = $quantity;

				$extras_arr[] = $extra_inf;
			}
		}

		$appointments = AppointmentService::getRecurringDates( $serviceInf, $staff, $time, $recurring_start_date, $recurring_end_date, $recurring_times );

		$available_days_for_booking = Helper::getOption('available_days_for_booking', '365');

		foreach ( $appointments AS $key => $appointment )
		{
			$appointmentDate = $appointment[0];
			$appointmentTime = $appointment[1];

			// check for "Limited booking days" settings...
			$dayDif = (int)( (Date::epoch( $appointmentDate ) - Date::epoch()) / 60 / 60 / 24 );
			if( $dayDif > $available_days_for_booking )
			{
				Helper::response(false, bkntc__('Limited booking days is %d' , [ $available_days_for_booking ]) );
			}

			$selectedTimeSlotInfo = AppointmentService::getTimeSlotInfo( $service, $extras_arr, $staff, $appointmentDate, $appointmentTime, true, 0, false );

			$appointments[$key][2] = true;
			if( empty( $selectedTimeSlotInfo ) )
			{
				$appointments[$key][2] = false;
			}
			else if( $selectedTimeSlotInfo['appointment_id'] > 0 )
			{
				if( $selectedTimeSlotInfo['available_customers'] >= $selectedTimeSlotInfo['max_capacity'] )
				{
					$appointments[$key][2] = false;
				}
				else
				{
					$appointments[$key][2] = $selectedTimeSlotInfo['appointment_id'];
				}
			}
		}$available_days_for_booking = Helper::getOption('available_days_for_booking', '365');

		foreach ( $appointments AS $key => $appointment )
		{
			$appointmentDate = $appointment[0];
			$appointmentTime = $appointment[1];

			// check for "Limited booking days" settings...
			$dayDif = (int)( (Date::epoch( $appointmentDate ) - Date::epoch()) / 60 / 60 / 24 );
			if( $dayDif > $available_days_for_booking )
			{
				Helper::response(false, bkntc__('Limited booking days is %d' , [ $available_days_for_booking ]) );
			}

			$selectedTimeSlotInfo = AppointmentService::getTimeSlotInfo( $service, $extras_arr, $staff, $appointmentDate, $appointmentTime, true, 0, false );

			$appointments[$key][2] = true;
			if( empty( $selectedTimeSlotInfo ) )
			{
				$appointments[$key][2] = false;
			}
			else if( $selectedTimeSlotInfo['appointment_id'] > 0 )
			{
				if( $selectedTimeSlotInfo['available_customers'] >= $selectedTimeSlotInfo['max_capacity'] )
				{
					$appointments[$key][2] = false;
				}
				else
				{
					$appointments[$key][2] = $selectedTimeSlotInfo['appointment_id'];
				}
			}
		}$available_days_for_booking = Helper::getOption('available_days_for_booking', '365');

		foreach ( $appointments AS $key => $appointment )
		{
			$appointmentDate = $appointment[0];
			$appointmentTime = $appointment[1];

			// check for "Limited booking days" settings...
			$dayDif = (int)( (Date::epoch( $appointmentDate ) - Date::epoch()) / 60 / 60 / 24 );
			if( $dayDif > $available_days_for_booking )
			{
				Helper::response(false, bkntc__('Limited booking days is %d' , [ $available_days_for_booking ]) );
			}

			$selectedTimeSlotInfo = AppointmentService::getTimeSlotInfo( $service, $extras_arr, $staff, $appointmentDate, $appointmentTime, true, 0, false );

			$appointments[$key][2] = true;
			if( empty( $selectedTimeSlotInfo ) )
			{
				$appointments[$key][2] = false;
			}
			else if( $selectedTimeSlotInfo['appointment_id'] > 0 )
			{
				if( $selectedTimeSlotInfo['available_customers'] >= $selectedTimeSlotInfo['max_capacity'] )
				{
					$appointments[$key][2] = false;
				}
				else
				{
					$appointments[$key][2] = $selectedTimeSlotInfo['appointment_id'];
				}
			}
		}$available_days_for_booking = Helper::getOption('available_days_for_booking', '365');

		foreach ( $appointments AS $key => $appointment )
		{
			$appointmentDate = $appointment[0];
			$appointmentTime = $appointment[1];

			// check for "Limited booking days" settings...
			$dayDif = (int)( (Date::epoch( $appointmentDate ) - Date::epoch()) / 60 / 60 / 24 );
			if( $dayDif > $available_days_for_booking )
			{
				Helper::response(false, bkntc__('Limited booking days is %d' , [ $available_days_for_booking ]) );
			}

			$selectedTimeSlotInfo = AppointmentService::getTimeSlotInfo( $service, $extras_arr, $staff, $appointmentDate, $appointmentTime, true, 0, false );

			$appointments[$key][2] = true;
			if( empty( $selectedTimeSlotInfo ) )
			{
				$appointments[$key][2] = false;
			}
			else if( $selectedTimeSlotInfo['appointment_id'] > 0 )
			{
				if( $selectedTimeSlotInfo['available_customers'] >= $selectedTimeSlotInfo['max_capacity'] )
				{
					$appointments[$key][2] = false;
				}
				else
				{
					$appointments[$key][2] = $selectedTimeSlotInfo['appointment_id'];
				}
			}
		}$available_days_for_booking = Helper::getOption('available_days_for_booking', '365');

		foreach ( $appointments AS $key => $appointment )
		{
			$appointmentDate = $appointment[0];
			$appointmentTime = $appointment[1];

			// check for "Limited booking days" settings...
			$dayDif = (int)( (Date::epoch( $appointmentDate ) - Date::epoch()) / 60 / 60 / 24 );
			if( $dayDif > $available_days_for_booking )
			{
				Helper::response(false, bkntc__('Limited booking days is %d' , [ $available_days_for_booking ]) );
			}

			$selectedTimeSlotInfo = AppointmentService::getTimeSlotInfo( $service, $extras_arr, $staff, $appointmentDate, $appointmentTime, true, 0, false );

			$appointments[$key][2] = true;
			if( empty( $selectedTimeSlotInfo ) )
			{
				$appointments[$key][2] = false;
			}
			else if( $selectedTimeSlotInfo['appointment_id'] > 0 )
			{
				if( $selectedTimeSlotInfo['available_customers'] >= $selectedTimeSlotInfo['max_capacity'] )
				{
					$appointments[$key][2] = false;
				}
				else
				{
					$appointments[$key][2] = $selectedTimeSlotInfo['appointment_id'];
				}
			}
		}$available_days_for_booking = Helper::getOption('available_days_for_booking', '365');

		foreach ( $appointments AS $key => $appointment )
		{
			$appointmentDate = $appointment[0];
			$appointmentTime = $appointment[1];

			// check for "Limited booking days" settings...
			$dayDif = (int)( (Date::epoch( $appointmentDate ) - Date::epoch()) / 60 / 60 / 24 );
			if( $dayDif > $available_days_for_booking )
			{
				Helper::response(false, bkntc__('Limited booking days is %d' , [ $available_days_for_booking ]) );
			}

			$selectedTimeSlotInfo = AppointmentService::getTimeSlotInfo( $service, $extras_arr, $staff, $appointmentDate, $appointmentTime, true, 0, false );

			$appointments[$key][2] = true;
			if( empty( $selectedTimeSlotInfo ) )
			{
				$appointments[$key][2] = false;
			}
			else if( $selectedTimeSlotInfo['appointment_id'] > 0 )
			{
				if( $selectedTimeSlotInfo['available_customers'] >= $selectedTimeSlotInfo['max_capacity'] )
				{
					$appointments[$key][2] = false;
				}
				else
				{
					$appointments[$key][2] = $selectedTimeSlotInfo['appointment_id'];
				}
			}
		}

		if( !count( $appointments ) )
		{
			Helper::response(false , bkntc__('Please choose dates' ));
		}

		parent::view('booking_panel.recurring_information', [
			'dates' 		=> $appointments,
			'date_based'	=> $serviceInf['duration'] >= 1440
		]);
	}

	public static function get_data_information()
	{
		$service = Helper::_post('service', 0, 'int');

		if( $service <= 0 )
		{
			$checkAllFormsIsTheSame = DB::DB()->get_row('SELECT * FROM `'.DB::table('forms').'` WHERE (SELECT count(0) FROM `'.DB::table('services').'` WHERE FIND_IN_SET(`id`, `service_ids`) AND `is_active`=1)<(SELECT count(0) FROM `'.DB::table('services').'` WHERE `is_active`=1)' . DB::tenantFilter(), ARRAY_A);
			if( !$checkAllFormsIsTheSame )
			{
				$firstRandomService = Service::where('is_active', '1')->limit(1)->fetch();
				$service = $firstRandomService->id;
			}
		}

		// get custom fields
		$customData = DB::DB()->get_results(
			DB::DB()->prepare('
				SELECT 
					*
				FROM `'.DB::table('form_inputs').'` tb1
				WHERE tb1.form_id=(SELECT id FROM `'.DB::table('forms').'` WHERE FIND_IN_SET(%d, service_ids) '.DB::tenantFilter().' LIMIT 0,1)
				ORDER BY tb1.order_number', [ $service ]
			),
			ARRAY_A
		);

		foreach ( $customData AS $fKey => $formInput )
		{
			if( in_array( $formInput['type'], ['select', 'checkbox', 'radio'] ) )
			{
				$choicesList = FormInputChoice::where('form_input_id', (int)$formInput['id'])->orderBy('order_number')->fetchAll();

				$customData[ $fKey ]['choices'] = [];

				foreach( $choicesList AS $choiceInf )
				{
					$customData[ $fKey ]['choices'][] = [ (int)$choiceInf['id'], htmlspecialchars($choiceInf['title']) ];
				}
			}
		}

		// Logged in user data
		$name		= '';
		$surname	= '';
		$email		= '';
		$phone 		= '';
		if( is_user_logged_in() )
		{
			$userData = wp_get_current_user();

			$name		= $userData->first_name;
			$surname	= $userData->last_name;
			$email		= $userData->user_email;
			$phone		= get_user_meta( get_current_user_id(), 'billing_phone', true );
		}

		$emailIsRequired = Helper::getOption('set_email_as_required', 'on');
		$phoneIsRequired = Helper::getOption('set_phone_as_required', 'off');

		parent::view('booking_panel.information', [
			'custom_inputs'		=> $customData,

			'name'				=> $name,
			'surname'			=> $surname,
			'email'				=> $email,
			'phone'				=> $phone,

			'email_is_required'	=> $emailIsRequired,
			'phone_is_required'	=> $phoneIsRequired,

			'show_only_name'    => Helper::getOption('separate_first_and_last_name', 'on') == 'off'
		]);
	}

	public static function get_data_confirm_details()
	{

		$location			= Helper::_post('location', 0, 'int');
		$staff				= Helper::_post('staff', 0, 'int');
		$service			= Helper::_post('service', 0, 'int');
		$service_extras		= Helper::_post('service_extras', [], 'arr');
		$date				= Helper::_post('date', '', 'str');
		$time				= Helper::_post('time', '', 'str');
        $original_date		= Helper::_post('original_date', '', 'str');

		$brought_people_count		=	Helper::_post('brought_people_count', 0 , 'int');
		$total_customer_count		=   $brought_people_count + 1;

		$locationInf		= Location::get( $location );
		$serviceInf			= Service::get( $service );

		$date 				= Date::dateSQL( $date );
		$time 				= Date::time( $time );

        $original_date		= Date::dateSQL( $original_date );

		$extras_arr		= [];
		$extras_price	= 0;
		$extras_drtn	= 0;

		foreach ( $service_extras AS $extra_id => $quantity )
		{
			if( !(is_numeric($quantity) && $quantity > 0) )
				continue;

			$extra_inf = ServiceExtra::where('service_id', $service)->where('id', $extra_id)->fetch();

			if( $extra_inf && $extra_inf['max_quantity'] >= $quantity )
			{
				$extra_inf['quantity'] = $quantity;

				$extras_arr[] = $extra_inf;
				$extras_price += $extra_inf['price'] * $quantity;
				$extras_drtn += $extra_inf['duration'] * $quantity;
			}
		}

		
		if( $staff == -1 )
		{
			$availableStaffIDs = AppointmentService::staffByService( $service, $location, true, $original_date );

			foreach ( $availableStaffIDs AS $staffID )
			{
				if( $serviceInf['is_recurring'] || AppointmentService::checkStaffAvailability( $service, $extras_arr, $staffID, $original_date, $time ) )
				{
					$staff = $staffID;
					break;
				}
			}

			if( $staff == -1 )
			{
				Helper::response( false, bkntc__('There isn\'t any available staff for the selected date/time.') );
			}
		}
		

		$staffInf			= Staff::get( $staff );
		$serviceStaffInf	= ServiceStaff::where('service_id', $service)->where('staff_id', $staff)->fetch();

		if( !$serviceStaffInf )
		{
			Helper::response( false );
		}
		

		$discount = 0;
		$gift_discount = 0;
		$appointments_count = 1;

		if( $serviceInf['is_recurring'] )
		{
			$date = Helper::_post('recurring_start_date', '', 'str');
			$time = Helper::_post('recurring_end_date', '', 'str');

			$date = Date::dateSQL( $date );
			$time = Date::datee( $time );

			if( $serviceInf['recurring_payment_type'] == 'full' )
			{
				$appointments = Helper::_post('appointments', '[]', 'str');
				$appointments = json_decode($appointments, true);

				$appointments_count = count( $appointments );
			}
			

		}

		else
		{
			if( Helper::getOption('time_view_type_in_front', '1')=='1' )
			{
				$time = Date::time( $time, false, true ) . '-' . Date::time( $time, '+' . ($serviceInf['duration'] + $extras_drtn) . ' minutes', true );
			}
			else
			{
				$time = Date::time( $time, false, true );
			}
			

		}
		

		$localPaymentIsActive 	= Helper::getOption('local_payment_enable', 'on');
		$paypalIsActive 		= Helper::getOption('paypal_enable', 'off');
		$stripeIsActive 		= Helper::getOption('stripe_enable', 'off');
        $squareIsActive 		= Helper::getOption('square_enable', 'off');
        $mollieIsActive 		= Helper::getOption('mollie_enable', 'off');

		$servicePrice = $serviceStaffInf['price'] != -1 ? $serviceStaffInf['price'] : $serviceInf['price'];

		if( $serviceStaffInf['price'] == -1 )
		{
			$deposit		= $serviceInf['deposit'];
			$deposit_type	= $serviceInf['deposit_type'];
			

		}
		else
		{
			$deposit		= $serviceStaffInf['deposit'];
			$deposit_type	= $serviceStaffInf['deposit_type'];
		}

		$hasDeposit = ($deposit_type == 'price' && $servicePrice != $deposit) || ($deposit_type == 'percent' && $deposit!=100);

		$hide_confirm_step = Helper::getOption('hide_confirm_details_step', 'off') == 'on';

		$hideMothodSelecting = Helper::getOption('disable_payment_options', 'off') == 'on';
		

		$gateways_order = Helper::getOption('payment_gateways_order', 'stripe,paypal,square,mollie,local,woocommerce');
		$gateways_order = explode(',', $gateways_order);
		$payment_gateways = [
			'local'		=>	[
				'title'  =>  bkntc__('Local')
			],
			'paypal'	=>	[
				'title'  =>  bkntc__('Paypal')
			],
			'stripe'	=>	[
				'title'  =>  bkntc__('Credit card')
			],
            'square'	=>	[
                'title'  =>  bkntc__('Square')
            ],
            'mollie'	=>	[
                'title'  =>  bkntc__('Mollie')
            ]
		];

		$sum_amount			    = $total_customer_count * $appointments_count * $servicePrice +  $appointments_count * $extras_price - $discount;  //$total_customer_count * $appointments_count * ( $extras_price + $servicePrice ) - $discount;

		$tax					= $serviceInf['tax'];
		$tax_type				= $serviceInf['tax_type'];
		$has_tax				= $tax > 0;

		$tax_amount				= $tax_type == 'percent' ? ( $sum_amount * $tax ) / 100  : $tax;

		$sum_amount_with_tax    = $sum_amount + $tax_amount;	


		$hide_discount_row	    = Helper::getOption('hide_discount_row', 'off');
		$hide_price_section	    = Helper::getOption('hide_price_section', 'off');

		$woocommerce_enabled    = WooCommerceService::paymentMethodIsEnabled();
		$wc_show_confirm_step   = Helper::getOption('woocommerce_skip_confirm_step', 'on', false) == 'off';
		

		if( $sum_amount <= 0 )
		{
			$localPaymentIsActive = 'on';
			$paypalIsActive = 'off';
			$stripeIsActive = 'off';
            $squareIsActive = 'off';
            $mollieIsActive = 'off';
			$hide_discount_row = 'on';
			$hideMothodSelecting = true;
		}

		if( $woocommerce_enabled && $wc_show_confirm_step && !$hasDeposit )
		{
			$hideMothodSelecting = true;
		}

		if( $localPaymentIsActive == 'off' && !$hide_confirm_step )
		{
			unset($payment_gateways['local']);
		}
		if( $paypalIsActive == 'off' || $hide_confirm_step )
		{
			unset($payment_gateways['paypal']);
		}
		if( $stripeIsActive == 'off' || $hide_confirm_step )
		{
			unset($payment_gateways['stripe']);
		}

        if( $squareIsActive == 'off' || $hide_confirm_step )
        {
            unset($payment_gateways['square']);
        }
        if( $mollieIsActive == 'off' || $hide_confirm_step )
        {
            unset($payment_gateways['mollie']);
        }

		

		parent::view('booking_panel.confirm_details', [

			'service'				=>	$serviceInf,
			'staff'	    			=>	$staffInf,
			'location'				=>	$locationInf,
			'date_based_service'	=>	$serviceInf['duration'] >= 24 * 60,
			'service_price'			=>	$servicePrice,
			'extras'				=>	$extras_arr,
			'extras_pr'				=>	$extras_price,

			'date'					=>	Date::datee( $date ),
			'time'					=>	$time,
			'total_customer_count'  =>  $total_customer_count,

			'discount'				=>	$discount,
			'gift_discount'			=>  $gift_discount,
			'appointments_count'	=>	$appointments_count,
			'sum'					=>	$sum_amount,

			'hide_confirm_step'		=>	$hide_confirm_step,
			'hide_payments'			=>	$hideMothodSelecting,

			'local_active'			=>	$localPaymentIsActive,
			'paypal_active'			=>	$hideMothodSelecting ? 'off' : $paypalIsActive,
            'stripe_active'			=>	$hideMothodSelecting ? 'off' : $stripeIsActive,
            'square_active'			=>	$hideMothodSelecting ? 'off' : $squareIsActive,
            'mollie_active'			=>	$hideMothodSelecting ? 'off' : $mollieIsActive,

			'has_deposit'			=>	$hasDeposit,
			'deposit'				=>	$deposit,
			'deposit_type'			=>	$deposit_type,

			'has_tax'				=> $has_tax,
			'tax'					=> $tax,
			'tax_type'				=> $tax_type,
			'tax_amount'		    => $tax_amount,
			'sum_amount_with_tax'   => $sum_amount_with_tax,

			'woocommerce_enabled'   =>  $woocommerce_enabled,
			'wc_show_confirm_step'  =>  $wc_show_confirm_step,
			'gateways_order'		=>	$gateways_order,
			'payment_gateways'		=>	$payment_gateways,

			'hide_discount_row'     =>  $hide_discount_row == 'on',
			'hide_price_section'    =>  $hide_price_section == 'on',

		]);
	}

	public static function get_custom_field_choices()
	{
		$inputId = Helper::_post('input_id', '0', 'int');
		$query = Helper::_post( 'q', '', 'str' );

		$choices = FormInputChoice::where( 'form_input_id', $inputId );

		if ( ! empty( trim( $query ) ) )
		{
			$choices = $choices->where( 'title', 'like', '%' . DB::DB()->esc_like( $query ) . '%' );
		}

		$choices = $choices->orderBy('order_number')->fetchAll();

		$result = [];
		foreach ($choices AS $choice)
		{
			$result[] = [
				'id'	=> (int)$choice['id'],
				'text'	=> htmlspecialchars($choice['title'])
			];
		}

		Helper::response( true, [
			'results' => $result
		]);
	}

	public static function confirm()
	{
		$id						    =	Helper::_post('id', 0,'int');
		$location				    =	Helper::_post('location', 0, 'int');
		$staff					    =	Helper::_post('staff', 0, 'int');
		$service				    =	Helper::_post('service', 0, 'int');
		$service_extras			    =	Helper::_post('service_extras', [], 'arr');

		$date					    =	Helper::_post('date', '', 'str');
		$time					    =	Helper::_post('time', '', 'str');
		$brought_people_count		=	Helper::_post('brought_people_count', 0 , 'int');

		$total_customer_count		=	$brought_people_count + 1;

		$customer_data			    =	Helper::_post('customer_data', [], 'arr');
		$custom_fields			    =	Helper::_post('custom_fields', [], 'arr');
		$payment_method			    =	Helper::_post('payment_method', '', 'str', ['giftcard', 'local', 'paypal', 'stripe', 'square', 'mollie', 'woocommerce' ]);
		$deposit_full_amount	    =	Helper::_post('deposit_full_amount', '1', 'int', [ '0', '1' ]);
		$coupon					    =	Helper::_post('coupon', '', 'str');
		$giftcard					=	Helper::_post('giftcard', '', 'str');

		$recurring_start_date	    =	Helper::_post('recurring_start_date', '', 'string');
		$recurring_end_date		    =	Helper::_post('recurring_end_date', '', 'string');
		$recurring_times		    =	Helper::_post('recurring_times', '', 'string');
		$appointmentsParam		    =	Helper::_post('appointments', '', 'string');

		$appointmentsParam		    =	json_decode( $appointmentsParam );
		$appointmentsParam		    =	is_array( $appointmentsParam ) ? $appointmentsParam : [];

		$customFiles                =   isset($_FILES['custom_fields']) ? $_FILES['custom_fields']['tmp_name'] : [];

		$client_timezone		=   Helper::_post('client_time_zone', '-', 'string');

		if( $recurring_start_date == 'undefined' )
		{
			$check = AppointmentService::timeslot_capacity_is_available( $service, $staff, $date, $time, $brought_people_count);

			if( !$check['status'] )
			{
				Helper::response( false, $check['message'] );
			}
		}

		/**
		 * Validate the Google ReCaptcha...
		 */
		AjaxHelper::validateGoogleReCaptcha();

		if( $location == -1 )
		{
			$locationArr = static::get_data_location( true );
			if( empty( $locationArr ) )
			{
				Helper::response( false, bkntc__('There is no Location to match your request.') );
			}

			$location = $locationArr[0]['id'];
		}

		$serviceInf     = Service::get( $service );
		$locationInf    = Location::get( $location );

		if( $payment_method == 'paypal' && Helper::getOption('paypal_enable', 'off') == 'off' )
			$payment_method = '';

		if( $payment_method == 'stripe' && Helper::getOption('stripe_enable', 'off') == 'off' )
			$payment_method = '';

        if( $payment_method == 'square' && Helper::getOption('square_enable', 'off') == 'off' )
            $payment_method = '';

        if( $payment_method == 'mollie' && Helper::getOption('mollie_enable', 'off') == 'off' )
            $payment_method = '';

		if( $payment_method == 'woocommerce' && !WooCommerceService::paymentMethodIsEnabled() )
			$payment_method = '';

		if( empty($payment_method) )
		{
			Helper::response(false, bkntc__('Please select payment method!'));
		}

		if( $payment_method == 'woocommerce' && !$id )
		{
			WooCommerceService::emptyCart( );
		}

		if( $id > 0 )
		{
			$checkIfExist = AppointmentCustomer::get( $id );

			if( !$checkIfExist || $checkIfExist['payment_status'] == 'paid' )
			{
				Helper::response(false);
			}

			$customerId             = $checkIfExist['customer_id'];
			$appointmentId          = $checkIfExist['appointment_id'];

			$appointmentInfo		= Appointment::get( $appointmentId );
			$staffInf               = Staff::get( $appointmentInfo->staff_id );
			$extras_drtn			= $appointmentInfo->extras_duration;
			$firstAppointmentData 	= $appointmentInfo->date;
			$firstAppointmentTime 	= $appointmentInfo->start_time;

			$mustPayOnlyFirst               = $serviceInf['is_recurring'] && $serviceInf['recurring_payment_type'] == 'first_month';
			$deposit_can_pay_full_amount    = Helper::getOption('deposit_can_pay_full_amount', 'on');
			$appointmentCustomers = DB::DB()->get_results(
				DB::DB()->prepare(
					'SELECT * FROM `'.DB::table('appointment_customers').'` WHERE appointment_id IN (SELECT id FROM `'.DB::table('appointments').'` WHERE id=%d OR recurring_id=%d) AND customer_id=%d',
					[
						$appointmentId,
						$appointmentId,
						$customerId
					]
				),
				ARRAY_A
			);
			$getStaffService = ServiceStaff::where('service_id', $service)->where('staff_id', $staffInf->id)->fetch();
			if( $getStaffService['price'] == -1 )
			{
				$deposit		= $serviceInf['deposit'];
				$deposit_type	= $serviceInf['deposit_type'];
			}
			else
			{
				$deposit		= $getStaffService['deposit'];
				$deposit_type	= $getStaffService['deposit_type'];
			}

			$servicePrice = $getStaffService['price'] == -1 ? $serviceInf['price'] : $getStaffService['price'];

			$payable_amount     = 0;
			$payable_tax_sum    = 0;

			foreach ( $appointmentCustomers AS $recurringSubId => $appointment_customer )
			{
				$tax					= $serviceInf['tax'];
				$tax_type				= $serviceInf['tax_type'];

				$tax_amount_sum			= $tax_type == 'percent' ? ( ( $appointment_customer['service_amount'] + $appointment_customer['extras_amount'] ) * $tax ) / 100  : $tax;

				$sumPriceWithoutTax = $appointment_customer['service_amount'] + $appointment_customer['extras_amount'] - $appointment_customer['discount'];
				$sumPrice 			= $sumPriceWithoutTax + $tax_amount_sum;

				if( $payment_method == 'local' || ($mustPayOnlyFirst && $recurringSubId > 0) )
				{
					$payable_amount_this = 0;
					$payable_tax         = 0;
				}
				else if( $deposit_full_amount && $deposit_can_pay_full_amount == 'on' )
				{
					$payable_amount_this = $sumPrice;
					$payable_tax         = $tax_amount_sum;
				}
				else if( $deposit_type == 'price' )
				{
					$payable_amount_this = $deposit == $servicePrice ? $sumPrice : $deposit;
					$payable_tax         = $deposit == $servicePrice ? $tax_amount_sum : (( $sumPrice  - $deposit) / $sumPrice) * $tax_amount_sum;
				}
				else
				{
					$payable_amount_this = $sumPrice * $deposit / 100;
					$payable_tax		 = $tax_amount_sum * $deposit / 100;
				}

				//$payable_amount_this *= $total_customer_count;

				$payable_amount += $payable_amount_this;

				$payable_tax_sum  += $payable_tax;

				if( $payable_amount_this != $appointment_customer['paid_amount'] )
				{
					AppointmentCustomer::where('id', $appointment_customer['id'])->update([
						'paid_amount'   =>  $payable_amount_this,
						'tax_amount'    =>  $tax_amount_sum
					]);
				}
			}

			if( $payment_method == 'local' )
			{
				AppointmentCustomer::where('id', $id)->update([
					'status'	=>	Helper::getOption('default_appointment_status', 'approved')
				]);

				if(
					Helper::getOption('zoom_enable', 'off', false) == 'on'
					&& !empty($staffInf['zoom_user'])
					&& $serviceInf['activate_zoom'] == 1
				)
				{
					$zoomUserData = json_decode( $staffInf['zoom_user'], true );
					if( is_array( $zoomUserData ) && isset( $zoomUserData['id'] ) && is_string( $zoomUserData['id'] ) )
					{
						$zoomService = new ZoomService();
						$zoomService->setAppointmentId( $appointmentId )->saveMeeting();
					}
				}

				if(
					Helper::getOption('google_calendar_enable', 'off', false) == 'on'
					&& !empty($staffInf['google_access_token'])
					&& !empty($staffInf['google_calendar_id'])
				)
				{
					$googleCalendar = new GoogleCalendarService();

					$googleCalendar->setAccessToken( $staffInf['google_access_token'] );
					$googleCalendar->event()
						->setCalendarId( $staffInf['google_calendar_id'] )
						->setAppointmentId( $appointmentId )
						->save();
				}

				$sendMail = new SendEmail( 'new_booking' );
				$sendMail->setID( $appointmentId )
					->setCustomer( $customerId )
					->send();

				$sendSMS = new SendSMS( 'new_booking' );
				$sendSMS->setID( $appointmentId )
					->setCustomer( $customerId )
					->send();

				$sendWPMessage = new SendMessage( 'new_booking' );
				$sendWPMessage->setID( $appointmentId )
					->setCustomer( $customerId )
					->send();
			}
		}
		else
		{
			if( empty( $location ) || empty( $service ) || empty( $staff ) )
			{
				Helper::response(false, bkntc__('Please fill in all required fields correctly!'));
			}

			/**
			 * Handle service extras...
			 */
			$serviceExtrasData  = AjaxHelper::handleServiceExtras( $service_extras, $service );
			$extras_arr		    = $serviceExtrasData['extras_arr'];
			$extras_price	    = $serviceExtrasData['extras_price'];
			$extras_drtn	    = $serviceExtrasData['extras_drtn'];

			/**
			 * If "Any Staff" option selected...
			 * Find an available Staff for selected criteria...
			 */
			if( $staff == -1 )
			{
				$staff = AjaxHelper::findAnAvailableStaff( $serviceInf, $location, $extras_arr, $date, $time, $appointmentsParam );
			}

			/**
			 * Check if the Staff has been assigned to the service...
			 */
			$serviceStaffInf = ServiceStaff::where('service_id', $service)->where('staff_id', $staff)->fetch();

			if( !$serviceStaffInf )
			{
				Helper::response(false);
			}

			/**
			 * Validate Custom form inputs...
			 */
			AjaxHelper::handleCustomData( $custom_fields, $customer_data, $customFiles, $service );

			/**
			 * Handle and validate coupon code...
			 */
			$couponInf  = false;
			$couponId   = 0;
			$discount   = 0;
			if( ! empty( $coupon ) )
			{
				$couponInf  = AppointmentService::getCouponInf( $service, $staff, $service_extras, $coupon, $customer_data, $total_customer_count);
				$discount   = $couponInf['discount_price'];
				$couponId   = $couponInf['id'];
			}

			/**
			 * Handle and validate giftcard/balance...
			 */
			$giftcardInf    = false;
			$giftcardId     = 0;
			$giftCardSpent  = 0;
			if( ! empty( $giftcard ) )
			{
				$giftcardInf    = AppointmentService::getGiftcardInf( $service, $staff, $service_extras, $giftcard, $discount, $total_customer_count);
				$giftCardSpent  = $giftcardInf['spent'];

				if( $payment_method == 'giftcard' && $giftcardInf['sum_price'] > 0 )
				{
					Helper::response(false, bkntc__('Please fill in all required fields correctly!') );
				}
                $giftcardId = $giftcardInf['id'];
			}

			/**
			 * Get Customer ID (If the Customer is new, create it)
			 */
			$customerInfo       = AjaxHelper::getOrCreateCustomer( $customer_data );
			$customerId         = $customerInfo['customer_id'];
			$isNewCustomer      = $customerInfo['is_new_customer'];
			$newCustomerPass    = $customerInfo['new_customer_pass'];

			$customers = [
				[
					'id'		=>	$customerId,
					'status'	=>	! in_array( $payment_method, ['local', 'giftcard'] ) ? 'waiting_for_payment' : Helper::getOption('default_appointment_status', 'approved'),
					'number'	=>	$total_customer_count,
				]
			];

			/**
			 * Add customer ID parameter to the Extra services Array...
			 */
			foreach ( $extras_arr AS $extraKey => $extraInfo )
			{
				$extras_arr[ $extraKey ]['customer'] = $customerId;
			}

			/**
			 * Create new Appointment...
			 */
			$createInfo = AppointmentService::create(
				$location,
				$staff,
				$service,
				$extras_arr,
				$date,
				$time,
				$customers,
				$recurring_start_date,
				$recurring_end_date,
				$recurring_times,
				$appointmentsParam,
				true,
				$couponId,
				$giftcardId,
				$giftCardSpent,
				$discount,
				$payment_method,
				$deposit_full_amount,
				$custom_fields,
				$customFiles,
				false,
                $client_timezone,
				$total_customer_count
			);

			$payable_amount     = $createInfo['payable_amount_sum'] - $giftCardSpent;
			$payable_tax_sum    = $createInfo['payable_tax'] ? $createInfo['payable_tax'] : 0;

			$createdAppointment = reset( $createInfo['appointments'] );
			$id = isset( $createdAppointment[0] ) ? (int)$createdAppointment[0][0] : 0;

			$appointmentId = array_keys( $createInfo['appointments'] );
			$appointmentId = reset( $appointmentId );

			if( $isNewCustomer )
			{
				AjaxHelper::sendNotificationsForCP( $appointmentId, $customerId, $newCustomerPass );
			}

			$firstAppointmentData = $createInfo['appointment_date_time'][0];
			$firstAppointmentTime = $createInfo['appointment_date_time'][1];
		}

		$addToGoogleCalendarUrl = 'https://www.google.com/calendar/render?action=TEMPLATE&text=' . urlencode($serviceInf['name']) . '&dates=' . ( Date::UTCDateTime($firstAppointmentData.' '.$firstAppointmentTime, 'Ymd\THis\Z') . '/' . Date::UTCDateTime($firstAppointmentData.' '.$firstAppointmentTime, 'Ymd\THis\Z', '+' . ($serviceInf['duration'] + $extras_drtn) . ' minutes') ) . '&details=&location=' . urlencode($locationInf['name']) . '&sprop=&sprop=name:';

		$tenantIdParam = ( Helper::isSaaSVersion() ? '&tenant_id=' . Permission::tenantId() : '' );

		if( $payment_method == 'paypal' )
		{
			$paypal = new Paypal( );
			$paypal->setId( $id );
			$paypal->setItem( $service, $serviceInf['name'], $serviceInf['notes'] );
			$paypal->setAmount( $payable_amount - $payable_tax_sum, Helper::getOption('currency', 'USD') );
			$paypal->setTax( $payable_tax_sum );
			$paypal->setSuccessURL(site_url() . '/?booknetic_paypal_status=success&booknetic_appointment_id=' . $id . $tenantIdParam );
			$paypal->setCancelURL(site_url() . '/?booknetic_paypal_status=cancel&booknetic_appointment_id=' . $id . $tenantIdParam);
			$res = $paypal->create();

			if( $res['status'] )
			{
				Helper::response( true, [
					'id'			=>	$id,
					'url'			=>	$res['url'],
					'google_url'	=>	$addToGoogleCalendarUrl
				] );
			}
			else
			{
				Helper::response( false, [
					'id'			=>	$id,
					'error_msg'     =>  $res['error']
				] );
			}
		}
		else if( $payment_method == 'stripe' )
		{
			$stripe = new Stripe();
			$stripe->setId( $id );
			$stripe->setItem( $serviceInf['name'], Helper::profileImage($serviceInf['image'], 'Services') );
			$stripe->setAmount( $payable_amount, Helper::getOption('currency', 'USD') );
			$stripe->setSuccessURL(site_url() . '/?booknetic_stripe_status=success&booknetic_appointment_id=' . $id .'&bkntc_session_id={CHECKOUT_SESSION_ID}' . $tenantIdParam);
			$stripe->setCancelURL(site_url() . '/?booknetic_stripe_status=cancel&booknetic_appointment_id=' . $id . $tenantIdParam);
			$stripeSessionId = $stripe->create();

			Helper::response( true, [
				'id'			=>	$id,
				'url'           =>  site_url() . '/?bkntc_session_id=' . $stripeSessionId . $tenantIdParam,
				'google_url'	=>	$addToGoogleCalendarUrl
			] );
		}
        else if( $payment_method == 'square' )
        {
            $square = new Square();
            $square->setId( $id );
            $square->setItem( $service, $serviceInf['name'], $serviceInf['notes'] );
            $square->setAmount( $payable_amount , Helper::getOption('currency', 'USD') );
            $square->setSuccessURL(site_url() . '/?booknetic_square_status=success&booknetic_appointment_id=' . $id . $tenantIdParam );
            $res = $square->create();

            if ( $res[ 'status' ] )
            {
                Helper::response( true, [
                    'id'			=>	$id,
                    'url'           =>  $res['url'],
                    'google_url'	=>	$addToGoogleCalendarUrl
                ] );
            }
            else
            {
                Helper::response( false, [
                    'id'			=>	$id,
                    'error_msg'     =>  $res['error']
                ] );
            }
        }
        else if( $payment_method == 'mollie' )
        {
            $mollie = new Mollie();
            $mollie->setId( $id );
            $mollie->setItem( $service, $serviceInf['name'], $serviceInf['notes'] );
            $mollie->setAmount( $payable_amount , Helper::getOption('currency', 'USD') );
            $mollie->setSuccessURL(site_url() . '/?booknetic_mollie_status=success&booknetic_appointment_id=' . $id . $tenantIdParam );
            $res = $mollie->create();

            if ( $res[ 'status' ] )
            {
                Helper::response( true, [
                    'id'			=>	$id,
                    'url'           =>  $res['url'],
                    'google_url'	=>	$addToGoogleCalendarUrl
                ] );
            }
            else
            {
                Helper::response( false, [
                    'id'			=>	$id,
                    'error_msg'     =>  $res['error']
                ] );
            }
        }
		else if( $payment_method == 'woocommerce' )
		{
			//WooCommerceService::addToWoocommerceCart( $id );
			Helper::response( true, [
				'id'	                => $id,
				//'woocommerce_cart_url'  =>  WooCommerceService::redirect(),
				'woocommerce_cart_url'  =>  agea_redirect_url($id),
				'google_url'			=>	$addToGoogleCalendarUrl
			] );
		}
		else
		{
			Helper::response( true, [
				'id'			=>	$id,
				'google_url'	=>	$addToGoogleCalendarUrl
			] );
		}
	}

	public static function summary_with_coupon()
	{
		$service		= Helper::_post('service', 0, 'int');
		$staff			= Helper::_post('staff', 0, 'int');
		$service_extras	= Helper::_post('service_extras', [], 'arr');
		$coupon			= Helper::_post('coupon', '', 'str');
		$email			= Helper::_post('email', '', 'str');
		$phone			= Helper::_post('phone', '', 'str');

		$brought_people_count		=	Helper::_post('brought_people_count', 0 , 'int');
		$total_customer_count		=	$brought_people_count + 1;

		$couponInf = AppointmentService::getCouponInf( $service, $staff, $service_extras, $coupon, [
			'email' =>  $email,
			'phone' =>  $phone
		], $total_customer_count);

		Helper::response( true, $couponInf );
	}

	public static function summary_with_giftcard()
	{
		$service		    = Helper::_post('service', 0, 'int');
		$staff			    = Helper::_post('staff', 0, 'int');
		$service_extras	    = Helper::_post('service_extras', [], 'arr');
		$giftcard		    = Helper::_post('giftcard', '', 'str');
		$discount_price	    = Helper::_post('discount_price', 0, 'float');


		$brought_people_count		=	Helper::_post('brought_people_count', 0 , 'int');
		$total_customer_count		=	$brought_people_count + 1;

		$giftcardInf        = AppointmentService::getGiftcardInf( $service, $staff, $service_extras, $giftcard, $discount_price, $total_customer_count );

		Helper::response( true, $giftcardInf );
	}

	public static function get_available_times_all()
	{
        add_filter( 'bkntc_available_times_all',  array( __CLASS__, 'filter_recurring_times' ), 10, 3 );
		$ajax = new \BookneticApp\Backend\Appointments\Controller\Ajax();
		$ajax->get_available_times_all();
	}

    public static function filter_recurring_times( $today, $yesterday, $tomorrow)
    {
        $modifiedHours = [];
        foreach ( $today as $todayHours )
        {
            $date = Date::datee( Date::datee(). $todayHours[ 'text' ], false, true );
            $modifiedHours[ $date ][] = [ 'id' => $todayHours[ 'id' ], 'text' => Date::time( Date::datee(). $todayHours[ 'text' ], false, true ), "day" => "today" ];
        }
        foreach ( $yesterday as $yesterdayHours )
        {
            $date = Date::datee( Date::datee(). $yesterdayHours[ 'text' ], "-1 days", true );
            $modifiedHours[ $date ][] = [ 'id'=> $yesterdayHours[ 'id' ], 'text'=> Date::time( Date::datee(). $yesterdayHours[ 'text' ], "-1 days", true ), "day" => "yesterday" ];
        }
        foreach ( $tomorrow as $tomorrowHours )
        {
            $date = Date::datee( Date::datee(). $tomorrowHours[ 'text' ], "+1 days", true );
            $modifiedHours[ $date ][] = [ 'id' => $tomorrowHours[ 'id' ], 'text'=> Date::time( Date::datee(). $tomorrowHours[ 'text' ], '+1 days', true ), "day" => "tomorrow" ];
        }

       return $modifiedHours[ Date::datee() ];

    }


	public static function get_available_times()
	{
		$ajax = new \BookneticApp\Backend\Appointments\Controller\Ajax();
		$ajax->get_available_times();
	}

	public static function get_day_offs()
	{
		$ajax = new \BookneticApp\Backend\Appointments\Controller\Ajax();
		$ajax->get_day_offs();
	}

	private static function __getServiceCategoryName( $categId )
	{
		if( is_null( self::$categories ) )
		{

			self::$categories = ServiceCategory::fetchAll();
		}

		$categNames = [];

		$attempts = 0;
		while( $categId > 0 && $attempts < 10 )
		{
			$attempts++;
			foreach ( self::$categories AS $category )
			{
				if( $category['id'] == $categId )
				{
					$categNames[] = $category['name'];
					$categId = $category['parent_id'];
					break;
				}
			}
		}

		return implode(' > ', array_reverse($categNames));
	}



	public static function check_timeslot_capacity()
	{
		$service_id				    =	Helper::_post('service_id', 0, 'int');
		$staff_id				    =	Helper::_post('staff_id', 0, 'int');
		$date					    =	Helper::_post('date', '', 'str');
		$time					    =	Helper::_post('time', '', 'str');
		$brought_people_count		=	Helper::_post('brought_people_count', 0 , 'int');


		$check = AppointmentService::timeslot_capacity_is_available( $service_id, $staff_id, $date, $time, $brought_people_count);

		if( $check['status'] )
		{
			Helper::response( true );
		}

		Helper::response( false, ['message' => $check['message']] );
		
	}

}
