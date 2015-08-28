$(function(){
    $("button[name='batch_management_batch_view_details']").click(function(e){
        e.preventDefault();
        var batch_id=$(this).attr('id');     
        $.ajax({

            type: "POST",
            url: "batch_management/get_batch_data/"+batch_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    $("#batch_management_modal_view_batch #batch_management_batch_name_td").html(parsed[x].batch_name) ; 
                    $("#batch_management_modal_view_batch #batch_management_batch_semester_name_td").html(null) ;  
                    $("#batch_management_modal_view_batch #batch_management_batch_semester_name_td").html(parsed[x].semester_name) ;
                    $("#batch_management_modal_view_batch #batch_management_batch_academic_status_td").html(parsed[x].academic_status) ;
                    $("#batch_management_modal_view_batch #batch_management_batch_status_td").html(parsed[x].status) ;   
                    $("#batch_management_modal_view_batch #batch_management_batch_date_td").html(parsed[x].date_of_modification) ;
                    $("#batch_management_modal_view_batch #batch_management_batch_time_td").html(parsed[x].time_of_modification) ;
                    $("#batch_management_modal_view_batch #batch_management_batch_user_td").html(parsed[x].user_of_modification) ;          
                    $('#batch_management_modal_view_batch').modal("show");
                }	
            }

        });                                        
    });

    $("button[name='batch_management_student_view_details']").click(function(e){
        e.preventDefault();
        var student_id=$(this).attr('id'); 
        $.ajax({

            type: "POST",
            url: "batch_management/get_student_data/"+student_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);  
                for(var x=0; x<parsed.length;x++){          


                    $("#batch_management_modal_view_student #batch_management_student_name_td").html(parsed[x].full_name) ;
                    $("#batch_management_modal_view_student #batch_management_student_roll_td").html(parsed[x].roll_number) ;
                    $("#batch_management_modal_view_student #batch_management_student_registration_td").html(parsed[x].registration_number) ;
                    $("#batch_management_modal_view_student #batch_management_student_status_td").html(parsed[x].status) ;
                    $("#batch_management_modal_view_student #batch_management_student_readd_status_td").html(parsed[x].re_admission_status) ;  
                    $("#batch_management_modal_view_student #batch_management_student_date_td").html(parsed[x].date_of_modification) ;
                    $("#batch_management_modal_view_student #batch_management_student_time_td").html(parsed[x].time_of_modification) ;  
                    $("#batch_management_modal_view_student #batch_management_student_user_td").html(parsed[x].user_of_modification) ;                       
                    $('#batch_management_modal_view_student').modal("show");
                }    


            }

        });                                        
    });

});