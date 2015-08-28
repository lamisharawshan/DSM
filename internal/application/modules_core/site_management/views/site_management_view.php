<div class="page-content" xmlns="http://www.w3.org/1999/html">

	<h4 class="blue">
		<i class="icon-hand-right icon-animated-hand-pointer blue"></i>
		Site Management
		<i class="icon-double-angle-right"></i>
		Albums
	</h4>

	<div class="hr hr32 hr-dotted"></div>

	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
			<div class="row-fluid">
				<div class="span12">


					<table id="sample-table-1" class="table table-striped table-bordered table-hover">
						<thead>
						<tr>
							<th>Title Pic</th>
							<th>Album Title</th>
							<th class="hidden-480">Status</th>
							<th>Options</th>
						</tr>
						</thead>

						<tbody id="tbody_exams_">

						<?php
							$no_data = 0;
							foreach ($album_list as $row) {

								$no_data++;
								?>

								<tr id="exams_tr_<?php echo $row->album_head_picture_id; ?>">

									<td><?php echo $row->album_head_small_picture_path; ?></td>
									<td><?php echo $row->album_title; ?></td>
									<?php if ($row->status == 'activated') { ?>
										<td class="hidden-480">
											<span
												class="label label-success arrowed"><?php echo $row->status; ?></span>
										</td>
									<?php } else { ?>
										<td class="hidden-480">
											<span
												class="label label-important arrowed-in"><?php echo $row->status; ?></span>
										</td>
									<?php } ?>

									<td>
										<div class="hidden-phone visible-desktop btn-group">
											<button class="btn btn-mini btn-success" name="view_album_button"
											        id="<?php echo $row->album_head_picture_id; ?>">
												<i class="icon-ok bigger-120"></i>
												View Album
											</button>

											<button class="btn btn-mini btn-warning" name="modify_album_button"
											        id="<?php echo $row->album_head_picture_id; ?>">
												<i class="icon-ok bigger-120"></i>
												Modify Album
											</button>
										</div>

										<div class="hidden-desktop visible-phone">
											<div class="inline position-relative">
												<button class="btn btn-minier btn-primary dropdown-toggle"
												        data-toggle="dropdown">
													<i class="icon-cog icon-only bigger-110"></i>
												</button>

												<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
													<li>
														<a href="#" class="tooltip-info" data-rel="tooltip"
														   title="View">
																										<span
																											class="blue">
																											<i class="icon-zoom-in bigger-120"></i>
																										</span>
														</a>
													</li>

													<li>
														<a href="#" class="tooltip-success" data-rel="tooltip"
														   title="Edit">
																										<span
																											class="green">
																											<i class="icon-edit bigger-120"></i>
																										</span>
														</a>
													</li>

													<li>
														<a href="#" class="tooltip-error" data-rel="tooltip"
														   title="Delete">
																										<span
																											class="red">
																											<i class="icon-trash bigger-120"></i>
																										</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</td>
								</tr>
							<?php

							}
							if ($no_data < 1) {
								?>
								<tr>
									<td colspan='7'>No exams are found under that course</td>
								</tr>
							<?php
							}
						?>


						</tbody>
					</table>

					<p>
						<button class="btn btn-success btn-block" name="create_new_album_button"
						        id="<?php echo $row->album_title; ?>">
							<i class="icon-edit icon-2x icon-only"></i>
							Create New Album
						</button>

					</p>


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


<div id="modal_create_album" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Exam is Locked
		</div>
	</div>
	<form id="create_album_form" method="post"  >
	<div class="slim-scroll" data-height="350">

			<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
				<!--<tr>
					<td colspan="2">Album Title</td>
					<td colspan="2"><input type="text" name="album_title_input"/></td>
				</tr>-->
				<!--<tr>
					<th>Select Title Pic</th>
					<th>Picture</th>
					<th>Description</th>
					<th>Options</th>


				</tr>-->
				<tbody id="input_pictures_tbody">
				<!--<tr id="input_picture_tr" >
					<td><input name="title_picture_radio_button" type="radio"  /></td>
					<td><input name="album_pictures[]" type="file" /></td>
					<td><textarea name="album_picture_description[]" ></textarea></td>
					<td>&nbsp;</td>

				</tr>-->

				<tr id="input_picture_tr">
					<!--<td><input name="title_picture_radio_button" type="radio"  /></td>-->
					<td><input name="album_picture" id="album_picture" type="file"/></td>
					<td><textarea name="album_picture_description" id="album_picture_description"></textarea></td>
					<td>&nbsp;</td>

				</tr>
				</tbody>

			</table>
	</div>

	<div class="modal-footer">

		<button class="btn btn-small btn-success pull-left" type="submit">
			<i class="icon-check"></i>
			Save
		</button>
		<button class="btn btn-small btn-warning pull-left" name="add_new_album_row">
			<i class="icon-check"></i>
			Add More
		</button>

	</div>
	</form>
