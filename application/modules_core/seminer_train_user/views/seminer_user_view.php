
</br></br></br></br>
<div class="row-fluid breadcrumbs margin-bottom-40">
    <div class="container">
        <h3 class="pull-left">Seminer list</h3>
        </div><!--/container-->
</div><!--/breadcrumbs-->
<div class="page-content">
<div class="hr hr32 hr-dotted"></div>

<div class="row-fluid">
<div class="span12">
<!--PAGE CONTENT BEGINS-->
<div class="row-fluid">
<div class="span12">
<div class="tabbable">
<div class="tab-content">

<?php
    $first = true;
    foreach ($faculty_member as  $courses ) {

        if ($first) {
            ?>

        <div  class="tab-pane in active">

                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="hidden-480"   style="color:#3A87AD;">Title</th>
										        <th class="hidden-480"   style="color:#3A87AD;">View</th>
											   
                                            </tr>
										</thead>

										<tbody>

                                               <?php
                                            $nodata=0;
                                       foreach ($faculty_member as $col) {
                                              if($col->ID == $col->ID){
                                             $nodata++;
                                               ?>

											<tr>
												<td>
                                                <?php echo $col->Seminer_Title?>
                                                </td>
                                                <td >
                                                <a href="<?=base_url('internal/application/modules_core/uploads/'.$col->Seminer_des)?>" target="_blank">view</a>
                                                </td>
                                                </td>
                                              
                                                </tr>
                                                       <?php
                                                         }
                                                         }
                                                         if($nodata<1){
                                                       ?>
										<tr><td colspan='7'><?php echo 'No assignment is found under that course' ?></td></tr>
																<?php	}
																	?>

										</tbody>
									</table>





         </div>





<!--                <?php
            $first = false;

                }

             else {

            ?>




        <div  class="tab-pane ">


              <table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="hidden-480"   style="color:#3A87AD;">Assignments name</th>
										            <th class="hidden-480"   style="color:#3A87AD;">Students name</th>
											      <th class="hidden-phone" style="color:#3A87AD;">Roll</th>
                                                                        <th class="hidden-480"   style="color:#3A87AD;">Assignments description</th>
                                                                        <th class="hidden-480"    style="color:#3A87AD;">Assignments size</th>
                                                                        <th class="hidden-480"  style="color:#3A87AD;">
                                                                             <i class="icon-time bigger-110 hidden-phone"></i>
                                                                             Uploaded time
                                                                         </th>

												<th class="hidden-480"></th>
											</tr>
										</thead>


										<tbody>

                                               <?php
                                           $nodata=0;
                                       foreach ($documents as $col) {
                                              if($col->course_code == $courses->course_code){
                                               $nodata++;
                                               ?>

											<tr>
												<td>
                                                                        <?php echo $col->document_name?>
                                                                        </td>
                                                                       	<td>
                                                                        <?php echo $col->user_name?>
                                                                        </td>
                                                                        <td >
                                                                        <?php echo $col->student_id ?>
                                                                        </td>
                                                                        <td>
                                                                        <?php echo $col->document_description?>
                                                                        </td>
                                                                        <td>
                                                                        <?php echo $col->document_size?>
                                                                        </td>
                                                                        <td>
                                                                        <?php echo $col->uploaded_time?>
                                                                         </td>

                                                                         <td>
                                                                         <a class="btn btn-info btn-small tooltip-info" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Bottm Info" href='student_documents/download/<?php echo $col->document_dir?>'>download</a>
                                                                        </td>
																		 <td class="center">
                                                                         <a class="btn btn-danger btn-small tooltip-error" data-rel="tooltip" data-placement="top" title="" data-original-title="Top Danger"  href='student_documents/delete_assignment/<?php echo $col->document_dir?>'>delete</a>
                                                                        </td>


											</tr>
                                                       <?php
                                                         }
                                                         }
                                                        if($nodata<1){
                                                       ?>
										<tr><td colspan='7'><?php echo 'No assignment is found under that course' ?></td></tr>
																<?php	}
																	?>


										</tbody>
									</table>



         </div>





     <?php
        }

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


<div id="modal_view_exams" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Exam Details
        </div>
    </div>
    <div class="slim-scroll" data-height="100">
        <div class="modal-body no-padding">
            <div class="row-fluid">
                <ul class="unstyled spaced2">
                    <li>
                        <ul class="inline">
                            <li>
                                <i class="icon-share-alt green"></i>
                                Exam Name : &nbsp;
                            </li>
                            <li id="view_exam_name_id"></li>
                        </ul>

                    </li>
                    <li>
                        <ul class="inline">
                            <li>
                                <i class="icon-share-alt green"></i>
                                Exam Type : &nbsp;
                            </li>
                            <li id="view_exam_name_id"></li>
                        </ul>

                    </li>
                    <li>
                        <ul class="inline">
                            <li>
                                <i class="icon-share-alt green"></i>
                                Total Marks : &nbsp;
                            </li>
                            <li id="view_total_marks_id"></li>
                        </ul>

                    </li>
                    <li>
                        <ul class="inline">
                            <li>
                                <i class="icon-share-alt green"></i>
                                Percentage : &nbsp;
                            </li>
                            <li id="view_percentage_id"></li>
                        </ul>

                    </li>
                    <li>
                        <ul class="inline">
                            <li>
                                <i class="icon-share-alt green"></i>
                                Exam Date : &nbsp;
                            </li>
                            <li id="view_exam_date_id"></li>
                        </ul>

                    </li>
                    <li>
                        <ul class="inline">
                            <li>
                                <i class="icon-share-alt green"></i>
                                Status : &nbsp;
                            </li>
                            <li id="view_exam_status_id"></li>
                        </ul>

                    </li>

                </ul>
            </div>
        </div>

    </div>
    <div class="modal-header no-padding">
        <div class="table-header">

            View Exam Results
        </div>
    </div>
    <div class="slim-scroll" data-height="200">
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

                    <tbody>
                    <tr>
                        <td id="student_name_td"></td>
                        <td id="student_roll_td"></td>
                        <td id="student_marks_td"></td>

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
            <i class="icon-remove"></i>
            Close
        </button>


    </div>
</div>









