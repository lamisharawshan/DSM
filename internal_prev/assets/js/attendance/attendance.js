$(document).ready(function() {

    $("button[name='create_new_take_attendance_button']").click(function(e){
        e.preventDefault();
        course_log_id = $(this).attr('id');
       //alert(semester_log_id);
       
       $.ajax({
		url: "attendance/view_students_in_course_log/"+course_log_id,
		type: "post",
		dataType: "json",
		success: function(data)
		{

            len=data.length;
            var totalString ='';
            for(var x=0;x<data.length;x++)
            {

                totalString+='<tr><td>'+data[x].roll_number+'</td><td>'+data[x].full_name+'</td><td>' +
                    '<label><input name="attendance_input_'+x+'" type="radio" value="yes" checked="checked" /> <span class="lbl"> yes</span> </label>' +
                    '<label><input  name="attendance_input_'+x+'" type="radio" value="no"/> <span class="lbl"> No</span> </label><br>' +
                    '</td>' +
                    '</tr>' +
                    '<input type="hidden" value="'+data[x].user_id+'" name="'+x+'">';
               // alert(totalString);

            }


            $('#students_in_course').html(totalString);
            $('#modal_take_attendance').modal('show');
		}
       });


    });

    $("#take_attendance_form").on('submit',function(e){
        e.preventDefault();


        //alert("252522");
        all = $(this).serializeArray();
        //alert(all[1].value);
        var attend = {};
        var user_id = {};
        $('#modal_take_attendance').modal('hide');
        j=0;


        for (var i = 0, l = all.length; i < l; i++)
        {
                if(i%2==0)
                {

                    //attend[all[j].name] = all[i].value;
                    attend[j] = all[i].value;
                }
                else
                {
                    user_id[j] = all[i].value;
                    j++;
                }

        }

        //alert(j);

        $.ajax({
            url: "attendance/take_student_attendance/"+course_log_id,
            type: "POST",
            data: { 'attend': attend,'user_id': user_id},
            dataType: "json",
            success: function(data)
            {

                //alert("pppppppppp");



            }

        });



    });


});

