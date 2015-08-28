<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Batch Management
            <small>
                <i class="icon-double-angle-right"></i>
                View Batch Structure
            </small>
        </h1>
    </div><!--/.page-header-->
    <h4 class="blue">
        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
        Programs
        <i class="icon-double-angle-right"></i>
        Batches
        <i class="icon-double-angle-right"></i>
        Students            
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


                            echo '                    &nbsp;&nbsp;<button name="batch_management_batch_view_details" class="btn btn-small btn-grey"  id="'.$row2->batch_id.'">
                            <i class="icon-bar-chart"></i>
                            View Details
                            </button>';
                            
                            

                            echo'                    <b class="arrow icon-angle-down"></b>';
                            echo '                </a>';


                            echo '                <ul class="submenu">';


                            foreach($students as $row3){
                                if($row1->program_id==$row2->program_id && $row2->batch_id==$row3->batch_id){
                                    echo '            <li>
                                    <a href="#" class="dropdown-toggle" style="text-decoration: none;">
                                    <i class="icon-pencil"></i>';

                                    echo                     $row3->roll_number;
                                    echo  ' <b>(';
                                    echo $row3->status;
                                    echo ')</b>';

                                    echo '                    &nbsp;&nbsp;<button name="batch_management_student_view_details" class="btn btn-small btn-yellow"  id="'.$row3->user_id.'">
                                    <i class="icon-bar-chart"></i>
                                    View Details
                                    </button>';   
                                    if($row3->re_admission_status=="activated")
                                    {
                                        echo  ' <font color="red"><i class="icon-exclamation-sign"></i><b>';
                                        echo 'pending';
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


<div id="batch_management_modal_view_batch" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Batch Details
        </div>
    </div>

    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                    <tr>
                        <th>Batch Name</th>
                        <th>Semester</th>
                        <th>Academic Status</th>
                        <th>Status</th>
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
                        <td id="batch_management_batch_name_td"></td>
                        <td id="batch_management_batch_semester_name_td"></td>
                        <td id="batch_management_batch_academic_status_td"></td>
                        <td id="batch_management_batch_status_td"></td> 
                        <td id="batch_management_batch_date_td"></td>   
                        <td id="batch_management_batch_time_td"></td>   
                        <td id="batch_management_batch_user_td"></td>    
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

<div id="batch_management_modal_view_student" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Student Details
        </div>
    </div>

    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Roll Number</th>
                        <th>Registration Number</th> 
                        <th>Status</th>
                        <th>Re-Admission Status</th>
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
                        <td id="batch_management_student_name_td"></td>
                        <td id="batch_management_student_roll_td"></td>
                        <td id="batch_management_student_registration_td"></td>
                        <td id="batch_management_student_status_td"></td>
                        <td id="batch_management_student_readd_status_td"></td>
                        <td id="batch_management_student_date_td"></td>  
                        <td id="batch_management_student_time_td"></td>  
                        <td id="batch_management_student_user_td"></td>  
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
