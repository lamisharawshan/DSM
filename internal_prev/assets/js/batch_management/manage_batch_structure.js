$(function(){
    var program_id ;
    var batch_id;
    var student_id;
    var student_number;
    var student_input_numbers=0;  
    $("button[name='batch_management_add_batch_button']").click(function(e){
        e.preventDefault();    
        program_id=$(this).attr('id');
        $('#batch_management_modal_add_batch').modal("show"); 
    });

    $('#batch_management_add_batch_form').on('submit', function(e){
        e.preventDefault();           
        var streamData = $(this).serialize();
        $.ajax({
            url: "batch_management/add_new_batch/"+program_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#batch_management_modal_add_batch').modal("hide");    

                    $('#batch_management_modal_add_success').modal("show");
                }
            }

        });
    });


    $("button[name='batch_mng_add_batch_stu_btn']").click(function(e){     
        var form = document.getElementById('btch_manage_stu_info');

        var btn = document.getElementById('btch_manage_entry_point');

        student_number=$("#no_of_students").val();
        var i;
        if(student_input_numbers>0)
        {                                           
            form.removeChild(btn.previousSibling);
            form.removeChild(btn.previousSibling);
        }

        for(i=0;i<student_number;i++)
        {

            student_input_numbers++;

            var f0= document.createElement("h6");
            f0.className="blue bigger";
            f0.innerHTML="student-"+ student_input_numbers;


            var f1=document.createElement("div");
            f1.className="hr";

            var f2=document.createElement("input");
            f2.type="text";
            f2.name="full_name[]";
            f2.placeholder="Full Name";
            f2.required=true;

            var f5=document.createElement("input");
            f5.type="text";
            f5.name="roll_no[]";
            f5.placeholder="Roll No";
            f5.required=true;

            var f6=document.createElement("input");
            f6.type="text";                   
            f6.name="reg_no[]";
            f6.placeholder="Registration No";
            f6.required=true;


            var rb =document.createElement("input");
            rb.type="button";
            rb.value="Remove Student";
            rb.className="btn btn-small";
            rb.onclick=function(){

                student_input_numbers--;               
                form.removeChild(this.previousSibling);
                form.removeChild(this.previousSibling);
                form.removeChild(this.previousSibling);
                form.removeChild(this.previousSibling);
                form.removeChild(this.previousSibling);
                form.removeChild(this.previousSibling);
                if(student_input_numbers==0)
                {
                    form.removeChild(this);  
                    form.removeChild(this.nextSibling); 

                }  
            }


            form.insertBefore(f1,btn);
            form.insertBefore(f0,btn);
            form.insertBefore(f2,btn); 
            form.insertBefore(f5,btn);
            form.insertBefore(f6,btn) 

            form.insertBefore(document.createElement("br"),btn);
        }  


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



    $("button[name='batch_management_add_student_button']").click(function(e){
        e.preventDefault();    
        batch_id=$(this).attr('id');
        $('#batch_management_modal_add_student').modal("show"); 
    });

    $('#batch_management_add_student_form').on('submit', function(e){
        e.preventDefault();                        
        var streamData = $(this).serialize();
        $.ajax({
            url: "batch_management/add_new_student/"+batch_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#batch_management_modal_add_student').modal("hide");    

                    $('#batch_management_modal_add_success').modal("show");
                }
            }

        });
    });


    $("button[name='batch_management_re_add_student_button']").click(function(e){
        e.preventDefault();    
        batch_id=$(this).attr('id');
        student_id=$("#batch_management_readd_selection").val();
        $('#batch_id').val(batch_id);
        $('#batch_management_modal_re_add_student').modal("show"); 
    });

    $('#batch_management_re_add_student_form').on('submit', function(e){
        e.preventDefault();                        
        var streamData = $(this).serialize();
        $.ajax({
            url: "batch_management/re_add_new_student/"+student_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#batch_management_modal_re_add_student').modal("hide");    

                    $('#batch_management_modal_add_success').modal("show");
                }
            }

        });
    });

    $('#batch_management_readd_selection').on('change', function(e){
        e.preventDefault(); 
        student_id=$("#batch_management_readd_selection").val();
        $.ajax({

            type: "POST",
            url: "batch_management/get_re_student_data/"+student_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){   
                    $('#batch_management_readd_full_name_td').text(parsed[x].full_name); 
                    $('#batch_management_readd_roll_no_td').text(parsed[x].roll_number);
                    $('#batch_management_readd_reg_no_td').text(parsed[x].registration_number);
                    $('#batch_management_readd_batch_name_td').text(parsed[x].batch_name);
                }    
            }

        });
    });

    $("button[name='batch_management_modify_batch_button']").click(function(e){
        e.preventDefault();

        batch_id=$(this).attr('id'); 
        $.ajax({

            type: "POST",
            url: "batch_management/get_batch_data/"+batch_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    $("#batch_management_modal_modify_batch #batch_name").val(parsed[x].batch_name);                         
                    $("#batch_management_modal_modify_batch #batch_status").val(parsed[x].status);                             
                    $("#batch_management_modal_modify_batch #batch_academic_status").val(parsed[x].academic_status);
                    $('#batch_management_modal_modify_batch').modal("show");
                }    
            }

        });

    });
    $('#batch_management_modify_batch_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "batch_management/modify_batch/"+batch_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#batch_management_modal_modify_batch').modal("hide");    

                    $('#batch_management_modify_success').modal("show");
                }
            }

        });

    });
    
    $("button[name='batch_management_modify_student_button']").click(function(e){
        e.preventDefault();

        student_id=$(this).attr('id'); 
        $.ajax({

            type: "POST",
            url: "batch_management/get_student_data/"+student_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){    
        
                    $("#batch_management_modal_modify_student #full_name").val(parsed[x].full_name);  
                    $("#batch_management_modal_modify_student #roll_number").val(parsed[x].roll_number); 
                    $("#batch_management_modal_modify_student #registration_number").val(parsed[x].registration_number);                         
                    $("#batch_management_modal_modify_student #student_re_admission_status").val(parsed[x].re_admission_status);                             
                    $("#batch_management_modal_modify_student #student_status").val(parsed[x].status);
                    $('#batch_management_modal_modify_student').modal("show");
                }    
            }

        });

    });
    $('#batch_management_modify_student_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "batch_management/modify_student/"+student_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#batch_management_modal_modify_student').modal("hide");    

                    $('#batch_management_modify_success').modal("show");
                }
            }

        });

    });

});

