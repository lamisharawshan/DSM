



<!--=== Breadcrumbs ===-->
<br/><br/><br/><br/>
<div class="breadcrumbs margin-bottom-40">
	<div class="container">
        <h1 class="color-green pull-left">Login</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Login</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">		
	<div class="row-fluid">
	<div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open("users/login", 'class="log-page"');?>
		<!--<form class="log-page" />-->
            <h3>Login to your account</h3>    
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
				<?php echo form_input($identity,'class="input-xlarge"' ,'placeholder="Username"');?>
                <!--<input class="input-xlarge" type="text" placeholder="Username" />-->
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
				<?php echo form_input($password,'class="input-xlarge"','type="password"','placeholder="Password"');?>
                <!--<input class="input-xlarge" type="password" placeholder="Password" />/>-->
            </div>
            <div class="controls form-inline">
                <label class="checkbox"><?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Stay Signed in</label>
                <!--<button class="btn-u pull-right" type="submit">Login</button>-->
				<?php echo form_submit('submit', 'Login','class="btn-u pull-right"');?>
            </div>
            <hr />
            <h4>Forget your Password ?</h4>
            <p>no worries, <a class="color-green" href="#">click here</a> to reset your password.</p>
        <?php echo form_close();?>
		<!--</form>-->
    </div><!--/row-fluid-->
</div><!--/container-->		
<!--=== End Content Part ===-->