</div>


<!--NOT REQUIRED BELOW HERE-->

<div id="modal_view_results" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			View Exam Results
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

				<tbody id="result_table_body">


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


<div id="modal_view_exams" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			View Exam Details
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

		<tr>
			<td>Exam Name</td>
			<td id="view_exam_name_id"></td>
		</tr>
		<tr>
			<td>Exam Type</td>
			<td id="view_exam_type_id"></td>
		</tr>
		<tr>
			<td>Total Marks</td>
			<td id="view_total_marks_id"></td>
		</tr>
		<tr>
			<td>Percentage</td>
			<td id="view_percentage_id"></td>
		</tr>
		<tr>
			<td>Exam Date</td>
			<td id="view_exam_date_id"></td>
		</tr>
		<tr>
			<td>Status</td>
			<td id="view_exam_status_id"></td>
		</tr>
	</table>


	<div class="modal-footer">
		<button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
			<i class="icon-remove"></i>
			Close
		</button>


	</div>
</div>

<div id="modal_create_exam_failure" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Locking Course Result Information
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

		<tr>
			<td>Your Course is 100 % Complete</td>

		</tr>
		<tr>
			<td>Cannot create more exams until you deduct the percentage of other Exams.</td>

		</tr>

	</table>


	<div class="modal-footer">

		<button class="btn btn-small btn-success pull-left" data-dismiss="modal">
			<i class="icon-check"></i>
			Ok
		</button>

	</div>
</div>


<div id="modal_create_exam" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Add Exam Details & Results
		</div>
	</div>


	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form id="add_exam_form" method="post">
				<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">


					<tbody id="create_exam_body">

					<tr>
						<td colspan="3">Add Exam Details</td>
					</tr>
					<tr>
						<td colspan="2">Exam Name</td>
						<td><input type="text" id="create_exam_exam_name_id" name="create_exam_exam_name"
						           placeholder="eg. Midterm 1"/></td>
					</tr>
					<tr>
						<td colspan="2">Exam Type</td>
						<td><input type="text" id="create_exam_exam_type_id" name="create_exam_exam_type"
						           placeholder="eg. Written / MCQ"/></td>
					</tr>
					<tr>
						<td colspan="2">Exam Date</td>
						<td>
							<div class="control-group">
								<div class="row-fluid input-append">
									<input class="span10 date-picker" type="text" id="create_exam_exam_date_id"
									       name="create_exam_exam_date"
									       data-date-format="dd-M-yyyy"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">Total Marks</td>
						<td><input type="text" id="create_exam_total_marks_id" name="create_exam_total_marks"/></td>
					</tr>
					<tr>
						<td colspan="2">Exam Percentage</td>
						<td>
							<input type="hidden" id="course_log_id" name="course_log_id" value=""/>
							<input type="text" id="create_exam_exam_percentage_id" style="border: 0;"
							       disabled="disabled" name="create_exam_exam_percentage" value=""/>

							<div id="create_exam_percentage_slider" style="width: 220px;"></div>
						</td>
					</tr>
					<tr>
						<td colspan="3">Add Results</td>
					</tr>
					<tr>
						<th>Name</th>
						<th>Roll</th>
						<th>Marks</th>
					</tr>
					<tbody id="create_result_body">

					</tbody>


					</tbody>
				</table>

		</div>
	</div>


	<div class="modal-footer">
		<button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
			<i class="icon-remove"></i>
			Close
		</button>
		<button class="btn btn-small btn-success pull-left" type="submit">
			<i class="icon-pencil"></i>
			Save
		</button>
		</form>
	</div>
</div>


