<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Dashboard - Admin</title>

    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Cache-Control" content="no-cache" />

    <!--basic styles-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.3.custom.min.css" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css"/>

    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-ie7.min.css"/>
    <![endif]-->

    <!--page specific plugin styles-->

    <!--fonts-->

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300"/>

    <!--ace styles-->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-responsive.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css"/>



    <!--Add for pages-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css"/>
    <![endif]-->

    <!--upal start-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.css" />
    <!--upal end-->


    <!--<!--Shanto

    <meta name="description" content="" />

    <link rel="stylesheet" href="<?php /*echo base_url(); */?>assets/css/bootstrap-editable.css" />
    <link rel="stylesheet" href="<?php /*echo base_url(); */?>assets/css/select2.css" />
    <link rel="stylesheet" href="<?php /*echo base_url(); */?>assets/css/jquery.gritter.css" />
    <link rel="stylesheet" href="<?php /*echo base_url(); */?>assets/css/jquery-ui-1.10.3.custom.min.css" />

    <Shanto -->



    <!--inline styles related to this page-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
<div class="navbar">
<div class="navbar-inner">
<div class="container-fluid">
<a href="#" class="brand">
    <small>
        <!--<i class="icon-leaf"></i>-->
	    <img src="<?php echo base_url(); ?>assets/images/du_logo.jpg">
	   <?php if($this->session->userdata('user_type')=='main_admin' ){ ?>
			Admin Management
	    <?php }elseif($this->session->userdata('user_type')=='site_admin' ){ ?>
			Website Management
	   <?php }elseif($this->session->userdata('user_type')=='exam_admin' ){ ?>
			Exam Management
	   <?php }elseif($this->session->userdata('user_type')=='admission_admin' ){ ?>
			Admission Management
	   <?php }elseif($this->session->userdata('user_type')=='faculty_admin' ){ ?>
			Faculty Management
	   <?php }elseif($this->session->userdata('user_type')=='teachers' ){ ?>
			Teacher Panel
	   <?php }elseif($this->session->userdata('user_type')=='students' ){ ?>
			Student Panel
	   <?php }?>
    </small>
</a><!--/.brand-->

<ul class="nav ace-nav pull-right">

<li class="light-blue">
    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
        <img class="nav-user-photo" src="<?php echo base_url(); ?>assets/avatars/user.jpg" alt="Jason's Photo"/>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata('username');  ?>
								</span>

        <i class="icon-caret-down"></i>
    </a>

    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
        <li>
            <a href="#">
                <i class="icon-cog"></i>
                Settings
            </a>
        </li>

        <li class="divider"></li>

        <li>
            <a href="<?php echo site_url('users/logout'); ?>">
                <i class="icon-off"></i>
                Logout
            </a>
        </li>
    </ul>
</li>
</ul>
<!--/.ace-nav-->
</div>
<!--/.container-fluid-->
</div>
<!--/.navbar-inner-->
</div>

<div class="main-container container-fluid">
<a class="menu-toggler" id="menu-toggler" href="#">
    <span class="menu-text"></span>
</a>

<div class="sidebar" id="sidebar">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div>
    <!--#sidebar-shortcuts-->

    <ul class="nav nav-list">
        <li class="active">
            <a href="<?php echo site_url('dashboard/view_dashboard');?>">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Home </span>
            </a>
        </li>

            <li >
			    <a href="<?php echo site_url('admin_management/view_admin_list');?>">
				    <i class="icon-desktop"></i>
				    <span class="menu-text"> About DSM </span>
			    </a>
		    </li>

<li >
			    <a href="<?php echo site_url('admin_management/view_admin_list');?>">
				    <i class="icon-desktop"></i>
				    <span class="menu-text"> Faculty Member </span>
			    </a>
		    </li>


		    <li >
			    <a href="<?php echo site_url('admin_management/view_activity_log');?>">
				    <i class="icon-desktop"></i>
				    <span class="menu-text"> About Department </span>
			    </a>
		    </li>
   

            <li>
			    <a href="<?php echo site_url('profile/view_profile');?>">
				    <i class="icon-list-alt"></i>
				    <span class="menu-text"> Profile </span>
			    </a>
		    </li>

		    <li>
			    <a href="#" class="dropdown-toggle">
				    <i class="icon-desktop"></i>
				    <span class="menu-text"> Seminar & Training </span>

				    <b class="arrow icon-angle-down"></b>
			    </a>

			    <ul class="submenu">
				    <li>
					    <a href="<?php echo site_url('seminer_train/seminer');?>">
						    <i class="icon-double-angle-right"></i>
						    Seminar
					    </a>
				    </li>

				    <li>
					    <a href="<?php echo site_url('seminer_train/training');?>">
						    <i class="icon-double-angle-right"></i>
						    Training
					    </a>
				    </li>
			    </ul>
		    </li>
			
			<li>
			    <a href="#" class="dropdown-toggle">
				    <i class="icon-desktop"></i>
				    <span class="menu-text"> Notice & News </span>
				    <b class="arrow icon-angle-down"></b>
			    </a>
			    <ul class="submenu">
				    <li>
					    <a href="<?php echo site_url('news_events/view_news_events');?>">
						    <i class="icon-double-angle-right"></i>
						    Notice
					    </a>
				    </li>

				    <li>
					    <a href="<?php echo site_url('teacher_documents/view_assignments');?>">
						    <i class="icon-double-angle-right"></i>
						    Latest News
					    </a>
				    </li>
			    </ul>
		    </li>
			

    </ul>
    <!--/.nav-list-->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left"></i>
    </div>
