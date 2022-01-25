<?php
namespace BookneticApp\Frontend\view;

use BookneticApp\Providers\Helper;
use BookneticApp\Providers\Date;
use BookneticApp\Providers\Permission;

defined( 'ABSPATH' ) or die();
?>
<div id="booknetic_settings_area">
	<link rel="stylesheet" href="<?php print Helper::assets('css/booking_panel_labels_settings.css', 'Settings')?>">
	<script type="application/javascript" src="<?php print Helper::assets('js/booking_panel_labels_settings.js', 'Settings')?>"></script>
	<link rel='stylesheet' href='<?php print Helper::assets('css/booknetic.light.css', 'Settings')?>' type='text/css'>

	<div class="actions_panel clearfix">
		<button type="button" class="btn btn-lg btn-success settings-save-btn float-right"><i class="fa fa-check pr-2"></i> <?php print bkntc__('SAVE CHANGES')?></button>
	</div>

	<div class="settings-light-portlet">
		<div class="ms-title">
			<?php print bkntc__('Front-end panels')?>
			<span class="ms-subtitle"><?php print bkntc__('Labels')?></span>
		</div>
		<div class="ms-content">

			<div class="select_langugage_section">
				<div>
					<?php
					print str_replace( ['<select name=', 'value=""'], ['<select class="form-control" name=', 'value="en_US"'], wp_dropdown_languages([
						'id'        =>  'language_to_translate',
						'echo'      =>  false,
						'selected'  =>  Helper::isSaaSVersion() ? Helper::getOption('default_language', '') : ''
					]));
					?>
					<button type="button" class="btn btn-default" id="start_transaltion"><?php print bkntc__('TRANSLATE')?></button>
					<?php if( Helper::isSaaSVersion() ):?>
						<button type="button" class="btn btn-primary" id="set_default_langugage"><?php print bkntc__('SET AS DEFAULT LANGUAGE')?></button>
					<?php endif;?>
				</div>
			</div>

			<div class="label_settings_container">

				<img id="translate_edit_icon" src="<?php print Helper::icon('translate-edit.svg', 'Settings');?>" />
				<img id="translate_save_icon" src="<?php print Helper::icon('translate-save.svg', 'Settings');?>" />
				<img id="translate_cancel_icon" src="<?php print Helper::icon('translate-cancel.svg', 'Settings');?>" />

				<div id="booknetic_panel_area" class="hidden">
					<div class="booknetic_appointment">
						<div class="booknetic_appointment_steps">
							<div class="booknetic_appointment_steps_body">
								<div data-step-id="location" class="booknetic_appointment_step_element<?php print (Helper::isSaaSVersion() && Permission::getPermission('locations') == 'off' ? '_ hidden' : '')?>"><span class="booknetic_badge">1</span> <span class="booknetic_step_title" data-translate="Location"></span></div>
								<div data-step-id="staff" class="booknetic_appointment_step_element<?php print (Helper::isSaaSVersion() && Permission::getPermission('staff') == 'off' ? '_ hidden' : '')?>"><span class="booknetic_badge">2</span> <span class="booknetic_step_title" data-translate="Staff"></span></div>
								<div data-step-id="service" class="booknetic_appointment_step_element<?php print (Helper::isSaaSVersion() && Permission::getPermission('services') == 'off' ? '_ hidden' : '')?>"><span class="booknetic_badge">3</span> <span class="booknetic_step_title" data-translate="Service"></span></div>
								<div data-step-id="service_extras" class="booknetic_appointment_step_element<?php print (Helper::isSaaSVersion() && Permission::getPermission('services') == 'off' ? '_ hidden' : '')?>"><span class="booknetic_badge">4</span> <span class="booknetic_step_title" data-translate="Service Extras"></span></div>
								<div data-step-id="date_time" class="booknetic_appointment_step_element"><span class="booknetic_badge">5</span> <span class="booknetic_step_title" data-translate="Date & Time"></span></div>
								<div data-step-id="information" class="booknetic_appointment_step_element"><span class="booknetic_badge">6</span> <span class="booknetic_step_title" data-translate="Information"></span></div>
								<div data-step-id="confirm_details" class="booknetic_appointment_step_element"><span class="booknetic_badge">7</span> <span class="booknetic_step_title" data-translate="Confirmation"></span></div>
								<div data-step-id="finish" class="booknetic_appointment_step_element"><span class="booknetic_badge">8</span> <span class="booknetic_step_title" data-translate="Finish"></span></div>
								<div data-step-id="other" class="booknetic_appointment_step_element"><span class="booknetic_badge">9</span> <span class="booknetic_step_title"><?php print bkntc__('Other')?></span></div>
							</div>
							<div class="booknetic_appointment_steps_footer">
								<div class="booknetic_appointment_steps_footer_txt1"><?php print Helper::getOption('company_phone', '') == '' ? '' : ('<div class="d-inline-block" data-translate="Have any questions?"></div>')?></div>
								<div class="booknetic_appointment_steps_footer_txt2"><?php print Helper::getOption('company_phone', '')?></div>
							</div>
						</div>
						<div class="booknetic_appointment_container">

							<div class="booknetic_appointment_container_header hidden" data-step-id="location"><span data-translate="Select location"></span></div>
							<div class="booknetic_appointment_container_header hidden" data-step-id="staff"><span data-translate="Select staff"></span></div>
							<div class="booknetic_appointment_container_header hidden" data-step-id="service"><span data-translate="Select service"></span></div>
							<div class="booknetic_appointment_container_header hidden" data-step-id="service_extras"><span data-translate="Select service extras"></span></div>
							<div class="booknetic_appointment_container_header hidden" data-step-id="information"><span data-translate="Fill information"></span></div>
							<div class="booknetic_appointment_container_header hidden" data-step-id="date_time"><span data-translate="Select Date & Time"></span></div>
							<div class="booknetic_appointment_container_header hidden" data-step-id="confirm_details"><span data-translate="Confirm Details"></span></div>
							<div class="booknetic_appointment_container_header hidden" data-step-id="other"></div>

							<div class="booknetic_appointment_container_body">

								<div class="hidden" data-step-id="location">
									<?php
									foreach ( $parameters['locations'] AS $location )
									{
										?>
										<div class="booknetic_card">
											<div class="booknetic_card_image">
												<img src="<?php print Helper::profileImage($location->image, 'Locations')?>">
											</div>
											<div class="booknetic_card_title">
												<div><?php print esc_html($location->name)?></div>
												<div class="booknetic_card_description<?php print Helper::getOption('hide_address_of_location', 'off') == 'on' ? ' hidden' : ''?>"><?php print esc_html($location->address)?></div>
											</div>
										</div>
										<?php
									}
									?>
								</div>

								<div class="hidden" data-step-id="service">
									<?php
									$lastCategoryPrinted = null;
									foreach ( $parameters['services'] AS $serviceInf )
									{
										if( $lastCategoryPrinted != $serviceInf->category_id )
										{
											print '<div class="booknetic_service_category">' . esc_html( $serviceInf->category()->fetch()->name ) . '</div>';
											$lastCategoryPrinted = $serviceInf->category_id;
										}
										?>
										<div class="booknetic_service_card">
											<div class="booknetic_service_card_image">
												<img src="<?php print Helper::profileImage($serviceInf->image, 'Services')?>">
											</div>
											<div class="booknetic_service_card_title">
												<span><?php print esc_html($serviceInf->name)?></span>
												<span<?php print $serviceInf->hide_price==1 ? ' class="hidden"' : ''?>><?php print Helper::secFormat($serviceInf->duration*60)?></span>
											</div>
											<div class="booknetic_service_card_description">
												<?php print esc_html(Helper::cutText( $serviceInf->notes, 65 ))?>
											</div>
											<div class="booknetic_service_card_price<?php print $serviceInf->hide_price==1 ? ' hidden' : ''?>">
												<?php print Helper::price( $serviceInf->real_price == -1 ? $serviceInf->price : $serviceInf->real_price )?>
											</div>
										</div>
										<?php
									}
									?>
								</div>

								<div class="hidden" data-step-id="staff">
									<?php
									foreach ( $parameters['staff'] AS $staffInf )
									{
										$footer_text_option = Helper::getOption('footer_text_staff', '1');
										?>
										<div class="booknetic_card">
											<div class="booknetic_card_image">
												<img src="<?php print Helper::profileImage($staffInf->profile_image, 'Staff')?>">
											</div>
											<div class="booknetic_card_title">
												<div><?php print esc_html($staffInf->name)?></div>
												<div class="booknetic_card_description">
													<?php
													if( $footer_text_option == '1' || $footer_text_option == '2' )
													{
														?>
														<div><?php print esc_html($staffInf->email)?></div>
														<?php
													}
													if( $footer_text_option == '1' || $footer_text_option == '3' )
													{
														?>
														<div><?php print esc_html($staffInf->phone_number)?></div>
														<?php
													}
													?>
												</div>
											</div>
										</div>
										<?php
									}
									?>
								</div>

								<div class="hidden" data-step-id="service_extras">
									<?php
									foreach ( $parameters['service_extras'] AS $extraInf )
									{
										?>
										<div class="booknetic_service_extra_card">
											<div class="booknetic_service_extra_card_image">
												<img src="<?php print Helper::profileImage($extraInf->image, 'Services')?>">
											</div>
											<div class="booknetic_service_extra_card_title">
												<span><?php print esc_html($extraInf->name)?></span>
												<span><?php print $extraInf->duration ? Helper::secFormat($extraInf->duration*60) : ''?></span>
											</div>
											<div class="booknetic_service_extra_card_price">
												<?php print Helper::price( $extraInf->price )?>
											</div>
											<div class="booknetic_service_extra_quantity">
												<div class="booknetic_service_extra_quantity_dec">-</div>
												<input type="text" class="booknetic_service_extra_quantity_input" value="0" data-max-quantity="<?php print $extraInf->max_quantity?>">
												<div class="booknetic_service_extra_quantity_inc">+</div>
											</div>
										</div>
										<?php
									}
									?>
								</div>

								<div class="hidden" data-step-id="date_time">
									<div class="booknetic_date_time_area">
										<div class="booknetic_calendar_div">
											<div class="booknetic_calendar_head">
												<div class="booknetic_prev_month"> < </div>
												<div class="booknetic_month_name"></div>
												<div class="booknetic_next_month"> > </div>
											</div>
											<div id="booknetic_calendar_area"></div>
										</div>
										<div class="booknetic_time_div">
											<div class="booknetic_times_head"><span data-translate="Time"></span></div>
											<div class="booknetic_times">
												<div class="booknetic_times_title"><span data-translate="Select date"></span></div>
												<div class="booknetic_times_list">
													<div>
														<div>09:00</div>
														<div>10:00</div>
													</div>
													<div>
														<div>10:00</div>
														<div>11:00</div>
													</div>
													<div>
														<div>11:00</div>
														<div>12:00</div>
													</div>
													<div>
														<div>12:00</div>
														<div>13:00</div>
													</div>
													<div>
														<div>13:00</div>
														<div>14:00</div>
													</div>
													<div>
														<div>14:00</div>
														<div>15:00</div>
													</div>
													<div>
														<div>15:00</div>
														<div>16:00</div>
													</div>
													<div>
														<div>16:00</div>
														<div>17:00</div>
													</div>
													<div>
														<div>17:00</div>
														<div>18:00</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="hidden" data-step-id="information">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label><span data-translate="Name"></span></label>
											<input type="text" id="bkntc_input_name" class="form-control" name="name">
										</div>
										<div class="form-group col-md-6">
											<label><span data-translate="Surname"></span></label>
											<input type="text" id="bkntc_input_surname" class="form-control" name="surname">
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label><span data-translate="Email"></span></label>
											<input type="text" id="bkntc_input_email" class="form-control" name="email">
										</div>
										<div class="form-group col-md-6">
											<label><span data-translate="Phone"></span></label>
											<input type="text" id="bkntc_input_phone" class="form-control" name="phone">
										</div>
									</div>
								</div>

								<div class="hidden" data-step-id="confirm_details">
									<div class="booknetic_confirm_date_time booknetic_portlet">

										<div>
											<span class="booknetic_text_primary"><span data-translate="Date & Time"></span>:</span>
											<span><?php print Date::datee()?> / <?php print Date::time()?></span>
										</div>

										<?php
										if( Helper::getOption('show_step_staff', 'on') != 'off' )
										{
											?>
											<div>
												<span class="booknetic_text_primary"><span data-translate="Staff"></span>:</span>
												<span><?php print isset( $staffInf ) ? $staffInf->name : '???' ?></span>
											</div>
											<?php
										}
										?>
										<?php
										if( Helper::getOption('show_step_location', 'on') != 'off' )
										{
											?>
											<div>
												<span class="booknetic_text_primary"><span data-translate="Location"></span>:</span>
												<span><?php print isset( $location ) ? $location->name : '???' ?></span>
											</div>
											<?php
										}
										?>
									</div>

									<div class="booknetic_confirm_step_body">

										<div class="booknetic_confirm_sum_body<?php print $parameters['hide_payments'] ? ' booknetic_confirm_sum_body_full_width' : '';?>">
											<div class="booknetic_portlet">

												<div class="booknetic_confirm_details">
													<div class="booknetic_confirm_details_title"><?php print isset( $serviceInf ) ? $serviceInf->name : '???' ?></div>
													<div class="booknetic_confirm_details_price"><?php print Helper::price( 100 )?></div>
												</div>

												<div class="booknetic_confirm_details booknetic_discount">
													<div class="booknetic_confirm_details_title"><span data-translate="Discount"></span></div>
													<div class="booknetic_confirm_details_price booknetic_discount_price"><?php print Helper::price(0)?></div>
												</div>

												<div class="booknetic_add_coupon<?php print Helper::getOption('hide_coupon_section', 'off') == 'on' ? ' hidden' : ''?>">
													<input type="text" id="booknetic_coupon" placeholder="<?php print bkntc__('Add coupon')?>">
													<button type="button" class="booknetic_btn_success booknetic_coupon_ok_btn"><span data-translate="OK"></span></button>
												</div>

												<div class="booknetic_confirm_sum_price">
													<div><span data-translate="Total price"></span></div>
													<div class="booknetic_sum_price"><?php print Helper::price(100)?></div>
												</div>

											</div>
										</div>

										<div class="booknetic_confirm_deposit_body<?php print $parameters['hide_payments'] ? ' hidden' : '';?>">

											<div class="booknetic_portlet">
												<div class="booknetic_payment_methods">
													<?php
													$order_num = 0;
													foreach ( $parameters['gateways_order'] AS  $payment_method )
													{
														if( !isset( $parameters['payment_gateways'][ $payment_method ] ) )
															continue;
														?>
														<div class="booknetic_payment_method<?php print !$order_num ? ' booknetic_payment_method_selected' : ''?>">
															<img src="<?php print Helper::icon($payment_method . '.svg', 'front-end')?>">
															<span data-translate="<?php print $parameters['payment_gateways'][ $payment_method ]['trnslt']?>"><?php print $parameters['payment_gateways'][ $payment_method ]['title']?></span>
														</div>
														<?php
														$order_num++;
													}
													?>
												</div>

												<div class="booknetic_hr mt-3"></div>

												<div class="booknetic_deposit_radios">
													<div>
														<input type="radio" id="input_deposit_2" name="input_deposit" value="1" checked><label><span data-translate="Deposit"></span></label>
													</div>
													<div>
														<input type="radio" id="input_deposit_1" name="input_deposit" value="0"><label><span data-translate="Full amount"></span></label>
													</div>
												</div>

												<div class="booknetic_deposit_price">
													<div><span data-translate="Deposit"></span>:</div>
													<div class="booknetic_deposit_amount_txt">20%, <?php print Helper::price( 20)?></div>
												</div>

											</div>

										</div>

									</div>
								</div>

								<div class="hidden" data-step-id="finish">
									<div class="booknetic_appointment_finished">
										<div class="booknetic_appointment_finished_icon"><img src="<?php print Helper::icon('status-ok.svg', 'front-end')?>"></div>
										<div class="booknetic_appointment_finished_title" data-translate="Thank you for your request!"></div>
										<div class="booknetic_appointment_finished_subtitle" data-translate="Your confirmation number:"></div>
										<div class="booknetic_appointment_finished_code">0123</div>
										<div class="booknetic_appointment_finished_actions">
											<button type="button" id="booknetic_add_to_google_calendar_btn" class="booknetic_btn_secondary<?php print Helper::getOption('hide_add_to_google_calendar_btn', 'off') == 'on' ? ' booknetic_hidden' : ''?>"><img src="<?php print Helper::icon('calendar.svg', 'front-end')?>"> <span data-translate="ADD TO GOOGLE CALENDAR"></span></button>
											<button type="button" id="booknetic_start_new_booking_btn" class="booknetic_btn_secondary<?php print Helper::getOption('hide_start_new_booking_btn', 'off') == 'on' ? ' booknetic_hidden' : ''?>"><img src="<?php print Helper::icon('plus.svg', 'front-end')?>"> <span data-translate="START NEW BOOKING"></span></button>
											<button type="button" id="booknetic_finish_btn" class="booknetic_btn_secondary" data-redirect-url="<?php print esc_html(Helper::getOption('redirect_url_after_booking'))?>"><img src="<?php print Helper::icon('check-small.svg', 'front-end')?>"> <span data-translate="FINISH BOOKING"></span></button>
										</div>
									</div>
								</div>

								<div class="hidden" data-step-id="other">

									<?php
									$index = 0;
									foreach( $parameters['other_translates'] AS $translateKey => $translateTxt )
									{
										?>
										<div class="form-group col-md-12">
											<div class="input-group-prepend">
												<div class="input-group-text"><?php print ++$index?></div>
												<input type="text" class="form-control" data-translate-key="<?php print esc_html($translateKey)?>" value="<?php print esc_html($translateTxt)?>">
											</div>
										</div>
										<?php
									}
									?>

								</div>

							</div>

							<div class="booknetic_appointment_container_footer">
								<button type="button" class="booknetic_btn_secondary booknetic_prev_step"><span data-translate="BACK"></span></button>
								<button type="button" class="booknetic_btn_primary booknetic_next_step"><span data-translate="NEXT STEP"></span></button>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>