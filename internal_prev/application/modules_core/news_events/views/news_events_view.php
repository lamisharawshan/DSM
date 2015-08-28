<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Site Management
        <small>
            <i class="icon-double-angle-right"></i>
            Events
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
                <th>News Event Pictures</th>
                <th>News Event Header</th>
                <th>News Event Description</th>
                <th>News Event place</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Modify</th>

            </tr>
            </thead>

            <tbody>

            <?php foreach ($all_events as $row){ ?>

            <tr>
                <td id="event_description_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->news_events_header; ?>
                    </a>
                </td>

                <td id="event_description_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->news_events_header; ?>
                    </a>
                </td>

                <td id="event_place_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->news_events_details; ?>

                    </a>
                </td>

                <td id="event_date_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->news_events_place; ?>
                    </a>
                </td>

                <td id="event_time_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->news_events_date; ?>
                    </a>
                </td>

                <td id="event_status_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->news_events_time; ?>
                    </a>
                </td>

                <td id="event_status_td">
                    <a href="#" data-rel="colorbox">
                        <?php echo $row->status; ?>
                    </a>
                </td>


                <td>
                    <a href="#" role="button" class="green" data-toggle="modal">
                        <div class="hidden-phone visible-desktop btn-group">
                            <button class="btn btn-mini btn-success" name="modify_event_button" id="
														
				<?php echo $row->news_events_id; ?>
				">
                                <i class="icon-ok bigger-120"></i>
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
    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
    <a href="#" role="button" class="green" data-toggle="modal" name="add_news_event_anchor"> Add Event </a>
</h4>


<div id="add_news_event_div" class="modal hide" tabindex="-1">

    <form id="add_news_event_form" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="blue bigger">Please fill the following form fields</h4>
        </div>

        <div class="modal-body overflow-visible">
            <div class="row-fluid">
                <!--<div class="span5">
                    <div class="space" id="picture"></div>

                    <input type="file" id="add_event_path" />
                </div>-->
                <div class="span5">
                    <div class="space"></div>

                    <input type="file" />
                </div>


                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Description</label>

                        <div class="controls">
                            <input type="text" id="add_news_event_header" placeholder="About News & Events "/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Description</label>

                        <div class="controls">
                            <input type="text" id="add_news_event_description" placeholder="Some information about event "/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Place</label>

                        <div class="controls">
                            <input type="text" id="add_news_event_place" placeholder="Place of Event "/>
                        </div>
                    </div>


                    <div class="row-fluid">
                        <label for="id-date-picker-1">Date Picker</label>
                    </div>

                    <div class="control-group">
                        <div class="row-fluid input-append">
                            <input class="span8 date-picker" id="add_news_event_date" type="text"
                                   data-date-format="dd-mm-yyyy"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <label for="timepicker1">Time Picker</label>
                    </div>

                    <div class="control-group">
                        <div class="input-append bootstrap-timepicker">
                            <input id="add_news_event_time" type="text" class="input-small"/>
															<span class="add-on">
																<i class="icon-time"></i>
															</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-small" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>

            <button class="btn btn-small btn-primary" id="add_event_save_button" type="submit">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>


<div id="modify_event_div" class="modal hide" tabindex="-1">

    <form id="modify_event_form" method="post">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="blue bigger">Please fill the following form fields</h4>
        </div>

        <div class="modal-body overflow-visible">
            <div class="row-fluid">

                <div class="span7">
                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Description</label>

                        <div class="controls">
                            <input type="text" id="modify_event_description"
                                   placeholder="Some information about event "/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Place</label>

                        <div class="controls">
                            <input type="text" id="modify_event_place" placeholder="Place of Event "/>
                        </div>
                    </div>


                    <div class="row-fluid">
                        <label for="id-date-picker-1">Date Picker</label>
                    </div>

                    <div class="control-group">
                        <div class="row-fluid input-append">
                            <input class="span8 date-picker" id="modify_event_date" type="text"
                                   data-date-format="dd-mm-yyyy"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <label for="timepicker1">Time Picker</label>
                    </div>

                    <div class="control-group">
                        <div class="input-append bootstrap-timepicker">
                            <input id="modify_event_time" type="text" class="input-small"/>
															<span class="add-on">
																<i class="icon-time"></i>
															</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="form-field-select-3">Status</label>

                        <div>
                            <!--<select class="chzn-select" data-placeholder="Choose a Status">-->
                            <select id="modify_event_status">
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

            <button class="btn btn-small btn-primary" id="modify_event_save_button" type="submit">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>

</div>

</div>

</div>