<div class="page-content">

<h4 class="blue">
    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
    Documents
    <i class="icon-double-angle-right"></i>
    Books
</h4>

<div class="hr hr32 hr-dotted"></div>

<div class="row-fluid">
<div class="span12">
<!--PAGE CONTENT BEGINS-->
<div class="row-fluid">
<div class="span12">
<div class="tabbable">
<ul class="nav nav-tabs" id="myTab">
<div id="accordion2" class="accordion">
										     <div class="accordion-group">
											  <div class="accordion-heading">
												<a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed" align="center">
													Upload books
												</a>
											</div>
                                                            
											<div class="accordion-body collapse" id="collapseOne">
												<div class="accordion-inner">
													<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart('student_documents/do_upload',$attributes);?>
                                                                                <div class="control-group" >
									                             <label class="control-label" for="form-field-1">Book name</label>
                                                                                     <div class="controls">
										                                <input type="text" id="form-field-1" name="assname" placeholder="Book name" required />
									                                </div>
								                                 </div>
                                                                                  
                                                                                  <input type="hidden" name="documents_type" value="books" />
                                                                                  <input type="hidden" name="user_type" value="student" />
                                                                                  <div class="control-group">
                                                                                      <label class="control-label" for="form-field-1">Select course</label>
                                                                                      <div class="controls">
                                                                                         <select size="1" name="sample-table-2_length" aria-controls="sample-table-2">
                                                                                          <option value="select course" selected="selected">select course</option>
                                                                                          <?php
                                                                                          foreach($course_info as $select_coursecode)
                                                                                             {
                                                                                                  


                                                                                                    echo '<option value="' . $select_coursecode->course_code . '">' . $select_coursecode->course_code . '</option>';
                                                                                             }
                                                                                           ?>
                                                                                         </select>
                                                                                      </div>
                                                                                  
                                                                                   </div>  
                                                                                    <div class="control-group">
									                                 <label class="control-label" for="form-field-1">Book description</label>
                                                                                       <div class="controls">
										                                <textarea  id="form-field-9" cols="2" rows="2"  maxlength="50" name="doc_description"></textarea>
									                                </div>
								                                     </div>

                                                                                    <div class="control-group">
									                                  <label class="control-label" for="form-field-1">Choose file</label>
                                                                                         <div class="controls">
                                                                                          <input type="file" size="100" name="userfile" accept="application/pdf,application/msword"/>
										                             </div>
                                                        
								                                   </div>                                                                               
                                                                                       <div class="form-actions">
                                                                                         <input type="submit" id="form-field-1" class="btn btn-info" value="submit" />
                                                                                                &nbsp; &nbsp; &nbsp;
									                                   <button class="btn" type="reset">
										                               <i class="icon-undo bigger-110"></i>
										                                       Reset
									                                    </button>
                                                                                    </div>
                                                                                  <?php echo form_close(); ?> 

												</div>
											</div>
										</div>
</div>
    <?php
    $first = true;
    foreach ($course_info as $row) {
        if ($first) {
            ?>
            <li class="active">
                <a data-toggle="tab" href="#<?php echo $row->course_id ?>">
                    <i class="icon-list-alt"></i>
                    <?php echo $row->course_code?>
                </a>
            </li>
            <?php
            $first = false;
        } else {
            ?>
            <li>
                <a data-toggle="tab" href="#<?php echo $row->course_id?>">
                    <i class="icon-list-alt"></i>
                    <?php echo $row->course_code?>
                </a>
            </li>

        <?php
        }

    }

    ?>

</ul>


<div class="tab-content">

<?php
    $first = true;
    foreach ($course_info as $courses) {
        
        if ($first) {
            ?>        

        <div id="<?php echo $courses->course_id ?>" class="tab-pane in active">
        
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="hidden-480"   style="color:#3A87AD;">Books name</th>
										            <th class="hidden-480"   style="color:#3A87AD;">Students name</th>
										
                                                                        <th class="hidden-480"   style="color:#3A87AD;">Books description</th>
                                                                        <th class="hidden-480"    style="color:#3A87AD;">Books size</th>
                                                                        <th class="hidden-480"  style="color:#3A87AD;">
                                                                             <i class="icon-time bigger-110 hidden-phone"></i>
                                                                             Uploaded time
                                                                         </th>
												
												<th class="hidden-480"></th>
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
                                                                         <a class="btn btn-info btn-small tooltip-info" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Bottm Info"  href='student_documents/download/<?php echo $col->document_dir?>'>download</a>
                                                                        </td>

                                                                        <?php
                                                                   
                                               
                                                       if($col->user_id == 22){
                                                     
                                                                           ?>
                                                                      	 <td class="center">
                                                                         <a class="btn btn-danger btn-small tooltip-error" data-rel="tooltip" data-placement="top" title="" data-original-title="Top Danger"  href='student_documents/delete_book/<?php echo $col->document_dir?>'>delete</a>
                                                                         </td>
                                                                         <?php
                                                                          }
                                                                          ?>



											</tr>
                                                       <?php
                                                         }
                                                         }
                                                        if($nodata<1){
                                                       ?>
										<tr><td colspan='7'><?php echo 'No books are found under that course' ?></td></tr>
																<?php	}
																	?>

										    
										</tbody>
									</table>

                            



         </div>
						
                            
                            

              
                   <?php
            $first = false;
             
                }
   
             else {

            ?>

         
        

        <div id="<?php echo $courses->course_id ?>" class="tab-pane ">

                            
              <table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="hidden-480"   style="color:#3A87AD;">Books name</th>
										            <th class="hidden-480"   style="color:#3A87AD;">Students name</th>
											      
                                                                        <th class="hidden-480"   style="color:#3A87AD;">Books description</th>
                                                                        <th class="hidden-480"    style="color:#3A87AD;">Books size</th>
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
                                                                         <a class="btn btn-info btn-small tooltip-info" data-rel="tooltip" data-placement="bottom" title="" data-original-title="Bottm Info"  href='student_documents/download/<?php echo $col->document_dir?>'>download</a>
                                                                        </td>
                                                                        <td class="center">
                                                                         <a class="btn btn-danger btn-small tooltip-error" data-rel="tooltip" data-placement="top" title="" data-original-title="Top Danger"  href='student_documents/delete_book/<?php echo $col->document_dir?>'>delete</a>
                                                                         </td>



											</tr>
                                                       <?php
                                                         }
                                                         }
                                                        if($nodata<1){
                                                       ?>
										<tr><td colspan='7'><?php echo 'No books are found under that course' ?></td></tr>
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






							
					
					
