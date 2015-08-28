
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
    foreach ($courses_of_student as $row) {
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
foreach ($courses_of_student as $courses) {
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
                   
                    <span><strong>Student Name: </strong></span><?php echo $courses->full_name?> 
					</td>
				</tr>
				<tr>
					<th>Date</th>
					<th > Attendance Status</th>
				</tr>
					 
			<?php
			
                $no_data=0;
				$no_yes=0;
				$no_no=0;
				
                foreach ($students_attendance_of_courses as $attendances) {
				
                    if ($attendances->course_id == $courses->course_id) {

						$no_data++;
						if($attendances->attendance_status=='yes'){
							$no_yes++;
						}
						else if($attendances->attendance_status=='no'){
							$no_no++;
						}
                        ?>

                        <tr>
						<td><?php echo $attendances->attendance_date?></td>

                            <td><?php echo $attendances->attendance_status?></td>
						
                            
                        </tr>
                    <?php
                    }
				 }
				 if($no_data <=0){
                 ?> 
				  <tr>
					<td colspan=2 > <?php  echo 'No attendance found under this course!';?></td>
				 </tr>
				 
				
				 
				 <?php } else?>
				 <tr>
					<th><?php if($no_data >0) {?> Total Percentage</th>
					<th><?php echo round(($no_yes*100)/$no_data,2).'%';  }?></th>
				 </tr>
				 
                </tbody>
            </table>
        </div>
		
          
     <?php 
          } else { ?>
	
		<div id="<?php echo $courses->course_id ?>" class="tab-pane">

		
            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <thead> </thead>
				<tbody>
                <tr>
				
                    <td colspan=2> <span> <strong>Course Name: </strong></span><?php echo $courses->course_title?> </br></br>
                   
                    <span><strong>Student Name: </strong></span><?php echo $courses->full_name?> 
					</td> 
					
				</tr>
				<tr>
					<th >Date</th>
					<th > Attendance Status</th>
				</tr>
					

			<?php
			
             $no_data=0;
			 $no_yes=0;
			 $no_no=0;
				
                foreach ($students_attendance_of_courses as $attendances) {
				
                    if ($attendances->course_id == $courses->course_id) {
						$no_data++;
						if($attendances->attendance_status=='yes'){
							$no_yes++;
						}
						else if($attendances->attendance_status=='no'){
							$no_no++;
						}
                        ?>

                        <tr>
						<td ><?php echo $attendances->attendance_date?></td>

                            <td ><?php echo $attendances->attendance_status?></td>
						
                            
                        </tr>
                    <?php
                    }
				 }
                	if($no_data <=0){
                 ?> 
				  <tr>
					<td colspan=2 > <?php  echo 'No attendance found under this course!';?></td>
				 </tr>
				 
				
				 
				 <?php } else?>
				 <tr>
					<th><?php if($no_data >0) {?> Total Percentage</th>
					<th><?php echo round(($no_yes*100)/$no_data,2).'%';  }?></th>
				 </tr>
				</tbody>
            </table>
			
		</div>
			 <?php
               }
			}
           ?>    				
	<?php


			if ($no_course < 1) {
				echo 'You are not assigned to any courses recently.';
			}

	?>

        

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






							
					
					
