 <div class="user-profile row-fluid">
    <div class="span12">

        <?php foreach ($basic as $row) {
        } ?>
        <div class="span3 center">
            <div>
            
            
<span class="profile-picture">
<img id="avatar" class="editable" alt="Alex's Avatar" src="<?php echo base_url(); ?>assets/avatars/profile-pic.jpg" />
											</span>
                                            

                <div class="space-4"></div>

                <div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-circle light-green middle"></i>
                            &nbsp;
                            <span class="white middle bigger-120"><?php echo $row->username; ?></span>
                        </a>

                    </div>
                </div>
            </div>


        </div>

        <div class="span8">

            </br></br>
            <div style="float: right">
               	<h4 class="pink">
								 
							
                            
                             <button class="btn btn-mini btn-info" name="edit_profile_btn" id="";
														
														 <?php echo $row->user_id; ?>
															<i class="icon-ok bigger-120">Edit profile</i>
                                                            </button>
                </button>
                							

                <button class="btn btn-mini btn-info" name="change_password_btn"
                        id="change_Password">
                    <i class="icon-key bigger-120"></i>
                    Change Password
                </button>
            </div>

            </br></br>
        </div>

        <div class="span9">
            <div class="profile-user-info profile-user-info-striped"    >

                <div class="profile-info-row">
                    <div class="profile-info-name" > Username</div>

                    <div class="profile-info-value" >
                        <span id="username"><?php echo $row->username ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> E-mail</div>

                    <div class="profile-info-value">
                        <span id="email"><?php echo $row->e_mail ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Contact</div>

                    <div class="profile-info-value">
                        <span id="contact"><?php echo $row->contact ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Social Network Address</div>

                    <div class="profile-info-value">
                        <span id="social_address"><?php echo $row->social_network_address ?></span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Address</div>

                    <div class="profile-info-value">
                        <span id="address"><?php echo $row->address ?></span>
                    </div>
                </div>
				
</div>




<!--Edit profile pop-up-->										
										
							<div id="edit_profile_div" class="modal hide fade" tabindex="-1">
								<div class="modal-header no-padding">
									<div class="table-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										Please fill the following form fields
									</div>
								</div>

								<div class="modal-body no-padding">
									<div class="row-fluid">
									<form id="edit_profile_form" method="post">
										<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
											<thead>
												<tr>
													<th>Item Name</th>
													<th>Field</th>
												</tr>
											</thead>

											<tbody>
											
												<tr>
													<td>
														<label class="control-label" for="form-field-username">User Name</label>
													</td>
													
													<td>
														<div class="controls">
															<input type="text" id="edit_username" placeholder="User Name " value="<?php echo $row->username; ?>" />
														</div>
													</td>
													
												</tr>
												
												<tr>
													<td>
														<label class="control-label" for="form-field-username">E_mail</label>
													</td>
													
													<td>
														<div class="controls">
															<input type="text" id="edit_e_mail" placeholder="E_mail" value="<?php echo $row->e_mail; ?>" />
														</div>
													</td>
													
												</tr>
												
												<tr>
													<td>
														<label class="control-label" for="form-field-username">Contact</label>
													</td>
													
													<td>
														<div class="controls">
															<input type="text" id="edit_contact" placeholder="contact " value="<?php echo $row->contact; ?>" />
														</div>
													</td>
													
												</tr>
												
												<tr>
													<td>
														<label class="control-label" for="form-field-username">Social network address</label>
													</td>
													
													<td>
														<div class="controls">
															<input type="text" id="edit_social_network_address" placeholder=" Social network address" value="<?php echo $row->social_network_address; ?>" />
														</div>
													</td>
													
												</tr>
												
												<tr>
													<td>
														<label class="control-label" for="form-field-username">Address</label>
													</td>
													
													<td>
														<div class="controls">
															<input type="text" id="edit_address" placeholder=" address " value="<?php echo $row->address; ?>" />
														</div>
													</td>
													
												</tr>
												
                                          
												 
												
											 <tr>
													<td>
														<button class="btn btn-small" data-dismiss="modal">
														<i class="icon-remove"></i>
														Cancel
														</button>
													</td>
													<td>
														<button class="btn btn-small btn-primary" id="edit_save_button" type="submit">
														<i class="icon-ok"></i>
														Save
														</button>
													</td>
													
											</tr>

											</tbody>
											
										</table>
										</form>
									</div>
								</div>


</div>




<div id="change_password_div" class="modal hide fade" tabindex="-1">
								<div class="modal-header no-padding">
									<div class="table-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										Please fill the following form fields
									</div>
								</div>

								<div class="modal-body no-padding">
									<div class="row-fluid">
									<form id="edit_password_form" method="post">
										<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
											<thead>
												<tr>
													<th>Item Name</th>
													<th>Field</th>
												</tr>
											</thead>

											<tbody>
											
												<tr>
													<td>
														<label class="control-label" for="form-field-username">New Password</label>
													</td>
													
													<td>
														<div class="controls">
															<input type="password" id="edit_new_password" placeholder="New Password " />
														</div>
													</td>
													
												</tr>
												
												<tr>
													<td>
														<label class="control-label" for="form-field-username">Confirm Password</label>
													</td>
													
													<td>
														<div class="controls">
															<input type="password" id="edit_confirm_password" placeholder="Confirm Password "/>
														</div>
													</td>
													</tr>
                                                    
                                                    <tr>
													<td>
														<button class="btn btn-small" data-dismiss="modal">
														<i class="icon-remove"></i>
														Cancel
														</button>
													</td>
													<td>
					<button class="btn btn-small btn-primary" id="edit_save_password_button" type="submit">
														<i class="icon-ok"></i>
														Save
														</button>
													</td>		
											</tr>
                                                    
                                                    
										</tbody>
											
										</table>
										</form>
									</div>
								</div>


</div>



		<div class="main-container container-fluid">    
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
			<div class="main-content">
				<div class="page-content">

					<div class="row-fluid">
						<div class="span12">

<h4 class="header green clearfix">
								About YourSelf <h4>
						  <div class="wysiwyg-editor" name="editor1" id="editor1" ><?php echo $row->description; ?>                          
                          
                          </div>
                            
                <button class="btn btn-mini btn-info" name="submit" id="submit">
					Save description
                </button>
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
 
			</div><!--/.main-content-->
		</div><!--/.main-container-->

