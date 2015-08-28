$(document).ready(function() {

$("a[name='add_acievements_anchor']").click(function(){	
		//e.preventDefault();
		$("#add_achievement_div").modal('show');
	});
	
$("#add_achievement_form").on('submit',function(e){
	e.preventDefault();
	path = $("#add_achievement_path").val();
	//alert(path);
	description = $("#add_achievement_description").val();
	status= $("#add_achievement_status").val();
	alert(path);
	$("#add_achievement_div").modal('hide');
	$.ajax({
				url: "achievements/add_achievements",
				type: "POST",
				data: { 'description': description, 'path': path,'status': status},
				datatype: "json",
				success: function(data)
				{	
					
					 var parsed = JSON.parse(data);
					
					 for(var i=0;i<parsed.length;i++)
					{
						//alert(parsed[i].small_pic_path+parsed[i].picture_description);
						
						$("#image_td").html(parsed[i].small_pic_path);
						$("#image_description_td").html(parsed[i].picture_description);
						$("#image_status_td").html(parsed[i].status);
						
						
					}
					//$("#id-input-file-3").modal('show');	
				}
				
		});

});
});














/* 		
		
		// $.ajax({
				// url: "achievements/modify_achievements/"+picture_id,
				// type: "POST",
				data: 'id='+picture_id,
				// datatype: "json",
				// success: function(data)
				// {	
					
					// var parsed = JSON.parse(data);
			
					// for(var i=0;i<parsed.length;i++)
					// {
						alert(parsed[i].small_pic_path);
						$("#achievement_picture_td").html(parsed[i].small_pic_path);
						$("#achievement_description_td").html(parsed[i].picture_description);
						$("#achievement_status_td").html(parsed[i].status);
						
						
					// }
						
				// }
				
		// }); */