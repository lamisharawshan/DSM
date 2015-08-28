$(document).ready(function() {

	$("button[name='add_notice_announcement_button']").click(function(e){
		e.preventDefault();

        $("#add_notice_announcement_description").val('');
        $("#add_notice_announcement_title").val('');

		$("#add_notice_announcement_div").modal('show');

	});

    $("#add_notice_announcement_form").on('submit',function(e){
        e.preventDefault();
        var description = $("#add_notice_announcement_description").val();
        var title= $("#add_notice_announcement_title").val();
        //alert(description+path+status);
        $("#add_notice_announcement_div").modal('hide');

        add_announcement_initialize(description,title );
    });

    function add_announcement_initialize(description,title){
        $.ajax({
            url: "notice_announcement/add_notice_announcement",
            type: "POST",
            dataType: "json",
            data: { 'description': description, 'title': title},
            success: function(data)
            {

                var new_tr= create_row(data[0]);
                $("#notice_announcement_tbody").append(new_tr);

                $("button[name='modify_notice_announcement_button']").click(function(e){
                    e.preventDefault();
                    notice_id = $(this).attr('id');
                    modify_notice_announcement_func(notice_id);

                });
            }

        });
    }



    $("button[name='modify_notice_announcement_button']").click(function(e){
        e.preventDefault();
        notice_id = $(this).attr('id');

        modify_notice_announcement_func(notice_id);
    });


    function modify_notice_announcement_func(notice_id){
        //alert(notice_id);
        $.ajax({
            url: "notice_announcement/modify_notice_announcement/"+notice_id,
            type: "POST",
            dataType: "json",
            success: function(data)
            {

                //var parsed = JSON.parse(data);


                    //alert(data[0].title);

                    $("#modify_notice_announcement_title").val(data[0].title);
                    $("#modify_notice_announcement_description").val(data[0].description);
                    $("#modify_notice_announcement_status").val(data[0].status);



                $("#modify_notice_announcement_div").modal('show');
            }

        });
    }



	$("#modify_notice_announcement_form").on('submit',function(e){
		e.preventDefault();
		var description = $("#modify_notice_announcement_description").val();
		var title = $("#modify_notice_announcement_title").val();
		var status= $("#modify_notice_announcement_status").val();

		//alert(description+path+status);
		$("#modify_notice_announcement_div").modal('hide');

        modify(description,title,status);
	});

    function modify(description,title,status)
    {

        $.ajax({
            url: "notice_announcement/save_modified_notice_announcement",
            type: "POST",
            data: { 'id': notice_id, 'description': description, 'title': title, 'status': status},
            dataType: "json",
            success: function(data)
            {
                //alert(data[0].title);
                //var parsed= JSON.parse(data);

                var new_tr= create_row(data[0]);

                $("#news_announcement_tr_"+data[0].notice_announcement_id).replaceWith(new_tr);

                $("button[name='modify_notice_announcement_button']").click(function(e){
                    e.preventDefault();
                    notice_id = $(this).attr('id');
                    modify_notice_announcement_func(notice_id);

                });

            }

        });
    }


    function create_row(row){
        var new_tr= '' +
            '<tr id="news_announcement_tr_'+row.notice_announcement_id+'">'+
            '<td id="notice_announcement_title_td">'+
            '<a href="#" data-rel="colorbox">'+
            row.title+
            '</a>'+
            '</td>'+

            '<td id="notice_announcement_description_td">'+
            '<a href="#" data-rel="colorbox">'+
            row.description+
            '</a>'+
            '</td>'+

            '<td id="notice_announcement_status_td">'+
            '   <a href="#" data-rel="colorbox">'+
            row.status+

            '</a>'+
            '</td>'+




            '<td>'+
            '   <a href="#" role="button" class="green" data-toggle="modal">'+
            '      <div class="hidden-phone visible-desktop btn-group">'+
            '         <button class="btn btn-mini btn-success" name="modify_notice_announcement_button" id="'+

            row.notice_announcement_id+
            '	">'+
            '           <i class="icon-ok bigger-120"></i>'+
            '      Modify'+
            '     </button>'+
            '</div>'+

            '</a>'+
            '</td>'+

            ' </tr>';
        return new_tr;
    }





});







