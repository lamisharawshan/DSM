$(document).ready(function() {
		
		$("button[name='edit_profile_btn']").click(function(e){	
		$("#edit_profile_div").modal('show');
	});
	
	$("#edit_profile_form").on('submit',function(e){
		e.preventDefault();
	username = $("#edit_username").val();
		e_mail = $("#edit_e_mail").val();
		contact= $("#edit_contact").val();
		social_network_address = $("#edit_social_network_address").val();
		address = $("#edit_address").val();
		
		$("#edit_profile_div").modal('hide');
		
		 
		$.ajax({
				url: "profile/modified_profile",
				type: "POST",
				data:{'username':username,'e_mail':e_mail, 'contact':contact,'social_network_address': social_network_address,'address': address},
				datatype: "json",
				success: function(data)
				{	
					var parsed = JSON.parse(data);
//					alert(parsed[0].first_name+" Hello " +parsed[0].mid_name);	
					
					 for(var i=0;i<parsed.length;i++)
					{
						//alert("HELLO");
						$("#edit_username").html(parsed[i].username);
						$("#edit_e_mail").html(parsed[i].e_mail);
						$("#edit_contact").html(parsed[i].contact);	
						$("#edit_social_network_address").html(parsed[i].social_network_address);
						$("#edit_address").html(parsed[i].address);
					}
					//$("#id-input-file-3").modal('show');	
				}
				
		});
		 
	

	});
	
					$("button[name='change_password_btn']").click(function(e){	
		$("#change_password_div").modal('show');
	});
	
	
	
	$("#edit_password_form").on('submit',function(e){
		e.preventDefault();
		password = $("#edit_new_password").val();

		$("#change_password_div").modal('hide');
//		alert("passWord Change from modify");
		$.ajax({
				url: "profile/modified_password",
				type: "POST",
				data: {'password':password},
				datatype: "json",
				success: function(data)
				{	
					
					 var parsed = JSON.parse(data);
					
					 for(var i=0;i<parsed.length;i++)
					{
//						alert(parsed[i].small_pic_path+parsed[i].picture_description);
						
						$("#edit_new_password").html(parsed[i].password);
					
					}
					//$("#id-input-file-3").modal('show');	
				}
				
		});

	});
	
	
		$("button[name='submit']").click(function(e){	 
		e.preventDefault();
		var description=document.getElementById('editor1').innerHTML;
     alert(description);

		
		//alert(description);
		$.ajax({
				url: "profile/modified_description",
				type: "POST",
				data: {'description':description},
				datatype: "json",
				success: function(data)
				{	
					
					 var parsed = JSON.parse(data);
					
					 for(var i=0;i<parsed.length;i++)
					{
//						alert(parsed[i].small_pic_path+parsed[i].picture_description);
						
						$("#editor1").html(parsed[i].description);
					
					}
					//$("#id-input-file-3").modal('show');	
				}
				
		});
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
		 });
	
	
	
