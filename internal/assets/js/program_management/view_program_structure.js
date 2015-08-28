$(function(){
$("button[name='program_management_program_view_details']").click(function(e){
	e.preventDefault();      
	
	var program_id=$(this).attr('id');
	
	$.ajax({
        
		type: "POST",
		url: "program_management/get_program_data/"+program_id,
        datatype:"json",
        success: function(row)
        {
			
			var parsed = JSON.parse(row);
			for(var x=0; x<parsed.length;x++){
				$("#program_management_modal_view_program #program_management_program_name_td").html(parsed[x].program_name) ;
				$("#program_management_modal_view_program #program_management_program_description_td").html(parsed[x].program_description) ;
				$("#program_management_modal_view_program #program_management_program_status_td").html(parsed[x].status) ;
				$("#program_management_modal_view_program #program_management_program_date_td").html(parsed[x].date_of_modification) ;
				$("#program_management_modal_view_program #program_management_program_time_td").html(parsed[x].time_of_modification) ;
                $("#program_management_modal_view_program #program_management_program_user_td").html(parsed[x].user_of_modification) ;
				$('#program_management_modal_view_program').modal("show");
			}	
            
			
        }
		
    });
});

$("button[name='program_management_semester_view_details']").click(function(e){
	e.preventDefault();
	var semester_id=$(this).attr('id');
	//alert(semester_id);
	$.ajax({
        
		type: "POST",
		url: "program_management/get_semester_data/"+semester_id,
        datatype:"json",
        success: function(row)
        {
			
			var parsed = JSON.parse(row);
			for(var x=0; x<parsed.length;x++){
				$("#program_management_modal_view_semester #program_management_semester_name_td").html(parsed[x].semester_name) ;
                $("#program_management_modal_view_semester #program_management_semester_program_name_td").html(parsed[x].program_name) ;
				$("#program_management_modal_view_semester #program_management_semester_credit_td").html(parsed[x].total_credit) ;
				$("#program_management_modal_view_semester #program_management_semester_status_td").html(parsed[x].status) ;
				$("#program_management_modal_view_semester #program_management_semester_date_td").html(parsed[x].date_of_modification) ;
                $("#program_management_modal_view_semester #program_management_semester_time_td").html(parsed[x].time_of_modification) ;
				$("#program_management_modal_view_semester #program_management_semester_user_td").html(parsed[x].user_of_modification) ;
				$('#program_management_modal_view_semester').modal("show");
			}	
            
			
        }
		
    });
	//$('#modal_view_semester').modal("show");
});

$("button[name='program_management_course_view_details']").click(function(e){
	e.preventDefault();
	var course_id=$(this).attr('id');
	//alert(course_id);
	$.ajax({
        
		type: "POST",
		url: "program_management/get_course_data/"+course_id,
        datatype:"json",
        success: function(row)
        {
			
			var parsed = JSON.parse(row);
			for(var x=0; x<parsed.length;x++){
				$("#program_management_modal_view_course #program_management_course_code_td").html(parsed[x].course_code) ;
				$("#program_management_modal_view_course #program_management_course_title_td").html(parsed[x].course_title) ;
                $("#program_management_modal_view_course #program_management_course_semester_name_td").html(parsed[x].semester_name) ;
                $("#program_management_modal_view_course #program_management_course_program_name_td").html(parsed[x].program_name) ;
				$("#program_management_modal_view_course #program_management_course_credit_td").html(parsed[x].course_credit) ;
				$("#program_management_modal_view_course #program_management_course_status_td").html(parsed[x].status) ;
				$("#program_management_modal_view_course #program_management_course_date_td").html(parsed[x].date_of_modification) ;
                $("#program_management_modal_view_course #program_management_course_time_td").html(parsed[x].time_of_modification) ;
				$("#program_management_modal_view_course #program_management_course_user_td").html(parsed[x].user_of_modification) ;
				$('#program_management_modal_view_course').modal("show");
			}	
            
			
        }
		
    });
});


});

