<!DOCTYPE html>
<!--[if IE 7]>
<html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <title>Department of disaster science and management</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">

    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/headers/header1.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_responsive.css"/>

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/flexslider/flexslider.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/parallax-slider/css/parallax-slider.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bxslider/jquery.bxslider.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/revolution_slider/css/rs-style.css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen"/>
    <!-- CSS Theme -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes/default.css" id="style_color"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes/headers/default.css" id="style_color-header-1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
	</style>
</head>

<body>
<header>
<!--=== Style Switcher ===-->

<div class="style-switcher">
    <div class="theme-close"><i class="icon-remove"></i></div>
    <div class="theme-heading">Theme Colors</div>
    <ul class="unstyled">
        <li class="theme-default theme-active" data-style="default" data-header="light"></li>
        <li class="theme-blue" data-style="blue" data-header="light"></li>
        <li class="theme-orange" data-style="orange" data-header="light"></li>
        <li class="theme-red" data-style="red" data-header="light"></li>
        <li class="theme-light" data-style="light" data-header="light"></li>
    </ul>
</div>
<!--/style-switcher-->
<!--=== End Style Switcher ===-->
<!--/top-->
<!--=== End Top ===-->

<br/><br/>
    <!--=== Header ===-->
    <div class="header">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img id="logo-header" src="<?php echo base_url(); ?>assets/img/du_logo.jpg"
                                          alt="Logo"/></a>
            </div>
            <!-- /logo -->

            <!-- Menu -->
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a><!-- /nav-collapse -->
                    <div class="nav-collapse collapse">
                        <ul class="nav top-2">
                            <li class="active">
                                <a href="<?php echo site_url('home/home'); ?>">Home</a>
                            </li>
                            <li>
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">About DSM
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- <li><a href="<?php echo site_url('about_iit/institution'); ?>">About Department</a></li> -->
                               <!--     <li><a href="<?php echo site_url('about_iit/faculty'); ?>">Faculty member</a></li> -->
									    <li><a href="#">About Department</a></li>
									   
              						    <li class="dropdown-submenu">
											<a tabindex="-1" href="#">People</a>
											<ul class="dropdown-menu">
											  <li><a tabindex="-1" href="<?php echo site_url('about_iit/institution'); ?>">Faculty Members</a></li>
											 <!-- <li class="dropdown-submenu">
												<a href="#">Even More..</a>
												<ul class="dropdown-menu">
													<li><a href="#">3rd level</a></li>
													<li><a href="#">3rd level</a></li>
												</ul>
											  </li>-->
											  <li><a href="<?php echo site_url('about_iit/Parttime'); ?>">Part Time Faculty</a></li>
											  <li><a href="<?php echo site_url('about_iit/Staff'); ?>">Staffs</a></li>
											</ul>
										</li>
										<!--	<b class="caret-out"></b>
									   </li> -->
									   <li class="dropdown-submenu">
		<!--                                <a href="<?php echo site_url('about_iit/choice_program_wise_batch'); ?>">Research and Publications </a> -->
											<a tabindex="-1" href="#">Research and Publications </a>
											<ul class="dropdown-menu">
											  <li class="dropdown-submenu">
												<a tabindex="-1" href="<?php echo site_url('about_iit/institution'); ?>">Research</a>
													<ul class="dropdown-menu">
														<li><a href="#">Research Capacity</a></li>
														<li><a href="#">Research Interest</a></li>
													</ul>
											  </li>
											  <li><a href="<?php echo site_url('about_iit/Parttime'); ?>">Publications</a></li>
											</ul>
									   </li> 
									   <li><a href="<?php echo site_url('about_iit/location'); ?>">Location</a></li>
								</ul>
                                <b class="caret-out"></b>
                            </li>
									   
                            <li>
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">Admission
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('academic/graduation'); ?>">Undergraduate Studies</a></li>
                                    <li><a href="<?php echo site_url('academic/post_graduation'); ?>">Graduate Studies</a>
                                    </li>
                                    <li><a href="<?php echo site_url('academic/special_courses'); ?>">Mphil</a>
                                    </li>
									<li><a href="<?php echo site_url('academic/special_courses'); ?>">PHD Program</a>
                                    </li>
									<li><a href="<?php echo site_url('academic/special_courses'); ?>">Short Courses</a>
                                    </li>
                                </ul>
                                <b class="caret-out"></b>
                            </li>

                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seminar and training
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">

                                    <li><a href="<?php echo site_url('seminer_train_user/seminer'); ?>">Seminar</a>
                                    </li>
                                    <li><a href="<?php echo site_url('life_in_iit/club'); ?>">Training</a></li>
                                </ul>
                                <b class="caret-out"></b>
                            </li>

							   <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Facilities
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('life_in_iit/newsandevents'); ?>">Lab</a>
                                    </li>
                                    <li><a href="<?php echo site_url('life_in_iit/club'); ?>">E-journal</a></li>
									<li><a href="<?php echo site_url('life_in_iit/newsandevents'); ?>">Conference Room</a>
                                    </li>
                                    <li><a href="<?php echo site_url('life_in_iit/club'); ?>">Scholarship</a></li>
									 <li><a href="<?php echo site_url('life_in_iit/club'); ?>">Exchange Program</a></li>
                                </ul>
                                <b class="caret-out"></b>
                            </li>


                            <li class="open-menu dropdown"><a href="#browse-menu" class="dropdown-toggle"
                                                              data-toggle="dropdown">Site Map <b class="caret"></b></a>
                            </li>
                        </ul>
                        <div class="search-open">
                            <div class="input-append">
                                <form/>
                                <input type="text" class="span3" placeholder="Search"/>
                                <button type="submit" class="btn-u">Go</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /nav-collapse -->
                </div>
                <!-- /navbar-inner -->
            </div>
            <!-- /navbar -->
        </div>
        <!-- /container -->
    </div>
    <!--/header -->
    <!--=== End Header ===-->
    <section id="browse-menu">
        <div class="container">
            <div class="row">
                <div class="span2"></div>
                <div class="span9">
                    <ul>
                        <li><span class="head-menu">About DSM</span>
                            <ul>
                                <li><a href="<?php echo site_url('about_iit/institution'); ?>">About Department</a></li>
                                <li><a href="<?php echo site_url('about_iit/faculty'); ?>">Faculty member</a></li>
                                <li><a href="<?php echo site_url('about_iit/choice_program_wise_batch'); ?>">Research and Publications</a></li>
                            </ul>
                        </li>
                        <li><span class="head-menu">Admission</span>
                            <ul>
                                <li><a href="<?php echo site_url('academic/graduation'); ?>">Under Graduate</a></li>
                                <li><a href="<?php echo site_url('academic/post_graduation'); ?>">Graduate </a></li>
                                <li><a href="<?php echo site_url('academic/special_courses'); ?>">Mphil</a></li>
								<li><a href="<?php echo site_url('academic/special_courses'); ?>">PHD</a></li>
								<li><a href="<?php echo site_url('academic/special_courses'); ?>">Short Course</a></li>
                            </ul>
                        </li>
                        <li><span class="head-menu">Seminar and training</span>
                            <ul>
                                <li><a href="#">Seminar</a></li>
                                <li><a href="#">training</a></li>
                            </ul>
                        </li>
                        <li><span class="head-menu">Facilities</span>
                            <ul>
                                <li><a href="#">Lab</a></li>
                                <li><a href="<?php echo site_url('life_in_iit/newsandevents'); ?>">E-journal</a></li>
                                <li><a href="<?php echo site_url('life_in_iit/club'); ?>">Conference Room</a></li>
                                <li><a href="<?php echo site_url('life_in_iit/achievements'); ?>">Scholarship</a></li>
                                <li><a href="<?php echo site_url('life_in_iit/gallery'); ?>">Exchange Program</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