<div id="modal_modify_exam" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Modify Exam Details & Results
		</div>
	</div>


	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form id="modify_exam_form" method="post">
				<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">


					<tbody id="modify_exam_body">

					<tr>
						<td colspan="3"><b>Modify Exam Details</b></td>
					</tr>
					<tr>
						<td colspan="2">Exam Name</td>
						<td><input type="text" id="modify_exam_exam_name_id" name="modify_exam_exam_name"
						           placeholder="eg. Midterm 1"/></td>
					</tr>
					<tr>
						<td colspan="2">Exam Type</td>
						<td><input type="text" id="modify_exam_exam_type_id" name="modify_exam_exam_type"
						           placeholder="eg. Written / MCQ"/></td>
					</tr>
					<tr>
						<td colspan="2">Exam Date</td>
						<td>
							<div class="control-group">
								<div class="row-fluid input-append">
									<input class="span10 date-picker" type="text" id="modify_exam_exam_date_id"
									       name="modify_exam_exam_date"
									       data-date-format="dd-M-yyyy"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">Total Marks</td>
						<td><input type="text" id="modify_exam_total_marks_id" name="modify_exam_total_marks"/></td>
					</tr>
					<tr>
						<td colspan="2">Status</td>
						<td>
							<select name="modify_exam_status" id="modify_exam_status_id">
								<option value="activated"/>
								Activated
								<option value="deactivated"/>
								Deactivated

							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">Exam Percentage</td>
						<td id="modify_exam_exam_percentage_td">
							<input type="hidden" id="current_exams_id" name="current_exams_id" value=""/>
							<input type="text" id="modify_exam_exam_percentage_id" style="border: 0;"
							       disabled="disabled" name="modify_exam_exam_percentage" value=""/>

							<div id="modify_exam_percentage_slider" style="width: 220px;"></div>
						</td>
					</tr>
					<tr>
						<td colspan="3"><b>Edit Results</b></td>
					</tr>
					<tr>
						<th>Name</th>
						<th>Roll</th>
						<th>Marks</th>
					</tr>
					<tbody id="modify_result_body">

					</tbody>


					</tbody>
				</table>

		</div>
	</div>


	<div class="modal-footer">
		<button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
			<i class="icon-remove"></i>
			Close
		</button>
		<button class="btn btn-small btn-success pull-left" type="submit">
			<i class="icon-pencil"></i>
			Save
		</button>
		</form>
	</div>
</div>


<div id="modal_confirm_lock_exams" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Confirm Locking Exam
		</div>
	</div>
	<form method="POST" id="lock_confirmation_form">
		<input type="hidden" id="hidden_exam_id" value=""/>
		<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

			<tr>
				<td>Are you sure you want to lock the exam?</td>

			</tr>
			<tr>
				<td>Locked exam cannot be modified until exam committee unlock it.</td>

			</tr>
		</table>


		<div class="modal-footer">
			<button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
				<i class="icon-remove"></i>
				Cancel
			</button>
			<button class="btn btn-small btn-success pull-left" name="teacher_confirmed_locking_exam" type="submit">
				<i class="icon-pencil"></i>
				Yes
			</button>
	</form>
</div>
</div>


<div id="modal_confirmed_locking_exams" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Exam is Locked
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

		<tr>
			<td>Your Exam has been Locked !</td>

		</tr>
		<tr>
			<td>Contact with Exam committee to modify that exam again.</td>

		</tr>

	</table>


	<div class="modal-footer">

		<button class="btn btn-small btn-success pull-left" data-dismiss="modal">
			<i class="icon-check"></i>
			Ok
		</button>

	</div>
</div>

<div id="modal_lock_course_result_info" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Locking Course Result Information
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

		<tr>
			<td id="locking_course_result_head"></td>

		</tr>
		<tr>
			<td id="locking_course_result_info"></td>

		</tr>

	</table>


	<div class="modal-footer">

		<button class="btn btn-small btn-success pull-left" data-dismiss="modal">
			<i class="icon-check"></i>
			Ok
		</button>

	</div>
</div>


<div id="modal_confirming_lock_course_result_info" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Locking Course Result Information
		</div>
	</div>
	<form method="POST" id="confirming_lock_course_result_form">
		<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

			<tr>
				<td>Sure, you really want to lock Course Result?</td>
				<input type="hidden" id="lock_course_log_id" name="lock_course_log_id" value=""/>
			</tr>
			<tr>
				<td>If locked, the course cannot be modified until Exam Committee unlock it.</td>

			</tr>

		</table>


		<div class="modal-footer">

			<button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
				<i class="icon-remove"></i>
				Cancel
			</button>
			<button class="btn btn-small btn-success pull-left" type="submit">
				<i class="icon-pencil"></i>
				Yes
			</button>
		</div>
	</form>
</div>


<div id="modal_teacher_published_course_result_info" class="modal hide fade" tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Exam is Locked
		</div>
	</div>
	<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

		<tr>
			<td>Your Course Result has been Locked !</td>

		</tr>
		<tr>
			<td>Contact with Exam committee to modify this Course again.</td>

		</tr>

	</table>


	<div class="modal-footer">

		<button class="btn btn-small btn-success pull-left" data-dismiss="modal">
			<i class="icon-check"></i>
			Ok
		</button>

	</div>
</div>


