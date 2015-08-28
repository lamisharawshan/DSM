$(function(){
    var program_id ;
    $("button[name='program_management_add_program_notification_btn']").click(function(e){
        e.preventDefault();
        program_id=$(this).attr('id');  
        $('#program_management_modal_add_notification').modal("show"); 
    });

    $('#program_management_add_notification_form').on('submit', function(e){
        e.preventDefault();           
        var streamData = $(this).serialize();
     //   alert("haihai");
     //   alert($_FILES['files']['tmp_name'][0]);
        $.ajax({
            url: "program_management/add_new_program_notification/"+program_id,
            type: "POST",
            data: streamData,
                                        
            dataType: "json",
            success: function(html) {  
                if(html.val==true)
                {
                    $('#program_management_modal_add_notification').modal("hide");    

                    $('#program_management_notification_add_success').modal("show");
                }
            }

        });

    });


    var program_notification_id;

    $("button[name='program_management_view_notification_btn']").click(function(e){
        e.preventDefault();
        program_notification_id=$(this).attr('id');  
        $.ajax({

            type: "POST",
            url: "program_management/get_program_notification_data/"+program_notification_id,
            datatype:"json",
            success: function(row)
            {
                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    $("#program_management_modal_view_program_notification #notification_td").html(parsed[x].notification) ;
                    $("#program_management_modal_view_program_notification #notification_program_name_td").html(parsed[x].program_name) ;
                    $("#program_management_modal_view_program_notification #notification_status_td").html(parsed[x].status) ;
                    $("#program_management_modal_view_program_notification #notification_date_td").html(parsed[x].date_of_modification) ;
                    $("#program_management_modal_view_program_notification #notification_time_td").html(parsed[x].time_of_modification) ;
                    $("#program_management_modal_view_program_notification #notification_user_td").html(parsed[x].user_of_modification) ;
                    $('#program_management_modal_view_program_notification').modal("show");
                }   

            }

        });                                     
    });



    $("button[name='program_management_modify_notification_btn']").click(function(e){
        e.preventDefault();   

        p_notification_id=$(this).attr('id'); 
        $.ajax({

            type: "POST",
            url: "program_management/get_program_notification_data/"+p_notification_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    
                    $("#program_management_modal_modify_program_notification #notification").html(parsed[x].notification) ; 
                    $("#program_management_modal_modify_program_notification #notification_status").val(parsed[x].status);
                    $('#program_management_modal_modify_program_notification').modal("show");
                }    
            }

        });

    });
    $('#program_management_modify_program_notification_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "program_management/modify_program_notification/"+p_notification_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#program_management_modal_modify_program_notification').modal("hide");    

                    $('#program_management_notification_modify_success').modal("show");
                }
            }

        });
    });
	
	
	
	 $("button[name='prog_mng_add_noti_file_btn']").click(function(e){     
        var btn = document.getElementById('prog_mng_add_noti_file_btn');
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

});

