
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
    <div class="headline"><h3>All Batches</h3></div>
	
    <ul class="thumbnails team">
	
	<?php
     for($i=1;$i<=12;$i++)
	 {
	?>
	
        <li class="span3">
            <div class="thumbnail-style">
                <img src="assets/img/others/2.jpg" alt="" />
                <h3><a>1st Batch </a> <small>Chief Executive Officer / CEO</small></h3>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                <a class="btn-u btn-u-large btn-u-green one-page-btn" href="<?php echo site_url('about_iit/individual_batch');?>" ><i class="icon-bolt"></i> Details </a>
				<!--a class="btn-u btn-u-large btn-u-red one-page-btn"><i class="icon-bell"></i> Details </a>
				<a class="btn-u btn-u-large btn-u-blue one-page-btn"><i class="icon-bullhorn"></i> Details </a-->
            </div>
        </li>
	
	<?php
     }
	?>
       
    </ul><!--/thumbnails-->
    <!-- //End Meer Our Team -->

    <!-- //End Our Clients -->
</div><!--/container-->
<!--=== End Content Part ===-->

