
<!--=== Purchase Block ===-->
<div class="row-fluid purchase margin-bottom-30">
    <div class="container">
    </div>
</div>
<!--/row-fluid-->
<!-- End Purchase Block -->

<!--=== Content Part ===-->
<div class="container">


<div class="row-fluid">
    <div class="span6">
        <div class="service clearfix">
            
 <img id="logo-header" src="<?php echo base_url(); ?>assets/img/admission.jpg"
                                          alt="Admission"/>
            <div class="desc">
                <h4>Admission Information</h4>

                <p style="text-align:justify">Eligibility for Application:Admission is open to individuals who have at least a 
				Bachelor with Honors Degree (3/4 Years) from any recognized university or a four-year BE/MBBS/BDS 
				degree from Engineering Universities/Colleges/Medical Colleges. A Master degree is compulsory for B.A. (Pass) 
				applicants. A candidate already having one master’s degree is also eligible to apply. Candidates with any 
				Third Division/Class are not eligible to apply.  <a class="read-more" href="#">Read more...</a> </p>
            </div>
        </div>
    </div>
</div>
<!--/row-fluid-->
<!-- //End Service Blokcs -->


<div class="row-fluid margin-bottom-10">
    <!-- Accardion and Posts -->
    <div class="span4 bg-light">

        <div class="headline"><h3>News & Events</h3></div>
        <!-- Accardion -->
        <div class="accordion acc-home" id="accordion2">

            <?php
            foreach($list_of_events as $row){
            ?>
            <!--/accordion-group-->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="<?php echo $row->news_events_id;?>">
                        <?php echo $row->news_events_header;?>
                    </a>
                </div>
                <div id="<?php echo $row->news_events_id;?>" class="accordion-body collapse" style="height: 0px;">
                    <div class="accordion-inner">
                        <?php echo $row->news_events_details;?>
                    </div>
                </div>
            </div>
            <!--/accordion-group-->
            <?php
            }
            ?>

        </div>
        <!--/accardion-->
    </div>
    <!--/span7-->

    <div class="span4 bg-light">
        <div class="headline"><h3>Notice & Announcements</h3></div>
        <div id="testimonal_carousel" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <div class="testimonial">
                        <div class="testimonial-body">
                            <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci
                                metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec
                                eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum
                                ullamcorper.</p>

                            <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci
                                metus, ac adipiscing nunc.</p>
                        </div>
                        <div class="testimonial-author">
                            <span class="arrow"></span>
                            <span class="name">John Smith</span>, CEO, Pixel Ltd.
                        </div>
                    </div>
                </div>
                <!--/carousel-inner-->

                <!-- Item -->
                <div class="item">
                    <div class="testimonial">
                        <div class="testimonial-body">
                            <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci
                                metus, ac adipiscing nunc.</p>

                            <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci
                                metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum ullamcorper. Donec
                                eget orci metus, ac adipiscing nunc. Pellentesque fermentum, ante ac interdum
                                ullamcorper.</p>
                        </div>
                        <div class="testimonial-author">
                            <span class="arrow"></span>
                            <span class="name">Lisa Cooper</span>, Art Director, Loop Inc.
                        </div>
                    </div>
                </div>
                <!--/item-->
            </div>
            <!--/testimonal_carousel-->

            <!-- Carousel nav -->
            <div class="testimonal-arrow">
                <a class="icon-angle-right" href="#testimonal_carousel" data-slide="next"></a>
                <a class="icon-angle-left" href="#testimonal_carousel" data-slide="prev"></a>
            </div>
        </div>
    </div>
    <!--/span4-->


    <div class="span4 bg-light">
        <div class="posts">
            <div class="headline"><h3>Upcoming Events</h3></div>
            <dl class="dl-horizontal">
                <dt><a href="#"><img src="<?php echo base_url(); ?>assets/img/sliders/elastislide/6.jpg" alt=""/></a></dt>
                <dd>
                    <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a>
                    </p>
                </dd>
            </dl>
            <dl class="dl-horizontal">
                <dt><a href="#"><img src="<?php echo base_url(); ?>assets/img/sliders/elastislide/10.jpg" alt=""/></a></dt>
                <dd>
                    <p><a href="#">Lorem sequat ipsum dolor lorem sunt aliqua put a bird sit amet, consectetur
                            adipiscing dolor elit.</a></p>
                </dd>
            </dl>
            <dl class="dl-horizontal">
                <dt><a href="#"><img src="<?php echo base_url(); ?>assets/img/sliders/elastislide/11.jpg" alt=""/></a></dt>
                <dd>
                    <p><a href="#">It works on all major web browsers, tablets and aliqua lorem sequat ipsum dolor.</a>
                    </p>
                </dd>
            </dl>
            <dl class="dl-horizontal">
                <dt><a href="#"><img src="<?php echo base_url(); ?>assets/img/sliders/elastislide/9.jpg" alt=""/></a></dt>
                <dd>
                    <p><a href="#">Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                            nulla assumenda shoreditch.</a></p>
                </dd>
            </dl>
        </div>
    </div>
    <!--/span5-->


</div>
<!--/row-fluid-->
<!-- //End Tabs and Carousel -->


<!-- //End Our Clients -->
</div>
<!--/container-->
<!-- End Content Part -->
