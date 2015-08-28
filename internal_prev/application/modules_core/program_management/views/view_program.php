<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Program Management
            <small>
                <i class="icon-double-angle-right"></i>
                View Program Structure   
            </small>
        </h1>
    </div><!--/.page-header-->
    <h4 class="blue">
        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
        Programs
        <i class="icon-double-angle-right"></i>
        Semesters
        <i class="icon-double-angle-right"></i>
        Courses			
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
                    echo '	<a href="#" class="dropdown-toggle">';
                    echo '		<i class="icon-desktop"></i>';
                    echo '		<span class="menu-text">'; 
                    echo 		$row1->program_name ;
                    echo  ' <b>(';
                    echo $row1->status;
                    echo ')</b>';
                    echo '        </span>';
                    
                    echo '        &nbsp;&nbsp;<button name="program_management_program_view_details" class="btn btn-small btn-warning"  id="'.$row1->program_id.'">
                    <i class="icon-wrench"></i>
                    View Details
                    </button>';
                    echo'        <b class="arrow icon-angle-down"></b>';
                    echo '    </a>';
                    echo '        <ul class="submenu">';
                    
                    foreach($semesters as $row2){

                        if($row1->program_id==$row2->program_id){


                            echo '			<li>';
                            echo '				<a href="#" class="dropdown-toggle">
                            <i class="icon-double-angle-right"></i>';
                            echo 					$row2->semester_name	;
                            echo  ' <b>(';
                            echo $row2->status;
                            echo ')</b>';

                            echo '					&nbsp;&nbsp;<button name="program_management_semester_view_details" class="btn btn-small btn-grey"  id="'.$row2->semester_id.'">
                            <i class="icon-bar-chart"></i>
                            View Details
                            </button>';

                            echo'					<b class="arrow icon-angle-down"></b>';
                            echo '				</a>';


                            echo '				<ul class="submenu">';


                            foreach($courses as $row3){
                                if($row1->program_id==$row2->program_id && $row2->semester_id==$row3->semester_id){
                                    echo '			<li>
                                    <a href="#" class="dropdown-toggle" style="text-decoration: none;">
                                    <i class="icon-pencil"></i>';

                                    echo 					$row3->course_title;
                                    echo  ' <b>(';
                                    echo $row3->status;
                                    echo ')</b>';

                                    echo '					&nbsp;&nbsp;<button name="program_management_course_view_details" class="btn btn-small btn-yellow"  id="'.$row3->course_id.'">
                                    <i class="icon-bar-chart"></i>
                                    View Details
                                    </button>';
                                    echo '					</a>
                                    </li>';
                                }

                            }

                            echo '				</ul>';

                            echo '			</li>';

                        }

                    }
                    echo '		</ul>';
                    echo '</li>';

                }
                ?>
                <!--<li>
                <a href="#" class="dropdown-toggle">
                <i class="icon-desktop"></i>
                <span class="menu-text"> BSSE </span>
                <button class="btn btn-small btn-modify" data-target="#modal-table" data-toggle="modal" id="2">
                <i class="icon-fire"></i>
                Warning
                </button>
                <b class="arrow icon-angle-down"></b>
                </a>

                <ul class="submenu">

                <li>
                <a href="#" class="dropdown-toggle">
                <i class="icon-double-angle-right"></i>

                Semester
                <button class="btn btn-small btn-modify" data-target="#modal-table" data-toggle="modal" id="1">
                <i class="icon-fire"></i>
                Warning
                </button>


                <b class="arrow icon-angle-down"></b>
                </a>

                <ul class="submenu">


                <li>
                <a href="#" class="dropdown-toggle">
                <i class="icon-pencil"></i>

                Course
                <b class="arrow icon-angle-down"></b>
                </a>

                <ul class="submenu">

                <li>
                <a href="#modal-table" data-toggle="modal" >
                <i class="icon-print"></i>
                View Course
                </a>
                </li>

                <li>
                <a href="#modal-table" data-toggle="modal" >
                <i class="icon-plus"></i>
                Add Course
                </a>
                </li>
                <li>
                <a href="#modal-table" data-toggle="modal" >
                <i class="icon-wrench"></i>
                Modify Course
                </a>
                </li>


                </ul>



                </li>
                </ul>
                </li>



                </ul>
                </li>-->

            </ul>





            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>

<!--<h4 class="pink">
<i class="icon-hand-right icon-animated-hand-pointer blue"></i>
<a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a>
</h4>
<button class="btn btn-small btn-modify" data-target="#modal-table" data-toggle="modal">
<i class="icon-fire"></i>
Warning
</button>-->


<div id="program_management_modal_view_program" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Program Details
        </div>
    </div>

    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                    <tr>
                        <th>Program Name</th>
                        <th>Program Description</th>
                        <th>Status</th>

                        <th>
                            <i class="icon-time bigger-110"></i>
                            Modificaton Date
                        </th>
                        <th>
                            <i class="icon-time bigger-110"></i>
                            Modificaton Time
                        </th>
                        <th>User</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td id = "program_management_program_name_td"></td>
                        <td id = "program_management_program_description_td"></td>
                        <td id = "program_management_program_status_td"></td>
                        <td id = "program_management_program_date_td"></td>
                        <td id = "program_management_program_time_td"></td>
                        <td id = "program_management_program_user_td"></td>
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



<div id="program_management_modal_view_semester" class="modal hide fade" tabindex="-1">
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

                        <th>Semester Name</th>
                        <th>Program</th>
                        <th>Total Credit</th>
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
                        <td id="program_management_semester_name_td"></td>
                        <td id="program_management_semester_program_name_td"></td>
                        <td id="program_management_semester_credit_td"></td>
                        <td id="program_management_semester_status_td"></td>
                        <td id="program_management_semester_date_td"></td>
                        <td id="program_management_semester_time_td"></td>
                        <td id="program_management_semester_user_td"></td>
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


<div id="program_management_modal_view_course" class="modal hide fade" tabindex="-1" >
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Course Details
        </div>
    </div>

    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Semester</th>
                        <th>Program</th>

                        <th>Course Credit</th>
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
                        <td id="program_management_course_code_td"></td>
                        <td id="program_management_course_title_td"></td>
                        <td id="program_management_course_semester_name_td"></td> 
                        <td id="program_management_course_program_name_td"></td>
                        <td id="program_management_course_credit_td"></td>
                        <td id="program_management_course_status_td"></td>
                        <td id="program_management_course_date_td"></td>   
                        <td id="program_management_course_time_td"></td>   
                        <td id="program_management_course_user_td"></td>

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


