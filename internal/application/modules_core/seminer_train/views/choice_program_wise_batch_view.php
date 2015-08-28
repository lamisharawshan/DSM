
<!--=== Breadcrumbs ===-->
</br></br></br></br>
<div class="row-fluid breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Select Program</h1>
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

<div class="row-fluid">
        <!-- Pricing -->
        <div class="row-fluid margin-bottom-40">
		    
			<?php
            //for($i=1;$i<=4;$i++)
			foreach($choice_For_Program as $result)
			{
			?>
			
		    <a href="<?php echo site_url('about_iit/individual_batch/'.$result->program_id);?>" >
        	<div class="span3 pricing hover-effect">
            	<div class="pricing-head">
                	<h3><?php echo $result->program_name; ?> <span><?php echo $result->program_description; ?></span></h3>
                    <h4><i>$</i>5<i>.49</i> <span>Per Month</span></h4>
                </div>
                <ul class="pricing-content unstyled">
                    <li><i class="icon-tags"></i> At vero eos</li>
                    <li><i class="icon-asterisk"></i> No Support</li>
                    <li><i class="icon-heart"></i> Fusce condimentum</li>
                    <li><i class="icon-star"></i> Ut non libero</li>
                    <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                </ul>
            	<div class="pricing-footer">
                	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                	<button type="submit">Visit Now</button>
                </div>
            </div>
			</a>
			
			
			<?php
			 }
			?>
        	
        </div><!--/row-fluid-->
        <!--//End Pricing -->

 
    </div> 
</div><!--/container-->
<!--=== End Content Part ===-->

