(function ($)
{
	"use strict";

	$(document).ready(function()
	{
		var notificationsArr = $("#notifications-script").data('notifications');

		$('#notification_body').summernote({
			placeholder: '',
			tabsize: 2,
			height: 350,
			toolbar: [
				['style', ['style']],
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'picture']],
				['view', ['fullscreen', 'codeview']],
				['height', ['height']]
			],
			hint: {
				mentions: $( '.fsn_shorttags_element' ).map( function ( i, val ) { return $( val ).text().match( /[a-zA-Z0-9_]+/g ); } ),
				match: /\B\{(\w*)$/,
				search: function (keyword, callback)
				{
					callback($.grep(this.mentions, function (item)
					{
						return item.indexOf(keyword) == 0;
					}));
				},
				content: function ( item )
				{
					return '{' + item + '}';
				}
			}
		});

		$(document).on('click', '.fs_notification_element', function ()
		{
			$(".fs_notification_element.fsn_active").removeClass('fsn_active');
			$(this).addClass('fsn_active');

			var dataId	= $(this).data('id'),
				dataInf	= findDataInf( dataId );

			if( !dataInf )
				return;

			if( dataInf['action'] == 'reminder_before' )
			{
				$('#email_subject_label').removeClass('col-md-12').addClass('col-md-8');
				$('#schedule_after_label').addClass('hidden');
				$('#schedule_before_label').removeClass('hidden');
				$('#remind_time_before').val( dataInf['reminder_time'] > 30 ? dataInf['reminder_time'] : 30 );

				$('.remineder_warning').removeClass('hidden').show();
			}
			else if( dataInf['action'] == 'reminder_after' )
			{
				$('#email_subject_label').removeClass('col-md-12').addClass('col-md-8');
				$('#schedule_after_label').removeClass('hidden');
				$('#schedule_before_label').addClass('hidden');
				$('#remind_time_after').val( dataInf['reminder_time'] > 30 ? dataInf['reminder_time'] : 30 );

				$('.remineder_warning').removeClass('hidden').show();
			}
			else
			{
				$('#email_subject_label').removeClass('col-md-8').addClass('col-md-12');
				$('#schedule_after_label').addClass('hidden');
				$('#schedule_before_label').addClass('hidden');

				$('.remineder_warning').hide();
			}

			$('.notification_title').text($(this).text().trim());

			$("#notification_subject").val( typeof dataInf['subject'] != 'undefined' ? dataInf['subject'] : '' );
			var html_body = typeof dataInf['body'] != 'undefined' && dataInf['body'] ? dataInf['body'] : '';

			$('#notification_body').summernote('code', String(typeof dataInf['body'] != 'undefined' && dataInf['body'] ? dataInf['body'] : '').trim());

			$('#notification_attach_pdf').val((dataInf['invoices'] ? dataInf['invoices'] : [])).change();
		}).on('change', '.fs_onoffswitch-checkbox', function ()
		{
			var element			= $(this),
				dataId			= element.closest(".fs_notification_element").data('id'),
				status		= this.checked ? 'on' : 'off';

			booknetic.ajax('change_status', {id: dataId, status } );
		}).on('click', '#notification_save_btn', function ()
		{
			var activeId	    = $(".fs_notification_element.fsn_active").data('id'),
				subject		    = $("#notification_subject").val(),
				body		    = $('#notification_body').summernote('code'),
				dataInf         = findDataInf( activeId ),
				tab_id         	= $(".tab-content").data('tab'),
				invoices		= $('#notification_attach_pdf').select2('val').join(','),
				reminder_time   = 0;

			if( dataInf['action'] == 'reminder_before' )
			{
				reminder_time = $('#remind_time_before').val();
			}
			else if( dataInf['action'] == 'reminder_after' )
			{
				reminder_time = $('#remind_time_after').val();
			}

			if( subject == '' || body == '' )
			{
				booknetic.toast(booknetic.__('fill_form_correctly'), 'unsuccess');
				return;
			}

			booknetic.ajax('save', {id: activeId, subject: subject, body: body, reminder_time: reminder_time, invoices: invoices, tab_id: tab_id}, function()
			{
				booknetic.toast(booknetic.__('saved_successfully'));

				for( var i in notificationsArr )
				{
					if( notificationsArr[i]['id'] == activeId )
					{
						notificationsArr[i]['subject'] = subject;
						notificationsArr[i]['body'] = body;
						notificationsArr[i]['reminder_time'] = reminder_time;
						break;
					}
				}
			});
		}).on('click', '#send_test_email_btn', function ()
		{
			var id = $(".fs_notification_element.fsn_active").data('id');

			booknetic.loadModal('send_test_email', {id: id}, {type: 'center'});
		}).on('click', '.fs_notifications_list .nav-link:not(.active)', function ()
		{
			var el = $('.fs_notifications_list .tab-content ' + $(this).attr('href') + ' > .fs_notification_element:eq(0)');
			if( !el.hasClass('fsn_active') )
			{
				el.trigger('click');
			}
		});


		$("#notification_attach_pdf").select2({
			theme: 'bootstrap',
			placeholder: booknetic.__('select')
		});

		$(".fs_notification_element.fsn_active").trigger('click');

		$(".nice_scroll_enable").niceScroll({cursorcolor: "#e4ebf4"});

		function findDataInf( data_id )
		{
			for( var i in notificationsArr )
			{
				if( notificationsArr[i]['id'] == data_id )
				{
					return notificationsArr[i];
				}
			}

			return false;
		}

	});

})(jQuery);
