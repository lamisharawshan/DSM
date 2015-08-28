$(function () {
    $("button[name='project_thesis_view_project_thesis_details']").click(function (e) {
        e.preventDefault();

        var project_thesis_id = $(this).attr('id');


        $.ajax({

            type: "POST",
            url: "project_thesis/get_project_thesis_specific/" + project_thesis_id,
            datatype: "json",
            success: function (row) {

                var parsed = JSON.parse(row);
                for (var x = 0; x < parsed.length; x++) {
                    $("#project_thesis_modal_view_project_thesis #project_thesis_title_td").html(parsed[x].title);
                    $("#project_thesis_modal_view_project_thesis #project_thesis_description_td").html(parsed[x].description);
                    $("#project_thesis_modal_view_project_thesis #project_thesis_status_td").html(parsed[x].status);
                    $("#project_thesis_modal_view_project_thesis #project_thesis_modify_date_td").html(parsed[x].date_of_modification);
                }
                $('#project_thesis_modal_view_project_thesis').modal("show");


            }

        });
    });

    $("button[name='project_thesis_project_thesis_download']").click(function (e) {
        e.preventDefault();

        var project_thesis_files_id = $(this).attr('id');


        $.ajax({

            type: "POST",
            url: "project_thesis/project_thesis_download/" + project_thesis_files_id,
            datatype: "json"
        });
    });

    $("button[name='project_thesis_add_project_btn']").click(function(e){
        e.preventDefault();
        $('#project_thesis_modal_add_project').modal("show");
    });

    $('#project_thesis_add_project_form').on('submit', function(e){
        e.preventDefault();
        var streamData = $(this).serialize();
        $.ajax({
            url: "project_thesis/add_new_project",
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#project_thesis_modal_add_project').modal("hide");

                    $('#project_thesis_add_success').modal("show");
                }
            }

        });

    });


    $("button[name='project_thesis_add_thesis_btn']").click(function(e){
        e.preventDefault();
        $('#project_thesis_modal_add_thesis').modal("show");
    });

    $('#project_thesis_add_thesis_form').on('submit', function(e){
        e.preventDefault();
        var streamData = $(this).serialize();
        $.ajax({
            url: "project_thesis/add_new_thesis",
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#project_thesis_modal_add_thesis').modal("hide");

                    $('#project_thesis_add_success').modal("show");
                }
            }

        });

    });
    
    var project_thesis_id;
    $("button[name='project_thesis_modify_project_thesis']").click(function(e){
        e.preventDefault();

        project_thesis_id = $(this).attr('id');
        $.ajax({

            type: "POST",
            url: "project_thesis/get_project_thesis_specific/"+project_thesis_id,
            datatype:"json",
            success: function(row)
            {

                var parsed = JSON.parse(row);
                for(var x=0; x<parsed.length;x++){
                    $("#project_thesis_modal_modify_project_thesis #title").val(parsed[x].title);    
                    $("#project_thesis_modal_modify_project_thesis #description").val(parsed[x].description) ;      
                    $("#project_thesis_modal_modify_project_thesis #status").val(parsed[x].status);
                    $('#project_thesis_modal_modify_project_thesis').modal("show");
                }    
            }

        });

    });
    
    $('#project_thesis_modify_project_thesis_form').on('submit', function(e){
        e.preventDefault();                  
        var streamData = $(this).serialize();     
        $.ajax({
            url: "project_thesis/modify_project_thesis/"+project_thesis_id,
            type: "POST",
            data: streamData,
            dataType: "json",
            success: function(html) {
                if(html.val==true)
                {
                    $('#project_thesis_modal_modify_project_thesis').modal("hide");    

                    $('#project_thesis_modify_success').modal("show");
                }
            }

        });

    });


});