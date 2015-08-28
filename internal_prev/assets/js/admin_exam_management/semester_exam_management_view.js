$(function () {

    $("button[name='publish_semester_result']").on(ace.click_event, function () {

        var semester_log_id = $(this).attr('id');
        bootbox.confirm("Do you want to publish the semester result??? </br> If the you press yes result can't be modified any longer.", function (result) {
            if (result) {


                publish_semester_exam(semester_log_id);
                bootbox.alert("Result published");
            }
        });
    });


    $("button[name='view_semester_results_with_cgpa']").click(function(e){
        e.preventDefault();
        var semester_log_id=$(this).attr('id');
       // alert(semester_log_id);
        $.ajax({

            type: "POST",
            url: "admin_exam_management/get_semester_result_with_cgpa/"+semester_log_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                var total_string = '';


                for (var x = 0; x < parsed.length; x++) {
                    total_string +=parsed[x];
                    total_string += '<tr><td>' + parsed[x].full_name + '</td><td>' + parsed[x].roll_number + '</td><td>' + parsed[x].cgpa + '</td></tr>';
                }

                $("#semester_result_table_body").html(total_string);
                $('#modal_view_semester_results_with_cgpa').modal("show");


            }

        });

    });


    function publish_semester_exam(semester_log_id) {                                   //double ajax

        $.ajax({
            url: "admin_exam_management/publish_semester_result/" + semester_log_id,
            type: "POST",

            dataType: "json",
            success: function (row) {

                $("#semester_result_" + row[0].semester_log_id).replaceWith(create_semester_row(row));


                $.ajax({
                    url: "admin_exam_management/after_publish_semester_result_change_academic_status/" + semester_log_id,
                    type: "POST",

                    dataType: "json",
                    success: function (row) {


                    }
                });

            }
        });
    }


    function create_semester_row(row) {

        for (var x = 0; x < row.length; x++) {

            var new_li = '' +
                '<li id="semester_result_' + row[x].semester_log_id + '">' +

                '   <a href="#" class="dropdown-toggle">' +
                '       <i class="icon-double-angle-right"></i>' +
                row[x].semester_log_name +

                '&nbsp;&nbsp;';


            /*var total_course = 0;
             var published_course = 0;*/

            /*for (var x = 0; x < row.length; x++) {
             if (row[0].semester_log_id == row[x].semester_log_id) {
             total_course++;
             if (row[x].result_status == 'published') {
             published_course++;
             }
             }
             }*/


            new_li += '<button name="unpublish_semester_result" ';


            new_li += 'id="' + row[x].semester_log_id + '" ' +
                'class="btn btn-small disabled">';


            new_li += '<i class="icon-edit"></i>' +
                'Publish Semester Result' +
                '</button>' +

                '<b class="arrow icon-angle-down"></b>' +
                '</a>' +


                '<ul class="submenu">';

            for (var x = 0; x < row.length; x++) {
                if (row[x].semester_log_id == row[x].semester_log_id) {

                    new_li += '<li>' +
                        '<a href="#" class="dropdown-toggle">' +
                        '<i class="icon-pencil"></i>' +

                        row[x].course_title +

                        '&nbsp;&nbsp;' +
                        '( ' + row[x].result_status + ' )' +
                        '&nbsp;&nbsp;' +


                        '</a>' +
                        '</li>';


                }


            }


            new_li += ' </ul>' +

                '</li>';

            return new_li;

        }


    }


});




