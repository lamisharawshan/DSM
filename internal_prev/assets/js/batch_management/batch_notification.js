$(function(){
    var semester_log_id;
    $("button[name='batch_management_add_batch_notification_btn']").click(function(e){
        e.preventDefault();
        semester_log_id=$(this).attr('id');  
        $('#batch_management_modal_add_notification').modal("show"); 
    });

    $('#batch_management_add_notification_form').on('submit', function(e){
        e.preventDefault();           
        var streamData = $(this).serialize();
     //   alert("haihai");
     //   alert($_FILES['files']['tmp_name'][0]);
        $.ajax({
            url: "batch_management/add_new_batch_notification/"+semester_log_id,
            type: "POST",
            data: streamData,
                                        
            dataType: "json",
            success: function(html) {  
                if(html.val==true)
                {
                    $('#batch_management_modal_add_notification').modal("hide");    

                    $('#batch_management_notification_add_success').modal("show");
                }
            }

        });

    });
    $("button[name='batch_mng_add_noti_file_btn']").click(function(e){     
        var btn = document.getElementById('batch_mng_add_noti_file_btn');
        var form = btn.parentNode;
     
        var f=document.createElement("input");
        f.type="file";
        f.name="files[]";
        
        
        var rb =document.createElement("input");
        rb.type="button";
        rb.value="Remove File";
        rb.className="btn btn-small";
        rb.onclick=function(){

            form.removeChild(this.previousSibling);
            form.removeChild(this.nextSibling);
            form.removeChild(this);  
        }

        form.insertBefore(f,btn); 
        form.insertBefore(rb,btn);
        form.insertBefore(document.createElement("br"),btn);
    });
    
    $('.slim-scroll').each(function () {
        var $this = $(this);
        $this.slimScroll({
            height: $this.data('height') || 100,
            railVisible:true
        });
    });
    
    
    var program_notification_id;

    $("button[name='batch_management_view_notification_btn']").click(function(e){
        e.preventDefault();
        batch_notification_id=$(this).attr('id');  
        $.ajax({

            type: "POST",
            url: "batch_management/get_batch_notification_data/"+batch_notification_id,
            datatype:"json",
            success: function(row)
            {
                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    $("#batch_management_modal_view_batch_notification #notification_td").html(parsed[x].notification) ;
                    $("#batch_management_modal_view_batch_notification #notification_semester_log_name_td").html(parsed[x].semester_log_name) ;
                    $("#batch_management_modal_view_batch_notification #notification_status_td").html(parsed[x].status) ;
                    $("#batch_management_modal_view_batch_notification #notification_date_td").html(parsed[x].date_of_modification) ;
                    $("#batch_management_modal_view_batch_notification #notification_time_td").html(parsed[x].time_of_modification) ;
                    $("#batch_management_modal_view_batch_notification #notification_user_td").html(parsed[x].user_of_modification) ;
                    $('#batch_management_modal_view_batch_notification').modal("show");
                }   

            }

        });                                     
    });
    
    var notification_in_semester_log_id;
    $("button[name='batch_management_modify_notification_btn']").click(function(e){
        e.preventDefault();   

        notification_in_semester_log_id=$(this).attr('id'); 
        $.ajax({

            type: "POST",
            url: "batch_management/get_batch_notification_data/"+notification_in_semester_log_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    
                    $("#batch_management_modal_modify_batch_notification #notification").html(parsed[x].notification) ; 
                    $("#batch_management_modal_modify_batch_notification #notification_status").val(parsed[x].status);
                    $('#batch_management_modal_modify_batch_notification').modal("show");
                }    
            }

        });

    });
    $('#batch_management_modify_batch_notification_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "batch_management/modify_batch_notification/"+notification_in_semester_log_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#batch_management_modal_modify_batch_notification').modal("hide");    

                    $('#batch_management_notification_modify_success').modal("show");
                }
            }

        });
    });

});

