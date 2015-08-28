<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Project and Thesis
        </h1>
    </div>

    <div class="row-fluid">
        <div class="span9">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">

                    <li class="active">
                        <a data-toggle="tab" href="#project_thesis_view_project">
                            <i class="blue icon-briefcase"></i>
                            Project
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#project_thesis_view_thesis">
                            <i class="blue icon-book"></i>
                            Thesis
                        </a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div id="project_thesis_view_project" class="tab-pane in active">
                        <ul class="nav nav-list">

                            <?php

                            $project_counter=0;

                            if (count($project_thesis) == 0) {
                                echo '<li><span class="blue">No Data Found</span></li>';
                            }
                            foreach ($project_thesis as $row1) {

                                if ($row1->type == 'project' && $row1->user_id == '22') {
                                    $project_counter++;
                                    echo '<li>';
                                    echo '	<a href="#" class="dropdown-toggle">';
                                    echo '		<i class="icon-desktop"></i>';
                                    echo '		<span class="menu-text">';
                                    echo $row1->title;
                                    echo ' <b>(';
                                    echo $row1->status;
                                    echo ')</b>';
                                    echo '        </span>';

                                    echo '        &nbsp;&nbsp;<button name="project_thesis_view_project_thesis_details" class="btn btn-small btn-warning"  id="' . $row1->project_thesis_id . '">
                    <i class=" icon-bar-chart"></i>
                    View Details
                    </button>';

                                    echo '        &nbsp;&nbsp;<button name="project_thesis_modify_project_thesis" class="btn btn-small btn-warning"  id="' . $row1->project_thesis_id . '">
                    <i class="icon-wrench"></i>
                    Modify Project
                    </button>';
                                    echo '        <b class="arrow icon-angle-down"></b>';
                                    echo '    </a>';
                                    echo '        <ul class="submenu">';

                                    foreach ($project_thesis_files as $row2) {

                                        if ($row1->project_thesis_id == $row2->project_thesis_id) {


                                            echo '			<li>';
                                            echo '				<a href="#" class="dropdown-toggle">
                            <i class="icon-double-angle-right"></i>';
                                            echo $row2->file_name;;

                                            echo '					&nbsp;&nbsp;<button name="project_thesis_project_thesis_download" class="btn btn-small btn-grey"  id="' . $row2->project_thesis_files_id . '">
                            <i class="icon-download-alt"></i>
                            Download
                            </button>';

                                            echo '					<b class="arrow icon-angle-down"></b>';
                                            echo '				</a>';
                                            echo '			</li>';

                                        }
                                    }
                                    echo '		</ul>';
                                    echo '</li>';

                                }
                            }
                            if ($project_counter == 0) {
                                echo '<li><span class="blue">No Project Found</span></li>';
                            }
                            ?>


                        </ul>
                        <button name="project_thesis_add_project_btn" class="btn btn-small btn-success"  id="'11'">
                            <i class="icon-external-link"></i>
                            Add Project
                        </button>
                    </div>

                    <div id="project_thesis_view_thesis" class="tab-pane">
                        <ul class="nav nav-list">

                            <?php


                            if (count($project_thesis) == 0) {
                                echo '<li><span class="blue">No Data Found</span></li>';
                            }
                            $thesis_counter=0;
                            foreach ($project_thesis as $row1) {

                                if ($row1->type == 'thesis' && $row1->user_id == '22') {
                                    $thesis_counter++;
                                    echo '<li>';
                                    echo '	<a href="#" class="dropdown-toggle">';
                                    echo '		<i class="icon-desktop"></i>';
                                    echo '		<span class="menu-text">';
                                    echo $row1->title;
                                    echo ' <b>(';
                                    echo $row1->status;
                                    echo ')</b>';
                                    echo '        </span>';

                                    echo '        &nbsp;&nbsp;<button name="project_thesis_view_project_thesis_details" class="btn btn-small btn-warning"  id="' . $row1->project_thesis_id . '">
                    <i class="icon-wrench"></i>
                    View Details
                    </button>';
                                    echo '        &nbsp;&nbsp;<button name="project_thesis_modify_project_thesis" class="btn btn-small btn-warning"  id="' . $row1->project_thesis_id . '">
                    <i class="icon-wrench"></i>
                    Modify Thesis
                    </button>';
                                    echo '        <b class="arrow icon-angle-down"></b>';
                                    echo '    </a>';
                                    echo '        <ul class="submenu">';

                                    foreach ($project_thesis_files as $row2) {

                                        if ($row1->project_thesis_id == $row2->project_thesis_id) {


                                            echo '			<li>';
                                            echo '				<a href="#" class="dropdown-toggle">
                            <i class="icon-double-angle-right"></i>';
                                            echo $row2->file_name;;

                                            echo '					&nbsp;&nbsp;<button name="project_thesis_project_thesis_download" class="btn btn-small btn-grey"  id="' . $row2->project_thesis_files_id . '">
                            <i class="icon-download-alt"></i>
                            Download
                            </button>';

                                            echo '					<b class="arrow icon-angle-down"></b>';
                                            echo '				</a>';
                                            echo '			</li>';

                                        }
                                    }
                                    echo '		</ul>';
                                    echo '</li>';

                                }
                            }
                            if ($thesis_counter == 0) {
                                echo '<li><span class="blue">No Thesis Found</span></li>';
                            }
                            ?>


                        </ul>
                        <button name="project_thesis_add_thesis_btn" class="btn btn-small btn-success"  id="'11'">
                            <i class="icon-external-link"></i>
                            Add Thesis
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
</div>

