
<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Site Management
							<small>
								<i class="icon-double-angle-right"></i>
								Achievements
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<div class="row-fluid">
								<div class="span12">
									<table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													<label>

														<span class="lbl"></span>
													</label>
												</th>
												<th>Pictures</th>
												<th>Description</th>
												<th>Status</th>
												<th>Modify</th>
												
											</tr>
										</thead>

										<tbody>
										
			<?php foreach($small_picture as $row){ 
					
				echo '				<tr>
												<td class="center">
													<label>
														
														<span class="lbl"></span>
													</label>
												</td>
													<td id="image_td">
														<a href="assets/images/gallery/image-2.jpg" data-rel="colorbox">
															<img alt="150x150" src="'.base_url().$row->small_pic_path.'" />
															
														</a>
													</td>';
													echo '								<td id="image_description_td">
														<h5 >';
				echo										
															$row->picture_description;
				echo '									
													</h5></td>';
				
				echo								'<td class="hidden-480" id="image_status_td">
													<span class="label label-warning">';echo $row->status; 
				echo '									</span>
												</td>';
				
				echo '									</a>
													</td>';
												
												
												
				echo '							
												<td>
												<a href="#" role="button" class="green" data-toggle="modal">
													<div class="hidden-phone visible-desktop btn-group">
														<button class="btn btn-mini btn-success" name="modify_achievement_button" id="';
														
				echo $row->picture_id;
				echo'">
															<i class="icon-ok bigger-120"></i>
														</button>
													</div>
                                                      													
													</a>
												</td>
												
									</tr>';	
									}
			
			?>
										</tbody>
									</table>
								</div><!--/span-->
							</div><!--/row-->
		
							<h4 class="pink">
								<i class="icon-hand-right icon-animated-hand-pointer blue"></i>
								<a href="#" role="button" class="green" data-toggle="modal" name="add_acievements_anchor"> Add Achievements </a>
							</h4>
							
							
						<div id="add_achievement_div" class="modal hide" tabindex="-1">
						
						<form id="add_achievement_form" method="post">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="blue bigger">Please fill the following form fields</h4>
								</div>

								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										<div class="span5">
											<div class="space" id="picture"></div>

											<input type="file" id="add_achievement_path" required/>
										</div>

										<div class="vspace"></div>

										<div class="span7">
											<div class="control-group">
												<label for="form-field-select-3">Status</label>

												<div >
													<!--<select class="chzn-select" data-placeholder="Choose a Status">-->
													<select id="add_achievement_status">
														<option value="activated" />Activated
														<option value="deactivated" />Deactivated
													</select>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="form-field-username">Description</label>

												<div class="controls">
													<input type="text" id="add_achievement_description" placeholder="Some information about picture " />
												</div>
											</div>

											<!--<div class="control-group">
												<label class="control-label" for="form-field-first">Name</label>

												<div class="controls">
													<input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
													<input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
												</div>
											</div>-->
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" id="add_achievement_save_button" type="submit">
										<i class="icon-ok"></i>
										Save
									</button>
								</div>
								</form>
						</div>
						
						
						<div id="modify_achievement_div" class="modal hide" tabindex="-1">
						
						<form id="modify_achievement_form" method="post">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="blue bigger">Please fill the following form fields</h4>
								</div>

								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										<div class="span5">
											<div class="space" id="picture"></div>

											<input type="file" id="modify_achievement_path" />
										</div>

										<div class="vspace"></div>

										<div class="span7">
											<div class="control-group">
												<label for="form-field-select-3">Status</label>

												<div >
													<!--<select class="chzn-select" data-placeholder="Choose a Status">-->
													<select id="modify_achievement_status">
														<option value="activated" />Activated
														<option value="deactivated" />Deactivated
													</select>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="form-field-username">Description</label>

												<div class="controls">
													<input type="text" id="modify_achievement_description" placeholder="Some information about picture " />
												</div>
											</div>

											<!--<div class="control-group">
												<label class="control-label" for="form-field-first">Name</label>

												<div class="controls">
													<input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
													<input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
												</div>
											</div>-->
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" id="modify_achievement_save_button" type="submit">
										<i class="icon-ok"></i>
										Save
									</button>
								</div>
						</form>
						</div>
						
					</div>
							
				</div>
				
</div>
				
				
				
		<!-- 
			<div class="hidden-desktop visible-phone">
														<div class="inline position-relative">
															<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" name="modify_button">
																<i class="icon-cog icon-only bigger-110"></i>
															</button>

															<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
																<li>
																	<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																		<span class="blue">
																			<i class="icon-zoom-in bigger-120"></i>
																		</span>
																	</a>
																</li>

																
															</ul>
														</div>
													</div>
		-->		
				