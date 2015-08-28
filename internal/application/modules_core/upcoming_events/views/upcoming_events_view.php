<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Dashboard
        <small>
            <i class="icon-double-angle-right"></i>
            Upcoming Events
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
                <th class="center">
                    <label>

                        <span class="lbl"></span>
                    </label>
                </th>
                <th>Event Name</th>
                <th>Event Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>Place</th>
                <th>Status</th>

            </tr>
            </thead>

            <tbody id="show_all_upcoming_events_details">

            <?php foreach ($upcoming_events_details as $row) { ?>

                <tr id ="event_details_<?php echo $row->news_events_id?>">
                    <td class="center">
                        <label>

                            <span class="lbl"></span>
                        </label>
                    </td>

                    <td id="event_name_id">
                        <h5>
                            <?php echo $row->news_events_header; ?>
                        </h5>
                    </td>

                    <td id="event_description_id">
                        <h5>
                            <?php echo $row->news_events_details; ?>
                        </h5>
                    </td>


                    <td id="event_date_id">
                        <h5>
                            <?php echo $row->news_events_date; ?>
                        </h5>
                    </td>

                    <td id="event_time_id">
                        <h5>
                            <?php echo $row->news_events_time; ?>
                        </h5>
                    </td>

                    <td id="event_place_id">
                        <h5>
                            <?php echo $row->news_events_place; ?>
                        </h5>
                    </td>

                    <td class="hidden-480" id="image_status_td">
							<span class="label label-warning">
                                <?php echo $row->status; ?>
               			   </span>
                    </td>

                    <!--</a>
                    </td>;-->


                    <td>
                        <a href="#" role="button" class="green" data-toggle="modal">
                            <div class="hidden-phone visible-desktop btn-group">
                                <button class="btn btn-mini btn-success" name="modify_upcoming_events_button"
                                        id="<?php echo $row->news_events_id; ?>">
                                    <i class="icon-ok bigger-120"></i>
                                </button>
                            </div>

                        </a>
                    </td>

                </tr>
            <?php
            }

            ?>
            </tbody>
        </table>
    </div>
    <!--/span-->
</div>
<!--/row-->

<h4 class="pink">
    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
    <a href="#" role="button" class="green" data-toggle="modal" name="add_upcoming_events_anchor"> Add Events </a>
</h4>





<div id="add_upcoming_events_div" class="modal hide" tabindex="-1">

    <form id="add_upcoming_events_form" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="blue bigger">Please fill the following form fields</h4>
        </div>

        <div class="modal-body overflow-visible">
            <div class="row-fluid">

                <div class="vspace"></div>

                <div class="span7">

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Name</label>

                        <div class="controls">
                            <input type="text" id="add_upcoming_events_header"
                                   placeholder="Some information about picture "/>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Description</label>

                        <div class="controls">
                            <input type="text" id="add_upcoming_events_details"
                                   placeholder="Some information about picture "/>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Place</label>

                        <div class="controls">
                            <input type="text" id="add_upcoming_events_place"
                                   placeholder="Some information about picture "/>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Date</label>

                        <!--<div class="controls">
                            <input type="text" id="add_upcoming_events_name"
                                   placeholder="Some information about picture "/>
                        </div>-->
                        <div class="control-group">
                            <div class="row-fluid input-append">
                                <input class="span10 date-picker"  type="text" id="add_upcoming_events_date" name="create_exam_exam_date"
                                       data-date-format="dd-M-yyyy"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Time</label>

                        <div class="control-group">
                            <div class="input-append bootstrap-timepicker">
                                <input type="text" id ="add_upcoming_events_time" class="input-small" />
															<span class="add-on">
																<i class="icon-time"></i>
															</span>
                            </div>
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

            <button class="btn btn-small btn-primary" id="add_upcoming_events_save_button" type="submit">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>





<div id="modify_upcoming_events_div" class="modal hide" tabindex="-1">

    <form id="modify_upcoming_events_form" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="blue bigger">Please fill the following form fields</h4>
        </div>

        <div class="modal-body overflow-visible">                                                                                       <!--body start-->
            <div class="row-fluid">

                <div class="vspace"></div>

                <div class="span7">
                    <div class="control-group">
                        <label for="form-field-select-3">Status</label>

                        <div>
                            <!--<select class="chzn-select" data-placeholder="Choose a Status">-->
                            <select id="modify_upcoming_events_status">
                                <option value="activated"/>
                                Activated
                                <option value="deactivated"/>
                                Deactivated
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Name</label>

                        <div class="controls">
                            <input type="text" id="modify_upcoming_events_name"
                                   placeholder="Some information about picture "/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Description</label>

                        <div class="controls">
                            <input type="text" id="modify_upcoming_events_description"
                                   placeholder="Some information about picture "/>
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
        </div>                                                                                                                       <!--body end-->


        <div class="modal-footer">
            <button class="btn btn-small" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>

            <button class="btn btn-small btn-primary" id="modify_upcoming_events_save_button" type="submit">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>


</div>

</div>

</div>