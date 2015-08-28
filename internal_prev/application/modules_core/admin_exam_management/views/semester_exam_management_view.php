<div class="page-content">

<h4 class="blue">
    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
    Courses
    <i class="icon-double-angle-right"></i>
    Semester Exams
</h4>

<div class="hr hr32 hr-dotted"></div>

<div class="row-fluid">
<div class="span12">

<!--PAGE CONTENT BEGINS-->

<div class="row-fluid">
<div class="span12">
<div class="tabbable">
<ul class="nav nav-tabs" id="myTab">

    <?php
    $first = true;
    foreach ($program_details as $row) {
        if ($first) {
            ?>
            <li class="active">
                <a data-toggle="tab" href="#<?php echo $row->program_id ?>">
                    <i class="icon-list-alt"></i>
                    <?php echo $row->program_name ?>
                </a>
            </li>
            <?php
            $first = false;
        } else {
            ?>
            <li>
                <a data-toggle="tab" href="#<?php echo $row->program_id ?>">
                    <i class="icon-list-alt"></i>
                    <?php echo $row->program_name ?>
                </a>
            </li>

        <?php
        }

    }

    ?>

</ul>


<div class="tab-content">                   <!--start-->
    <?php $first = true; ?>
    <?php foreach ($program_details as $program_row) {
        ?>


        <div id="<?php echo $program_row->program_id ?>" class="
                                            <?php if ($first) {
            echo 'tab-pane in active';
            $first = false;
        } else echo 'tab-pane';
        ?>">      <!--23-->


            <ul class="nav nav-list">

                <?php


                if (count($batch_details) == 0) {
                    echo '<li><span class="blue">No Data Found</span></li>';
                }
                foreach ($batch_details as $batch_row) {

                    if ($batch_row->program_id == $program_row->program_id) {
                        ?>

                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                            <span class="menu-text">

                                                <?php echo $batch_row->batch_name; ?>      <!--233333333333-->

                                            </span>

                                <!-- &nbsp;&nbsp;
                                                        ( <?php echo $batch_row->semester_log_name; ?> )              0323    -->
                                <!--<button name="program_view_details"
                                        class="btn btn-small btn-warning"
                                        id="' . $row1->program_id . '">
                                    <i class="icon-bar-chart"></i>
                                    View Details
                                </button>-->
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">

                                <?php foreach ($semester_details as $semester_row) {
                                    if ($semester_row->batch_id == $batch_row->batch_id) { //2323232

                                        ?>
                                        <li id="semester_result_<?php echo $semester_row->semester_log_id ?>">

                                            <a href="#" class="dropdown-toggle">
                                                <i class="icon-double-angle-right"></i>
                                                <?php echo $semester_row->semester_log_name; ?>
                                                &nbsp;&nbsp;

                                                <!--BUTTON    Button button button-->
                                                <?php

                                                $total_course = 0;
                                                $published_course = 0;
                                                foreach ($course_details as $course_row) {
                                                    if ($course_row->semester_log_id == $semester_row->semester_log_id) {
                                                        $total_course++;
                                                        if ($course_row->result_status == 'published') {
                                                            $published_course++;
                                                        }
                                                    }
                                                }

                                                if ($semester_row->academic_status == 'active') {
                                                    ?>

                                                    <button name="<?php
                                                    if ($published_course == $total_course)
                                                        echo 'publish_semester_result';
                                                    else echo 'unpublish_semester_result';
                                                    ?>"
                                                            id="<?php echo $semester_row->semester_log_id; ?>"
                                                            class="<?php
                                                            if ($published_course == $total_course)
                                                                echo 'btn btn-small btn-success';
                                                            else echo 'btn btn-small disabled';
                                                            ?>">

                                                        <i class="icon-edit"></i>
                                                        Publish Semester Result
                                                    </button>
                                                <?php
                                                } else {
                                                    ?>

                                                    <button name="view_semester_results_with_cgpa"
                                                            class="btn btn-small btn-warning"
                                                            id="<?php echo $semester_row->semester_log_id; ?>">
                                                        <i class="icon-bar-chart"></i>
                                                        View Details
                                                    </button>
                                                <?php } ?>




                                                <b class="arrow icon-angle-down"></b>
                                            </a>


                                            <ul class="submenu">

                                                <?php foreach ($course_details as $course_row) {
                                                    if ($course_row->semester_log_id == $semester_row->semester_log_id) {
                                                        ?>
                                                        <li>
                                                            <a href="#" class="dropdown-toggle">
                                                                <i class="icon-pencil"></i>

                                                                <?php echo $course_row->course_title ?>

                                                                &nbsp;&nbsp;
                                                                ( <?php echo $course_row->result_status; ?> )
                                                                &nbsp;&nbsp;
                                                                <!-- <button
                                                                     name="course_view_details"
                                                                     class="btn btn-small btn-yellow"
                                                                     id="'.$row3->course_id.'">
                                                                     <i class="icon-bar-chart"></i>
                                                                     View Details
                                                                 </button>
                                                                 <button
                                                                     name="add_program_button"
                                                                     class="btn btn-small btn-success">
                                                                     <i class="icon-edit"></i>
                                                                     Publish
                                                                 </button>-->


                                                            </a>
                                                        </li>

                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                }
                                                ?>

                                            </ul>

                                        </li>


                                    <?php
                                    }
                                }
                                ?>


                            </ul>
                        </li>

                    <?php
                    }
                }
                ?>

            </ul>

        </div>

    <?php

    } ?>


</div>


</div>
</div>
<!--/span-->


</div>
<!--/row-->

<!--PAGE CONTENT ENDS-->
</div>
<!--/.span-->
</div>


</div>







<div  id="modal_view_semester_results_with_cgpa" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Semester Results
        </div>
    </div>


    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student Roll</th>
                    <th>CGPA</th>
                </tr>
                </thead>

                <tbody id="semester_result_table_body">


                </tbody>
            </table>
        </div>
    </div>


    <div class="modal-footer">
        <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
            <i class="icon-remove"></i>
            Close
        </button>


    </div>
</div>
