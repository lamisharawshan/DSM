$(document).ready(function() {

	$("a[name='add_news_event_anchor']").click(function(){
		//e.preventDefault();
		$("#add_news_event_div").modal('show');
		$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
		});
		$('#add_news_event_time').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: true
		});

        $('#id-input-file-3').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'icon-cloud-upload',
            droppable:true,
            thumbnail:'small'
            //,icon_remove:null//set null, to hide remove/reset button
            /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
            /**,before_remove : function() {
						return true;
					}*/
            ,
            preview_error : function(filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function(){
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });
        $('#id-file-format').removeAttr('checked').on('change', function() {
            var before_change
            var btn_choose
            var no_icon
            if(this.checked) {
                btn_choose = "Drop images here or click to choose";
                no_icon = "icon-picture";
                before_change = function(files, dropped) {
                    var allowed_files = [];
                    for(var i = 0 ; i < files.length; i++) {
                        var file = files[i];
                        if(typeof file === "string") {
                            //IE8 and browsers that don't support File Object
                            if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
                        }
                        else {
                            var type = $.trim(file.type);
                            if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
                                || ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
                                ) continue;//not an image so don't keep this file
                        }

                        allowed_files.push(file);
                    }
                    if(allowed_files.length == 0) return false;

                    return allowed_files;
                }
            }
            else {
                btn_choose = "Drop files here or click to choose";
                no_icon = "icon-cloud-upload";
                before_change = function(files, dropped) {
                    return files;
                }
            }
            var file_input = $('#id-input-file-3');
            file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
            file_input.ace_file_input('reset_input');
        });

        $('#modal-form').on('show', function () {
            $(this).find('.chzn-container').each(function(){
                $(this).find('a:first-child').css('width' , '200px');
                $(this).find('.chzn-drop').css('width' , '210px');
                $(this).find('.chzn-search input').css('width' , '200px');
            });
        });
	});
	
	$("#add_news_event_form").on('submit',function(e){
		e.preventDefault();
		var description = $("#add_event_description").val();
		var place= $("#add_event_place").val();
		var date = $("#add_event_date").val();
		var time = $("#add_event_time").val();
		var status= "Act";
		alert(status);
//		var status= $("#add_event_status").val();
		//alert(description+path+status);
		$("#add_news_event_div").modal('hide');

		$.ajax({
				url: "news_events/add_news_events",
				type: "POST",
				data: { 'description': description, 'place': place, 'date': date, 'time': time,  'status': status},
				datatype: "json",
				success: function(data)
				{
					alert(data);
					 var parsed = JSON.parse(data);

					 for(var i=0;i<parsed.length;i++)
					{
						//alert(parsed[i].small_pic_path+parsed[i].picture_description);

						$("#event_description_td").html(parsed[i].event_details);
						$("#event_place_td").html(parsed[i].event_place);
						$("#event_date_td").html(parsed[i].date);
						$("#event_time_td").html(parsed[i].time);
						$("#event_status_td").html(parsed[i].status);

					}
					//$("#id-input-file-3").modal('show');
				}

		});

	});

	$("button[name='modify_event_button']").click(function(e){
		e.preventDefault();
		picture_id = $(this).attr('id');
		alert(picture_id);
		$.ajax({
				url: "events/modify_events/"+picture_id,
				type: "POST",
				datatype: "json",
				success: function(data)
				{

					var parsed = JSON.parse(data);

					for(var i=0;i<parsed.length;i++)
					{

						$("#modify_event_description").val(parsed[i].event_details);
						$("#modify_event_place").val(parsed[i].event_place);
						$("#modify_event_date").val(parsed[i].date);
						$("#modify_event_time").val(parsed[i].time);
						$("#modify_event_status").val(parsed[i].status);

					}
					$("#modify_event_div").modal('show');
				}

		});
	});

	$("#modify_event_form").on('submit',function(e){
		e.preventDefault();
		var description = $("#modify_event_description").val();
		var place = $("#modify_event_place").val();
		var date= $("#modify_event_date").val();
		var time=$("#modify_event_time").val();
		var status= $("#modify_event_status").val();

		//alert(description+path+status);
		$("#modify_event_div").modal('hide');
		$.ajax({
				url: "news_events/save_modified_news_events",
				type: "POST",
				data: { 'id': picture_id, 'description': description, 'place': place, 'date': date, 'time': time,  'status': status},
				datatype: "json",
				success: function(data)
				{	
					
					 var parsed = JSON.parse(data);
					
					 for(var i=0;i<parsed.length;i++)
					{
						//alert(parsed[i].small_pic_path+parsed[i].picture_description);
						
						$("#event_description_td").html(parsed[i].event_details);
						$("#event_place_td").html(parsed[i].event_place);
						$("#event_date_td").html(parsed[i].date);
						$("#event_time_td").html(parsed[i].time);
						$("#event_status_td").html(parsed[i].status);
						
						
					}
					//$("#id-input-file-3").modal('show');	
				}
				
		});

	});




});







