<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Program Management
            <small>
                <i class="icon-double-angle-right"></i>
                Program Notification
            </small>
        </h1>
    </div><!--/.page-header-->
    <h4 class="blue">
        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
        Programs
        <i class="icon-double-angle-right"></i>
        Notifications   
        <i class="icon-double-angle-right"></i>
        Uploaded Notification Files      
    </h4>
    <div class="hr hr32 hr-dotted"></div>

    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->

            <ul class="nav nav-list">

                <?php             

                $program_counter=0;
                foreach($programs as $row1){
                    $program_counter++;
                    echo '<li>';
                    echo '    <a href="#" class="dropdown-toggle">';
                    echo '        <i class="icon-desktop"></i>';
                    echo '        <span class="menu-text">'; 
                    echo         $row1->program_name ;
                    echo  ' <b>(';
                    echo $row1->status;
                    echo ')</b>';
                    echo '        </span>';

                    echo'        <b class="arrow icon-angle-down"></b>';
                    echo '    </a>';
                    echo '        <ul class="submenu">';

                    $notification_staus=1;
                    $notification_counter=0;
                    foreach($program_notifications as $row2){

                        if($row1->program_id==$row2->program_id){
                            $notification_counter++;

                            echo '            <li>';
                            echo '                <a href="#" class="dropdown-toggle" style="text-decoration: none;">
                            <i class="icon-double-angle-right"></i>';
                            echo                     $row2->notification;
                            echo  ' <b>(';
                            echo $row2->status;
                            echo ')</b>';

                            if($notification_staus==1){
                                echo '        &nbsp;&nbsp;<button name="program_management_add_program_notification_btn" class="btn btn-small btn-success"  id="'.$row1->program_id.'">
                                <i class="icon-edit"></i>
                                Add New Notification
                                </button>';
                                $notification_staus=0;
                            }
                            echo '                    &nbsp;&nbsp;<button name="program_management_view_notification_btn" class="btn btn-small btn-yellow"  id="'.$row2->program_notification_id.'">
                            <i class="icon-bar-chart"></i>
                            View Details
                            </button>';
                            echo '                    &nbsp;&nbsp;<button name="program_management_modify_notification_btn" class="btn btn-small btn-grey"  id="'.$row2->program_notification_id.'">
                            <i class="icon-wrench"></i>
                            Modify This Notification
                            </button>';
                            echo '                    </a> ';

                            echo '                <ul class="submenu">';


                            foreach($program_notification_files as $row3){
                                if($row1->program_id==$row2->program_id && $row2->program_notification_id==$row3->program_notification_id){
                                    echo '            <li>
                                    <a href="#" class="dropdown-toggle" style="text-decoration: none;">
                                    <i class="icon-pencil"></i>';

                                    echo                     $row3->file_name;
                                    echo '                    &nbsp;&nbsp;<button name="program_management_download_notification_file_btn" class="btn btn-small btn btn-purple"  id="'.$row3->program_notification_files_id.'">
                            <i class="icon-download-alt"></i>
                            Download
                            </button>';
                                    echo '                    </a>
                                    </li>';
                                }

                            }

                            echo '                </ul>';
                            echo '</li>';
                        }

                    }

                    if($notification_counter==0){
                        echo '    <li><a>    
                        <button name="program_management_add_program_notification_btn" class="btn btn-small btn-success" id="'.$row1->program_id.'">
                        <i class="icon-edit"></i>
                        Add New Notification
                        </button></a>
                        </li>';
                    }

                    echo '        </ul>';
                    echo '</li>';

                }

                if($program_counter==0){
                    echo '    <li>No programs
                    </li>';
                }
                ?>

            </ul>
            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>


<div id="program_management_modal_view_program_notification" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Program Notification Details
        </div>
    </div>

    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                    <tr>

                        <th>Notification</th>
                        <th>Program</th>
                        <th>Status</th> 
                        <th>Modification Date</th>
                        <th>
                            <i class="icon-time bigger-110"></i>
                            Modification Time
                        </th>
                        <th>User</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>   
                        <td id="notification_td"></td>
                        <td id="notification_program_name_td"></td> 
                        <td id="notification_status_td"></td>
                        <td id="notification_date_td"></td>
                        <td id="notification_time_td"></td>
                        <td id="notification_user_td"></td>
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



<div id="program_management_modal_add_notification" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>


    <form id="program_management_add_notification_form" method = "post" enctype="multipart/form-data">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>



                <div class="control-group">
                    <label class="control-label" for="form-field-username">Notification</label>

                    <div class="controls">
                        <textarea required class="span12" id="form-field-8" name="notification" placeholder="Notification"></textarea>
                    </div>

                    <div  class="slim-scroll" data-height="200">

                        <input type="file" name="files[]" /><br/>

                        <button type="button" class="btn btn-small" name="prog_mng_add_noti_file_btn" id="prog_mng_add_noti_file_btn">
                            Add Another File
                        </button>
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

<div id="program_management_notification_add_success" class="modal hide" tabindex="-1">
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


<div id="program_management_modal_modify_program_notification" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Modify the Information</h4>
    </div>


    <form id="program_management_modify_program_notification_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Notification</label>

                        <div class="controls">
                            <textarea required class="span12" id="notification" name="notification" ></textarea>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Status</label>

                        <div class="controls">
                            <select id="notification_status" name="notification_status">
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



<div id="program_management_notification_modify_success" class="modal hide" tabindex="-1">
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