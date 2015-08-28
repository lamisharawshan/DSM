$(function(){
    $("button[name='batch_management_batch_no_promote']").click(function(e){
        e.preventDefault();
        $('#program_management_modal_batch_no_promote_msg').modal("show");
    });

    $("button[name='batch_management_batch_semester_view_details_btn']").click(function(e){
        e.preventDefault();
        var semester_id=$(this).attr('id');   
        $.ajax({

            type: "POST",
            url: "batch_management/get_semester_data/"+semester_id,
            datatype:"json",
            success: function(row)
            {                       
                var parsed = JSON.parse(row);      
                for(var x=0; x<parsed.length;x++){                                                                                            
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_log_name_td").html(parsed[x].semester_log_name) ;
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_name_td").html(parsed[x].semester_name) ;
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_start_time_td").html(parsed[x].starting_date) ;
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_end_time_td").html(parsed[x].ending_date) ;
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_status_td").html(parsed[x].status) ;
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_academic_status_td").html(parsed[x].academic_status) ;  
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_date_td").html(parsed[x].date_of_modification) ;
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_time_td").html(parsed[x].time_of_modification) ;  
                    $("#batch_management_modal_view_batch_semester #batch_management_batch_semester_user_td").html(parsed[x].user_of_modification) ;                       
                    $('#batch_management_modal_view_batch_semester').modal("show");
                }    
            }

        });                                        
    });

    var batch_id;
    $("button[name='batch_management_batch_promote']").click(function(e){
        e.preventDefault();                                      
        batch_id=$(this).attr('id');
        var sem_status=0;     
        $.ajax({

            type: "POST",
            url: "batch_management/get_semester_choice_data/"+batch_id,
            datatype:"json",
            success: function(row)
            {
                $("#batch_management_modal_promote_batch #batch_management_semsester_selection").empty();
                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    if( parsed[x].status=="activated")
                    {
                        $("#batch_management_modal_promote_batch #batch_management_semsester_selection").append('<option value="' + parsed[x].semester_id + '">' + parsed[x].semester_name + '</option>');
                        sem_status=1;   
                    }
                }    
                if(sem_status==0)  $('#batch_management_modal_no_semester_to_add').modal("show");
                else
                {
                    var selected_semester_id=$("#batch_management_semsester_selection").val();
                    $.ajax({

                        type: "POST",
                        url: "batch_management/get_semester_choice_course_data/"+selected_semester_id,
                        datatype:"json",    
                        success: function(row)
                        {
                            var parsed = JSON.parse(row);
                            $('#batch_management_semester_course_details_table tbody tr').remove();
                            for(var x=0; x<parsed.length;x++){
                                $("#batch_management_semester_course_details_table").find('tbody').append("<tr><td>"+parsed[x].course_code+"</td><td>"+parsed[x].course_title+"</td><td>"+parsed[x].course_credit+"</td><td><select name='teacher[]' id='batch_management_teacher_assign'></select></td></tr>");                   

                            }    
                        } 

                    });

                    $.ajax({

                        type: "POST",
                        url: "batch_management/get_teachers_data/",
                        datatype:"json",    
                        success: function(row)
                        {     
                            var parsed = JSON.parse(row);                                                                                                      
                            for(var y=0; y<parsed.length;y++){               

                                $("#batch_management_semester_course_details_table #batch_management_teacher_assign").append('<option value="' + parsed[y].user_id + '">' + parsed[y].full_name + '</option>');                            
                            }

                        } 

                    });
                    $('#batch_management_modal_promote_batch').modal("show");
                }
            }

        });  
    });

    $('#batch_management_semsester_selection').on('change', function(e){
        e.preventDefault(); 
        var selected_semester_id=$("#batch_management_semsester_selection").val();
        $.ajax({

                        type: "POST",
                        url: "batch_management/get_semester_choice_course_data/"+selected_semester_id,
                        datatype:"json",    
                        success: function(row)
                        {
                            var parsed = JSON.parse(row);
                            $('#batch_management_semester_course_details_table tbody tr').remove();
                            for(var x=0; x<parsed.length;x++){
                                $("#batch_management_semester_course_details_table").find('tbody').append("<tr><td>"+parsed[x].course_code+"</td><td>"+parsed[x].course_title+"</td><td>"+parsed[x].course_credit+"</td><td><select name='teacher[]' id='batch_management_teacher_assign'></select></td></tr>");                   

                            }    
                        } 

                    });

                    $.ajax({

                        type: "POST",
                        url: "batch_management/get_teachers_data/",
                        datatype:"json",    
                        success: function(row)
                        {     
                            var parsed = JSON.parse(row);                                                                                                      
                            for(var y=0; y<parsed.length;y++){             

                                $("#batch_management_semester_course_details_table #batch_management_teacher_assign").append('<option value="' + parsed[y].user_id + '">' + parsed[y].full_name + '</option>');                            
                            }

                        } 

                    });
                    $('#batch_management_modal_promote_batch').modal("show");
    });


    $('#batch_management_promote_batch_form').on('submit', function(e){
        e.preventDefault();               
        var streamData = $(this).serialize();     
        $.ajax({
            url: "batch_management/modify_batch_log_semester_course/"+batch_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#batch_management_modal_promote_batch').modal("hide");    

                    $('#batch_management_promote_success').modal("show");
                }
            } 

        });                   

    });

    $('.slim-scroll').each(function () {
        var $this = $(this);
        $this.slimScroll({
            height: $this.data('height') || 100,
            railVisible:true
        });
    });

});