</div>

<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
            </li>
            <li class="active">Dashboard</li>
        </ul>
        <!--.breadcrumb-->
    </div>



    <?php echo $template['body']; ?>
    <!--/.page-content-->
<!--/.main-content-->
</div>
<!--/.main-container-->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>

<!--basic scripts-->



<!--[if !IE]>-->

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>





<script src="<?php echo base_url(); ?>assets/js/fuelux/fuelux.wizard.min.js"></script>


<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/fuelux/fuelux.spinner.min.js"></script>

<!--page specific plugin scripts-->

<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>


<!--<![endif]-->

<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]>-->

<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<!--<![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js'>" + "<" + "/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<!--page specific plugin scripts-->

<!--[if lte IE 8]>
<script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
<![endif]-->

<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>


<!--ace scripts-->

<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
<!--inline scripts related to this page-->

<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>


<!--sujit start-->

<script src="<?php echo base_url(); ?>assets/js/teacher_internal_exam_management/teacher_internal_current_exams_view.js"></script>
<script src="<?php echo base_url(); ?>assets/js/site_management/site_management.js"></script>

<!--sujit end-->

<!--NADIA START-->


<script src="<?php echo base_url(); ?>assets/js/program_management/view_program_structure.js"></script>
<script src="<?php echo base_url(); ?>assets/js/program_management/manage_program_structure.js"></script>
<script src="<?php echo base_url(); ?>assets/js/program_management/program_notification.js"></script>
<script src="<?php echo base_url(); ?>assets/js/batch_management/view_batch_structure.js"></script>
<script src="<?php echo base_url(); ?>assets/js/batch_management/manage_batch_structure.js"></script>
<script src="<?php echo base_url(); ?>assets/js/batch_management/promote_batch.js"></script>
<script src="<?php echo base_url(); ?>assets/js/batch_management/batch_notification.js"></script>

<script src="<?php echo base_url(); ?>assets/js/project_thesis/view_project_thesis.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin_management/view_admin.js"></script>

<!--NADIA END-->


<!--Banik start-->

<script src="<?php echo base_url(); ?>assets/js/achievements/modify_achievements.js"></script>
<script src="<?php echo base_url(); ?>assets/js/achievements/add_achievements.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notice_announcement/notice_announcement.js"></script>
<script src="<?php echo base_url(); ?>assets/js/events/events.js"></script>
<script src="<?php echo base_url(); ?>assets/js/attendance/attendance.js"></script>

<!--Banik end-->



<!--upal start-->

<script src="<?php echo base_url(); ?>assets/js/upcoming_events/modify_upcoming_events.js"></script>
<script src="<?php echo base_url(); ?>assets/js/upcoming_events/add_upcoming_events.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/admin_exam_management/current_exam_management_view.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin_exam_management/semester_exam_management_view.js"></script>

<!--upal end-->


<!-- shanto start-->

<!--

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='<?php /*echo base_url(); */?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php /*echo base_url(); */?>assets/js/bootstrap.min.js"></script>

<!--page specific plugin scripts-->
<!--

<script src="<?php /*echo base_url(); */?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/flot/jquery.flot.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/flot/jquery.flot.pie.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/flot/jquery.flot.resize.min.js"></script>

<!--ace scripts-->

<!--
<script src="<?php /*echo base_url(); */?>assets/js/ace-elements.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/ace.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/x-editable/ace-editable.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/x-editable/bootstrap-editable.min.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/jquery.gritter.min.js"></script>

<!--inline scripts related to this page-->


<!--

<script src="<?php /*echo base_url(); */?>assets/js/fullcalendar.min.js"></script>

<script src="<?php /*echo base_url(); */?>assets/js/bootbox.min.js"></script>


<script src="<?php /*echo base_url(); */?>assets/js/calendar/calendar_script.js"></script>
<script src="<?php /*echo base_url(); */?>assets/js/profile/modify.js"></script>
<script src="<?php echo base_url(); ?>assets/js/profile/editor.js"></script>

<!--shanto end-->


<script type="text/javascript">
$(function () {


    $('.date-picker').datepicker().next().on(ace.click_event, function(){
        $(this).prev().focus();
    });


	// scrollables
	$('.slim-scroll').each(function () {
		var $this = $(this);
		$this.slimScroll({
			height: $this.data('height') || 300,
			railVisible:true
		});
	});

    /*upal start*/

    $('#add_upcoming_events_time').timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false
    });

    /*upal end*/




	$('.easy-pie-chart.percentage').each(function () {
        var $box = $(this).closest('.infobox');
        var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
        var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
        var size = parseInt($(this).data('size')) || 50;
        $(this).easyPieChart({
            barColor: barColor,
            trackColor: trackColor,
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: parseInt(size / 10),
            animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
            size: size
        });
    })

    $('.sparkline').each(function () {
        var $box = $(this).closest('.infobox');
        var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
        $(this).sparkline('html', {tagValuesAttribute: 'data-values', type: 'bar', barColor: barColor, chartRangeMin: $(this).data('min') || 0});
    });


    var placeholder = $('#piechart-placeholder').css({'width': '90%', 'min-height': '150px'});
    var data = [
        { label: "social networks", data: 38.7, color: "#68BC31"},
        { label: "search engines", data: 24.5, color: "#2091CF"},
        { label: "ad campaings", data: 8.2, color: "#AF4E96"},
        { label: "direct traffic", data: 18.6, color: "#DA5430"},
        { label: "other", data: 10, color: "#FEE074"}
    ]

    function drawPieChart(placeholder, data, position) {
        $.plot(placeholder, data, {
            series: {
                pie: {
                    show: true,
                    tilt: 0.8,
                    highlight: {
                        opacity: 0.25
                    },
                    stroke: {
                        color: '#fff',
                        width: 2
                    },
                    startAngle: 2
                }
            },
            legend: {
                show: true,
                position: position || "ne",
                labelBoxBorderColor: null,
                margin: [-30, 15]
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        })
    }

    drawPieChart(placeholder, data);

    /**
     we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
     so that's not needed actually.
     */
    placeholder.data('chart', data);
    placeholder.data('draw', drawPieChart);


    var $tooltip = $("<div class='tooltip top in hide'><div class='tooltip-inner'></div></div>").appendTo('body');
    var previousPoint = null;

    placeholder.on('plothover', function (event, pos, item) {
        if (item) {
            if (previousPoint != item.seriesIndex) {
                previousPoint = item.seriesIndex;
                var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                $tooltip.show().children(0).text(tip);
            }
            $tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
        } else {
            $tooltip.hide();
            previousPoint = null;
        }

    });


    var d1 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.5) {
        d1.push([i, Math.sin(i)]);
    }

    var d2 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.5) {
        d2.push([i, Math.cos(i)]);
    }

    var d3 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.2) {
        d3.push([i, Math.tan(i)]);
    }


    var sales_charts = $('#sales-charts').css({'width': '100%', 'height': '220px'});
    $.plot("#sales-charts", [
        { label: "Domains", data: d1 },
        { label: "Hosting", data: d2 },
        { label: "Services", data: d3 }
    ], {
        hoverable: true,
        shadowSize: 0,
        series: {
            lines: { show: true },
            points: { show: true }
        },
        xaxis: {
            tickLength: 0
        },
        yaxis: {
            ticks: 10,
            min: -2,
            max: 2,
            tickDecimals: 3
        },
        grid: {
            backgroundColor: { colors: [ "#fff", "#fff" ] },
            borderWidth: 1,
            borderColor: '#555'
        }
    });


    $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('.tab-content')
        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $source.offset();
        var w2 = $source.width();

        if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
        return 'left';
    }


    $('.dialogs,.comments').slimScroll({
        height: '300px'
    });


    //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
    //so disable dragging when clicking on label
    var agent = navigator.userAgent.toLowerCase();
    if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
        $('#tasks').on('touchstart', function (e) {
            var li = $(e.target).closest('#tasks li');
            if (li.length == 0)return;
            var label = li.find('label.inline').get(0);
            if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
        });

    $('#tasks').sortable({
            opacity: 0.8,
            revert: true,
            forceHelperSize: true,
            placeholder: 'draggable-placeholder',
            forcePlaceholderSize: true,
            tolerance: 'pointer',
            stop: function (event, ui) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                $(ui.item).css('z-index', 'auto');
            }
        }
    );
    $('#tasks').disableSelection();
    $('#tasks input:checkbox').removeAttr('checked').on('click', function () {
        if (this.checked) $(this).closest('li').addClass('selected');
        else $(this).closest('li').removeClass('selected');
    });



})
</script>
</body>
</html>
