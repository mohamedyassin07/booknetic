<?php
namespace BookneticApp\Frontend\view;

use BookneticApp\Providers\Helper;
use BookneticApp\Providers\Date;
use BookneticApp\Providers\Permission;

defined( 'ABSPATH' ) or die();

$notificationNames = [
	'new_booking'			=>	bkntc__('New Appointment'),
	'edit_booking'			=>	bkntc__('Appointment re-scheduled'),
	'appointment_approved'	=>	bkntc__('Appointment approved'),
	'appointment_pending'	=>	bkntc__('Appointment pending'),
	'appointment_rejected'	=>	bkntc__('Appointment rejected'),
	'appointment_canceled'	=>	bkntc__('Appointment canceled'),
	'reminder_before'	    =>	bkntc__('Reminder before appointment'),
	'reminder_after'	    =>	bkntc__('Reminder after appointment'),
	'cp_access'				=>	bkntc__('Access to Customer Panel')
];
?>

<script src="<?php print Helper::assets('js/notifications.js', 'Whatsappnotifications')?>" id="notifications-script" data-notifications="<?php print htmlspecialchars(json_encode($parameters['notifications']))?>"></script>
<script src="<?php print Helper::assets('js/notification_tab.js', 'NotificationTab')?>"></script>
<link rel='stylesheet' href='<?php print Helper::assets('css/notifications.css', 'Whatsappnotifications')?>' type='text/css'>
<link rel='stylesheet' href='<?php print Helper::assets('css/notification_tab.css', 'NotificationTab')?>' type='text/css'>

<?php if( Helper::isSaaSVersion() ):?>
	<?php $allowedLimit = Permission::tenantInf()->checkNotificationLimits('whatsapp', false);?>
	<div class="m_header_alert">
		<div class="alert alert-<?php print ( $allowedLimit[0] ? 'success' : 'danger' )?>">
			<span><?php print bkntc__('Your monthly balance is %s/%s.', [ $allowedLimit[1], ($allowedLimit[2] == -1 ? '∞' : $allowedLimit[2]) ])?></span>
			<div>
				<a href="?page=<?php print Helper::getSlugName() ?>&module=billing&upgrade=1" class="btn btn-secondary" id="upgrade_plan_btn"><?php print bkntc__('UPGRADE PLAN')?></a>
			</div>
		</div>
	</div>
<?php endif;?>

<div class="m_header clearfix">
	<div class="m_head_title float-left"><?php print bkntc__('Whatsapp Notifications')?> <span class="badge badge-warning"><?php print (int)(count($parameters['notifications'])/2)?></span></div>
	<div class="m_head_actions float-right">
		<button type="button" class="btn btn-lg btn-success float-right ml-1" id="notification_save_btn"><i class="fa fa-check pr-2"></i> <?php print bkntc__('SAVE CHANGES')?></button>
		<button type="button" class="btn btn-lg btn-outline-secondary float-right" id="send_test_message_btn"><img src="<?php print Helper::icon('send_test_message.svg', 'Whatsappnotifications')?>"> <?php print bkntc__('SEND TEST MESSAGE')?></button>
	</div>
</div>

<div class="fs_separator"></div>

<div class="row m-4">
    <div class="col-xl-12 col-md-12 col-lg-12 pr-md-1">
        <ul class="nav nav-tabs nav-light">

            <li class="nav-item"><a class="nav-link <?php if ($parameters['tab_id'] == '0' or $parameters['tab_id'] == '') print 'active'?>"  href="?page=<?php print Helper::getSlugName() ?>&module=whatsappnotifications"><?php print bkntc__('DEFAULT')?></a></li>
            <?php

            foreach ($parameters['tabs'] as $tab)
            {
                $active = '';
                if($parameters['tab_id'] == $tab['id'])
                {
                    $active = 'active';
                }
                print '<li class="nav-item">
                            <a class="nav-link '.$active.'" href="?page=' . Helper::getSlugName() . '&module=whatsappnotifications&tab_id='.(int) $tab['id'].'">'.esc_html($tab['name']).'</a>
                            <span data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></span>
                            <div class="dropdown-menu row-actions-area mt-4">
                                <button data-tabEdit="edit" data-tab_id="'.(int) $tab['id'].'" class="dropdown-item edit_action_btn" type="button">'.bkntc__('Edit').'</button>
                                <button data-tab="delete" data-tab_id="'.(int) $tab['id'].'" class="dropdown-item delete_action_btn" type="button">'.bkntc__('Delete').'</button>
                            </div>
                       </li>';
            }
            ?>
            <li class="nav-item"><a class="nav-link" href="#" id="add_tab_btn"  data-module="whatsappnotifications"><i class="fa fa-plus pt-1 text-success"></i></a></li>
        </ul>
    </div>
</div>

