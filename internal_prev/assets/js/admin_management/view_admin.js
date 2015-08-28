$(function(){
    $("button[name='admin_management_admin_view_details_btn']").click(function(e){
        e.preventDefault();      

        var admin_id=$(this).attr('id');       

        $.ajax({

            type: "POST",
            url: "admin_management/get_admin_data/"+admin_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);

                for(var x=0; x<parsed.length;x++){         


                    $("#admin_management_modal_view_admin #admin_management_admin_name_td").html(parsed[x].full_name) ;
                    $("#admin_management_modal_view_admin #admin_management_admin_role_td").html(parsed[x].admin_role_type) ;
                    $("#admin_management_modal_view_admin #admin_management_admin_description_td").html(parsed[x].description) ;
                    $("#admin_management_modal_view_admin #admin_management_admin_status_td").html(parsed[x].status) ;
                    $("#admin_management_modal_view_admin #admin_management_admin_date_td").html(parsed[x].date_of_modification) ;
                    $("#admin_management_modal_view_admin #admin_management_admin_time_td").html(parsed[x].time_of_modification) ;
                    $("#admin_management_modal_view_admin #admin_management_admin_user_td").html(parsed[x].user_of_modification) ;
                    $('#admin_management_modal_view_admin').modal("show");
                }	


            }

        });
    });

    $("button[name='admin_management_admin_modify_btn']").click(function(e){
        e.preventDefault();

        admin_id=$(this).attr('id'); 
        $.ajax({

            type: "POST",
            url: "admin_management/get_admin_data/"+admin_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){  
        
                    $("#admin_management_modal_modify_admin #full_name").val(parsed[x].full_name);     
                    $("#admin_management_modal_modify_admin #description").val(parsed[x].description) ;      
                    $("#admin_management_modal_modify_admin #admin_status").val(parsed[x].status);
                    $('#admin_management_modal_modify_admin').modal("show");
                }    
            }

        });

    });
    $('#admin_management_modify_admin_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "admin_management/modify_admin/"+admin_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#admin_management_modal_modify_admin').modal("hide");    

                    $('#admin_management_modify_success').modal("show");
                }
            }

        });

    });

    $("button[name='admin_management_admin_add_btn']").click(function(e){
        e.preventDefault();
        $.ajax({

            type: "POST",
            url: "admin_management/get_admin_roles_data/",
            datatype:"json",    
            success: function(row)
            {     
                var parsed = JSON.parse(row);                                                                                                      
                for(var y=0; y<parsed.length;y++){        

                    $("#admin_management_modal_add_admin #admin_role").append('<option value="' + parsed[y].admin_role_id + '">' + parsed[y].admin_role_type + '</option>');                            
                }

            } 

        });
        $('#admin_management_modal_add_admin').modal("show");
    });

    $('#admin_management_add_admin_form').on('submit', function(e){
        e.preventDefault();                 
        var streamData = $(this).serialize();
        $.ajax({
            url: "admin_management/add_new_admin",
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {     
                if(html.val==true)
                {
                    $('#admin_management_modal_add_admin').modal("hide");    

                    $('#admin_management_add_success').modal("show");
                }
            }

        });

    });
    

});

