
<!--=== Breadcrumbs ===-->
</br></br></br></br>
<div class="row-fluid breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Students</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="<?php echo site_url('home/home');?>">Home</a> <span class="divider">/</span></li>
            <li><a href="">About IIT</a> <span class="divider">/</span></li>
            <li class="active">Students</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">

    <!-- Meer Our Team -->
    <?php foreach($student_profile as $row){ ?>
	<div class="headline"><h3><?php echo $row->full_name;?></h3></div>

    <?php } ?>

	
	
	
	
    <!-- //End Our Clients -->
</div><!--/container-->
<!--=== End Content Part ===-->

