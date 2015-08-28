$(function(){
    $("button[name='program_management_add_program_button']").click(function(e){
        e.preventDefault();
        $('#program_management_modal_add_program').modal("show");
    });

    $('#program_management_add_program_form').on('submit', function(e){
        e.preventDefault();    
        //var program_id=$(this).attr('id');
        var streamData = $(this).serialize();
        $.ajax({
            url: "program_management/add_new_program",
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {     
                if(html.val==true)
                {
                    $('#program_management_modal_add_program').modal("hide");    

                    $('#program_management_add_success').modal("show");
                }
            }

        });

    });
    var program_id ;
    $("button[name='program_management_add_semester_button']").click(function(e){
        e.preventDefault();
        program_id=$(this).attr('id');  
        $('#program_management_modal_add_semester').modal("show"); 
    });

    $('#program_management_add_semester_form').on('submit', function(e){
        e.preventDefault();           
        var streamData = $(this).serialize();
        $.ajax({
            url: "program_management/add_new_semester/"+program_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#program_management_modal_add_semester').modal("hide");    

                    $('#program_management_add_success').modal("show");
                }
            }

        });

    });

    var semester_id ;
    // $("button[name='program_management_add_course_button']").click(function(e){
    //        e.preventDefault();
    //        semester_id=$(this).attr('id');  
    //        $('#program_management_modal_add_course').modal("show"); 
    //    });
    //
    //    $('#program_management_add_course_form').on('submit', function(e){
    //        e.preventDefault();           
    //        var streamData = $(this).serialize();
    //        $.ajax({
    //            url: "program_management/add_new_course/"+semester_id,
    //            type: "POST",
    //            data: streamData,
    //            dataType: "json",
    //            success: function(html) {
    //                if(html.val==true)
    //                {
    //                    $('#program_management_modal_add_course').modal("hide");    
    //
    //                    $('#program_management_add_success').modal("show");
    //                }
    //            }
    //
    //        });
    //
    //    });

    $("button[name='program_management_modify_program_button']").click(function(e){
        e.preventDefault();

        program_id=$(this).attr('id'); 
        $.ajax({

            type: "POST",
            url: "program_management/get_program_data/"+program_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    $("#program_management_modal_modify_program #program_name").val(parsed[x].program_name);    
                    $("#program_management_modal_modify_program #program_description").val(parsed[x].program_description) ;      
                    $("#program_management_modal_modify_program #program_status").val(parsed[x].status);
                    $('#program_management_modal_modify_program').modal("show");
                }    
            }

        });

    });
    $('#program_management_modify_program_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "program_management/modify_program/"+program_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#program_management_modal_modify_program').modal("hide");    

                    $('#program_management_modify_success').modal("show");
                }
            }

        });

    });



    $("button[name='program_management_modify_semester_button']").click(function(e){
        e.preventDefault();   

        semester_id=$(this).attr('id'); 
        $.ajax({

            type: "POST",
            url: "program_management/get_semester_data/"+semester_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    $("#program_management_modal_modify_semester #semester_name").val(parsed[x].semester_name);    
                    $("#program_management_modal_modify_semester #total_credit").val(parsed[x].total_credit) ;      
                    $("#program_management_modal_modify_semester #semester_status").val(parsed[x].status);
                    $('#program_management_modal_modify_semester').modal("show");
                }    
            }

        });

    });
    $('#program_management_modify_semester_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "program_management/modify_semester/"+semester_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#program_management_modal_modify_semester').modal("hide");    

                    $('#program_management_modify_success').modal("show");
                }
            }

        });
    });

    var course_id;

    // $("button[name='program_management_modify_course_button']").click(function(e){
    //        e.preventDefault();   
    //
    //        course_id=$(this).attr('id'); 
    //        $.ajax({
    //
    //            type: "POST",
    //            url: "program_management/get_course_data/"+course_id,
    //            datatype:"json",
    //            success: function(row)
    //            {
    //
    //                var parsed = JSON.parse(row);
    //                for(var x=0; x<parsed.length;x++){
    //                    $("#program_management_modal_modify_course #course_code").val(parsed[x].course_code); 
    //                    $("#program_management_modal_modify_course #course_title").val(parsed[x].course_title);    
    //                    $("#program_management_modal_modify_course #course_credit").val(parsed[x].course_credit) ;      
    //                    $("#program_management_modal_modify_course #course_status").val(parsed[x].status);
    //                    $('#program_management_modal_modify_course').modal("show");
    //                }    
    //            }
    //
    //        });
    //
    //    });
    $('#program_management_modify_course_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "program_management/modify_course/"+course_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#program_management_modal_modify_course').modal("hide");    

                    $('#program_management_modify_success').modal("show");
                }
            }

        });
    });
    
    $("button[name='prog_mng_add_course_btn']").click(function(e){     
        var btn = document.getElementById('prog_mng_add_course_btn');
        var form = btn.parentNode;
        
        
        var f1=document.createElement("div");
        f1.className="hr";
        
        var f2=document.createElement("input");
        f2.type="text";
        f2.name="course_code[]";
        f2.placeholder="Course Code";
        
        var f3=document.createElement("input");
        f3.type="text";
        f3.name="course_title[]";
        f3.placeholder="Course Title";
        
        var f4=document.createElement("input");
        f4.type="text";
        f4.name="course_credit[]";
        f4.placeholder="Course Credit";
        
        
        var rb =document.createElement("input");
        rb.type="button";
        rb.value="Remove Course";
        rb.className="btn btn-small";
        rb.onclick=function(){

            form.removeChild(this.previousSibling);
            form.removeChild(this.previousSibling);
            form.removeChild(this.previousSibling);
            form.removeChild(this.previousSibling);
            form.removeChild(this.nextSibling);
            form.removeChild(this);  
        }

        form.insertBefore(f1,btn);
        form.insertBefore(f2,btn);
        form.insertBefore(f3,btn);
        form.insertBefore(f4,btn); 
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

