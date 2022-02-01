var bookneticPaymentStatus;
(function($)
{
	"use strict";

	function __( key )
	{
		return key in BookneticData.localization ? BookneticData.localization[ key ] : key;
	}

	$(document).ready( function()
	{
		$(".booknetic_appointment").each(function (index)
		{
			let booking_panel_js = $(this);
			let google_recaptcha_token;
			let google_recaptcha_action = 'booknetic_booking_panel_' + index;
			let booknetic = {

				options: {
					'templates': {
						'loader': '<div class="booknetic_loading_layout"></div>'
					}
				},

				localization: {
					month_names: [ __('January'), __('February'), __('March'), __('April'), __('May'), __('June'), __('July'), __('August'), __('September'), __('October'), __('November'), __('December') ],
					day_of_week: [ __('Sun'), __('Mon'), __('Tue'), __('Wed'), __('Thu'), __('Fri'), __('Sat'), __('Sun') ] ,
				},

				calendarDateTimes: {},
				time_show_format: 1,
				calendarYear: null,
				calendarMonth: null,

				paymentWindow: null,
				paymentStatus: null,
				appointmentId: null,
				dateBasedService: false,
				serviceData: null,

				globalDayOffs: {},
				globalTimesheet: {},

				save_step_data: {},

				parseHTML: function ( html )
				{
					var range = document.createRange();
					var documentFragment = range.createContextualFragment( html );
					return documentFragment;
				},

				loading: function ( onOff )
				{
					if( typeof onOff === 'undefined' || onOff )
					{
						$('#booknetic_progress').removeClass('booknetic_progress_done').show();
						$({property: 0}).animate({property: 100}, {
							duration: 1000,
							step: function()
							{
								var _percent = Math.round(this.property);
								if( !$('#booknetic_progress').hasClass('booknetic_progress_done') )
								{
									$('#booknetic_progress').css('width',  _percent+"%");
								}
							}
						});

						$('body').append( this.options.templates.loader );
					}
					else if( ! $('#booknetic_progress').hasClass('booknetic_progress_done') )
					{
						$('#booknetic_progress').addClass('booknetic_progress_done').css('width', 0);

						// IOS bug...
						setTimeout(function ()
						{
							$('.booknetic_loading_layout').remove();
						}, 0);
					}
				},

				htmlspecialchars_decode: function (string, quote_style)
				{
					var optTemp = 0,
						i = 0,
						noquotes = false;
					if(typeof quote_style==='undefined')
					{
						quote_style = 2;
					}
					string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>');
					var OPTS = {
						'ENT_NOQUOTES': 0,
						'ENT_HTML_QUOTE_SINGLE': 1,
						'ENT_HTML_QUOTE_DOUBLE': 2,
						'ENT_COMPAT': 2,
						'ENT_QUOTES': 3,
						'ENT_IGNORE': 4
					};
					if(quote_style===0)
					{
						noquotes = true;
					}
					if(typeof quote_style !== 'number')
					{
						quote_style = [].concat(quote_style);
						for (i = 0; i < quote_style.length; i++){
							if(OPTS[quote_style[i]]===0){
								noquotes = true;
							} else if(OPTS[quote_style[i]]){
								optTemp = optTemp | OPTS[quote_style[i]];
							}
						}
						quote_style = optTemp;
					}
					if(quote_style & OPTS.ENT_HTML_QUOTE_SINGLE)
					{
						string = string.replace(/&#0*39;/g, "'");
					}
					if(!noquotes){
						string = string.replace(/&quot;/g, '"');
					}
					string = string.replace(/&amp;/g, '&');
					return string;
				},

				htmlspecialchars: function ( string, quote_style, charset, double_encode )
				{
					var optTemp = 0,
						i = 0,
						noquotes = false;
					if(typeof quote_style==='undefined' || quote_style===null)
					{
						quote_style = 2;
					}
					string = typeof string != 'string' ? '' : string;

					string = string.toString();
					if(double_encode !== false){
						string = string.replace(/&/g, '&amp;');
					}
					string = string.replace(/</g, '&lt;').replace(/>/g, '&gt;');
					var OPTS = {
						'ENT_NOQUOTES': 0,
						'ENT_HTML_QUOTE_SINGLE': 1,
						'ENT_HTML_QUOTE_DOUBLE': 2,
						'ENT_COMPAT': 2,
						'ENT_QUOTES': 3,
						'ENT_IGNORE': 4
					};
					if(quote_style===0)
					{
						noquotes = true;
					}
					if(typeof quote_style !== 'number')
					{
						quote_style = [].concat(quote_style);
						for (i = 0; i < quote_style.length; i++)
						{
							if(OPTS[quote_style[i]]===0)
							{
								noquotes = true;
							}
							else if(OPTS[quote_style[i]])
							{
								optTemp = optTemp | OPTS[quote_style[i]];
							}
						}
						quote_style = optTemp;
					}
					if(quote_style & OPTS.ENT_HTML_QUOTE_SINGLE)
					{
						string = string.replace(/'/g, '&#039;');
					}
					if(!noquotes)
					{
						string = string.replace(/"/g, '&quot;');
					}
					return string;
				},

				ajaxResultCheck: function ( res )
				{

					if( typeof res != 'object' )
					{
						try
						{
							res = JSON.parse(res);
						}
						catch(e)
						{
							this.toast( 'Error!' );
							return false;
						}
					}

					if( typeof res['status'] == 'undefined' )
					{
						this.toast( 'Error!' );
						return false;
					}

					if( res['status'] == 'error' )
					{
						this.toast( typeof res['error_msg'] == 'undefined' ? 'Error!' : res['error_msg'] );
						return false;
					}

					if( res['status'] == 'ok' )
						return true;

					// else

					this.toast( 'Error!' );
					return false;
				},

				ajax: function ( action , params , func , loading, fnOnError, async_param )
				{
					// alert('224 ' + action );

					async_param = typeof async_param === 'undefined' ? true : async_param;
					loading     = loading === false ? false : true;

					if( loading )
					{
						booknetic.loading(true);
					}

					if( params instanceof FormData)
					{
						params.append('action', action);
						params.append('tenant_id', BookneticData.tenant_id);
					}
					else
					{
						params['action'] = action;
						params['tenant_id'] = BookneticData.tenant_id;
					}

					var ajaxObject =
						{
							url: BookneticData.ajax_url,
							method: 'POST',
							data: params,
							async: async_param, 
							success: function ( result )
							{
								if( loading )
								{
									booknetic.loading( 0 );
								}

								if( booknetic.ajaxResultCheck( result, fnOnError ) )
								{
									try
									{
										result = JSON.parse(result);
									}
									catch(e)
									{

									}
									if( typeof func == 'function' )
									// yassin 
										func( result );
								}
								else if( typeof fnOnError == 'function' )
								{
									try
									{
										result = JSON.parse(result);
									}
									catch(e)
									{

									}

									fnOnError( result );
								}
							},
							error: function (jqXHR, exception)
							{
								if( loading )
								{
									booknetic.loading( 0 );
								}

								booknetic.toast( jqXHR.status + ' error!' );

								if( typeof fnOnError == 'function' )
								{
									fnOnError();
								}
							}
						};

					if( params instanceof FormData)
					{
						ajaxObject['processData'] = false;
						ajaxObject['contentType'] = false;
					}

					$.ajax( ajaxObject );

				},

				select2Ajax: function ( select, action, parameters )
				{
					// alert('312 ' + action );
					var params = {};
					params['action'] = action;
					params['tenant_id'] = BookneticData.tenant_id;

					select.select2({
						theme: 'bootstrap',
						placeholder: __('select'),
						language: {
							searching: function() {
								return __('searching');
							}
						},
						allowClear: true,
						ajax: {
							url: BookneticData.ajax_url,
							dataType: 'json',
							type: "POST",
							data: function ( q )
							{
								// alert('332 ' + action );
								var sendParams = params;
								sendParams['q'] = q['term'];

								if( typeof parameters == 'function' )
								{
									var additionalParameters = parameters( $(this) );

									for (var key in additionalParameters)
									{
										sendParams[key] = additionalParameters[key];
									}
								}
								else if( typeof parameters == 'object' )
								{
									for (var key in parameters)
									{
										sendParams[key] = parameters[key];
									}
								}

								return sendParams;
							},
							processResults: function ( result )
							{
								if( booknetic.ajaxResultCheck( result ) )
								{
									try
									{
										result = JSON.parse(result);
									}
									catch(e)
									{

									}

									return result;
								}
							}
						}
					});
				},

				zeroPad: function(n, p)
				{
					p = p > 0 ? p : 2;

					n = String(n);
					while (n.length < p)
						n = '0' + n;

					return n;
				},

				toast: function( title )
				{
					if( title === false )
					{
						booking_panel_js.find('.booknetic_warning_message').fadeOut(200);
						return;
					}

					booking_panel_js.find('.booknetic_warning_message').text( booknetic.htmlspecialchars_decode( title, 'ENT_QUOTES' ) ).fadeIn(300);
					setTimeout(function ()
					{
						booking_panel_js.find('.booknetic_warning_message').fadeOut(200);
					}, 5000);
				},

				nonRecurringCalendar: function ( _year , _month, loader, load_dates )
				{
					var now = new Date();
					loader = loader === false ? false : true;

					_month = (typeof _month == 'undefined') ? now.getMonth() : _month;
					_year = (typeof _year == 'undefined') ? now.getFullYear() : _year;

					var send_data = {
						year: _year,
						month: _month+1
					};
					send_data['staff'] = booknetic.getSelected.staff();
					send_data['service'] = booknetic.getSelected.service();
					send_data['location'] = booknetic.getSelected.location();
					send_data['service_extras'] = booknetic.getSelected.serviceExtras();
					send_data['client_time_zone'] = booknetic.timeZoneOffset();

					booknetic.calendarYear = _year;
					booknetic.calendarMonth = _month;

					if( typeof load_dates != 'undefined' && load_dates === false )
					{
						booknetic.displayCalendar( loader );
						booknetic.displayBringPeopleSelect();
					}
					else
					{
						booknetic.ajax( 'get_data_date_time', send_data, function ( result )
						{
							booknetic.calendarDateTimes = result['data'];
							booknetic.time_show_format = result['time_show_format'];
							booknetic.displayCalendar( loader );
							booknetic.displayBringPeopleSelect();
						} , loader );
					}
				},

				displayBringPeopleSelect: function()
				{
					var select = $('.booknetic_number_of_brought_customers select');
					
					var options = '';
					
					for(var i = 1; i < booknetic.serviceMaxCapacity; i++ )
					{
						options += `<option value="${ i }">${ i }</option>`
					}

					select.html( options );

				},

				displayCalendar: function( loader )
				{
					var _year = booknetic.calendarYear;
					var _month = booknetic.calendarMonth;

					var htmlContent		= "",
						febNumberOfDays	= "",
						counter			= 1,
						dateNow			= new Date(_year , _month ),
						month			= dateNow.getMonth()+1,
						year			= dateNow.getFullYear(),
						currentDate		= new Date();

					if (month == 2)
					{
						febNumberOfDays = ( (year%100!=0) && (year%4==0) || (year%400==0)) ? '29' : '28';
					}

					var monthNames	= booknetic.localization.month_names;
					var dayPerMonth	= [null, '31', febNumberOfDays ,'31','30','31','30','31','31','30','31','30','31']

					var nextDate	= new Date(month +'/01/'+year);
					var weekdays	= nextDate.getDay();
					if( BookneticData.week_starts_on == 'monday' )
					{
						var weekdays2	= weekdays == 0 ? 7 : weekdays;
						var week_start_n = 1;
						var week_end_n = 7;
					}
					else
					{
						var weekdays2	= weekdays;
						var week_start_n = 0;
						var week_end_n = 6;
					}

					var numOfDays	= dayPerMonth[month];

					for( var w=week_start_n; w < weekdays2; w++ )
					{
						htmlContent += "<div class=\"booknetic_td booknetic_empty_day\"></div>";
					}

					while (counter <= numOfDays)
					{
						if (weekdays2 > week_end_n)
						{
							weekdays2 = week_start_n;
							htmlContent += "</div><div class=\"booknetic_calendar_rows\">";
						}
						var date_formatted = year + '-' + booknetic.zeroPad(month) + '-' + booknetic.zeroPad(counter);

						if( BookneticData.date_format == 'Y-m-d' )
						{
							var date_format_view = year + '-' + booknetic.zeroPad(month) + '-' + booknetic.zeroPad(counter);
						}
						else if( BookneticData.date_format == 'd-m-Y' )
						{
							var date_format_view = booknetic.zeroPad(counter) + '-' + booknetic.zeroPad(month) + '-' + year;
						}
						else if( BookneticData.date_format == 'm/d/Y' )
						{
							var date_format_view = booknetic.zeroPad(month) + '/' + booknetic.zeroPad(counter) + '/' + year;
						}
						else if( BookneticData.date_format == 'd/m/Y' )
						{
							var date_format_view = booknetic.zeroPad(counter) + '/' + booknetic.zeroPad(month) + '/' + year;
						}
						else if( BookneticData.date_format == 'd.m.Y' )
						{
							var date_format_view = booknetic.zeroPad(counter) + '.' + booknetic.zeroPad(month) + '.' + year;
						}

						var addClass = '';
						if( !(date_formatted in booknetic.calendarDateTimes['dates']) || booknetic.calendarDateTimes['dates'][ date_formatted ].length == 0 )
						{
							addClass = ' booknetic_calendar_empty_day';
						}

						var loadLine = booknetic.drawLoadLine( date_formatted );

						htmlContent +="<div class=\"booknetic_td booknetic_calendar_days"+addClass+"\" data-date=\"" + date_formatted + "\" data-date-format=\"" + date_format_view + "\"><div>"+counter+"<span>" + loadLine + "</span></div></div>";

						weekdays2++;
						counter++;
					}

					for( var w=weekdays2; w <= week_end_n; w++ )
					{
						htmlContent += "<div class=\"booknetic_td booknetic_empty_day\"></div>";
					}

					var calendarBody = "<div class=\"booknetic_calendar\">";

					calendarBody += "<div class=\"booknetic_calendar_rows booknetic_week_names\">";

					for( var w = 0; w < booknetic.localization.day_of_week.length; w++ )
					{
						if( w > week_end_n || w < week_start_n )
							continue;

						calendarBody += "<div class=\"booknetic_td\">" + booknetic.localization.day_of_week[ w ] + "</div>";
					}

					calendarBody += "</div>";

					calendarBody += "<div class=\"booknetic_calendar_rows\">";
					calendarBody += htmlContent;
					calendarBody += "</div></div>";

					booking_panel_js.find("#booknetic_calendar_area").html( calendarBody );

					booking_panel_js.find("#booknetic_calendar_area .days[data-count]:first").trigger('click');

					booking_panel_js.find(".booknetic_month_name").text( monthNames[ _month ] + ' ' + _year );
					booking_panel_js.find('.booknetic_times_list').empty();
					booking_panel_js.find('.booknetic_times_title').text(__('Select date'));

					if( !loader )
					{
						booking_panel_js.find(".booknetic_preloader_card3_box").hide();

						booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="date_time"]').fadeIn(200, function()
						{
							booking_panel_js.find(".booknetic_appointment_container_body").scrollTop(0);
							booknetic.niceScroll();
						});
					}
				},

				drawLoadLine: function( date )
				{
					var data = date in booknetic.calendarDateTimes['dates'] ? booknetic.calendarDateTimes['dates'][ date ] : {};

					var start_time	= booknetic.timeToMin( date in booknetic.calendarDateTimes['timesheet'] && booknetic.calendarDateTimes['timesheet'][ date ]['start'] != '' ? booknetic.calendarDateTimes['timesheet'][ date ]['start'] : '09:00' );
					var end_time	= booknetic.timeToMin( date in booknetic.calendarDateTimes['timesheet'] && booknetic.calendarDateTimes['timesheet'][ date ]['end'] != '' ? booknetic.calendarDateTimes['timesheet'][ date ]['end'] : '18:00' );
					end_time		= end_time == 0 || start_time > end_time ? 24 * 60 + end_time : end_time;

					var diff = end_time - start_time;

					var day_schedule = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
					var per_time = parseInt( diff / day_schedule.length * 10 ) / 10;

					var line = '';
					for( var j = 0; j < day_schedule.length; j++ )
					{
						var startt1 = start_time + per_time * j;
						var endt1	= startt1 + per_time;
						var avg = (endt1 + startt1) / 2;

						var isFree = false;

						for( var n = 0; n < data.length; n++ )
						{
							var start_time3 = booknetic.timeToMin(data[n]['start_time']);
							var end_time3 = booknetic.timeToMin(data[n]['end_time']);

							if( start_time3 < avg && end_time3 > avg )
							{
								isFree = true;
								break;
							}
						}

						line += '<i '+(isFree?'a':'b')+' data-test="'+(startt1+':'+endt1)+'"></i>';
					}

					return line;
				},

				timeToMin: function(str)
				{
					str = str.split(':');

					return parseInt(str[0]) * 60 + parseInt(str[1]);
				},

				timeZoneOffset: function()
				{
					if( BookneticData.client_time_zone == 'off' )
						return  '-';

					if ( window.Intl && typeof window.Intl === 'object' )
					{
						return Intl.DateTimeFormat().resolvedOptions().timeZone;
					}
					else
					{
						return new Date().getTimezoneOffset();
					}
				},

				datePickerFormat: function()
				{
					if( BookneticData.date_format == 'd-m-Y' )
					{
						return 'dd-mm-yyyy';
					}
					else if( BookneticData.date_format == 'm/d/Y' )
					{
						return 'mm/dd/yyyy';
					}
					else if( BookneticData.date_format == 'd/m/Y' )
					{
						return 'dd/mm/yyyy';
					}
					else if( BookneticData.date_format == 'd.m.Y' )
					{
						return 'dd.mm.yyyy';
					}

					return 'yyyy-mm-dd';
				},

				convertDate: function( date, from, to )
				{
					if( date == '' )
						return date;
					if( typeof to === 'undefined' )
					{
						to = booknetic.datePickerFormat();
					}

					to = to.replace('yyyy', 'Y').replace('dd', 'd').replace('mm', 'm');
					from = from.replace('yyyy', 'Y').replace('dd', 'd').replace('mm', 'm');

					var delimetr = from.indexOf('-') > -1 ? '-' : ( from.indexOf('.') > -1 ? '.' : '/' );
					var delimetr_to = to.indexOf('-') > -1 ? '-' : ( to.indexOf('.') > -1 ? '.' : '/' );
					var date_split = date.split(delimetr);
					var date_from_split = from.split(delimetr);
					var date_to_split = to.split(delimetr_to);

					var parts = {'m':0, 'd':0, 'Y':0};

					date_from_split.forEach(function( val, i )
					{
						parts[ val ] = i;
					});

					var new_date = '';
					date_to_split.forEach(function( val, j )
					{
						new_date += (new_date == '' ? '' : delimetr_to) + date_split[ parts[ val ] ];
					});

					return new_date;
				},

				getSelected: {

					location: function()
					{
						if( booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="location"]').hasClass('booknetic_menu_hidden') )
						{
							var val = booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="location"]').data('value');
						}
						else
						{
							var val = booking_panel_js.find(".booknetic_appointment_container_body > [data-step-id=\"location\"] > .booknetic_card_selected").data('id');
						}

						return val ? val : '';
					},

					staff: function()
					{
						if( booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="staff"]').hasClass('booknetic_menu_hidden') )
						{
							var val = booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="staff"]').data('value');
						}
						else
						{
							var val = booking_panel_js.find(".booknetic_appointment_container_body > [data-step-id=\"staff\"] > .booknetic_card_selected").data('id');
						}

						return val ? val : '';
					},

					service: function()
					{
						if( booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="service"]').hasClass('booknetic_menu_hidden') )
						{
							var val = booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="service"]').data('value');
						}
						else
						{
							var val = booking_panel_js.find(".booknetic_appointment_container_body > [data-step-id=\"service\"] > .booknetic_service_card_selected").data('id');
						}

						return val ? val : '';
					},

					serviceCategory: function()
					{
						return booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="service"]').data('service-category');
					},

					serviceIsRecurring: function()
					{
						if( booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="service"]').hasClass('booknetic_menu_hidden') )
						{
							var val = booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="service"]').data('is-recurring');
						}
						else
						{
							var val = booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="service"] > .booknetic_service_card_selected').data('is-recurring');
						}

						return val == '1' ? true : false;
					},

					serviceExtras: function()
					{
						var extras = {};

						booking_panel_js.find(".booknetic_appointment_container_body > [data-step-id=\"service_extras\"] > .booknetic_service_extra_card_selected").each(function()
						{
							var extra_id	= $(this).data('id'),
								quantity	= parseInt( $(this).find('.booknetic_service_extra_quantity_input').val() );

							if( quantity > 0  )
							{
								extras[ extra_id ] = quantity;
							}
						});

						return extras;
					},

					date: function()
					{
						if( booknetic.getSelected.serviceIsRecurring() )
							return '';

						var val = booking_panel_js.find(".booknetic_selected_time").data('date-original');
						return val ? val : '';
					},

					date_in_customer_timezone: function()
					{
						if( booknetic.getSelected.serviceIsRecurring() )
							return '';

						var val = booking_panel_js.find(".booknetic_calendar_selected_day").data('date');
						return val ? val : '';
					},

					time: function()
					{
						if( booknetic.getSelected.serviceIsRecurring() )
							return booknetic.getSelected.recurringTime();

						var val = booking_panel_js.find(".booknetic_selected_time").data('time');
						return val ? val : '';
					},

					brought_people_count: function()
					{
						if( $('#booknetic_bring_someone_checkbox ').is(':checked') )
						{
							var val = Number($('#booknetic_bring_people_count').val());

							return Number.isInteger(val) ? val : 0;
						}

						return 0;
					},

					dateTime: function()
					{
						if( booknetic.getSelected.serviceIsRecurring() )
							return booknetic.getSelected.recurringTime();

						var val = booking_panel_js.find(".booknetic_selected_time").data('full-date-time-start');
						return val ? val : '';
					},

					formData: function ()
					{
						var data			= { data: {}, custom_fields: {} },
							customFields	= {};

						var form = booking_panel_js.find(".booknetic_appointment_container_body > [data-step-id=\"information\"]");

						form.find('input[name]').each(function()
						{
							var name	= $(this).attr('name'),
								value	= name == 'phone' ? $(this).data('iti').getNumber(intlTelInputUtils.numberFormat.E164) : $(this).val();

							data['data'][name] = value;
						});

						form.find("#booknetic_custom_form [data-input-id][type!='checkbox'][type!='radio'], #booknetic_custom_form [data-input-id][type='checkbox']:checked, #booknetic_custom_form [data-input-id][type='radio']:checked").each(function()
						{
							var inputId		= $(this).data('input-id'),
								inputVal	= $(this).val();

							if( !inputVal )
							{
								inputVal = '';
							}

							if( inputVal != '' && $(this).data('isdatepicker') )
							{
								inputVal = booknetic.convertDate( inputVal, booknetic.datePickerFormat(), 'Y-m-d' );
							}

							if( $(this).attr('type') == 'file' )
							{
								if( $(this)[0].files[0] )
								{
									customFields[ inputId ] = $(this)[0].files[0] ;
								}
							}
							else
							{
								if( typeof customFields[ inputId ] == 'undefined' )
								{
									customFields[ inputId ] = inputVal;
								}
								else
								{
									customFields[ inputId ] += ',' + inputVal;
								}
							}
						});

						data['custom_fields'] = customFields;

						return data;
					},

					paymentMethod: function ()
					{
						if( booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="confirm_details"]').hasClass('booknetic_menu_hidden') )
							return 'local';

						return booking_panel_js.find('.booknetic_payment_method.booknetic_payment_method_selected').data('payment-type');
					},

					paymentDepositFullAmount: function ()
					{
						return booking_panel_js.find('input[name="input_deposit"][type="radio"]:checked').val() == '0' ? true : false;
					},

					recurringStartDate: function()
					{
						var val = booking_panel_js.find("#booknetic_recurring_start").val();
						if( val == '' || val == undefined )
							return val;

						return booknetic.convertDate( val, booknetic.datePickerFormat(), 'Y-m-d' );
					},

					recurringEndDate: function()
					{
						var val = booking_panel_js.find("#booknetic_recurring_end").val();
						if( val == '' || val == undefined )
							return val;

						return booknetic.convertDate( val, booknetic.datePickerFormat(), 'Y-m-d' );
					},

					recurringTimesArr: function()
					{
						if( !booknetic.serviceData )
							return {};

						var repeatType		=	booknetic.serviceData['repeat_type'],
							recurringTimes	=	{};

						if( repeatType == 'weekly' )
						{
							booking_panel_js.find(".booknetic_times_days_of_week_area > .booknetic_active_day").each(function()
							{
								var dayNum = $(this).data('day');
								var time = $(this).find('.booknetic_wd_input_time').val();

								recurringTimes[ dayNum ] = time;
							});

							recurringTimes = JSON.stringify( recurringTimes );
						}
						else if( repeatType == 'daily' )
						{
							recurringTimes = booking_panel_js.find("#booknetic_daily_recurring_frequency").val();
						}
						else if( repeatType == 'monthly' )
						{
							recurringTimes = booking_panel_js.find("#booknetic_monthly_recurring_type").val();
							if( recurringTimes == 'specific_day' )
							{
								recurringTimes += ':' + ( booking_panel_js.find("#booknetic_monthly_recurring_day_of_month").val() == null ? '' : booking_panel_js.find("#booknetic_monthly_recurring_day_of_month").val().join(',') );
							}
							else
							{
								recurringTimes += ':' + booking_panel_js.find("#booknetic_monthly_recurring_day_of_week").val();
							}
						}

						return recurringTimes;
					},

					recurringTimesArrFinish: function()
					{
						var recurringDates = [];
						var hasTimeError = false;

						booking_panel_js.find("#booknetic_recurring_dates > tr").each(function()
						{
							var sDate = $(this).find('[data-date]').data('date');
							var sTime = $(this).find('[data-time]').data('time');
							// if tried to change the time
							if( $(this).find('.booknetic_time_select').length )
							{
								sTime = $(this).find('.booknetic_time_select').val();
								if( sTime == '' )
								{
									hasTimeError = true;
								}
							}
							else if( $(this).find('.booknetic_data_has_error').length > 0 )
							{
								hasTimeError = true;
							}

							recurringDates.push([ sDate, sTime ]);
						});

						if( hasTimeError )
						{
							return false;
						}

						return JSON.stringify( recurringDates );
					},

					recurringTime: function ()
					{
						if( !booknetic.serviceData )
							return  '';

						var repeatType	=	booknetic.serviceData['repeat_type'],
							time		=	'';

						if( repeatType == 'daily' )
						{
							time = booking_panel_js.find("#booknetic_daily_time").val();
						}
						else if( repeatType == 'monthly' )
						{
							time = booking_panel_js.find("#booknetic_monthly_time").val();
						}

						return time;
					}

				},

				loadStep: function( step )
				{
					// yassin 
					var current_step_el	= booking_panel_js.find('.booknetic_appointment_step_element.booknetic_active_step');
					var next_step_el	= booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="'+step+'"]');

					while( next_step_el.hasClass('booknetic_menu_hidden') )
						next_step_el = next_step_el.next();

					booking_panel_js.find(".booknetic_next_step, .booknetic_prev_step").attr('disabled', true);

					var step_id		= next_step_el.data('step-id');
					var loader		= booking_panel_js.find('.booknetic_preloader_' + next_step_el.data('loader') + '_box');

					if( current_step_el.length > 0 )
					{
						current_step_el.removeClass('booknetic_active_step');
						var current_step_id	= current_step_el.data('step-id');
					}
					next_step_el.addClass('booknetic_active_step');
					booking_panel_js.find(".booknetic_appointment_container_header").text( next_step_el.data('title') );

					var next2_step_el	= next_step_el.next('.booknetic_appointment_step_element');

					while( next2_step_el.hasClass('booknetic_menu_hidden') )
						next2_step_el = next2_step_el.next();

					var next_step_btn_text = next2_step_el.length == 0 ? __('CONFIRM BOOKING') : __('NEXT STEP');
					booking_panel_js.find('.booknetic_next_step').text( next_step_btn_text );

					next2_step_el.length == 0 ? booking_panel_js.find('.booknetic_next_step').addClass('confirm_booking') : booking_panel_js.find('.booknetic_next_step').removeClass('confirm_booking');

					var loadNewStep = function()
					{
						if( !booknetic.needToReload(step_id) )
						{
							booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + step_id + '"]').show();

							booknetic.fadeInAnimate('.booknetic_appointment_container_body > [data-step-id="' + step_id + '"] .booknetic_fade');

							setTimeout(function ()
							{
								booking_panel_js.find(".booknetic_appointment_container_body").scrollTop(0);
								booknetic.niceScroll();
								booking_panel_js.find(".booknetic_next_step, .booknetic_prev_step").attr('disabled', false);
							}, 101 + booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + step_id + '"] .booknetic_fade').length * 50);
						}
						else
						{
							loader.removeClass('booknetic_hidden').hide().fadeIn(200);

							booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + step_id + '"]').empty();

							var step_data = booknetic.ajaxParametersPerStep(step_id);
							booknetic.ajax( 'get_data_' + step_id, step_data, function ( result )
							{
								loader.fadeOut(200, function ()
								{
									booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + step_id + '"]').show().html( booknetic.htmlspecialchars_decode( result['html'] ) );

									booknetic.fadeInAnimate('.booknetic_appointment_container_body > [data-step-id="' + step_id + '"] .booknetic_fade');

									booking_panel_js.find(".booknetic_next_step, .booknetic_prev_step").attr('disabled', false);

									setTimeout(function ()
									{
										booking_panel_js.find(".booknetic_appointment_container_body").scrollTop(0);
										booknetic.niceScroll();
									}, 101 + booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + step_id + '"] .booknetic_fade').length * 50);

									if( step_id == 'information' )
									{
										booknetic.initCustomFormElements( );

										var phone_input = booking_panel_js.find('#bkntc_input_phone');
										phone_input.data('iti', window.intlTelInput( phone_input[0], {
											utilsScript: BookneticData.assets_url + "js/utilsIntlTelInput.js",
											initialCountry: phone_input.data('country-code')
										}));

										if ( ! booknetic.isMobileView() )
										{
											$( '#country-listbox' ).niceScroll( {
												cursorcolor: "#e4ebf4",
												bouncescroll: true,
												preservenativescrolling: false
											} );
										}
									}
									else if( step_id == 'date_time' )
									{
										booknetic.serviceData = null;
										booknetic.dateBasedService   = result['service_info']['date_based'];
										booknetic.serviceMaxCapacity = result['service_info']['max_capacity'];

										if( result['service_type'] == 'non_recurring' )
										{
											booknetic.calendarDateTimes = result['data'];
											booknetic.time_show_format = result['time_show_format'];
											booknetic.nonRecurringCalendar(undefined, undefined, false, false);

											// if current month is empty, then next month will be loaded
											// current_month_is_empty is on-fly property, is not initialized on main object, and it is always undefined by default
											if ( typeof booknetic.current_month_is_empty === 'undefined' )
											{
												for ( let i in booknetic.calendarDateTimes.dates )
												{
													if ( booknetic.calendarDateTimes.dates.hasOwnProperty( i ) && booknetic.calendarDateTimes.dates[ i ].length > 0 ) {
														booknetic.current_month_is_empty = false;

														break;
													}
												}

												if ( typeof booknetic.current_month_is_empty === 'undefined' )
												{
													let now     = new Date();
													let year    = now.getFullYear();
													let month   = now.getMonth() + 1;

													booknetic.nonRecurringCalendar( year, month );
												}
											}

											if ( ! booknetic.isMobileView() )
											{
												booking_panel_js.find( '.booknetic_times_list' ).niceScroll( {
													cursorcolor: '#e4ebf4',
													bouncescroll: true
												} );
											}
										}
										else
										{
											booknetic.serviceData = result['service_info'];
											booknetic.initRecurringElements();
										}
									}

									if( booknetic.getSelected.serviceIsRecurring() )
									{
										booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="recurring_info"].booknetic_menu_hidden').slideDown(300, function ()
										{
											$(this).removeClass('booknetic_menu_hidden');
											booknetic.refreshStepIndexes();
										});
									}
									else
									{
										booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="recurring_info"]:not(.booknetic_menu_hidden)').slideUp(300, function ()
										{
											$(this).addClass('booknetic_menu_hidden');
											booknetic.refreshStepIndexes();
										});
									}

									delete step_data['action'];
									booknetic.save_step_data[ step_id ] = step_data;

									if( step_id == 'confirm_details' )
									{
										if( booknetic.getSelected.paymentMethod() == 'woocommerce' && booking_panel_js.find('.booknetic_redirect_to_wc').length > 0 )
										{
											booking_panel_js.find(".booknetic_next_step").attr('disabled', false).trigger('click');
										}

										if ( ! booknetic.isMobileView() )
										{
											$( '.booknetic_portlet_content' ).niceScroll( {
												cursorcolor: "#e4ebf4",
												bouncescroll: true,
												preservenativescrolling: false
											} );
										}
									}
								});

							}, false , function ()
							{
								loader.fadeOut(200, function ()
								{
									booking_panel_js.find(".booknetic_next_step, .booknetic_prev_step").attr('disabled', false);
									booking_panel_js.find(".booknetic_appointment_step_element.booknetic_active_step").removeClass('booknetic_active_step').prev().addClass('booknetic_active_step').removeClass('booknetic_selected_step');

									if( current_step_el.length > 0 )
									{
										booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + current_step_id + '"]').fadeIn(100);
									}
									else
									{
										setTimeout(function ()
										{
											booknetic.loadStep(step);
										}, 3000);
									}
								});
							} );
						}
					}

					if( current_step_el.length > 0 )
					{
						booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + current_step_id + '"]').fadeOut( 200, loadNewStep);
					}
					else
					{
						loadNewStep();
					}
				},

				ajaxParametersPerStep: function( step_id )
				{
					var filter_data = {};

					if( step_id == 'location' )
					{
						filter_data['staff'] = booknetic.getSelected.staff();
						filter_data['service'] = booknetic.getSelected.service();
					}
					else if( step_id == 'staff' )
					{
						filter_data['service'] = booknetic.getSelected.service();
						filter_data['location'] = booknetic.getSelected.location();
						filter_data['service_extras'] = booknetic.getSelected.serviceExtras();
						filter_data['date'] = booknetic.getSelected.date();
						filter_data['time'] = booknetic.getSelected.time();
					}
					else if( step_id == 'service' )
					{
						filter_data['staff'] = booknetic.getSelected.staff();
						filter_data['location'] = booknetic.getSelected.location();
						filter_data['category'] = booknetic.getSelected.serviceCategory();
					}
					else if( step_id == 'service_extras' )
					{
						filter_data['service'] = booknetic.getSelected.service();
					}
					else if( step_id == 'date_time' )
					{
						filter_data['staff'] = booknetic.getSelected.staff();
						filter_data['location'] = booknetic.getSelected.location();
						filter_data['service'] = booknetic.getSelected.service();
						filter_data['service_extras'] = booknetic.getSelected.serviceExtras();
						filter_data['client_time_zone'] = booknetic.timeZoneOffset();
					}
					else if( step_id == 'recurring_info' )
					{
						filter_data['service'] = booknetic.getSelected.service();
						filter_data['staff'] = booknetic.getSelected.staff();
						filter_data['location'] = booknetic.getSelected.location();
						filter_data['service_extras'] = booknetic.getSelected.serviceExtras();
						filter_data['time'] = booknetic.getSelected.recurringTime();
						filter_data['recurring_start_date'] = booknetic.getSelected.recurringStartDate();
						filter_data['recurring_end_date'] = booknetic.getSelected.recurringEndDate();
						filter_data['recurring_times'] = booknetic.getSelected.recurringTimesArr();
						filter_data['client_time_zone'] = booknetic.timeZoneOffset();
					}
					else if( step_id == 'information' )
					{
						filter_data['service'] = booknetic.getSelected.service();
					}
					else if( step_id == 'confirm_details' )
					{
						filter_data['location'] = booknetic.getSelected.location();
						filter_data['staff'] = booknetic.getSelected.staff();
						filter_data['service'] = booknetic.getSelected.service();
						filter_data['service_extras'] = booknetic.getSelected.serviceExtras();

						filter_data['original_date'] = booknetic.getSelected.date();
						filter_data['date'] = booknetic.getSelected.date_in_customer_timezone();
						filter_data['time'] = booknetic.getSelected.time();
						filter_data['brought_people_count'] = booknetic.getSelected.brought_people_count();

						filter_data['recurring_start_date'] = booknetic.getSelected.recurringStartDate();
						filter_data['recurring_end_date'] = booknetic.getSelected.recurringEndDate();
						filter_data['recurring_times'] = booknetic.getSelected.recurringTimesArr();
						filter_data['appointments'] = booknetic.getSelected.recurringTimesArrFinish();
						filter_data['client_time_zone'] = booknetic.timeZoneOffset();
					}

					return filter_data;
				},

				needToReload: function( step_id )
				{
					if( step_id == 'confirm_details' )
						return true;

					if( step_id in booknetic.save_step_data && JSON.stringify(booknetic.save_step_data[step_id]) == JSON.stringify(booknetic.ajaxParametersPerStep( step_id )) )
						return false;

					return true;
				},

				calcRecurringTimes: function()
				{
					booknetic.serviceFixPeriodEndDate();

					var fullPeriod			=	booknetic.serviceData['full_period_value'];
					var isFullPeriodFixed	=	fullPeriod > 0 ;
					var repeatType			=	booknetic.serviceData['repeat_type'];
					var startDate			=	booknetic.getSelected.recurringStartDate();
					var endDate				=	booknetic.getSelected.recurringEndDate();

					if( startDate == '' || endDate == '' )
						return;

					startDate	= new Date( startDate );
					endDate		= new Date( endDate );

					var cursor	= startDate,
						numberOfAppointments = 0,
						frequency = (repeatType == 'daily') ? booking_panel_js.find('#booknetic_daily_recurring_frequency').val() : 1;

					if( !( frequency >= 1 ) )
					{
						frequency = 1;
						if( repeatType == 'daily' )
						{
							booking_panel_js.find('#booknetic_daily_recurring_frequency').val('1');
						}
					}

					var activeDays = {};
					if( repeatType == 'weekly' )
					{
						booking_panel_js.find(".booknetic_times_days_of_week_area > .booknetic_active_day").each(function()
						{
							activeDays[ $(this).data('day') ] = true;
						});

						if( $.isEmptyObject( activeDays ) )
						{
							return;
						}
					}
					else if( repeatType == 'monthly' )
					{
						var monthlyRecurringType = booking_panel_js.find("#booknetic_monthly_recurring_type").val();
						var monthlyDayOfWeek = booking_panel_js.find("#booknetic_monthly_recurring_day_of_week").val();

						var selectedDays = booking_panel_js.find("#booknetic_monthly_recurring_day_of_month").select2('val');

						if( selectedDays )
						{
							for( var i = 0; i < selectedDays.length; i++ )
							{
								activeDays[ selectedDays[i] ] = true;
							}
						}
					}

					while( cursor <= endDate )
					{
						var weekNum = cursor.getDay();
						var dayNumber = parseInt( cursor.getDate() );
						weekNum = weekNum > 0 ? weekNum : 7;
						var dateFormat = cursor.getFullYear() + '-' + booknetic.zeroPad( cursor.getMonth() + 1 ) + '-' + booknetic.zeroPad( cursor.getDate() );

						if( repeatType == 'monthly' )
						{
							if( ( monthlyRecurringType == 'specific_day' && typeof activeDays[ dayNumber ] != 'undefined' ) || booknetic.getMonthWeekInfo(cursor, monthlyRecurringType, monthlyDayOfWeek) )
							{
								if(
									// if is not off day for staff or service
									!( typeof booknetic.globalTimesheet[ weekNum-1 ] != 'undefined' && booknetic.globalTimesheet[ weekNum-1 ]['day_off'] ) &&
									// if is not holiday for staff or service
									typeof booknetic.globalDayOffs[ dateFormat ] == 'undefined'
								)
								{
									numberOfAppointments++;
								}
							}
						}
						else if(
							// if weekly repeat type then only selected days of week...
							( typeof activeDays[ weekNum ] != 'undefined' || repeatType == 'daily' ) &&
							// if is not off day for staff or service
							!( typeof booknetic.globalTimesheet[ weekNum-1 ] != 'undefined' && booknetic.globalTimesheet[ weekNum-1 ]['day_off'] ) &&
							// if is not holiday for staff or service
							typeof booknetic.globalDayOffs[ dateFormat ] == 'undefined'
						)
						{
							numberOfAppointments++;
						}

						cursor = new Date( cursor.getTime() + 1000 * 24 * 3600 * frequency );
					}

					$( '#booknetic_monthly_time' ).attr( 'disabled', numberOfAppointments === 0 );

					booking_panel_js.find('#booknetic_recurring_times').val( numberOfAppointments );

				},

				initRecurringElements: function( )
				{

					booknetic.select2Ajax( booking_panel_js.find(".booknetic_wd_input_time, #booknetic_daily_time, #booknetic_monthly_time"), 'get_available_times_all', function( select )
					{
						return {
							start_date: booking_panel_js.find("#booknetic_recurring_start").val() ,
							end_date: booking_panel_js.find("#booknetic_recurring_end").val(),
							is_recurring: 1,
							service: booknetic.getSelected.service(),
							staff: booknetic.getSelected.staff(),
							location: booknetic.getSelected.location(),
							client_time_zone: booknetic.timeZoneOffset(),
							day_number: ( select.attr('id') == 'booknetic_daily_time' || select.attr('id') == 'booknetic_monthly_time' ) ? -1 : select.attr('id').replace('booknetic_time_wd_', '')
						}
					});

					booking_panel_js.find("#booknetic_monthly_recurring_day_of_month").select2({
						theme: 'bootstrap',
						placeholder: __('select'),
						allowClear: true
					});
					booking_panel_js.find("#booknetic_monthly_recurring_type, #booknetic_monthly_recurring_day_of_week").select2({
						theme: 'bootstrap',
						placeholder: __('select'),
						minimumResultsForSearch: -1
					});

					booking_panel_js.find('#booknetic_monthly_recurring_type').trigger('change');

					// booknetic.initDatepicker( booking_panel_js.find("#booknetic_recurring_start") );
					booknetic.initDatepicker( booking_panel_js.find("#booknetic_recurring_end") );

					booknetic.serviceFixPeriodEndDate();
					booknetic.serviceFixFrequency();
					booking_panel_js.find("#booknetic_recurring_start").trigger('change');
				},

				serviceFixPeriodEndDate: function()
				{
					var serviceData = booknetic.serviceData;

					if( serviceData && serviceData['full_period_value'] > 0 )
					{
						booking_panel_js.find("#booknetic_recurring_end").attr('disabled', true);
						booking_panel_js.find("#booknetic_recurring_times").attr('disabled', true);

						var startDate = booknetic.getSelected.recurringStartDate();

						if( serviceData['full_period_type'] == 'month' )
						{
							endDate = new Date( startDate + "T00:00:00" );
							endDate.setMonth( endDate.getMonth() + parseInt( serviceData['full_period_value'] ) );
							endDate.setDate( endDate.getDate() - 1 );

							booking_panel_js.find("#booknetic_recurring_end").val( booknetic.convertDate( endDate.getFullYear() + '-' + booknetic.zeroPad( endDate.getMonth() + 1 ) + '-' + booknetic.zeroPad( endDate.getDate() ), 'Y-m-d' ) );
						}
						else if( serviceData['full_period_type'] == 'week' )
						{

							endDate = new Date( startDate + "T00:00:00" );
							endDate.setDate( endDate.getDate() + parseInt( serviceData['full_period_value'] ) * 7 - 1 );

							booking_panel_js.find("#booknetic_recurring_end").val( booknetic.convertDate( endDate.getFullYear() + '-' + booknetic.zeroPad( endDate.getMonth() + 1 ) + '-' + booknetic.zeroPad( endDate.getDate() ), 'Y-m-d' ) );
						}
						else if( serviceData['full_period_type'] == 'day' )
						{
							endDate = new Date( startDate + "T00:00:00" );
							endDate.setDate( endDate.getDate() + parseInt( serviceData['full_period_value'] ) - 1 );

							booking_panel_js.find("#booknetic_recurring_end").val( booknetic.convertDate( endDate.getFullYear() + '-' + booknetic.zeroPad( endDate.getMonth() + 1 ) + '-' + booknetic.zeroPad( endDate.getDate() ), 'Y-m-d' ) );
						}
						else if( serviceData['full_period_type'] == 'time' )
						{
							if( booknetic.getSelected.recurringEndDate() == '' )
							{
								var startDate = new Date( booknetic.getSelected.recurringStartDate() );
								var endDate = new Date( startDate.setMonth( startDate.getMonth() + 1 ) );

								booking_panel_js.find("#booknetic_recurring_end").val( booknetic.convertDate( endDate.getFullYear() + '-' + booknetic.zeroPad( endDate.getMonth() + 1 ) + '-' + booknetic.zeroPad( endDate.getDate() ), 'Y-m-d' ) );
							}

							booking_panel_js.find("#booknetic_recurring_times").val( serviceData['full_period_value'] ).trigger('keyup');
						}
					}
					else
					{
						booking_panel_js.find("#booknetic_recurring_end").attr('disabled', false);
						booking_panel_js.find("#booknetic_recurring_times").attr('disabled', false);

						if( booknetic.getSelected.recurringEndDate() == '' )
						{
							var startDate = new Date( booknetic.getSelected.recurringStartDate() );
							var endDate = new Date( startDate.setMonth( startDate.getMonth() + 1 ) );

							booking_panel_js.find("#booknetic_recurring_end").val( booknetic.convertDate( endDate.getFullYear() + '-' + booknetic.zeroPad( endDate.getMonth() + 1 ) + '-' + booknetic.zeroPad( endDate.getDate() ), 'Y-m-d' ) );
						}
					}
				},

				serviceFixFrequency: function()
				{
					var serviceData = booknetic.serviceData;

					if( serviceData && serviceData['repeat_frequency'] > 0 && serviceData['repeat_type'] == 'daily' )
					{
						booking_panel_js.find("#booknetic_daily_recurring_frequency").val( serviceData['repeat_frequency'] ).attr('disabled', true);
					}
					else
					{
						booking_panel_js.find("#booknetic_daily_recurring_frequency").attr('disabled', false);
					}
				},

				getMonthWeekInfo: function( date, type, dayOfWeek )
				{
					var jsDate = new Date( date ),
						weekd = jsDate.getDay();
					weekd = weekd == 0 ? 7 : weekd;

					if( weekd != dayOfWeek )
					{
						return false;
					}

					var month = jsDate.getMonth()+1,
						year = jsDate.getFullYear();

					if( type == 'last' )
					{
						var nextWeek = new Date(jsDate.getTime());
						nextWeek.setDate( nextWeek.getDate() + 7 );

						return nextWeek.getMonth()+1 != month ? true : false;
					}

					var firstDayOfMonth = new Date( year + '-' + booknetic.zeroPad( month ) + '-01' ),
						firstWeekDay = firstDayOfMonth.getDay();
					firstWeekDay = firstWeekDay == 0 ? 7 : firstWeekDay;

					var dif = ( dayOfWeek >= firstWeekDay ? dayOfWeek : parseInt(dayOfWeek)+7 ) - firstWeekDay;

					var days = jsDate.getDate() - dif,
						dNumber = parseInt(days / 7)+1;

					return type == dNumber ? true : false;
				},

				initCustomFormElements: function ()
				{
					booking_panel_js.find("#booknetic_custom_form input[type='date']").each(function()
					{
						$(this).attr('type', 'text').data('isdatepicker', true);

						booknetic.initDatepicker( $(this) );
					});

					booknetic.select2Ajax( booking_panel_js.find("#booknetic_custom_form .custom-input-select2"), 'get_custom_field_choices', function(input )
					{
						var inputId = input.data('input-id');

						return {
							input_id: inputId
						}
					});

					booking_panel_js.find("#booknetic_custom_form").on('click', '.remove_custom_file_btn', function()
					{
						var placeholder = $(this).data('placeholder');

						$(this).parent().text( placeholder );
					});
				},

				confirmAppointment: function ()
				{
					var data = new FormData();
					var payment_method = booknetic.getSelected.paymentMethod();

					data.append( 'id', booknetic.appointmentId );
					data.append( 'location', booknetic.getSelected.location() );
					data.append( 'staff', booknetic.getSelected.staff() );
					data.append( 'service', booknetic.getSelected.service() );
					data.append( 'coupon', (booking_panel_js.find('.booknetic_add_coupon.booknetic_coupon_ok').length > 0 ? booking_panel_js.find('#booknetic_coupon').val() : '') );
					data.append( 'giftcard', (booking_panel_js.find('.booknetic_add_giftcard.booknetic_giftcard_ok').length > 0 ? booking_panel_js.find('#booknetic_giftcard').val() : '') );

					var extras = booknetic.getSelected.serviceExtras();

					for( var eid in extras )
					{
						if( isNaN(parseInt(eid)) )
							continue;

						data.append( 'service_extras['+eid+']', extras[eid] );
					}

					data.append( 'date', booknetic.getSelected.date() );
					data.append( 'time', booknetic.getSelected.time() );
					data.append( 'brought_people_count', booknetic.getSelected.brought_people_count() );

					data.append( 'recurring_start_date', booknetic.getSelected.recurringStartDate() );
					data.append( 'recurring_end_date', booknetic.getSelected.recurringEndDate() );
					data.append( 'recurring_times', booknetic.getSelected.recurringTimesArr() );
					data.append( 'appointments', booknetic.getSelected.recurringTimesArrFinish() );

					var customFields = booknetic.getSelected.formData();
					for( var n in customFields['data'] )
					{
						data.append( 'customer_data['+n+']', customFields['data'][n] );
					}
					for( var n in customFields['custom_fields'] )
					{
						data.append( 'custom_fields['+n+']', customFields['custom_fields'][n] );
					}

					data.append( 'payment_method', payment_method );
					data.append( 'deposit_full_amount', booknetic.getSelected.paymentDepositFullAmount() ? 1 : 0 );
					data.append( 'client_time_zone', booknetic.timeZoneOffset() );
					data.append( 'google_recaptcha_token', google_recaptcha_token );
					data.append( 'google_recaptcha_action', google_recaptcha_action );

					if( payment_method == 'paypal' || payment_method == 'stripe' || payment_method == 'square' || payment_method == 'mollie')
					{
						bookneticPaymentStatus = booknetic.paymentFinished;
						booknetic.paymentWindow = window.open( '', 'booknetic_payment_window', 'width=1000,height=700' );
						booknetic.waitPaymentFinish();
					}

					booknetic.ajax( 'confirm', data, function ( result )
					{
						booknetic.refreshGoogleReCaptchaToken();

						booknetic.appointmentId = result['id'];

						if( payment_method == 'paypal' || payment_method == 'stripe' || payment_method == 'square' || payment_method == 'mollie')
						{
							if( result['status'] == 'error' )
							{
								booknetic.toast( result['error_msg'] );
								booknetic.paymentWindow.close();
								return;
							}

							if( !booknetic.paymentWindow.closed )
							{
								booknetic.loading(1);
								booknetic.paymentWindow.location.href = result['url'];
							}
						}
						else if( payment_method == 'woocommerce' && 'woocommerce_cart_url' in result )
						{
							booknetic.loading(1);
							window.location.href = result['woocommerce_cart_url'];
						}
						else
						{
							booknetic.paymentFinished( true );
							booknetic.showFinishStep();
						}

						booking_panel_js.find('#booknetic_add_to_google_calendar_btn').data('url', result['google_url'] );
					} , true, function( result )
					{
						if( typeof result['id'] != 'undefined' )
						{
							booknetic.appointmentId = result['id'];
						}

						if( payment_method == 'paypal' || payment_method == 'stripe' || payment_method == 'square' || payment_method == 'mollie')
						{
							booknetic.paymentWindow.close();
						}
					});
				},

				waitPaymentFinish: function()
				{
					if( booknetic.paymentWindow.closed )
					{
						booknetic.loading(0);

						booknetic.showFinishStep();

						return;
					}

					setTimeout( booknetic.waitPaymentFinish, 1000 );
				},

				paymentFinished: function ( status )
				{
					booknetic.paymentStatus = status;
					booking_panel_js.find(".booknetic_appointment_finished_code").text( booknetic.zeroPad( booknetic.appointmentId, 4 ) );

					if( booknetic.paymentWindow && !booknetic.paymentWindow.closed )
					{
						booknetic.paymentWindow.close();
					}
				},

				showFinishStep: function ()
				{
					if( booknetic.paymentStatus === true )
					{
						booking_panel_js.find('.booknetic_appointment_container').fadeOut(95);
						booking_panel_js.find('.booknetic_appointment_steps').fadeOut(100, function ()
						{
							booking_panel_js.find('.booknetic_appointment_finished').fadeIn(100).css('display', 'flex');
						});
					}
					else
					{
						booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="confirm_details"]').fadeOut( 150, function()
						{
							booking_panel_js.find('.booknetic_appointment_container_body > .booknetic_appointment_finished_with_error').removeClass('booknetic_hidden').hide().fadeIn( 150 );
						});

						booking_panel_js.find('.booknetic_next_step').fadeOut( 150, function()
						{
							booking_panel_js.find('.booknetic_try_again_btn').removeClass('booknetic_hidden').hide().fadeIn( 150 );
						});
						booking_panel_js.find('.booknetic_prev_step').css('opacity', '0').attr('disabled', true);
					}
				},

				stepValidation: function ( step )
				{
					if( step == 'location' )
					{
						if( !( booknetic.getSelected.location() > 0 ) )
						{
							return __('select_location');
						}
					}
					else if( step == 'staff' )
					{
						if( !( booknetic.getSelected.staff() > 0 || booknetic.getSelected.staff() == -1 ) )
						{
							return __('select_staff');
						}
					}
					else if( step == 'service' )
					{
						if( !( booknetic.getSelected.service() > 0 ) )
						{
							return __('select_service');
						}
					}
					else if( step == 'date_time' )
					{
						if( booknetic.getSelected.serviceIsRecurring() )
						{
							var service_repeat_type = booknetic.serviceData['repeat_type'];

							if( service_repeat_type == 'weekly' )
							{
								if( booking_panel_js.find('.booknetic_times_days_of_week_area > .booknetic_active_day').length == 0 )
								{
									return __('select_week_days');
								}

								var timeNotSelected = false;
								booking_panel_js.find('.booknetic_times_days_of_week_area > .booknetic_active_day').each(function ()
								{
									if( $(this).find('.booknetic_wd_input_time').val() == null )
									{
										timeNotSelected = true;
										return;
									}
								});

								if( timeNotSelected )
								{
									return __('date_time_is_wrong');
								}
							}
							else if( service_repeat_type == 'monthly' )
							{

							}

							if( booknetic.getSelected.recurringStartDate() == '' )
							{
								return __('select_start_date');
							}

							if( booknetic.getSelected.recurringEndDate() == '' )
							{
								return __('select_end_date');
							}

						}
						else
						{
							if( booknetic.getSelected.date() == '')
							{
								return __('select_date');
							}
							if( booknetic.getSelected.time() == '')
							{
								return __('select_time');
							}


							if( $('#booknetic_bring_someone_checkbox').is(':checked') )
							{

								var send_data = 
								{
									service_id           : booknetic.getSelected.service(),
									staff_id             : booknetic.getSelected.staff(),
									date                 : booknetic.getSelected.date(),
									time                 : booknetic.getSelected.time(),
									brought_people_count : booknetic.getSelected.brought_people_count()
								};


								var a = false;
								var err_message = '';
							
								booknetic.ajax( 'check_timeslot_capacity', send_data, function ( result )
								{
									if( result.status == 'ok' )
									{
										a = true;
									}
								} , true , function(err){ err_message  = err.message; }, false);



								if( a == false )
								{
									return err_message;
								}

								
							}

						}

					}
					else if( step == 'recurring_info' )
					{
						if( booknetic.getSelected.recurringTimesArrFinish() === false )
						{
							return __('select_available_time');
						}
					}
					else if( step == 'information' )
					{
						var hasError = false;
						booking_panel_js.find(".booknetic_appointment_container_body > [data-step-id='information'] label").each(function()
						{
							var el = $(this).next();
							var required = $(this).is('[data-required="true"]');

							if( el.is('div.iti') )
							{
								el = el.find('input');
							}

							if( el.is('input[type=text], input[type=file], input[type=number], input[type=date], input[type=time], textarea, select') )
							{
								var value = el.val();

								if( el.attr('name') == 'email' )
								{
									var email_regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
									var checkEmail = email_regexp.test(String(value).toLowerCase());

									if( !( (value == '' && !required) || checkEmail ) )
									{
										el.addClass('booknetic_input_error');
										hasError = __('email_is_not_valid');

										return;
									}
								}
								else if( el.attr('name') == 'phone' )
								{
									if( !( value == '' && !required || String(value).match(/^\+?[0-9\(\) \-]+$/) ) )
									{
										el.addClass('booknetic_input_error');
										hasError = __('phone_is_not_valid');

										return;
									}
								}
								else if( required && (value == '' || value == null) )
								{
									if( el.is('select') )
									{
										el.next().find('.select2-selection').addClass('booknetic_input_error');
									}
									else if( el.is('input[type="file"]') )
									{
										el.next().addClass('booknetic_input_error');
									}
									else
									{
										el.addClass('booknetic_input_error');
									}
									hasError = __('fill_all_required');
									return;
								}
							}
							else if( el.is('div') ) // checkboxes or radios
							{
								if( required && el.find('input:checked').length == 0 )
								{
									el.find('input').addClass('booknetic_input_error');
									hasError = __('fill_all_required');

									return;
								}
							}

						});

						if( hasError )
						{
							return hasError;
						}
					}

					return true;
				},

				fadeInAnimate: function(el, sec, delay)
				{
					sec = sec > 0 ? sec : 150;
					delay = delay > 0 ? delay : 50;

					$(el).hide().each(function (i)
					{
						(function( i, t )
						{
							setTimeout( function ()
							{
								t.fadeIn( (i > 6 ? 6 : i) * sec );
							}, (i > 6 ? 6 : i) * delay );
						})( i, $(this) );
					});
				},

				fadeOutAnimate: function(el, sec, delay)
				{
					sec = sec > 0 ? sec : 150;
					delay = delay > 0 ? delay : 50;

					$(el).each(function (i)
					{
						(function( i, t )
						{
							setTimeout( function ()
							{
								t.fadeOut( (i > 6 ? 6 : i) * sec );
							}, (i > 6 ? 6 : i) * delay );
						})( i, $(this) );
					});
				},

				refreshStepIndexes: function ()
				{
					var index = 1;
					booking_panel_js.find('.booknetic_appointment_steps_body > .booknetic_appointment_step_element').each(function()
					{
						if( $(this).css('display') != 'none' )
						{
							$(this).find('.booknetic_badge').text( index );
							index++;
						}
					});
				},

				_niceScrol: false,
				niceScroll: function ()
				{
					if( !booknetic._niceScrol && !booknetic.isMobileView() )
					{
						booking_panel_js.find(".booknetic_appointment_container_body").niceScroll({
							cursorcolor: "#e4ebf4",
							bouncescroll: true,
							preservenativescrolling: false
						});

						booknetic._niceScrol = true;

						return;
					}

					if( booknetic.isMobileView() && booknetic._niceScrol )
					{
						booknetic._niceScrol = false;

						booking_panel_js.find(".booknetic_appointment_container_body").getNiceScroll().remove();

						if ( $( '#country-listbox' ).length )
						{
							$( '#country-listbox' ).getNiceScroll().remove();
						}

						return;
					}

					if( booknetic._niceScrol )
					{
						booking_panel_js.find(".booknetic_appointment_container_body").getNiceScroll().resize();

						if ( $( '#country-listbox' ).length )
						{
							$( '#country-listbox' ).getNiceScroll().resize();
						}
					}
				},

				initDatepicker: function ( el )
				{
					bookneticdatepicker( el[0], {
						formatter: function (input, date, instance)
						{
							var val = date.getFullYear() + '-' + booknetic.zeroPad( date.getMonth() + 1 ) + '-' + booknetic.zeroPad( date.getDate() );
							input.value = booknetic.convertDate( val, 'Y-m-d' );
						},
						startDay: BookneticData.week_starts_on == 'sunday' ? 0 : 1,
						customDays: [__('Sun'), __('Mon'), __('Tue'), __('Wed'), __('Thu'), __('Fri'), __('Sat')],
						customMonths: [__('January'), __('February'), __('March'), __('April'), __('May'), __('June'), __('July'), __('August'), __('September'), __('October'), __('November'), __('December')],
						onSelect: function( input )
						{
							$(input.el).trigger('change');
						}
					});
				},

				refreshGoogleReCaptchaToken: function ()
				{
					if( 'google_recaptcha_site_key' in BookneticData )
					{
						grecaptcha.execute( BookneticData['google_recaptcha_site_key'], { action: google_recaptcha_action }).then(function (token)
						{
							google_recaptcha_token = token;
						});
					}
				},

				isMobileView: function ()
				{
					return window.matchMedia('(max-width: 1000px)').matches;
				}

			};

			booking_panel_js.on('click', '.booknetic_card', function()
			{
				$(this).parent().children('.booknetic_card_selected').removeClass('booknetic_card_selected');
				$(this).addClass('booknetic_card_selected');

				booking_panel_js.find(".booknetic_next_step").trigger('click');

			}).on('click', '.booknetic_service_card', function()
			{
				$(this).parent().children('.booknetic_service_card_selected').removeClass('booknetic_service_card_selected');
				$(this).addClass('booknetic_service_card_selected');

				if( BookneticData['skip_extras_step_if_need'] == 'on' )
				{
					if( $(this).data('has-extras') )
					{
						booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="service_extras"].booknetic_menu_hidden').slideDown(300, function ()
						{
							booknetic.refreshStepIndexes();
						}).removeClass('booknetic_menu_hidden');
					}
					else
					{
						booking_panel_js.find('.booknetic_appointment_step_element[data-step-id="service_extras"]:not(.booknetic_menu_hidden)').slideUp(300, function ()
						{
							booknetic.refreshStepIndexes();
						}).addClass('booknetic_menu_hidden');
					}
				}

				booking_panel_js.find(".booknetic_next_step").trigger('click');

			}).on('click', '.booknetic_extra_on_off_mode', function (e)
			{
				if( $(e.target).is('.booknetic_service_extra_quantity_inc, .booknetic_service_extra_quantity_dec') )
					return;

				if( $(this).hasClass('booknetic_service_extra_card_selected') )
				{
					$(this).find('.booknetic_service_extra_quantity_dec').trigger('click');
				}
				else
				{
					$(this).find('.booknetic_service_extra_quantity_inc').trigger('click');
				}
			}).on('click', '.booknetic_service_extra_quantity_inc', function()
			{
				var quantity = parseInt( $(this).prev().val() );
				quantity = quantity > 0 ? quantity : 0;
				var max_quantity = parseInt( $(this).prev().data('max-quantity') );

				if( max_quantity !== 0 && quantity >= max_quantity )
				{
					quantity = max_quantity;
				}
				else
				{
					quantity++;
				}

				$(this).prev().val( quantity ).trigger('keyup');
			}).on('click', '.booknetic_service_extra_quantity_dec', function()
			{
				var quantity = parseInt( $(this).next().val() );
				quantity = quantity > 0 ? quantity : 1;
				quantity--;

				$(this).next().val( quantity ).trigger('keyup');
			}).on('keyup', '.booknetic_service_extra_quantity_input', function()
			{
				var quantity = parseInt( $(this).val() );
				if( !(quantity > 0) )
				{
					$(this).val('0');
					$(this).closest('.booknetic_service_extra_card').removeClass('booknetic_service_extra_card_selected');
				}
				else
				{
					$(this).closest('.booknetic_service_extra_card').addClass('booknetic_service_extra_card_selected');
				}
			}).on('click', '.booknetic_next_step', function()
			{
				var current_step_el	= booking_panel_js.find(".booknetic_appointment_step_element.booknetic_active_step"),
					next_step_num	= parseInt( current_step_el.children('span') ) + 1,
					next_step_el	= current_step_el.next('.booknetic_appointment_step_element');

				while( next_step_el.hasClass('booknetic_menu_hidden') )
					next_step_el = next_step_el.next();

				var validateion = booknetic.stepValidation( current_step_el.data('step-id') );

				if( validateion !== true )
				{
					booknetic.toast( validateion );
					return;
				}

				if( next_step_el.length > 0 )
				{
					booknetic.toast( false );

					booknetic.loadStep( next_step_el.data('step-id') );

					current_step_el.addClass('booknetic_selected_step');

					if( booknetic.isMobileView() )
					{
						$('html,body').animate({scrollTop: parseInt($(this).closest('.booknetic_appointment').offset().top) - 100}, 1000);
					}
				}
				else
				{
					booknetic.confirmAppointment();
				}
			}).on('click', '.booknetic_prev_step', function()
			{
				var current_step_el	= booking_panel_js.find(".booknetic_appointment_step_element.booknetic_active_step"),
					prev_step_num	= parseInt( current_step_el.children('span') ) + 1,
					prev_step_el	= current_step_el.prev('.booknetic_appointment_step_element');

					current_step_el.removeClass('booknetic_selected_step').nextAll('.booknetic_appointment_step_element').removeClass('booknetic_selected_step');

				while( prev_step_el.hasClass('booknetic_menu_hidden') )
					prev_step_el = prev_step_el.prev();

				if( prev_step_el.length > 0 )
				{
					current_step_el.removeClass('booknetic_active_step');
					prev_step_el.addClass('booknetic_active_step');

					booking_panel_js.find(".booknetic_next_step,.booknetic_prev_step").attr('disabled', true);
					booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + current_step_el.data('step-id') + '"]').fadeOut(200, function()
					{
						booking_panel_js.find(".booknetic_next_step,.booknetic_prev_step").attr('disabled', false);
						booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + prev_step_el.data('step-id') + '"]').fadeIn(200, function ()
						{
							booknetic.niceScroll();
						});
					});
					booking_panel_js.find(".booknetic_appointment_container_header").text( prev_step_el.data('title') );
				}

				booking_panel_js.find('.booknetic_next_step').text(__('NEXT STEP'));
			}).on('click', '.booknetic_calendar_days:not(.booknetic_calendar_empty_day)[data-date]', function()
			{
				var date = $(this).data('date');

				booking_panel_js.find(".booknetic_times_list").empty();

				var times = date in booknetic.calendarDateTimes['dates'] ? booknetic.calendarDateTimes['dates'][ date ] : [];
				var time_show_format = booknetic.time_show_format == 2 ? 2 : 1;

				for( var i = 0; i < times.length; i++ )
				{
					var time_badge = '';
					if( times[i]['available_customers'] > 0 && !( 'hide_available_slots' in booknetic.calendarDateTimes && booknetic.calendarDateTimes['hide_available_slots'] == 'on' ) )
					{
						time_badge = '<div class="booknetic_time_group_num">' + times[i]['available_customers'] + ' / ' + times[i]['max_capacity'] + '</div>';
					}

					booking_panel_js.find(".booknetic_times_list").append('<div data-time="' + times[i]['start_time'] + '" data-endtime="' + times[i]['end_time'] + '" data-date-original="' + times[i]['date'] + '"><div>' + times[i]['start_time_format'] + '</div>' + (time_show_format == 1 ? '<div>' + times[i]['end_time_format'] + '</div>' : '') + time_badge + '</div>');
				}

				booking_panel_js.find(".booknetic_times_list").scrollTop(0);
				booking_panel_js.find(".booknetic_times_list").getNiceScroll().resize();

				booking_panel_js.find(".booknetic_calendar_selected_day").removeClass('booknetic_calendar_selected_day');

				$(this).addClass('booknetic_calendar_selected_day');

				booking_panel_js.find(".booknetic_times_title").text( $(this).data('date-format') );

				if( booknetic.dateBasedService )
				{
					booking_panel_js.find(".booknetic_times_list > [data-time]:eq(0)").trigger('click');
				}
				else if( booknetic.isMobileView() )
				{
					$('html,body').animate({scrollTop: parseInt(booking_panel_js.find('.booknetic_time_div').offset().top) - 100}, 1000);
				}
			}).on('click', '.booknetic_prev_month', function ()
			{
				var month = booknetic.calendarMonth - 1;
				var year = booknetic.calendarYear;

				if( month < 0 )
				{
					month = 11;
					year--;
				}

				booknetic.nonRecurringCalendar( year, month );
			}).on('click', '.booknetic_next_month', function ()
			{
				var month = booknetic.calendarMonth + 1;
				var year = booknetic.calendarYear;

				if( month > 11 )
				{
					month = 0;
					year++;
				}

				booknetic.nonRecurringCalendar( year, month );
			}).on('click', '.booknetic_times_list > div', function ()
			{
				booking_panel_js.find('.booknetic_selected_time').removeClass('booknetic_selected_time');
				$(this).addClass('booknetic_selected_time');


				if( $('#booknetic_bring_someone_section').length == 0 )
				{
					booking_panel_js.find(".booknetic_next_step").trigger('click');
				}

			}).on('click', '.booknetic_payment_method', function ()
			{
				booking_panel_js.find(".booknetic_payment_method_selected").removeClass('booknetic_payment_method_selected');
				$(this).addClass('booknetic_payment_method_selected');

				if( $(this).data('payment-type') == 'paypal' || $(this).data('payment-type') == 'stripe' || $(this).data('payment-type') == 'square' || $(this).data('payment-type') == 'mollie' )
				{
					booking_panel_js.find(".booknetic_hide_on_local").removeClass('booknetic_hidden').fadeIn(100);
				}
				else
				{
					booking_panel_js.find(".booknetic_hide_on_local").removeClass('booknetic_hidden').fadeOut(100);
				}

			}).on('click', '.form-control[type="file"] ~ .form-control', function( e )
			{
				if( !$(e.target).is('a[href]') )
				{
					$(this).prev('.form-control[type="file"]').trigger('click');
				}
			}).on('change', '.form-control[type="file"]', function (e)
			{
				var fileName = e.target.files[0].name;
				$(this).next().text( fileName );
			}).on('keyup change', '[data-step-id=\'information\'] input, [data-step-id=\'information\'] select, [data-step-id=\'information\'] textarea', function ()
			{
				$(this).removeClass('booknetic_input_error');
			}).on('keyup change', '[data-step-id=\'information\'] input, [data-step-id=\'information\'] select, [data-step-id=\'information\'] textarea', function ()
			{
				if( $(this).attr('type') == 'checkbox' || $(this).attr('type') == 'radio' )
				{
					$(this).parent().parent().find('.booknetic_input_error').removeClass('booknetic_input_error');
				}
				else if( $(this).attr('type') == 'file' )
				{
					$(this).next().removeClass('booknetic_input_error');
				}
				else if( $(this).is('select') )
				{
					$(this).next().find('.booknetic_input_error').removeClass('booknetic_input_error');
				}
				else
				{
					$(this).removeClass('booknetic_input_error');
				}
			}).on('click', '#booknetic_finish_btn', function ()
			{
				if( $(this).data('redirect-url') == '' )
				{
					location.reload();
				}
				else
				{
					location.href = $(this).data('redirect-url');
				}
			}).on('click', '#booknetic_start_new_booking_btn', function ()
			{

				booking_panel_js.find('.booknetic_appointment_finished').fadeOut(100, function()
				{
					booking_panel_js.find('.booknetic_appointment_steps').fadeIn(100);
					booking_panel_js.find('.booknetic_appointment_container').fadeIn(100);
				});

				booking_panel_js.find(".booknetic_selected_step").removeClass('booknetic_selected_step');
				booking_panel_js.find(".booknetic_active_step").removeClass('booknetic_active_step');

				booknetic.calendarDateTimes		= {};
				booknetic.time_show_format		= 1;
				booknetic.calendarYear			= null;
				booknetic.calendarMonth			= null;
				booknetic.paymentWindow			= null;
				booknetic.paymentStatus			= null;
				booknetic.appointmentId			= null;
				booknetic.save_step_data        = {};

				var start_step = booking_panel_js.find(".booknetic_appointment_step_element:not(.booknetic_menu_hidden):eq(0)");
				start_step.addClass('booknetic_active_step');
				booknetic.loadStep(start_step.data('step-id'));

				booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id]').hide();
				booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="' + start_step.data('step-id') + '"]').show();

				booking_panel_js.find('.booknetic_card_selected').removeClass('booknetic_card_selected');
				booking_panel_js.find('.booknetic_service_card_selected').removeClass('booknetic_service_card_selected');
				booking_panel_js.find('.booknetic_service_card_selected').removeClass('booknetic_service_card_selected');

				booking_panel_js.find(".booknetic_calendar_selected_day").data('date', null);
				booking_panel_js.find(".booknetic_selected_time").data('time', null);

				booknetic.niceScroll();

			}).on('click', '#booknetic_add_to_google_calendar_btn', function ()
			{
				window.open( $(this).data('url') );
			}).on('click', '.booknetic_coupon_ok_btn', function ()
			{
				var coupon = booking_panel_js.find('#booknetic_coupon').val();
				var staff = booknetic.getSelected.staff();
				var service = booknetic.getSelected.service();
				var service_extras = booknetic.getSelected.serviceExtras();
				var custom_fields = booknetic.getSelected.formData();
				var brought_people_count = booknetic.getSelected.brought_people_count();

				if( coupon == '' )
					return;

				booknetic.ajax('summary_with_coupon', {
					coupon: coupon,
					service: service,
					staff: staff,
					service_extras: service_extras,
					email: custom_fields['data']['email'],
					phone: custom_fields['data']['phone'],
					brought_people_count: brought_people_count,
					appointments: booknetic.getSelected.recurringTimesArrFinish()
				}, function ( result )
				{
					booking_panel_js.find('.booknetic_discount_price').text( result['discount'] );
					booking_panel_js.find('.booknetic_sum_price').text( result['sum'] );
					booking_panel_js.find('.booknetic_deposit_amount_txt').text( result['deposit_txt'] );
					booking_panel_js.find('.booknetic_add_coupon').addClass('booknetic_coupon_ok');
					booking_panel_js.find('.booknetic_giftcard_ok_btn').data('discount_price', result['discount_price']);
					booking_panel_js.find('.booknetic_discount').removeClass('booknetic_hidden').hide().fadeIn(200);
					

					if( result['sum_price'] <= 0 )
					{
						booking_panel_js.find('.booknetic_payment_method_selected').data('payment-type', 'local');
						booking_panel_js.find('.booknetic_confirm_deposit_body').fadeOut(300, function ()
						{
							booking_panel_js.find('.booknetic_confirm_sum_body').animate({width: '100%'}, 300);
						});
					}

					if( booking_panel_js.find('.booknetic_add_giftcard').hasClass('booknetic_giftcard_ok') )
					{
						booking_panel_js.find('.booknetic_giftcard_ok_btn').click();
					}

				}, true, function ()
				{
					booking_panel_js.find('.booknetic_add_coupon').removeClass('booknetic_coupon_ok');
				});

			}).on('click', '.booknetic_giftcard_ok_btn', function ()
			{
				var giftcard = booking_panel_js.find('#booknetic_giftcard').val();
				var staff = booknetic.getSelected.staff();
				var service = booknetic.getSelected.service();
				var service_extras = booknetic.getSelected.serviceExtras();
				var discount_price = booking_panel_js.find('.booknetic_giftcard_ok_btn').data('discount_price');
				var brought_people_count = booknetic.getSelected.brought_people_count();

				if( giftcard == '' )
					return;

				booknetic.ajax('summary_with_giftcard', {
					giftcard: giftcard,
					service: service,
					staff: staff,
					service_extras: service_extras,
					discount_price: discount_price,
					brought_people_count: brought_people_count,
					appointments: booknetic.getSelected.recurringTimesArrFinish()
				}, function( result )
				{
					if( result['sum_price'] <= 0 )
					{
						booking_panel_js.find('.booknetic_payment_method_selected').data('payment-type', 'giftcard');
						booking_panel_js.find('.booknetic_confirm_deposit_body').fadeOut(300, function ()
						{
							booking_panel_js.find('.booknetic_confirm_sum_body').animate({width: '100%'}, 300);
						});
					}

					booking_panel_js.find('.booknetic_show_balance').text('Balance: ' + result['printBalance']);

					booking_panel_js.find('.booknetic_gift_discount_price').mouseover(function(){
						booking_panel_js.find('.booknetic_show_balance').css('display', 'block');
					}).mouseout(function() {
						booking_panel_js.find('.booknetic_show_balance').css('display', 'none');
					  });

					booking_panel_js.find('.booknetic_gift_discount').css('display', 'block');
					booking_panel_js.find('.booknetic_gift_discount_price').text( result['printSpent'] );
					booking_panel_js.find('.booknetic_sum_price').text( result['sum'] );
					booking_panel_js.find('.booknetic_add_giftcard').addClass('booknetic_giftcard_ok');
				}, true, function ()
				{
					booking_panel_js.find('.booknetic_add_giftcard').removeClass('booknetic_giftcard_ok');
				});

			}).on('click', '.booknetic_try_again_btn', function ()
			{
				booking_panel_js.find('.booknetic_appointment_finished_with_error').fadeOut(150, function ()
				{
					booking_panel_js.find('.booknetic_appointment_container_body > [data-step-id="confirm_details"]').fadeIn(150, function ()
					{
						booknetic.niceScroll();
					});
				});

				booking_panel_js.find('.booknetic_try_again_btn').fadeOut(150, function ()
				{
					booking_panel_js.find('.booknetic_next_step').fadeIn(150);
					booking_panel_js.find('.booknetic_prev_step').css('opacity', '1').attr('disabled', false);
				});
			}).on('change', '.booknetic_day_of_week_checkbox', function ()
			{
				//  yassin ::  it's
				var activeFirstDay = booking_panel_js.find(".booknetic_times_days_of_week_area .booknetic_active_day").attr('data-day');

				var dayNum	= $(this).attr('id').replace('booknetic_day_of_week_checkbox_', ''),
					dayDIv	= booking_panel_js.find(".booknetic_times_days_of_week_area > [data-day='" + dayNum + "']");

				if( $(this).is(':checked') )
				{
					dayDIv.removeClass('booknetic_hidden').hide().slideDown(200, function ()
					{
						booknetic.niceScroll();
					}).addClass('booknetic_active_day');

					if( booknetic.dateBasedService )
					{
						dayDIv.find('.booknetic_wd_input_time').append('<option>00:00</option>').val('00:00');
					}
				}
				else
				{
					dayDIv.slideUp(200, function ()
					{
						booknetic.niceScroll();
					}).removeClass('booknetic_active_day');
				}

				booking_panel_js.find(".booknetic_times_days_of_week_area .booknetic_active_day .booknetic_copy_time_to_all").fadeOut( activeFirstDay > dayNum ? 100 : 0 );
				booking_panel_js.find(".booknetic_times_days_of_week_area .booknetic_active_day .booknetic_copy_time_to_all:first").fadeIn( activeFirstDay > dayNum ? 100 : 0 );

				if( booking_panel_js.find('.booknetic_day_of_week_checkbox:checked').length > 0 && !booknetic.dateBasedService )
				{
					booking_panel_js.find('.booknetic_times_days_of_week_area').slideDown(200);
				}
				else
				{
					booking_panel_js.find('.booknetic_times_days_of_week_area').slideUp(200);
				}

				booknetic.calcRecurringTimes();
			}).on('click', '.booknetic_date_edit_btn', function()
			{
				var tr		= $(this).closest('tr'),
					timeTd	= tr.children('td[data-time]'),
					time	= timeTd.data('time'),
					date1	= tr.children('td[data-date]').data('date');

				timeTd.children('.booknetic_time_span').html('<select class="form-control booknetic_time_select"></select>').css({'float': 'right', 'margin-right': '25px', 'width': '120px'}).parent('td').css({'padding-top': '7px', 'padding-bottom': '14px'});

				booknetic.select2Ajax( timeTd.find('.booknetic_time_select'), 'get_available_times', function()
				{
					return {
						service: booknetic.getSelected.service(),
						extras: booknetic.getSelected.serviceExtras(),
						staff: booknetic.getSelected.staff(),
						date: date1,
						client_time_zone: booknetic.timeZoneOffset(),
						called_from_frontend_recurring: 1
					}
				});

				$(this).closest('td').children('.booknetic_data_has_error').remove();
				$(this).remove();

				booknetic.niceScroll();

			}).on('click', '.booknetic_copy_time_to_all', function ()
			{
				var time = $(this).closest('.booknetic_active_day').find('.booknetic_wd_input_time').select2('data')[0];

				if( time )
				{
					var	timeId		= time['id'],
						timeText	= time['text'];

					booking_panel_js.find(".booknetic_active_day:not(:first)").each(function ()
					{
						$(this).find(".booknetic_wd_input_time").append( $('<option></option>').val( timeId ).text( timeText ) ).val( timeId ).trigger('change');
					});
				}

			}).on('change', '#booknetic_time_wd_master', function ()
			{
				// agea
				var time = $('#booknetic_time_wd_master').val();
                var data = { id: time, text: time };

				if( time ){

					var $boxes = jQuery('input[class=booknetic_day_of_week_checkbox]:checked');
					$boxes.each(function( a,b ){

						var sel_id = b.id.split("_");
						sel_id = '#booknetic_time_wd_'+sel_id[5];

						if ($(sel_id).find("option[value='" + data.id + "']").length) {
							$(sel_id).val(data.id).trigger('change');
						} else { 
							var new_option = new Option(data.text, data.id, true, true);
							$(sel_id).append(new_option).trigger('change');
						}

					});
				}

			}).on('keyup', '#booknetic_recurring_times', function()
			{
				var serviceData = booknetic.serviceData;

				if( !serviceData )
					return;

				var repeatType	=	serviceData['repeat_type'],
					start		=	booknetic.getSelected.recurringStartDate(),
					end			=	booknetic.getSelected.recurringEndDate(),
					times		=	$(this).val();

				if( start == '' || times == '' || times <= 0 )
					return;

				var frequency = (repeatType == 'daily') ? booking_panel_js.find('#booknetic_daily_recurring_frequency').val() : 1;

				if( !( frequency >= 1 ) )
				{
					frequency = 1;
					if( repeatType == 'daily' )
					{
						booking_panel_js.find('#booknetic_daily_recurring_frequency').val('1');
					}
				}

				var activeDays = {};
				if( repeatType == 'weekly' )
				{
					booking_panel_js.find(".booknetic_times_days_of_week_area > .booknetic_active_day").each(function()
					{
						activeDays[ $(this).data('day') ] = true;
					});

					if( $.isEmptyObject( activeDays ) )
					{
						return;
					}
				}
				else if( repeatType == 'monthly' )
				{
					var monthlyRecurringType = booking_panel_js.find("#booknetic_monthly_recurring_type").val();
					var monthlyDayOfWeek = booking_panel_js.find("#booknetic_monthly_recurring_day_of_week").val();

					var selectedDays = booking_panel_js.find("#booknetic_monthly_recurring_day_of_month").select2('val');

					if( selectedDays )
					{
						for( var i = 0; i < selectedDays.length; i++ )
						{
							activeDays[ selectedDays[i] ] = true;
						}
					}
				}

				var cursor = new Date( start );

				var c_times = 0;
				while( (!$.isEmptyObject( activeDays ) || repeatType == 'daily') && c_times < times )
				{
					var weekNum = cursor.getDay();
					var dayNumber = parseInt( cursor.getDate() );
					weekNum = weekNum > 0 ? weekNum : 7;
					var dateFormat = cursor.getFullYear() + '-' + booknetic.zeroPad( cursor.getMonth() + 1 ) + '-' + booknetic.zeroPad( cursor.getDate() );

					if( repeatType == 'monthly' )
					{
						if( ( monthlyRecurringType == 'specific_day' && typeof activeDays[ dayNumber ] != 'undefined' ) || booknetic.getMonthWeekInfo(cursor, monthlyRecurringType, monthlyDayOfWeek) )
						{
							if
							(
								// if is not off day for staff or service
								!( typeof booknetic.globalTimesheet[ weekNum-1 ] != 'undefined' && booknetic.globalTimesheet[ weekNum-1 ]['day_off'] ) &&
								// if is not holiday for staff or service
								typeof booknetic.globalDayOffs[ dateFormat ] == 'undefined'
							)
							{
								c_times++;
							}
						}
					}
					else if
					(
						// if weekly repeat type then only selected days of week...
						( typeof activeDays[ weekNum ] != 'undefined' || repeatType == 'daily' ) &&
						// if is not off day for staff or service
						!( typeof booknetic.globalTimesheet[ weekNum-1 ] != 'undefined' && booknetic.globalTimesheet[ weekNum-1 ]['day_off'] ) &&
						// if is not holiday for staff or service
						typeof booknetic.globalDayOffs[ dateFormat ] == 'undefined'
					)
					{
						c_times++;
					}

					cursor = new Date( cursor.getTime() + 1000 * 24 * 3600 * frequency );
				}

				cursor = new Date( cursor.getTime() - 1000 * 24 * 3600 * frequency );
				end = cursor.getFullYear() + '-' + booknetic.zeroPad( cursor.getMonth() + 1 ) + '-' + booknetic.zeroPad( cursor.getDate() );

				if( !isNaN( cursor.getFullYear() ) )
				{
					booking_panel_js.find('#booknetic_recurring_end').val( booknetic.convertDate( end, 'Y-m-d' ) );
				}
			}).on('keyup', '#booknetic_daily_recurring_frequency', booknetic.calcRecurringTimes
			).on('change', '#booknetic_monthly_recurring_type, #booknetic_monthly_recurring_day_of_week, #booknetic_monthly_recurring_day_of_month', booknetic.calcRecurringTimes
			).on('change', '#booknetic_monthly_recurring_type', function ()
			{
				if( $(this).val() == 'specific_day' )
				{
					booking_panel_js.find("#booknetic_monthly_recurring_day_of_month").next('.select2').show();
					booking_panel_js.find("#booknetic_monthly_recurring_day_of_week").next('.select2').hide();
				}
				else
				{
					booking_panel_js.find("#booknetic_monthly_recurring_day_of_month").next('.select2').hide();
					booking_panel_js.find("#booknetic_monthly_recurring_day_of_week").next('.select2').show();
				}
			}).on('change', '#booknetic_recurring_start, #booknetic_recurring_end', function ()
			{
				var serviceId	= booknetic.getSelected.service(),
					staffId		= booknetic.getSelected.staff(),
					locationId	= booknetic.getSelected.location(),
					startDate	= booknetic.getSelected.recurringStartDate(),
					endDate		= booknetic.getSelected.recurringEndDate();

				if( startDate == '' || ( !$('#booknetic_recurring_end').is(':disabled') && endDate == '' ) )
					return;

				booknetic.ajax('get_day_offs', {
					service: serviceId,
					staff: staffId,
					location: locationId,
					start: startDate,
					end: endDate,
					client_time_zone: booknetic.timeZoneOffset(),
					is_recurring: 1
				}, function( result )
				{
					booknetic.globalDayOffs = result['day_offs'];
					booknetic.globalTimesheet = result['timesheet'];

					// agea 
					result['disabled_days_of_week'].forEach(function( value, key )
					{
						// reset
						booking_panel_js.find('#booknetic_day_of_week_checkbox_' + (parseInt(key)+1)).attr('checked', false );

						if(value){
							var checkbox = $('#booknetic_day_of_week_box_' + (parseInt(key)+1));					
							checkbox.css('display', 'none');
						}else{
							var checkbox = $('#booknetic_day_of_week_checkbox_' + (parseInt(key)+1));					
							checkbox.click();
						}

						// Prevent user to edit it
						booking_panel_js.find('#booknetic_day_of_week_checkbox_' + (parseInt(key)+1)).attr('disabled', true );
					});

					booknetic.calcRecurringTimes();
					// it was for automatic load the times just from loading the page/change the date :  but it make a bug in the style
					// specially with the defult html date selector
					// whcih we used it insted of the booknetic date selector which didn't support mindate like jquery datepiker 
					// $('#booknetic_time_wd_master').select2('open'); 
				});
			}).on('select2:select', '.booknetic_wd_input_time', function (e)
			{
				var original_day = e.params.data.day;
				if( typeof original_day != 'undefined' )
				{
					let selected_day = $(this).closest('.booknetic_active_day').data('day');

					if( original_day == "tomorrow" )
					{
						selected_day = selected_day != 6 ? selected_day + 1 : 0;
					}
					else if ( original_day == "yesterday" )
					{
						selected_day = selected_day != 0 ? selected_day - 1 : 6;
					}
					$(this).closest('.booknetic_active_day').data('day', selected_day);
				}
			}).on('click', '.booknetic_social_login_facebook, .booknetic_social_login_google', function ()
			{
				let login_window = window.open($(this).data('href'), 'booknetic_social_login', 'width=1000,height=700');

				let while_fn = function ()
				{
					var dataType = 'undefined';

					try {
						dataType = typeof login_window.booknetic_user_data;
					}
					catch (err){}

					if( dataType != 'undefined' )
					{
						if( booking_panel_js.find('#bkntc_input_surname').parent('div').hasClass('booknetic_hidden') )
						{
							booking_panel_js.find('#bkntc_input_name').val( login_window.booknetic_user_data['first_name'] + ' ' + login_window.booknetic_user_data['last_name'] );
						}
						else
						{
							booking_panel_js.find('#bkntc_input_name').val( login_window.booknetic_user_data['first_name'] );
							booking_panel_js.find('#bkntc_input_surname').val( login_window.booknetic_user_data['last_name'] );
						}

						booking_panel_js.find('#bkntc_input_email').val( login_window.booknetic_user_data['email'] );
						login_window.close();
						return;
					}

					if( !login_window.closed )
					{
						setTimeout( while_fn, 1000 );
					}
				}

				while_fn();

			})
			.on('change', '#booknetic_bring_someone_checkbox', function(event) {
				
				if( $(this).is(':checked') )
				{
					$('.booknetic_number_of_brought_customers').removeClass('d-none');
					$(".booknetic_appointment_container_body").animate({ scrollTop: 200 }, 300);
				}
				else
				{
					$('.booknetic_number_of_brought_customers').addClass('d-none');
				}

				booknetic.niceScroll();

			});

			$( window ).resize(function ()
			{
				booknetic.niceScroll();
			});

			var first_step_id = booking_panel_js.find('.booknetic_appointment_steps_body > .booknetic_appointment_step_element:not(.booknetic_menu_hidden)').eq(0).data('step-id');
			booknetic.loadStep(first_step_id);

			booknetic.niceScroll();

			booknetic.fadeInAnimate('.booknetic_appointment_step_element:not(.booknetic_menu_hidden)');

			booking_panel_js.find(".booknetic_appointment_steps_footer").fadeIn(200);

			setTimeout(booknetic.refreshStepIndexes, 450);

			if( 'google_recaptcha_site_key' in BookneticData )
			{
				grecaptcha.ready(function ()
				{
					booknetic.refreshGoogleReCaptchaToken();
				});
			}
		});

	});

})(jQuery);

