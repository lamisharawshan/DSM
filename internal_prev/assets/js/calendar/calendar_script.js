$(function() {

/* initialize the external events
	-----------------------------------------------------------------*/
	


	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag

		});

		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	
	var calendar = $('#calendar').fullCalendar({
		
		 buttonText: {
			prev: '<i class="icon-chevron-left"></i>',
			next: '<i class="icon-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month'
		},
		events: [
		{
			title: 'All Day Event',
			start: new Date(y, m, 1),
			className: 'label-important'
		},
		{
			title: 'Long Event',
			start: new Date(y, m, d-5),
			end: new Date(y, m, d-2),
			className: 'label-success'
		},
		{
			title: 'Some Event',
			start: new Date(y, m, d-3, 16, 0),
			allDay: false
		}]
		,
		editable: true,
		droppable: true,
		drop: function(date, allDay) { // this function is called when something is dropped
		
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			var copiedEventObject = $.extend({}, originalEventObject);
		
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			if ($('#drop-remove').is(':checked')) {
				$(this).remove();
			}
			
		}
		,
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			
			bootbox.prompt("New Event Title:", function(title) {
				if (title !== null) {
							alert(title + "Start "+ start),
					calendar.fullCalendar('renderEvent',
						{
							url: "calendar/New_Event",
							type:"POST",
							title: title,
							start: start,
							end: end,
							allDay: allDay,
							datatype: "json",
							data:{'title':title,'start':start},
												

					success: function(data)
				{	

					var parsed = JSON.parse(data);
//					alert(parsed[0].first_name+" Hello " +parsed[0].mid_name);	

alert("Success");
					/*
					 for(var i=0;i<parsed.length;i++)
					{
						//alert("HELLO");
						$("#edit_username").html(parsed[i].event_title);
						$("#edit_e_mail").html(parsed[i].month_name);
						$("#edit_contact").html(parsed[i].contact);	
						$("#edit_social_network_address").html(parsed[i].social_network_address);
						$("#edit_address").html(parsed[i].address);
					}*/
					//$("#id-input-file-3").modal('show');	
				}
						},
						true // make the event "stick"
					);
				}
				//alert(title + "Start Date "+ start);
			});
			

			calendar.fullCalendar('unselect');
			
		}
		,
		eventClick: function(calEvent, jsEvent, view) {

			var form = $("<form class='form-inline'><label>Change event name &nbsp;</label></form>");
			form.append("<input autocomplete=off type=text value='" + calEvent.title + "' /> ");
			form.append("<button type='submit' class='btn btn-small btn-success'><i class='icon-ok'></i> Save</button>");
			
			var div = bootbox.dialog(form,
				[
				{
					"label" : "<i class='icon-trash'></i> Delete Event",
					"class" : "btn-small btn-danger",
					"callback": function() {
						calendar.fullCalendar('removeEvents' , function(ev){
							return (ev._id == calEvent._id);
						})
					}
				}
				,
				{
					"label" : "<i class='icon-remove'></i> Close",
					"class" : "btn-small"
				}
				]
				,
				{
					// prompts need a few extra options
					"onEscape": function(){div.modal("hide");}
				}
			);
			
			form.on('submit', function(){
				calEvent.title = form.find("input[type=text]").val();
				calendar.fullCalendar('updateEvent', calEvent);
				
				alert(calEvent.title);
				
				div.modal("hide");
				return false;
			});
			
		
			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');

		}
		
	});



		 });
	
	
	
