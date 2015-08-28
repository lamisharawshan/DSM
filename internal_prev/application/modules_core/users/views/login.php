

<div class="container login">
		<div class="row">
			<div id="infoMessage"><?php echo $message;?></div>
			<div class="span4 offset4">
				<div class="well">
					<?php echo form_open("users/login");?>
						<div class="login-head"><img src="images/logo.gif"></div>
						<div class="login-fields">
							<div class="field row-fluid">
								<label for="username">Username:</label>
								<?php echo form_input($identity);?>
								
							</div> <!-- /field -->
							<div class="field row-fluid">
								<label for="password">Password:</label>
								<?php echo form_input($password);?>
							</div> <!-- /password -->
						</div> <!-- /login-fields -->
						<div class="login-actions">
							<span class="login-checkbox">
								<label class="" for="Field">
									Remember Me:
									<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
								</label>
							</span>
							<?php echo form_submit('submit', 'Login','class="button btn btn-info btn-large"');?>
						</div> <!-- .actions -->
					<?php echo form_close();?>
				</div> <!-- /error-details -->
			</div>
		</div>
	</div>
