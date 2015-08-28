$(function(){

    // scrollables
    $('.slim-scroll').each(function () {
        var $this = $(this);
        $this.slimScroll({
            height: $this.data('height') || 600,
            railVisible: true
        });
    });

    $("button[name='admin_exam_view_details']").click(function (e) {
        e.preventDefault();
        var exam_id = $(this).attr('id');

        $.ajax
        ({
            url: "admin_exam_management/view_current_exam_details/" + exam_id,
            type: "POST",
            dataType: "json",
            success: function (row)
            {

                for (var x = 0; x < row.length; x++)
                {
                    $("#modal_view_current_exams #admin_view_exam_name_id").html(row[x].exam_name);
                    $("#modal_view_current_exams #admin_view_exam_type_id").html(row[x].exam_type);
                    $("#modal_view_current_exams #admin_view_total_marks_id").html(row[x].total_marks);
                    $("#modal_view_current_exams #admin_view_percentage_id").html(row[x].marks_percentage + ' %');
                    $("#modal_view_current_exams #admin_view_exam_date_id").html(row[x].exam_date);
                    $("#modal_view_current_exams #admin_view_exam_status_id").html(row[x].status);
                }
                $('#modal_view_current_exams').modal("show");

            }

        });


    });

    $("button[name='clickable_publish_exam_result']").click(function(e)
    {
        e.preventDefault();
        var current_exam_id = $(this).attr('id');

//        alert("checking lock "+current_exam_id);

        $("#hidden_cuurent_exam_id").val(current_exam_id);
        $('#modal_confirm_publish_exams').modal("show");

    });

    $("#admin_publish_confirmation_form").on('submit',function(e) {

        e.preventDefault();
        $('#modal_confirm_publish_exams').modal("hide");
        $('#modal_publish_confirmation_dialog').modal("show");

        var current_exam_id=$('#hidden_cuurent_exam_id').val();

        $.ajax
        ({

            url: "admin_exam_management/change_current_exam_access_status_to_publish/" + current_exam_id,
            type: "POST",
            dataType: "json",
            success: function (row)
            {
//                alert("checking publish success "+current_exam_id);


            }

        });

    });

    $("button[name='clickable_unlock_exam_result']").click(function(e)
    {
        e.preventDefault();
        var current_exam_id = $(this).attr('id');

//        alert("for current exam unlock -- "+current_exam_id);

        $("#hidden_cuurent_exam_id").val(current_exam_id);
        $('#modal_confirm_unlock_exams').modal("show");
    });

    $("#admin_unlock_confirmation_form").on('submit',function(e) {

        e.preventDefault();
        $('#modal_confirm_unlock_exams').modal("hide");
        $('#modal_unlock_confirmation_dialog').modal("show");

        var current_exam_id=$('#hidden_cuurent_exam_id').val();

        $.ajax
        ({
            url: "admin_exam_management/unlock_current_exam_access_status/" + current_exam_id,
            type: "POST",
            dataType: "json",
            success: function (row)
            {
//                alert("checking unlock success "+current_exam_id);


            }

        });

    });

    $("button[name='nonclickable_unlock_exam_result']").click(function(e){

        e.preventDefault();

        $('#modal_nonclickable_unlock_dialog').modal("show");
    });

    $("button[name='nonclickable_publish_exam_result']").click(function(e){

        e.preventDefault();

        $('#modal_nonclickable_publish_dialog').modal("show");
    });

});




















