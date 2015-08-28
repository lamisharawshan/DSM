

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
<div class="page-content">

<h4 class="blue">
    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
    Courses
    <i class="icon-double-angle-right"></i>
    Course Attendance
</h4>

<div class="hr hr32 hr-dotted"></div>

<div class="row-fluid">
<div class="span12">
<!--PAGE CONTENT BEGINS-->
<div class="row-fluid">
<div class="span12">
<div class="tabbable">
<ul class="nav nav-tabs" id="myTab">

    <?php
	
    $first = true;
    foreach ($courses_of_teacher as $row) {
        if ($first) {
            ?>
            <li class="active">
                <a data-toggle="tab" href="#<?php echo $row->course_id ?>">
                    <i class="icon-list-alt"></i>
                    <?php echo $row->course_code ?>
                </a>
            </li>
            <?php
            $first = false;
        } else {
            ?>
            <li>
                <a data-toggle="tab" href="#<?php echo $row->course_id ?>">
                    <i class="icon-list-alt"></i>
                    <?php echo $row->course_code ?>
                </a>
            </li>

        <?php
        }

    }

    ?>

</ul>

<div class="tab-content">


<?php
$no_course = 0;
$first_tab = true;
foreach ($courses_of_teacher as $courses) {
    $no_course++;

    if ($first_tab) {
        $first_tab = false;
	
		
        ?>
        <div id="<?php echo $courses->course_id ?>" class="tab-pane in active">

		
            <table id="<?php echo $courses->course_id ?>" class="table table-striped table-bordered table-hover">
                <thead> </thead>
				<tbody>
                <tr>
				
                    <td colspan=2> <span> <strong>Course Name: </strong></span><?php echo $courses->course_title?> </br></br>
                   
                    <span><strong>Course Teacher Name: </strong></span><?php echo $courses->full_name?> 
					</td>
					<td colspan="2"> Date
						
							<div class="control-group">
								<div class="row-fluid input-append">
									<input class="span10 date-picker" type="text" id="attendance_date_id"
									       name="attendance_date"
									       data-date-format="dd-M-yyyy"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
								</div>
							</div>
						</td>
                    
                </tr>
				<tr>
					<th>Name</th>
					<th>Roll No</th>
					<th colspan = 2> Status</th>
				</tr>

                <?php
                $no_data = 0;
				
                foreach ($students_of_courses as $students) {
				
                    if ( $students->semester_log_id == $courses->semester_log_id && $students->course_id == $courses->course_id) {

		
		
                        $no_data++;
                        ?>

                        <tr>
						<td><?php echo $students->full_name?></td>

                            <td><?php echo $students->roll_number?></td>
							
							
							
							
										<div class="control-group">

											<div class="controls">
												
												<td>	<input name="<?php echo $students->roll_number  ?>" type="radio" />
													<span class="lbl"> Yes</span> </td>
												
												
													<td><input name="<?php echo $students->roll_number  ?>" type="radio" />
													<span class="lbl"> No</span></td>
												
													
												
										</div>
									</div>
								

                            
                        </tr>
                    <?php
                    }
				 }
                ?>
				
				
				<div class="hidden-phone visible-desktop btn-group">
                                    <td colspan=4> <button class="btn btn-success btn-block" name="teacher_view_attendance_btn">
                                        <i class="icon-ok bigger-120"></i>
                                        View Attendance
                                    </button> 
									
                                    <button class="btn btn-warning btn-block" name="teacher_save_attendance_btn">
                                        <i class="icon-edit bigger-120"></i>
                                        Save Attendance
                                    </button>
									
                                  </td>
                                </div>
								
								<div class="hidden-desktop visible-phone">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="icon-cog icon-only bigger-110"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																										<span
                                                                                                            class="blue">
																											<i class="icon-zoom-in bigger-120"></i>
																										</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																										<span
                                                                                                            class="green">
																											<i class="icon-edit bigger-120"></i>
																										</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																										<span
                                                                                                            class="red">
																											<i class="icon-trash bigger-120"></i>
																										</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
									
                </tbody>
            </table>
        </div>


    <?php } else { ?>
        <div id="<?php echo $courses->course_id ?>" class="tab-pane">

		
            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <thead> </thead>
				<tbody>
                <tr>
				
                    <td colspan=2> <span> <strong>Course Name: </strong></span><?php echo $courses->course_title?> </br></br>
                   
                    <span><strong>Course Teacher Name: </strong></span><?php echo $courses->full_name?> 
					</td> 
					<td colspan="2"> Date
						
							<div class="control-group">
								<div class="row-fluid input-append">
									<input class="span10 date-picker" type="text" id="attendance_date_id"
									       name="attendance_date"
									       data-date-format="dd-M-yyyy"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
								</div>
							</div>
						</td>
                </tr>
				<tr>
				<th>Name</th>
				<th>Roll No</th>
				<th colspan = 2> Status</th>
				</tr>
                <?php
                $no_data = 0;
				
                foreach ($students_of_courses as $students) {
				
			
                    if ($students->semester_log_id == $courses->semester_log_id && $students->course_id == $courses->course_id) {

                        $no_data++;
                        ?>

                        <tr>

                            <td><?php echo $students->full_name?></td>
							<td><?php echo $students->roll_number?></td>
							
							
							
							
										<div class="control-group">

											<div class="controls">
												
												<td>	<input name="<?php echo $students->roll_number  ?>" type="radio" />
													<span class="lbl"> Yes</span> </td>
												
												
													<td><input name="<?php echo $students->roll_number  ?>" type="radio" />
													<span class="lbl"> No</span></td>
												
													
												
										</div>
									</div>
								
								
                        </tr>
                    <?php
                    }
                }

                ?>
				
				
				<div class="hidden-phone visible-desktop btn-group">
                                 <td colspan=4>    <button class="btn btn-warning btn-block" name="teacher_view_attendance_btn">
                                        <i class="icon-ok bigger-120"></i>
                                        View Attendance
                                    </button>

                                    <button class="btn btn-success btn-block" name="teacher_save_attendance_btn">
                                        <i class="icon-edit bigger-120"></i>
                                        Save Attendance
                                    </button>

									</td>
                                </div>
								
								
								<div class="hidden-desktop visible-phone">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="icon-cog icon-only bigger-110"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																										<span
                                                                                                            class="blue">
																											<i class="icon-zoom-in bigger-120"></i>
																										</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																										<span
                                                                                                            class="green">
																											<i class="icon-edit bigger-120"></i>
																										</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																										<span
                                                                                                            class="red">
																											<i class="icon-trash bigger-120"></i>
																										</span>
                                                </a>
                                            </li>
                                        </ul>
										
                                    </div>
                </tbody>
            </table>


        </div>

            <?php
                    }
                }
                if ($no_data < 1) {
                    ?>
                    <tr>
                        <td colspan='7'><?php echo 'No exams are found under that course' ?></td>
                    </tr>
                <?php
                }
                ?>


                </tbody>
            </table>


        </div>


<div id="profile" class="tab-pane">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
</div>


</div>
</div>
</div>
<!--/span-->


</div>
<!--/row-->

<!--PAGE CONTENT ENDS-->
</div>
<!--/.span-->
</div>
<!--/.row-fluid-->
</div>



<div id="teacher_view_attendance_div" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			View Attendance
		</div>
	</div>


	<div class="modal-body no-padding">
		<div class="row-fluid">
			<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
				<thead>
				<tr>
					<th>Student Name</th>
					<th>Student Roll</th>
					<th>Marks</th>
				</tr>
				</thead>

				<tbody id="attendance_table_body">


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

<script src=”<?php echo base_url()?>/assets/js/jquery-1.4.4.min.js” type=”text/javascript”></script>

<script src=”<?php echo base_url()?>/assets/js/jquery-ui-1.8.8.custom.min.js” type=”text/javascript”></script>
<script>
$(document).ready(function() {

	$("#attendance_date_id").datepicker();

});
</script>

		<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/date-time/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/date-time/daterangepicker.min.js"></script>
		







							
					
					
