$(document).ready(function () {


    $("button[name='modify_upcoming_events_button']").click(function (e) {
        e.preventDefault();
        news_events_id = $(this).attr('id');
        //alert(news_events_id);

        show_specific_upcoming_events_details_popup_for_modify(news_events_id);

    });


    $("#modify_upcoming_events_form").on('submit', function (e) {
        e.preventDefault();
        //path = $("#modify_achievement_description").val();
        modified_name = $("#modify_upcoming_events_name").val();
        modified_description = $("#modify_upcoming_events_description").val();
        modified_status = $("#modify_upcoming_events_status").val();


        $("#modify_upcoming_events_div").modal('hide');
        //alert(picture_id);
        save_modified_upcoming_events_and_initialise(news_events_id, modified_name, modified_description, modified_status);


    });




    function show_specific_upcoming_events_details_popup_for_modify(news_events_id) {                                       //first ajax
        $.ajax({
            url: "upcoming_events/modify_upcoming_events/" + news_events_id,
            type: "POST",
            datatype: "json",
            success: function (data) {

                var parsed = JSON.parse(data);

                for (var i = 0; i < parsed.length; i++) {
                    //alert(parsed[i].small_pic_path);
                    //$("#modify_achievement_path").val(parsed[i].small_pic_path);
                    $("#modify_upcoming_events_name").val(parsed[i].news_events_header);
                    $("#modify_upcoming_events_description").val(parsed[i].news_events_details);
                    $("#modify_upcoming_events_status").val(parsed[i].status);


                }
                $("#modify_upcoming_events_div").modal('show');
            }

        });

    }



    function save_modified_upcoming_events_and_initialise(news_events_id, modified_name, modified_description, modified_status) {               //second ajax

        $.ajax({
            url: "upcoming_events/save_modified_upcoming_events",
            type: "POST",
            data: {'news_events_id': news_events_id, 'modified_name': modified_name, 'modified_description': modified_description, 'modified_status': modified_status}, // question
            datatype: "json",
            success: function (row) {
                var parsed = JSON.parse(row);
                // alert(parsed[0].status);
                //alert(create_upcoming_events_row(parsed[0]));
                $("#event_details_" + parsed[0].news_events_id).replaceWith(create_upcoming_events_row(parsed[0]));

                //alert('modified');

                $("button[name='modify_upcoming_events_button']").click(function (e) {
                    e.preventDefault();
                    news_events_id = $(this).attr('id');
                    //alert(news_events_id);

                    show_specific_upcoming_events_details_popup_for_modify(news_events_id);

                });


            }

        });


    }



    function create_upcoming_events_row(row) {
        var new_li = '' +
            '<tr id ="event_details_' + row.news_events_id + '">' +
            '<td class="center">' +
            '<label>' +

            '<span class="lbl"></span>' +
            '</label>' +
            '</td>' +

            '<td id="event_name_id">' +
            '<h5>' +
            row.news_events_header +
            '</h5>' +
            '</td>' +

            '<td id="event_description_id">' +
            '<h5>' +
            row.news_events_details +
            '</h5>' +
            ' </td>' +


            '<td id="event_date_id">' +
            ' <h5>' +
            row.news_events_date +
            '</h5>' +
            '</td>' +

            '<td id="event_time_id">' +
            '<h5>' +
            row.news_events_time +
            '</h5>' +
            '</td>' +

            '<td id="event_place_id">' +
            '<h5>' +
            row.news_events_place +
            '</h5>' +
            '</td>' +

            '<td class="hidden-480" id="image_status_td">' +
            '<span class="label label-warning">' +
            row.status +
            ' </span>' +
            '</td>' +


            '<td>' +
            '<a href="#" role="button" class="green" data-toggle="modal">' +
            '<div class="hidden-phone visible-desktop btn-group">' +
            '<button class="btn btn-mini btn-success" name="modify_upcoming_events_button"' +
            'id="' + row.news_events_id + '">' +
            '<i class="icon-ok bigger-120"></i>' +
            '</button>' +
            '</div>' +

            ' </a>' +
            '</td>' +

            '</tr>';

        return new_li;

    }






});
	
	
	