<div id="project_thesis_modal_view_project_thesis" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Details
        </div>
    </div>

    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>
                        <i class="icon-time bigger-110"></i>
                        Modificaton Date
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td id = "project_thesis_title_td"></td>
                    <td id = "project_thesis_description_td"></td>
                    <td id = "project_thesis_status_td"></td>
                    <td id = "project_thesis_modify_date_td"></td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-footer">
        <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
            <i class="icon-remove"></i>
            Close
        </button>


    </div>
</div>



<div id="project_thesis_modal_add_project" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>


    <form id="project_thesis_add_project_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Project Title</label>

                        <div class="controls">
                            <input type="text" id="form-field-username" name="project_title" placeholder="Project Title" value="" required/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-first">Project Description</label>

                        <div class="controls">
                            <textarea class="span12" id="form-field-8" name="project_description" placeholder="Description"></textarea>
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

            <button type="submit" class="btn btn-small btn-primary">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>


<div id="project_thesis_modal_add_thesis" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>


    <form id="project_thesis_add_thesis_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Thesis Title</label>

                        <div class="controls">
                            <input type="text" id="form-field-username" name="thesis_title" placeholder="Thesis Title" value="" required/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-first">Thesis Description</label>

                        <div class="controls">
                            <textarea class="span12" id="form-field-8" name="thesis_description" placeholder="Description"></textarea>
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

            <button type="submit" class="btn btn-small btn-primary">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>

<div id="project_thesis_add_success" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Successfully Added</h4>
    </div>


    <div class="modal-footer">
        <button class="btn btn-small" data-dismiss="modal">
            <i class="icon-ok"></i>
            OK
        </button>

    </div>
</div>



<div id="project_thesis_modal_modify_project_thesis" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Modify the Information</h4>
    </div>


    <form id="project_thesis_modify_project_thesis_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Title</label>

                        <div class="controls">
                            <input type="text" id="title" name="title" /> 
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-first">Description</label>

                        <div class="controls">
                            <textarea class="span12" id="description" name="description"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Status</label>

                        <div class="controls">
                            <select id="status" name="status">
                                <option value="activated" >Active</option>
                                <option value="deactivated">Deactive</option>  
                            </select>
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

            <button type="submit" class="btn btn-small btn-primary">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>                        
</div>

<div id="project_thesis_modify_success" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Successfully Modified</h4>
    </div>


    <div class="modal-footer">
        <button class="btn btn-small" data-dismiss="modal">
            <i class="icon-ok"></i>
            OK
        </button>

    </div> 
</div>