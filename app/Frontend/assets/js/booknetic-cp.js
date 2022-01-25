var bookneticPaymentStatus;
(function($)
{
	"use strict";

	function __( key )
	{
		return key in BookneticData.localization ? BookneticData.localization[ key ] : key;
	}

	var booknetic = {

		options: {
			'templates': {
				'loader': '<div class="booknetic_loading_layout"></div>',
				'toast': '<div id="booknetic-toastr"><div class="booknetic-toast-img"><img></div><div class="booknetic-toast-details"><span class="booknetic-toast-description"></span></div><div class="booknetic-toast-remove"><i class="fa fa-times"></i></div></div>'
			}
		},

		localization: {
			month_names: [ __('January'), __('February'), __('March'), __('April'), __('May'), __('June'), __('July'), __('August'), __('September'), __('October'), __('November'), __('December') ],
			day_of_week: [ __('Sun'), __('Mon'), __('Tue'), __('Wed'), __('Thu'), __('Fri'), __('Sat'), __('Sun') ] ,
		},


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
			var OPTS ={
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
					this.toast( 'Error!', 'unsuccess' );
					return false;
				}
			}

			if( typeof res['status'] == 'undefined' )
			{
				this.toast( 'Error!', 'unsuccess' );
				return false;
			}

			if( res['status'] == 'error' )
			{
				this.toast( typeof res['error_msg'] == 'undefined' ? 'Error!' : res['error_msg'], 'unsuccess' );
				return false;
			}

			if( res['status'] == 'ok' )
				return true;

			// else

			this.toast( 'Error!', 'unsuccess' );
			return false;
		},

		ajax: function ( action , params , func , loading, fnOnError )
		{
			loading = loading === false ? false : true;

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
							func( result );
					}
					else if( typeof fnOnError == 'function' )
					{
						fnOnError();
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
			return n.padStart(p, '0');
		},

		toastTimer: 0,

		toast: function(title , type , duration )
		{
			$("#booknetic-toastr").remove();

			if( this.toastTimer )
				clearTimeout(this.toastTimer);

			$("body").append(this.options.templates.toast);

			$("#booknetic-toastr").hide().fadeIn(300);

			type = type === 'unsuccess' ? 'unsuccess' : 'success';

			$("#booknetic-toastr .booknetic-toast-img > img").attr('src', BookneticData.assets_url + 'icons/' + type + '.svg');

			$("#booknetic-toastr .booknetic-toast-description").text(title);

			duration = typeof duration != 'undefined' ? duration : 1000 * ( title.length > 48 ? parseInt(title.length / 12) : 4 );

			this.toastTimer = setTimeout(function()
			{
				$("#booknetic-toastr").fadeOut(200 , function()
				{
					$(this).remove();
				});
			} , typeof duration != 'undefined' ? duration : 4000);
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
		}

	};

	$(document).ready( function()
	{

		if( 'datepicker' in $.fn )
		{
			$.fn.datepicker.dates['en']['months'] = [__('January'), __('February'), __('March'), __('April'), __('May'), __('June'), __('July'), __('August'), __('September'), __('October'), __('November'), __('December')];
			$.fn.datepicker.dates['en']['days'] = [__('Sun'), __('Mon'), __('Tue'), __('Wed'), __('Thu'), __('Fri'), __('Sat')];
			$.fn.datepicker.dates['en']['daysShort'] = $.fn.datepicker.dates['en']['days'];
			$.fn.datepicker.dates['en']['daysMin'] = $.fn.datepicker.dates['en']['days'];
		}

		$(document).on('click', '#booknetic-toaster .booknetic-toast-remove', function ()
		{
			$(this).closest('#booknetic-toaster').fadeOut(200, function()
			{
				$(this).remove();
				this.toastTimer = 0;
			});
		}).on('click', '.booknetic_cp_header_menu_item', function()
		{
			if( $(this).hasClass('booknetic_cp_header_menu_active') )
			{
				return;
			}

			var tabid = $(this).data('tabid');

			$('.booknetic_cp_header_menu_active').removeClass('booknetic_cp_header_menu_active');
			$(this).addClass('booknetic_cp_header_menu_active');

			$('.booknetic_cp_tab').hide();
			$('#booknetic_tab_' + tabid).show();
		}).on('click', '#booknetic_profile_save', function ()
		{
			var name		= $('#booknetic_input_name').val(),
				surname 	= $('#booknetic_input_surname').val(),
				email		= $('#booknetic_input_email').val(),
				phone		= $('#booknetic_input_phone').data('iti').getNumber(intlTelInputUtils.numberFormat.E164),
				birthdate	= $('#booknetic_input_birthdate').val(),
				gender		= $('#booknetic_input_gender').val();

			booknetic.ajax('save_profile', {
				name: name,
				surname: surname,
				email: email,
				phone: phone,
				birthdate: birthdate,
				gender: gender
			}, function ( result )
			{
				booknetic.toast( result['message'] );
			});
		}).on('click', '#booknetic_change_password_save', function ()
		{
			var old_password		= $('#booknetic_input_old_password').val(),
				new_password		= $('#booknetic_input_new_password').val(),
				repeat_new_password	= $('#booknetic_input_repeat_new_password').val();

			booknetic.ajax('change_password', {
				old_password: old_password,
				new_password: new_password,
				repeat_new_password: repeat_new_password
			}, function ( result )
			{
				booknetic.toast( result['message'] );
			});
		}).on('click', '.booknetic_cp_header_logout_btn', function ()
		{
			location.href = $(this).data('href');
		}).on('click', '.booknetic_reschedule_popup_cancel, .booknetic_cancel_popup_no', function ()
		{
			$(this).closest('.booknetic_popup').fadeOut(200);
		}).on('click', '.booknetic_reschedule_btn', function ()
		{
			var tr			= $(this).closest('tr'),
				id			= tr.data('id'),
				date		= tr.data('date'),
				time		= tr.data('time'),
				date_show	= tr.data('date-show'),
				time_show	= tr.data('time-show'),
				datebased	= tr.data('datebased'),
				tenant_id = tr.data('tenant_id')


			if( datebased )
			{
				$('#booknetic_reschedule_popup_time_area').hide();
			}
			else
			{
				$('#booknetic_reschedule_popup_time_area').show();
			}


			var td_datetime			= tr.children('.td_datetime'),
				td_format 				= td_datetime.data('date-format'),
				td_date = tr.attr('data-date');

			$('#booknetic_reschedule_popup_date').attr('o_date',date);

			td_format = td_format.replace('Y','yyyy').replace('m','mm').replace('d','dd');
			$("#booknetic_reschedule_popup_date").datepicker({
				format: td_format,
				autoclose: true,
				weekStart: BookneticData.week_starts_on == 'sunday' ? 0 : 1
			});
			$('#booknetic_reschedule_popup_date').datepicker("update", td_date);
			$('#booknetic_reschedule_popup_time').html( '<option select="" value="'+time+'">'+time_show+'</option>' );

			$('#booknetic_cp_reschedule_popup').data('appointment-id', id).data('tenant-id', tenant_id).removeClass('booknetic_hidden').hide().fadeIn(200);
		}).on('click', '.booknetic_reschedule_popup_confirm', function ()
		{
			var dataid	= $('#booknetic_cp_reschedule_popup').data('appointment-id'),
				date	= $('#booknetic_reschedule_popup_date').val(),
				time	= $('#booknetic_reschedule_popup_time').val(),
				date_show = date,
				time_show = $('#booknetic_reschedule_popup_time').select2('data')[0].text;
			if (typeof $("#booknetic_reschedule_popup_date").data('original-date') !== 'undefined')
			{
				date = $("#booknetic_reschedule_popup_date").data('original-date');
			}

			booknetic.ajax('reschedule_appointment', {
				id: dataid,
				date: date,
				time: time
			}, function ( result )
			{
				var tr = $('#booknetic_tab_appointments tr[data-id="'+dataid+'"]');
				tr.find('.td_datetime').text( date_show + " " + time_show);
				tr.find('.booknetic_cancel_btn').removeClass('booknetic_hidden').show();
				tr.find('.booknetic_appointment_status_td > span').attr('class', 'booknetic_appointment_status_' + result['appointment_status']).text( result['appointment_status_text'] );

				tr.data('date', date_show);
				tr.data('time', time_show);

				booknetic.toast( result['message'] );

				$('#booknetic_cp_reschedule_popup').fadeOut(200);
			});
		}).on('click', '.booknetic_cancel_btn', function ()
		{
			var tr			= $(this).closest('tr'),
				id			= tr.data('id');

			$('#booknetic_cp_cancel_popup').data('appointment-id', id).removeClass('booknetic_hidden').hide().fadeIn(200);
		}).on('click', '.booknetic_cancel_popup_yes', function ()
		{
			var dataid	= $('#booknetic_cp_cancel_popup').data('appointment-id');

			booknetic.ajax('cancel_appointment', {
				id: dataid
			}, function ( result )
			{
				var tr = $('#booknetic_tab_appointments tr[data-id="'+dataid+'"]');

				tr.find('.td_status').text(result['status']);
				tr.find('.booknetic_cancel_btn').hide();
				tr.find('.booknetic_appointment_status_td > span').attr('class', 'booknetic_appointment_status_' + result['appointment_status']).text( result['appointment_status_text'] );

				booknetic.toast( result['message'] );

				$('#booknetic_cp_cancel_popup').fadeOut(200);
			});
		}).on('click', '#booknetic_profile_delete', function ()
		{
			$('#booknetic_cp_delete_profile_popup').removeClass('booknetic_hidden').hide().fadeIn(200);
		}).on('click', '.booknetic_delete_profile_popup_yes', function ()
		{
			booknetic.ajax('delete_profile', {}, function ( result )
			{
				booknetic.loading(1);
				location.href = result['redirect_url'];
			});
		}).on('change', '#booknetic_reschedule_popup_date', function ()
		{
			$("#booknetic_reschedule_popup_date").attr('o_date', $("#booknetic_reschedule_popup_date").val());
			$('#booknetic_reschedule_popup_time').val('').trigger('change');
		}).on('select2:select', '#booknetic_reschedule_popup_time', function (e)
		{
			var original_date = e.params.data.original_date;
			if( typeof original_date != 'undefined' )
			{
				$('#booknetic_reschedule_popup_date').data('original-date', original_date);
			}
		});

		 $("#booknetic_input_birthdate").datepicker({
			 autoclose: true,
			 format: 'yyyy-mm-dd',
			 weekStart: BookneticData.week_starts_on == 'sunday' ? 0 : 1
		 });

		booknetic.select2Ajax( $("#booknetic_reschedule_popup_time"), 'get_available_times_of_appointment', function()
		{
			return {
				id: $('#booknetic_cp_reschedule_popup').data('appointment-id'),
				date:  $("#booknetic_reschedule_popup_date").attr('o_date'),
				client_time_zone:  booknetic.timeZoneOffset(),
				tenant_id: $('#booknetic_cp_reschedule_popup').data('tenant-id'),
			}
		});

		var phone_input = $('#booknetic_input_phone');
		phone_input.data('iti', window.intlTelInput( phone_input[0], {
			utilsScript: BookneticData.assets_url + "js/utilsIntlTelInput.js",
			initialCountry: phone_input.data('country-code')
		}));


		$('.td_datetime').each(function (){
			let tenant_timezone = $( this ).data('appointment-timezone');
			let tenant_offset = 0;
			let offset_diff;

			if( /^[a-zA-Z_-]+\/[a-zA-Z_-]+\/*[a-zA-Z_-]*$/.test( tenant_timezone.trim() ) )
			{
				const str = new Date().toLocaleString('en-us', { timeZone: tenant_timezone.trim(), hour12: false });
				offset_diff = ( new Date( str ).getTime() - new Date().getTime() );
			}
			else if( !isNaN(parseFloat( tenant_timezone.replace("UTC", '') )) )
			{
				 tenant_offset = parseFloat(tenant_timezone.replace("UTC", ''))*60*60*1000;
			}

			let client_offset = new Date().getTimezoneOffset()*60*1000*(-1);
			let datetime = $( this ).parent('tr').data('date');
			datetime += ' ';
			datetime += $( this ).parent('tr').data('time');

			datetime = new Date( datetime ) ;



			if ( typeof offset_diff != "undefined" && offset_diff != null )
			{
				datetime = new Date( ( datetime.getTime() - offset_diff ) );
			}
			else
			{
				datetime = new Date( ( datetime.getTime() - tenant_offset + client_offset ) );
			}


			let dateYear = datetime.getFullYear();
			let dateMonth = ("0" + (datetime.getMonth()+1)).slice(-2);
			let dateDay = ("0" + datetime.getDate()).slice(-2);
			let dateString = '';
			let date_format = $( this ).data('date-format');
			console.log(date_format);
			switch(date_format) {
				case 'Y-m-d':
					dateString = dateYear + '-' + dateMonth + '-' + dateDay;
					break;
				case 'm/d/Y':
					dateString = dateMonth + '/' + dateDay + '/' + dateYear;
					break;
				case 'd-m-Y':
					dateString = dateDay + '-' + dateMonth + '-' + dateYear;
					break;
				case 'd/m/Y':
					dateString = dateDay + '/' + dateMonth + '/' + dateYear;
					break;
				case 'd.m.Y':
					dateString = dateDay + '.' + dateMonth + '.' + dateYear;
					break;
				default:
					dateString = dateYear + '-' + dateMonth + '-' + dateDay;
			}

			let timeHour = ("0" + datetime.getHours()).slice(-2);
			let timeMinute = ("0" + datetime.getMinutes()).slice(-2);
			let timeString = "";
			let is12Hour = $( this ).data('time-format') == 'h:i A';
			if( parseInt(timeHour) >= 12 && is12Hour )
			{
				timeHour = parseInt( timeHour - 12 );
				if( timeHour === 0 )
				{
					timeHour = 12;
				}
				timeString = timeHour + ":" + timeMinute + " PM";
			}
			else if( parseInt(timeHour) < 12 && is12Hour)
			{
				timeString = timeHour + ":" + timeMinute + " AM";
			}

			else
			{
				timeString = timeHour + ":" + timeMinute;
			}

			$( this ).text( dateString + " " + timeString);
			$( this ).parent('tr').attr('data-date', dateString);
			$( this ).parent('tr').data('time-show', timeString);


		});


	});

})(jQuery);