</header>


<!--=== Content Part ===-->

	<?php echo $template['body']; ?>

<!--/container-->
<!-- End Content Part -->


<!--FOOTER-->



<!--=== Footer ===-->
<div class="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span4">
                <!-- About -->
                <div class="headline"><h3>About DSM</h3></div>
                <p class="margin-bottom-25">Institute of Information Technology,
                    the fastest growing Institute of the University of Dhaka.
                    IIT attracts high quality students in turn eminent faculty members have joined the Institute.
                    The study of IT at this Institute is based on foundations, which build skill in life long learning,
                    problem solving, cooperative work in groups (for software development) and proficiency in IT
                    development.

                    </p>


            </div>
            <!--/span4-->

            <div class="span4">
                <div class="posts">
                    <div class="headline"><h3>Mission & Vision</h3></div>


                    <p>Department of Disester Scicnce and Management, DU aims to foster amongst its academia and students, such
                        values which will ensure for it a place of pride in the world of learning. </p>


                    <p>It aims to forge a community of scholars, experts in their respective fields of research and sharing their expertise through high quality curricula within a friendly, caring and responsive culture.
                    </p>

                </div>
            </div>
            <!--/span4-->

            <div class="span4">
                <!-- Monthly Newsletter -->
                <div class="headline"><h3>Contact Info</h3></div>
                <address>
                    University of Dhaka<br/>
                    Dhaka, Bangladesh <br/>
                    Phone: 880 1678 656 657 <br/>
                    Fax: 02 547 768 <br/>
                    Email: <a href="mailto:iit@du.ac.bd">dsm@du.ac.bd</a>
                </address>

                <!-- Stay Connected -->
                <div class="headline"><h3>Social Media</h3></div>
                <ul class="social-icons">
                    <li><a href="#" data-original-title="Feed" class="social_rss"></a></li>
                    <li><a href="#" data-original-title="Facebook" class="social_facebook"></a></li>
                    <li><a href="#" data-original-title="Twitter" class="social_twitter"></a></li>
                    <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                    <li><a href="#" data-original-title="Pinterest" class="social_pintrest"></a></li>
                    <li><a href="#" data-original-title="Linkedin" class="social_linkedin"></a></li>
                    <li><a href="#" data-original-title="Vimeo" class="social_vimeo"></a></li>
                </ul>
            </div>
            <!--/span4-->
        </div>
        <!--/row-fluid-->
    </div>
    <!--/container-->
