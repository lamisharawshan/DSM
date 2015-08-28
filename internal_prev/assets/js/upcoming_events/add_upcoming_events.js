$(document).ready(function () {

    $("a[name='add_upcoming_events_anchor']").click(function () {
        //e.preventDefault();

        $("#add_upcoming_events_header").val(" ");
        $("#add_upcoming_events_details").val(" ");
        $("#add_upcoming_events_place").val(" ");
        $("#add_upcoming_events_date").val(" ");
        $("#add_upcoming_events_time").val(" ");

        $("#add_upcoming_events_div").modal('show');
    });


    $("#add_upcoming_events_div").on('submit', function (e) {
        e.preventDefault();

        //alert(path);
        add_header = $("#add_upcoming_events_header").val();
        add_details = $("#add_upcoming_events_details").val();
        add_place = $("#add_upcoming_events_place").val();
        add_date = $("#add_upcoming_events_date").val();
        add_time = $("#add_upcoming_events_time").val();
        //alert(add_header);
        // alert(add_details);
        //alert(add_date);
       // alert(add_time);

        //alert(path);
        $("#add_upcoming_events_div").modal('hide');

        save_new_upcoming_events_and_initialise(add_header, add_details, add_place, add_date, add_time);


    });





    function save_new_upcoming_events_and_initialise(add_header, add_details, add_place, add_date, add_time) {

        $.ajax({

            url: "upcoming_events/add_upcoming_events",
            type: "POST",
            data: {'add_header': add_header, 'add_details': add_details, 'add_place': add_place, 'add_date': add_date, 'add_time': add_time},
            datatype: "json",
            success: function (data) {
                var parsed = JSON.parse(data);
                //alert(parsed);
               ;
                $("#show_all_upcoming_events_details").append(create_upcoming_events_row(parsed[0]));


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