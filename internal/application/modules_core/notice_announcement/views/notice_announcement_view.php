<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Site Management
        <small>
            <i class="icon-double-angle-right"></i>
            Notice and Announcement
        </small>
    </h1>
</div>
<!--/.page-header-->

<div class="row-fluid">
<div class="span12">
<!--PAGE CONTENT BEGINS-->
<div class="row-fluid">
    <div class="span12">
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Modify</th>

            </tr>
            </thead>

            <tbody id="notice_announcement_tbody">

            <?php foreach ($all_events as $row){ ?>

            <tr id="news_announcement_tr_<?php echo $row->notice_announcement_id?>" >
                <td id="notice_announcement_title_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->title; ?>
                    </a>
                </td>

                <td id="notice_announcement_description_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->description; ?>
                    </a>
                </td>

                <td id="notice_announcement_status_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->status; ?>

                    </a>
                </td>




                <td>
                    <a href="#" role="button" class="green" data-toggle="modal">
                        <div class="hidden-phone visible-desktop btn-group">
                            <button class="btn btn-mini btn-success" name="modify_notice_announcement_button" id="<?php echo $row->notice_announcement_id;?>">
                                <i class="icon-ok bigger-120"></i>
                                Modify
                            </button>
                        </div>

                    </a>
                </td>

            </tr>
            <?php  } ?>
            </tbody>
        </table>
    </div>
    <!--/span-->
</div>
<!--/row-->


<h4 class="pink">

    <!--<a href="#" role="button" class="green" data-toggle="modal" name="add_news_event_anchor"> Add Notice & Announcement </a>-->
    <button name="add_notice_announcement_button" class="btn btn-info"> Add Notice & Announcement</button>
</h4>


<div id="add_notice_announcement_div" class="modal hide" tabindex="-1">

    <form id="add_notice_announcement_form" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="blue bigger">Please fill the following form fields</h4>
        </div>

        <div class="modal-body overflow-visible">
            <div class="row-fluid">



                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Title</label>

                        <div class="controls">
                            <input type="text" id="add_notice_announcement_title" placeholder="About Notice & Announcement "/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Description</label>

                        <div class="controls">
                            <!--<input type="text" id="add_notice_announcement_description" placeholder="Some information about notice "/>-->
                            <textarea id="add_notice_announcement_description" placeholder="Some information about notice "></textarea>
                        </div>
                    </div>


                    <!--<div class="control-group">
                        <label class="control-label" for="form-field-first">Name</label>

                        <div class="controls">
                            <input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
                            <input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
                        </div>
                    </div>-->
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-small" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>

            <button class="btn btn-small btn-primary" id="add_notice_announcement_save_button" type="submit">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>


<div id="modify_notice_announcement_div" class="modal hide" tabindex="-1">

    <form id="modify_notice_announcement_form" method="post">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="blue bigger">Want to modify?</h4>
        </div>

        <div class="modal-body overflow-visible">
            <div class="row-fluid">

                <div class="span7">
                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Title</label>

                        <div class="controls">
                            <input type="text" id="modify_notice_announcement_title"
                                   placeholder="Title"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Description</label>

                        <div class="controls">
                            <!--<input type="text" id="modify_event_place" placeholder="Place of Event "/>-->
                            <textarea id="modify_notice_announcement_description" placeholder="Description "></textarea>
                        </div>
                    </div>


                    <div class="control-group">
                        <label for="form-field-select-3">Status</label>

                        <div>
                            <!--<select class="chzn-select" data-placeholder="Choose a Status">-->
                            <select id="modify_notice_announcement_status">
                                <option value="activated"/>
                                Activated
                                <option value="deactivated"/>
                                Deactivated
                            </select>
                        </div>
                    </div>


                    <!--<div class="control-group">
                        <label class="control-label" for="form-field-first">Name</label>

                        <div class="controls">
                            <input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
                            <input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
                        </div>
                    </div>-->
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-small" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>

            <button class="btn btn-small btn-primary" id="modify_notice_announcement_save_button" type="submit">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>

</div>

</div>

</div>