<div class="row m-4">

	<div class="col-xl-3 col-md-6 col-lg-5 p-3 pr-md-1" data-tab="<?php  if ($parameters['tab_id']) print $parameters['tab_id'];?>">
		<div class="fs_notifications_list fs_portlet">

			<ul class="nav nav-tabs nav-light">
				<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_to_customer"><?php print bkntc__('TO CUSTOMER')?></a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_to_staff"><?php print bkntc__('TO STAFF')?></a></li>
			</ul>

			<div class="text-primary mt-4"><?php print bkntc__('Appointment Notifications')?></div>
			<div class="tab-content mt-2 overflow-auto">
				<div id="tab_to_customer" class="tab-pane active">
					<?php
					foreach ( $parameters['notifications'] AS $notification )
					{
						if( $notification['send_to'] == 'staff' )
							continue;

						$title		= isset( $notificationNames[ $notification['action'] ] ) ? $notificationNames[ $notification['action'] ] : $notification['action'];
						$isActive	= $notification['is_active'] ? 'on' : 'off';

						?>
						<div class="fs_notification_element<?php print $notification['action'].':'.$notification['send_to'] == $parameters['active_tab'] ? ' fsn_active' : ''?>" data-id="<?php print $notification['id']?>">
							<div class="fsn_title"><?php print esc_html($title)?></div>
							<div class="fsn_switch_btn" data-status="<?php print $isActive?>">
								<div class="fs_onoffswitch">
									<input type="checkbox" name="fsn_el_id_<?php print $notification['id']?>" class="fs_onoffswitch-checkbox" id="fsn_el_id_<?php print $notification['id']?>"<?php print $notification['is_active']?' checked':''?>>
									<label class="fs_onoffswitch-label" for="fsn_el_id_<?php print $notification['id']?>"></label>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<div id="tab_to_staff" class="tab-pane">
					<?php
					foreach ( $parameters['notifications'] AS $notification )
					{
						if( $notification['send_to'] != 'staff' )
							continue;

						$title		= isset( $notificationNames[ $notification['action'] ] ) ? $notificationNames[ $notification['action'] ] : $notification['action'];
						$isActive	= $notification['is_active'] ? 'on' : 'off';

						?>
						<div class="fs_notification_element<?php print $notification['action'].':'.$notification['send_to'] == $parameters['active_tab'] ? ' fsn_active' : ''?>" data-id="<?php print $notification['id']?>">
							<div class="fsn_title"><?php print esc_html($title)?></div>
							<div class="fsn_switch_btn" data-status="<?php print $isActive?>">
								<div class="fs_onoffswitch">
									<input type="checkbox" name="fsn_el_id_<?php print $notification['id']?>" class="fs_onoffswitch-checkbox" id="fsn_el_id_<?php print $notification['id']?>"<?php print $notification['is_active']?' checked':''?>>
									<label class="fs_onoffswitch-label" for="fsn_el_id_<?php print $notification['id']?>"></label>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>

		</div>
	</div>

	<div class="col-xl-6 col-md-6 col-lg-7 p-3 pr-md-3 pr-xl-1 pl-md-1">
		<div class="fsn_body fs_portlet">
			<div class="fs_portlet_title"><?php print bkntc__('APPOINTMENT APPROVED')?></div>
			<div class="fs_portlet_content">
				<div class="form-row">
					<div class="form-group col-md-6 hidden" id="schedule_after_label">
						<label for="remind_time_after"><?php print bkntc__('Remind after')?></label>
						<select class="form-control" id="remind_time_after">
							<?php
							for( $min = 30; $min <= 5 * 60 * 24; $min += ( $min >= 60 * 24 ? 60 * 24 : 30) )
							{
								print '<option value="'.$min.'">'.Helper::secFormat( $min * 60 ).'</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-6 hidden" id="schedule_before_label">
						<label for="remind_time_before"><?php print bkntc__('Remind before')?></label>
						<select class="form-control" id="remind_time_before">
							<?php
							for( $min = 30; $min <= 5 * 60 * 24; $min += ( $min >= 60 * 24 ? 60 * 24 : 30) )
							{
								print '<option value="'.$min.'">'.Helper::secFormat( $min * 60 ).'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label><?php print bkntc__('Message body')?></label>
						<textarea class="form-control" id="notification_body"></textarea>
					</div>
				</div>

				<div class="form-row hidden remineder_warning">
					<?php if( ! Helper::isSaaSVersion() ):?>
					<div class="form-group col-md-12 ">
						<div class="alert alert-warning font-size-14">
							<div class="mb-1"><?php print bkntc__('To send reminders on time, you need to configure the following cron task:')?></div>
							<code class="font-size-12">wget -O /dev/null <?php print site_url()?>/wp-cron.php?doing_wp_cron > /dev/null 2>&1</code>
							<code class="font-size-12 d-block mt-2 text-secondary"><i class="fa fa-exclamation-triangle"></i> <?php print bkntc__('Every 15 minutes')?> ( */15 * * * * ) </code>
						</div>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 col-lg-5 p-3 pr-md-1 pr-xl-3 pl-xl-1">
		<div class="fs_portlet">
			<div class="fs_portlet_title"><?php print bkntc__('SHORT TAGS')?></div>
			<div class="fs_portlet_content">

				<div class="text-primary mt-2"><?php print bkntc__('Appointment Info')?>:</div>

				<div class="fsn_shorttags_element">{appointment_id}</div>
				<div class="fsn_shorttags_element">{appointment_date}</div>
				<div class="fsn_shorttags_element">{appointment_date_time}</div>
				<div class="fsn_shorttags_element">{appointment_start_time}</div>
				<div class="fsn_shorttags_element">{appointment_end_time}</div>
				<div class="fsn_shorttags_element">{appointment_duration}</div>
				<div class="fsn_shorttags_element">{appointment_buffer_before}</div>
				<div class="fsn_shorttags_element">{appointment_buffer_after}</div>
				<div class="fsn_shorttags_element">{appointment_status}</div>
				<div class="fsn_shorttags_element">{appointment_service_price}</div>
				<div class="fsn_shorttags_element">{appointment_extras_price}</div>
				<div class="fsn_shorttags_element">{appointment_extras_list}</div>
				<div class="fsn_shorttags_element">{appointment_discount_price}</div>
				<div class="fsn_shorttags_element">{appointment_sum_price}</div>
				<div class="fsn_shorttags_element">{appointment_paid_price}</div>
				<div class="fsn_shorttags_element">{appointment_payment_method}</div>
				<div class="fsn_shorttags_element">{appointment_tax_amount}</div>
				<div class="fsn_shorttags_element">{appointment_custom_field_<span class="custom_field_key_class">ID</span>} <i class="far fa-question-circle" data-load-modal="help_to_find_custom_field_id"></i></div>
                <div class="fsn_shorttags_element">{appointment_created_date}</div>
                <div class="fsn_shorttags_element">{appointment_created_time}</div>

				<div class="text-primary mt-4"><?php print bkntc__('Service Info')?>:</div>

				<div class="fsn_shorttags_element">{service_name}</div>
				<div class="fsn_shorttags_element">{service_price}</div>
				<div class="fsn_shorttags_element">{service_duration}</div>
				<div class="fsn_shorttags_element">{service_notes}</div>
				<div class="fsn_shorttags_element">{service_color}</div>
				<div class="fsn_shorttags_element">{service_image_url}</div>
				<div class="fsn_shorttags_element">{service_category_name}</div>

				<div class="text-primary mt-4"><?php print bkntc__('Customer Info')?>:</div>

				<div class="fsn_shorttags_element">{customer_full_name}</div>
				<div class="fsn_shorttags_element">{customer_first_name}</div>
				<div class="fsn_shorttags_element">{customer_last_name}</div>
				<div class="fsn_shorttags_element">{customer_phone}</div>
				<div class="fsn_shorttags_element">{customer_email}</div>
				<div class="fsn_shorttags_element">{customer_birthday}</div>
				<div class="fsn_shorttags_element">{customer_notes}</div>
				<div class="fsn_shorttags_element">{customer_profile_image_url}</div>
				<div class="fsn_shorttags_element">{customer_panel_url}</div>
				<div class="fsn_shorttags_element">{customer_panel_password}</div>

				<div class="text-primary mt-4"><?php print bkntc__('Staff Info')?>:</div>

				<div class="fsn_shorttags_element">{staff_name}</div>
				<div class="fsn_shorttags_element">{staff_email}</div>
				<div class="fsn_shorttags_element">{staff_phone}</div>
				<div class="fsn_shorttags_element">{staff_about}</div>
				<div class="fsn_shorttags_element">{staff_profile_image_url}</div>

				<div class="text-primary mt-4"><?php print bkntc__('Location Info')?>:</div>

				<div class="fsn_shorttags_element">{location_name}</div>
				<div class="fsn_shorttags_element">{location_address}</div>
				<div class="fsn_shorttags_element">{location_image_url}</div>
				<div class="fsn_shorttags_element">{location_phone_number}</div>
				<div class="fsn_shorttags_element">{location_notes}</div>

				<div class="text-primary mt-4"><?php print bkntc__('Company Info')?>:</div>

				<div class="fsn_shorttags_element">{company_name}</div>
				<div class="fsn_shorttags_element">{company_image_url}</div>
				<div class="fsn_shorttags_element">{company_website}</div>
				<div class="fsn_shorttags_element">{company_phone}</div>
				<div class="fsn_shorttags_element">{company_address}</div>

				<div class="text-primary mt-4"><?php print bkntc__('Zoom Info')?>:</div>

				<div class="fsn_shorttags_element">{zoom_meeting_url}</div>
				<div class="fsn_shorttags_element">{zoom_meeting_password}</div>

				<div class="mb-5"></div>

			</div>
		</div>
	</div>

</div>
