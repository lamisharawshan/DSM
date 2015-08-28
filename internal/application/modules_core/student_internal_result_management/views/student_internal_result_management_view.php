<div class="page-content">
					
					<h4 class="blue">
								<i class="icon-hand-right icon-animated-hand-pointer blue"></i>
								Courses
								<i class="icon-double-angle-right"></i>
								Result
					</h4>
					
					<h5 class="blue">
								<!--i class="icon-hand-right icon-animated-hand-pointer blue"></i-->
								Current Semester Result------------
								
					</h5>
					<div class="hr hr32 hr-dotted"></div>
					
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<div class="row-fluid">
								<div class="span12">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
										
											<?php
												$first=true;
												foreach($allDataForCurrentSem as $row)
												{
													if($first)
													{
											?>
												<li class="active">
													<a data-toggle="tab" href="#<?php echo $row->course_id ?>">
														<i class="icon-list-alt"></i>
														<?php echo $row->course_code ?>
													</a>
												</li>
											<?php 
													$first=false;		
													}
													else 
													{
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
												$no_course=0;
												$first_tab=true;
												foreach($allDataForCurrentSem as $courses){ 
												$no_course++;
													
														if($first_tab){
															$first_tab=false;
											?>
															<div id="<?php echo $courses->course_id ?>" class="tab-pane in active">
												            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th>Exam Name</th>
															<th>Exam Type</th>
															<th>Marks</th>
															<th>Own Marks</th>
															<th>Top Marks</th>
															<th>Topper's Name</th>
															<th class="hidden-480">Percentage</th>
															
														</tr>
													</thead>

																	<tbody>
														
																	<?php
																		$no_data=0;
																		foreach($tabDetail as $exams){
																		
																		
																			
																			if($exams->course_log_id == $courses->course_log_id )
																			{
																			
																			$no_data++;
																	?>
														
																			<tr>
												
																				<td><?php echo $exams->exam_name ?></td>
																				<td><?php echo $exams->exam_type ?></td>
																				<td><?php echo $exams->total_marks ?></td>
																				<td><?php echo $exams->marks ?></td>
																				<td><?php echo $exams->top_marks ?></td>
																				<td><?php echo $exams->topper_name ?></td>
																				<td class="hidden-480">
																					<?php echo $exams->marks_percentage ?>%
																				</td>
																				
																			</tr>
																	<?php 
																		
																	       }
																		   
																		   
																	}
																	?>
											
											
											
											
																	</tbody>
																</table>
												
												
												
															</div>
											
											
											<?php 			}else{ ?>
															<div id="<?php echo $courses->course_id ?>" class="tab-pane">
												
																<table id="sample-table-1" class="table table-striped table-bordered table-hover">
																	<thead>
																		<tr>
																			<th>Exam Name</th>
																			<th>Exam Type</th>
																			<th>Total Marks</th>
																			<th>Own Marks</th>
																			<th>Top Marks</th>
															                <th>Topper's Name</th>
																			<th class="hidden-480">Percentage</th>
																			
																		</tr>
																	</thead>

																	<tbody>
														
																	<?php
																		$no_data=0;
																		foreach($tabDetail as $exams){
																		
																		
																			
																			if($exams->course_log_id == $courses->course_log_id ){
																			
																			$no_data++;
																	?>
														
																			<tr>
												
																				<td><?php echo $exams->exam_name ?></td>
																				<td><?php echo $exams->exam_type ?></td>
																				<td><?php echo $exams->total_marks ?></td>
																				<td><?php echo $exams->marks ?></td>
																				<td class="hidden-480">
																					<?php echo $exams->marks_percentage ?>%
																				</td>
																				
																			</tr>
																	<?php 
																		
																	}																		
																	}
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
								</div><!--/span-->

								

								
							</div><!--/row-->
							<br/>
							
							
							<?php
							$semesterCount=0;
							foreach($prevSemResults as $rr)
							{
							
							if($rr->semester_id> $semesterCount){
							                                        $semesterCount=$rr->semester_id;
																}
																
							}
							
							for($i=$semesterCount;$i>0;$i--)
							{
							?>
							<h5 class="blue">
								<!--i class="icon-hand-right icon-animated-hand-pointer blue"></i-->
								<?php echo $i;?>th  semester
								
					        </h5>
							
							<table id="sample-table-1" class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th>course code</th>
															<th>course name</th>
															<th>gpa</th>
																													
														</tr>
										
													</thead>
							
	    					<?php
							
							foreach($prevSemResults as $holdPrevResult)
							{
							
							if($holdPrevResult->semester_id==$i)
								{
							?>

													<tbody>
														<tr>
												
															<td><?php echo $holdPrevResult->course_code ?></td>
															<td><?php echo $holdPrevResult->course_title ?></td>
															<td><?php echo $holdPrevResult->gpa ?></td>
															
															
														</tr>
													
													</tbody>
							<?php
							
							   }
						
							}
							
							?>
							</table>
							<?php
							}
							?>
							
							
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div>
				
				
							
							
							<div id="modal_view_program" class="modal hide fade" tabindex="-1">
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
														Addition Date
													</th>
													<th>User</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td id = "program_name_td"></td>
													<td id = "program_description_td"></td>
													<td id = "program_status_td"></td>
													<td id = "program_date_td"></td>
													<td id = "program_user_td"></td>
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
							
							
							
							<div id="modal_view_semester" class="modal hide fade" tabindex="-1">
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
													
													<th>Total Credit</th>
													<th>Status</th>

													<th>
														<i class="icon-time bigger-110"></i>
														Addition Date
													</th>
													<th>User</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td id="semester_name_td"></td>
													
													<td id="semester_credit_td"></td>
													<td id="semester_status_td"></td>
													<td id="semester_date_td"></td>
													<td id="semester_user_td"></td>
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
							
							
							<div id="modal_view_course" class="modal hide fade" tabindex="-1">
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
													
													<th>Course Credit</th>
													<th>Status</th>
													<th>
														<i class="icon-time bigger-110"></i>
														Addition Date
													</th>
													<th>User</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td id="course_code_td"></td>
													<td id="course_title_td"></td>
													<td id="course_credit_td"></td>
													<td id="course_status_td"></td>
													<td id="course_date_td"></td>
													<td id="course_user_td"></td>
													
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
							
					
					