<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Batch Management
            <small>
                <i class="icon-double-angle-right"></i>
                Promote Batch
            </small>
        </h1>
    </div><!--/.page-header-->
    <h4 class="blue">
        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
        Programs
        <i class="icon-double-angle-right"></i>
        Batches
        <i class="icon-double-angle-right"></i>
        Semesters          
    </h4>
    <div class="hr hr32 hr-dotted"></div>

    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->

            <ul class="nav nav-list">

                <?php


                if(count($programs)==0){
                    echo '<li><span class="blue">No Data Found</span></li>';
                }
                foreach($programs as $row1){

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


                    foreach($batches as $row2){

                        if($row1->program_id==$row2->program_id){


                            echo '            <li>';
                            echo '                <a href="#" class="dropdown-toggle">
                            <i class="icon-double-angle-right"></i>';
                            echo                     $row2->batch_name    ;
                            echo  ' <b>(';
                            echo $row2->status;
                            echo ')</b>';
                            $promotable=1;
                            foreach($students as $row4){
                                if($row1->program_id==$row2->program_id && $row2->batch_id==$row4->batch_id){
                                    if($row4->re_admission_status=='activated'){
                                        $promotable=0;
                                    }
                                }
                            }                                                                             
                            if($promotable==1){
                                echo '                    &nbsp;&nbsp;<button name="batch_management_batch_promote" class="btn btn-small btn-grey"  id="'.$row2->batch_id.'">
                                <i class="icon-key"></i>
                                Promote Batch
                                </button>';
                            }
                            else{             
                                echo '                    &nbsp;&nbsp;<button name="batch_management_batch_no_promote" class="btn btn-danger btn-small"  id="'.$row2->batch_id.'">
                                <i class="icon-reply icon-only"></i>
                                </button>';
                            }

                            echo'                    <b class="arrow icon-angle-down"></b>';
                            echo '                </a>';


                            echo '                <ul class="submenu">';


                            foreach($semesters as $row3){
                                if($row1->program_id==$row2->program_id && $row2->batch_id==$row3->batch_id){
                                    echo '            <li>
                                    <a href="#" class="dropdown-toggle" style="text-decoration: none;">
                                    <i class="icon-pencil"></i>';

                                    echo                     $row3->semester_log_name;
                                    echo  ' <b>(';
                                    echo $row3->status;
                                    echo ')</b>';

                                    echo '                    &nbsp;&nbsp;<button name="batch_management_batch_semester_view_details_btn" class="btn btn-small btn-yellow"  id="'.$row3->semester_log_id.'">
                                    <i class="icon-bar-chart"></i>
                                    View Details
                                    </button>';   
                                    if($row3->academic_status=="active")
                                    {
                                        echo  ' <font color="red"><i class="icon-asterisk"></i><b>';
                                        echo 'active';
                                        echo '</b></font>';
                                    }
                                    echo '                    </a>
                                    </li>';
                                }

                            }

                            echo '                </ul>';

                            echo '            </li>';

                        }

                    }
                    echo '        </ul>';
                    echo '</li>';

                }
                ?>

            </ul>

            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>

<div id="program_management_modal_batch_no_promote_msg" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Re-add pending students to promote batch</h4>
        <h5><i class="icon-hand-right icon-animated-hand-pointer blue"></i>Check for pending students in 'Batch Management <i class="icon-double-angle-right"></i> View Batch Stucture'</h5>
        <h5><i class="icon-hand-right icon-animated-hand-pointer blue"></i>Re-add students in 'Batch Management <i class="icon-double-angle-right"></i> Manage Batch'</h5>
    </div>


    <div class="modal-footer">
        <button class="btn btn-small" data-dismiss="modal">
            <i class="icon-ok"></i>
            OK
        </button>

    </div> 
</div>


<div id="batch_management_modal_view_batch_semester" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Semester Details
        </div>
    </div>

    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                    <tr>

                        <th>Batch Semester Name</th>
                        <th>Related Semester Name</th>        
                        <th>
                            <i class="icon-time bigger-110"></i>
                            Starting Date
                        </th> 
                        <th>
                            <i class="icon-time bigger-110"></i>
                            Ending Time
                        </th>
                        <th>Status</th>
                        <th>Academic Status</th>
                        <th>
                            <i class="icon-time bigger-110"></i>
                            Modification Date
                        </th> 
                        <th>
                            <i class="icon-time bigger-110"></i>
                            Modification Time
                        </th>
                        <th>User</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>   
                        <td id="batch_management_batch_semester_log_name_td"></td> 
                        <td id="batch_management_batch_semester_name_td"></td>
                        <td id="batch_management_batch_semester_start_time_td"></td> 
                        <td id="batch_management_batch_semester_end_time_td"></td>  
                        <td id="batch_management_batch_semester_status_td"></td>
                        <td id="batch_management_batch_semester_academic_status_td"></td>
                        <td id="batch_management_batch_semester_date_td"></td>  
                        <td id="batch_management_batch_semester_time_td"></td>  
                        <td id="batch_management_batch_semester_user_td"></td>  
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



<div id="batch_management_modal_promote_batch" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>

    <form id="batch_management_promote_batch_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>
                <div  class="slim-scroll" data-height="400">

                    <div class='control-group'>
                        <label class='control-label' for='form-field-username' style="display: inline-block;">Select Semester:  </label>
                        <select id='batch_management_semsester_selection' name='batch_management_semsester_selection'>
                        </select>
                    </div>    
                    <table id="batch_management_semester_course_details_table" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                        <thead>
                            <tr>

                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Course Credit</th> 
                                <th>Assign Course Teacher</th>          
                            </tr>
                        </thead>

                        <tbody>
                            <tr>                                                               
                            </tr>


                        </tbody>
                    </table>
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


<div id="batch_management_modal_no_semester_to_add" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">No semesters in the program to promote the batch</h4>
        <h5><i class="icon-hand-right icon-animated-hand-pointer blue"></i>Create semester for the program in 'Program Management <i class="icon-double-angle-right"></i> Manage Program Stucture'</h5>       
    </div>


    <div class="modal-footer">
        <button class="btn btn-small" data-dismiss="modal">
            <i class="icon-ok"></i>
            OK
        </button>

    </div> 
</div>


<div id="batch_management_promote_success" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Batch Successfully Promoted</h4>
    </div>


    <div class="modal-footer">
        <button class="btn btn-small" data-dismiss="modal">
            <i class="icon-ok"></i>
            OK
        </button>

    </div> 
</div>