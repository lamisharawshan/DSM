$(function () {

    function teacher_view_exam(current_exam_id) {
        $.ajax({
            url: "teacher_internal_exam_management/view_exam_details/" + current_exam_id,
            type: "POST",
            dataType: "json",
            success: function (row) {

                for (var x = 0; x < row.length; x++) {
                    $("#modal_view_exams #view_exam_name_id").html(row[x].exam_name);
                    $("#modal_view_exams #view_exam_type_id").html(row[x].exam_type);
                    $("#modal_view_exams #view_total_marks_id").html(row[x].total_marks);
                    $("#modal_view_exams #view_percentage_id").html(row[x].marks_percentage + ' %');
                    $("#modal_view_exams #view_exam_date_id").html(row[x].exam_date);
                    $("#modal_view_exams #view_exam_status_id").html(row[x].status);
                }
                $('#modal_view_exams').modal("show");

            }

        });

    }

    $("button[name='teacher_view_exam']").click(function (e) {
        e.preventDefault();
        var exam_id = $(this).attr('id');

        teacher_view_exam(exam_id);
    });

    function teacher_view_result(exam_id) {
        $.ajax({
            url: "teacher_internal_exam_management/view_exam_results/" + exam_id,
            type: "POST",
            dataType: "json",
            success: function (row) {
                var total_string = '';


                for (var x = 0; x < row.length; x++) {
                    total_string += '<tr><td>' + row[x].full_name + '</td><td>' + row[x].roll_number + '</td><td>' + row[x].marks + '</td></tr>';
                }
                $("#result_table_body").html(total_string);
                $('#modal_view_results').modal("show");

            }

        });

    }

    $("button[name='teacher_view_result']").click(function (e) {
        e.preventDefault();
        var exam_id = $(this).attr('id');

        teacher_view_result(exam_id);

    });

    function show_create_exam_dialog(course_log_id) {
        $.ajax({
            url: "teacher_internal_exam_management/get_exams_of_course_log/" + course_log_id,
            type: "POST",
            dataType: "json",
            success: function (row) {


                var used_percentage = 0;

                for (var x = 0; x < row.length; x++) {
                    if (row[x].status == 'activated') {
                        used_percentage += parseInt(row[x].marks_percentage);
                    }

                }
                $("#create_exam_exam_name_id").val('');
                $("#create_exam_exam_type_id").val('');
                $("#create_exam_exam_date_id").val('');
                $("#create_exam_total_marks_id").val('');
                $("#course_log_id").val(course_log_id);


                $("#create_exam_percentage_slider").slider({
                    orientation: "horizontal",
                    range: "min",
                    min: 0,
                    max: 100 - used_percentage,
                    value: 0,
                    slide: function (event, ui) {
                        $("#create_exam_exam_percentage_id").val(ui.value);
                    }
                });
                $("#create_exam_exam_percentage_id").val($("#create_exam_percentage_slider").slider("value"));

            }

        });


        $.ajax({
            url: "teacher_internal_exam_management/view_students_in_semester_log/" + course_log_id,
            type: "POST",
            dataType: "json",
            success: function (row) {

                var total_string = '';
                var max_percentage = 0;

                for (var x = 0; x < row.length; x++) {
                    total_string += '' +
                        '<tr>' +
                        '   <td>' + row[x].full_name + '</td>' +
                        '   <td>' + row[x].roll_number + '</td>' +
                        '   <td><input type="text" name="current_exam_results[]"/>' +
                        '       <input type="hidden" name="user_id[]" value="' + row[x].user_id + '" />' +
                        '   </td>' +
                        '</tr>';

                }


                $("#create_result_body").html(total_string);
                $('#modal_create_exam').modal("show");

            }

        });
    }


    $("button[name='create_new_exam_button']").click(function (e) {
        e.preventDefault();
        var course_log_id = $(this).attr('id');
        calculate_total_percentage(course_log_id, show_create_exam_dialog_status);


    });


    function show_create_exam_dialog_status(total_percentage, course_log_id) {

        if (total_percentage < 100) {
            show_create_exam_dialog(course_log_id);
        } else {
            $('#modal_create_exam_failure').modal("show");


        }
    }

    function create_exam_row(row) {

        var new_tr = '' +
            '<tr id="exams_tr_' + row.current_exams_id + '">' +

            '   <td>' + row.exam_name + '</td>' +
            '   <td>' + row.exam_type + '</td>' +
            '   <td>' + row.total_marks + '</td>' +
            '   <td class="hidden-480">' +
            '        ' + row.marks_percentage + ' %' +
            '   </td>' +
            '   <td class="hidden-phone">' + row.exam_date + '</td>';


        if (row.status == 'activated') {
            new_tr += '<td class="hidden-480">' +
                '<span' +
                ' class="label label-success arrowed">' + row.status + '</span>' +
                '</td>';
        } else {
            new_tr += '<td class="hidden-480">' +
                '<span' +
                ' class="label label-important arrowed-in">' + row.status + '</span>' +
                '</td>';
        }


        new_tr += '' +
            '   <td>' +
            '   <div class="hidden-phone visible-desktop btn-group">' +
            '       <button class="btn btn-mini btn-success" name="teacher_view_exam"' +
            '               id="' + row.current_exams_id + '">' +
            '               <i class="icon-ok bigger-120"></i>' +
            '               View Exam Details' +
            '       </button>' +

            '       <button class="btn btn-mini btn-success" name="teacher_view_result"' +
            '               id="' + row.current_exams_id + '">' +
            '               <i class="icon-ok bigger-120"></i>' +
            '               View Results' +
            '       </button>';
        if (row.access_status == 'unlocked') {
            new_tr += '       <button class="btn btn-mini btn-info" name="teacher_modify_exam"' +
                '               id="' + row.current_exams_id + '">' +
                '               <i class="icon-edit bigger-120"></i>' +
                '               Modify Exam' +
                '       </button>' +
                '       <button class="btn btn-mini btn-warning" name="teacher_lock_exam" id="' + row.current_exams_id + '">' +
                '               <i class="icon-flag bigger-120"></i>' +
                '               Lock Exam' +
                '       </button>';

        } else {
            new_tr += '       <button class="btn btn-mini btn-inverse disabled" name="locked_exam" >' +
                '               <i class="icon-flag bigger-120"></i>' +
                '               Exam is Locked' +
                '       </button>';

        }


        new_tr +=
            '   </div>' +

                '   <div class="hidden-desktop visible-phone">' +
                '       <div class="inline position-relative">' +
                '           <button class="btn btn-minier btn-primary dropdown-toggle"' +
                '               data-toggle="dropdown">' +
                '               <i class="icon-cog icon-only bigger-110"></i>' +
                '           </button>' +

                '           <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">' +
                '               <li>' +
                '                   <a href="#" class="tooltip-info" data-rel="tooltip" title="View">' +
                '                       <span' +
                '                           class="blue">' +
                '                           <i class="icon-zoom-in bigger-120"></i>' +
                '                       </span>' +
                '                   </a>' +
                '               </li>' +

                '               <li>' +
                '                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">' +
                '                    <span' +
                '                    class="green">' +
                '                        <i class="icon-edit bigger-120"></i>' +
                '                    </span>' +
                '                </a>' +
                '            </li>' +

                '            <li>' +
                '                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">' +
                '                    <span' +
                '                    class="red">' +
                '                        <i class="icon-trash bigger-120"></i>' +
                '                    </span>' +
                '                </a>' +
                '            </li>' +
                '        </ul>' +
                '    </div>' +
                '</div>' +
                '</td>' +
                '</tr>';
        return new_tr;
    }

    function save_new_exam(course_log_id, streamData, exam_percentage) {
        $.ajax({
            url: "teacher_internal_exam_management/add_new_exam_and_results/" + exam_percentage,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function (row) {


                var no_exams = $("#tbody_exams_" + row[0].course_log_id).text();


                if (no_exams.match('No exams are found under that course')) {
                    $("#tbody_exams_" + row[0].course_log_id).html(create_exam_row(row[0]));
                } else {
                    $("#tbody_exams_" + row[0].course_log_id).append(create_exam_row(row[0]));
                }


                $("button[name='teacher_view_exam']").click(function (e) {
                    e.preventDefault();
                    var exam_id = $(this).attr('id');
                    teacher_view_exam(exam_id);


                });

                $("button[name='teacher_view_result']").click(function (e) {
                    e.preventDefault();
                    var exam_id = $(this).attr('id');

                    teacher_view_result(exam_id);

                });

                $("button[name='teacher_modify_exam']").click(function (e) {
                    e.preventDefault();
                    var current_exams_id = $(this).attr('id');

                    show_modify_exam_dialog(current_exams_id);


                });

                $("button[name='locked_exam']").click(function (e) {
                    $('#modal_confirmed_locking_exams').modal("show");
                });

                $("button[name='teacher_lock_exam']").click(function (e) {
                    e.preventDefault();
                    var current_exams_id = $(this).attr('id');
                    $('#hidden_exam_id').val(current_exams_id);
                    show_lock_exam_dialog(current_exams_id);


                });
                $.gritter.add({
                    title: 'Exam Successfully Added',
                    //text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
                    class_name: 'gritter-info gritter-center'
                });


            }

        });
    }

    $('#add_exam_form').on('submit', function (e) {
        e.preventDefault();
        $('#modal_create_exam').modal("hide");
        var streamData = $(this).serialize();
        //alert(streamData);
        var course_log_id = $("#course_log_id").val();
        var exam_percentage = $("#create_exam_exam_percentage_id").val();
        save_new_exam(course_log_id, streamData, exam_percentage);

    });

    function show_modify_exam_dialog(current_exams_id) {
        $.ajax({
            url: "teacher_internal_exam_management/get_course_log_of_exam/" + current_exams_id,
            type: "POST",
            dataType: "json",
            success: function (course_log_row) {

                $.ajax({
                    url: "teacher_internal_exam_management/get_exams_of_course_log/" + course_log_row[0].course_log_id,
                    type: "POST",
                    dataType: "json",
                    success: function (all_exams_row) {


                        var used_percentage = 0;

                        for (var x = 0; x < all_exams_row.length; x++) {
                            if (all_exams_row[x].status == 'activated') {
                                used_percentage += parseInt(all_exams_row[x].marks_percentage);
                            }
                        }

                        $.ajax({
                            url: "teacher_internal_exam_management/view_exam_details/" + current_exams_id,
                            type: "POST",
                            dataType: "json",
                            success: function (exam_details_row) {
                                $("#modify_exam_exam_name_id").val(exam_details_row[0].exam_name);
                                $("#modify_exam_exam_type_id").val(exam_details_row[0].exam_type);
                                $("#modify_exam_exam_date_id").val(exam_details_row[0].exam_date);
                                $("#modify_exam_total_marks_id").val(exam_details_row[0].total_marks);
                                $("#modify_exam_status_id").val(exam_details_row[0].status);
                                $("#current_exams_id").val(current_exams_id);

                                if (exam_details_row[0].status == 'activated') {
                                    $("#modify_exam_percentage_slider").slider({
                                        orientation: "horizontal",
                                        range: "min",
                                        min: 0,
                                        max: 100 - used_percentage + parseInt(exam_details_row[0].marks_percentage),
                                        value: parseInt(exam_details_row[0].marks_percentage),
                                        slide: function (event, ui) {
                                            $("#modify_exam_exam_percentage_id").val(ui.value);
                                        }
                                    });
                                    $("#modify_exam_exam_percentage_id").val($("#modify_exam_percentage_slider").slider("value"));

                                } else {
                                    $("#modify_exam_percentage_slider").slider({
                                        orientation: "horizontal",
                                        range: "min",
                                        min: 0,
                                        max: 100 - used_percentage,
                                        value: parseInt(exam_details_row[0].marks_percentage),
                                        slide: function (event, ui) {
                                            $("#modify_exam_exam_percentage_id").val(ui.value);
                                        }
                                    });
                                    $("#modify_exam_exam_percentage_id").val($("#modify_exam_percentage_slider").slider("value"));
                                }
                                //alert(exam_details_row[0].status);


                                $.ajax({
                                    url: "teacher_internal_exam_management/get_student_results_in_current_exam/" + current_exams_id,
                                    type: "POST",
                                    dataType: "json",
                                    success: function (student_result_row) {

                                        var total_string = '';
                                        var max_percentage = 0;

                                        for (var x = 0; x < student_result_row.length; x++) {
                                            total_string += '' +
                                                '<tr>' +
                                                '   <td>' + student_result_row[x].full_name + '</td>' +
                                                '   <td>' + student_result_row[x].roll_number + '</td>' +
                                                '   <td><input type="text" name="edited_current_exam_results[]" value="' + student_result_row[x].marks + '"/>' +
                                                '       <input type="hidden" name="edited_user_id[]" value="' + student_result_row[x].user_id + '" />' +
                                                '   </td>' +
                                                '</tr>';

                                        }


                                        $("#modify_result_body").html(total_string);
                                        $('#modal_modify_exam').modal("show");

                                    }

                                });


                            }

                        });


                    }

                });


            }

        });
    }

    $("button[name='teacher_modify_exam']").click(function (e) {
        e.preventDefault();
        var current_exams_id = $(this).attr('id');

        show_modify_exam_dialog(current_exams_id);

    });

    function replace_exam_row_and_initialize_actions(row) {

        $("#exams_tr_" + row[0].current_exams_id).replaceWith(create_exam_row(row[0]));


        $("button[name='teacher_view_exam']").click(function (e) {
            e.preventDefault();
            var exam_id = $(this).attr('id');
            teacher_view_exam(exam_id);


        });

        $("button[name='teacher_view_result']").click(function (e) {
            e.preventDefault();
            var exam_id = $(this).attr('id');

            teacher_view_result(exam_id);

        });

        $("button[name='teacher_modify_exam']").click(function (e) {
            e.preventDefault();
            var current_exams_id = $(this).attr('id');

            show_modify_exam_dialog(current_exams_id);


        });
        $("button[name='locked_exam']").click(function (e) {
            $('#modal_confirmed_locking_exams').modal("show");
        });

        $("button[name='teacher_lock_exam']").click(function (e) {
            e.preventDefault();
            var current_exams_id = $(this).attr('id');
            $('#hidden_exam_id').val(current_exams_id);
            show_lock_exam_dialog(current_exams_id);


        });
        $.gritter.add({
            title: 'Exam Successfully Modified',
            //text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
            class_name: 'gritter-info gritter-center'
        });


    }

    function save_modified_new_exam(streamData, modify_exam_exam_percentage) {
        $.ajax({
            url: "teacher_internal_exam_management/modify_current_exam_and_result/" + modify_exam_exam_percentage,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function (row) {

                replace_exam_row_and_initialize_actions(row);


            }

        });

    }

    $('#modify_exam_form').on('submit', function (e) {
        e.preventDefault();
        $('#modal_modify_exam').modal("hide");
        var streamData = $(this).serialize();
        var modify_exam_exam_percentage = $("#modify_exam_exam_percentage_id").val();

        save_modified_new_exam(streamData, modify_exam_exam_percentage);

    });

    function lock_exam(current_exams_id) {

        $.ajax({
            url: "teacher_internal_exam_management/lock_exam/" + current_exams_id,
            type: "POST",

            dataType: "json",
            success: function (row) {
                replace_exam_row_and_initialize_actions(row);

            }

        });


    }


    $("button[name='locked_exam']").click(function (e) {
        $('#modal_confirmed_locking_exams').modal("show");
    });

    $("button[name='teacher_lock_exam']").click(function (e) {
        e.preventDefault();
        var current_exams_id = $(this).attr('id');
        $('#hidden_exam_id').val(current_exams_id);
        show_lock_exam_dialog(current_exams_id);


    });

    $('#lock_confirmation_form').on('submit', function (e) {
        e.preventDefault();
        $('#modal_confirm_lock_exams').modal("hide");
        $('#modal_confirmed_locking_exams').modal("show");

        lock_exam($('#hidden_exam_id').val());

    });

    function show_lock_exam_dialog(current_exams_id) {
        $('#modal_confirm_lock_exams').modal("show");
    }


    function calculate_total_percentage(course_log_id, callback_function) {
        var total_percentage = 0;
        $.ajax({
            url: "teacher_internal_exam_management/get_exams_of_course_log/" + course_log_id,
            type: "POST",
            dataType: "json",
            success: function (exams_of_course_log) {

                for (var x = 0; x < exams_of_course_log.length; x++) {

                    if (exams_of_course_log[x].status == 'activated') {
                        total_percentage += parseInt(exams_of_course_log[x].marks_percentage);
                    }


                }
                //alert(total_percentage);
                callback_function(total_percentage, course_log_id);
            }

        });
    }


    function show_publish_course_result_modal(total_percentage, course_log_id) {

        if (total_percentage < 100) {
            $('#locking_course_result_head').html('Your Course is ' + total_percentage + ' % complete');
            $('#locking_course_result_info').html('please Complete 100 % to Lock the Course Result');
            $('#modal_lock_course_result_info').modal("show");
        } else {

            $('#lock_course_log_id').val(course_log_id);
            $('#modal_confirming_lock_course_result_info').modal("show");
        }
    }

    $("button[name='teacher_publish_course_result_button']").click(function (e) {
        var course_log_id = $(this).attr('id');

        calculate_total_percentage(course_log_id, show_publish_course_result_modal);

    });


    $('#confirming_lock_course_result_form').on('submit', function (e) {
        e.preventDefault();
        var course_log_id = $('#lock_course_log_id').val();
        lock_course_and_exams(course_log_id);
        $('#modal_confirming_lock_course_result_info').modal("hide");
    });

    function replace_with_locked_exams_and_locked_course_result_button_and_initialize(course_log_id,exams_of_course_log) {
        //alert(exams_of_course_log[0].current_exams_id);
        var new_trs = '';

        for (var x = 0; x < exams_of_course_log.length; x++) {

            new_trs += create_exam_row(exams_of_course_log[x]);

        }

        //alert(new_trs);

        $('#tbody_exams_' + course_log_id).html(new_trs);

        var new_button = '' +
            '<button class="btn btn-inverse btn-block disabled" name="teacher_published_course_result_button" >' +
            '   <i class="icon-bar-chart icon-2x icon-only"></i>' +
            '   Locked Course Result' +
            '</button>';
        //alert(new_button);

        $('#tbody_exams_' + course_log_id).html(new_trs);

        $('#teacher_publish_course_result_p_' + course_log_id).html(new_button);


        $("button[name='teacher_view_exam']").click(function (e) {
            e.preventDefault();
            var exam_id = $(this).attr('id');
            teacher_view_exam(exam_id);


        });

        $("button[name='teacher_view_result']").click(function (e) {
            e.preventDefault();
            var exam_id = $(this).attr('id');

            teacher_view_result(exam_id);

        });


        $("button[name='locked_exam']").click(function (e) {
            $('#modal_confirmed_locking_exams').modal("show");
        });


        $.gritter.add({
            title: 'Exam Successfully Modified',
            //text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
            class_name: 'gritter-info gritter-center'
        });




        $("button[name='teacher_published_course_result_button']").click(function (e) {

            $('#modal_teacher_published_course_result_info').modal("show");


        });

    }

    function lock_course_and_exams(course_log_id) {
        $.ajax({
            url: "teacher_internal_exam_management/lock_course_and_exams/" + course_log_id,
            type: "POST",
            dataType: "json",
            success: function (exams_of_course_log) {
                replace_with_locked_exams_and_locked_course_result_button_and_initialize(course_log_id,exams_of_course_log);
                $('#modal_teacher_published_course_result_info').modal("show");
            }

        });
    }

    $("button[name='teacher_published_course_result_button']").click(function (e) {

        $('#modal_teacher_published_course_result_info').modal("show");


    });




});