</div>
<!--/footer-->
<!--=== End Footer ===-->

<!--=== Copyright ===-->
<div class="copyright">
    <div class="container">
        <div class="row-fluid">
            <div class="span8">
                <p>2015 &copy; Developed by Shanto Rahman, Mostafijur Rahman and Lamisha Rawshan. IIT, DU</p>
            </div>

        </div>
        <!--/row-fluid-->
    </div>
    <!--/container-->
</div>
<!--/copyright-->
<!--=== End Copyright ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parallax-slider/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bxslider/jquery.bxslider.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/back-to-top.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/index.js"></script>


<!--faysal contact-->
<script src="<?php echo base_url(); ?>assets/js/contact/contact.js"></script>
<!--faysal contact end-->


<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
        App.initBxSlider1();
        Index.initParallaxSlider();
        App.initSliders();

        Index.initRevolutionSlider();


    });
</script>

<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/js/respond.js"></script>
<![endif]-->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-29166220-1']);
    _gaq.push(['_setDomainName', 'htmlstream.com']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
<!-- custom js -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR8iTW0ckmY6EhvEtVgNeSiHKTnDhN0pc">
    </script>
	
	<script src="http://www.google.com/jsapi?key=AIzaSyAR8iTW0ckmY6EhvEtVgNeSiHKTnDhN0pc"></script>
	
    <script>
	(function () {
		google.load("maps", "2");
		google.setOnLoadCallback(function () {
			// Create map
			var map = new google.maps.Map2(document.getElementById("map")),
				markerText = "<h4 style='color:red'> <i> Hi, You are here </i></h4>",
				markOutLocation = function (lat, long) {
					var latLong = new google.maps.LatLng(lat, long),
						marker = new google.maps.Marker(latLong);
					map.setCenter(latLong, 13);
					map.addOverlay(marker);
					marker.openInfoWindow(markerText);
					google.maps.Event.addListener(marker, "click", function () {
						marker.openInfoWindow(markerText);
					});
				};
				map.setUIToDefault();

			// Check for geolocation support	
			if (navigator.geolocation) {
				// Get current position
				navigator.geolocation.getCurrentPosition(function (position) {
						// Success!
						markOutLocation(position.coords.latitude, position.coords.longitude);
					}, 
					function () {
						// Gelocation fallback: Defaults to Stockholm, Sweden
						markerText = "<p>Please accept geolocation for me to be able to find you. <br>I've put you in Stockholm for now.</p>";
						markOutLocation(59.3325215, 18.0643818);
					}
				);
			}
			else {
				// No geolocation fallback: Defaults to Eeaster Island, Chile
				markerText = "<p>No location support. Try Easter Island for now. :-)</p>";
				markOutLocation(-27.121192, -109.366424);
			}
		});	
	})();
</script>



</body>
</html>