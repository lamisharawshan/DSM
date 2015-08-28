<div class="page-content">

<h4 class="blue">
    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
    Courses
    <i class="icon-double-angle-right"></i>
    Current Exams
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
                        foreach ($courses_of_teacher as $row) {
                            if ($first) {
                                ?>
                                <li class="active">
                                    <a data-toggle="tab" href="#<?php echo $row->course_id ?>">
                                        <i class="icon-list-alt"></i>
                                        <?php echo $row->course_code ?>
                                    </a>
                                </li>
                                <?php
                                $first = false;
                            } else {
                                ?>
                                <li>
                                    <a data-toggle="tab" href="#<?php echo $row->course_id ?>">
                                        <i class="icon-list-alt"></i>
                                        <?php echo $row->course_code ?>
                                    </a>
                                </li>

                            <?php
                            }

                        }

                        ?>

                    </ul>

                    <div class="tab-content">

                        <?php

                        $first = true;
                        foreach ($courses_of_teacher as $courses) {
                            if ($first) {
                                $first = false;
                                ?>




                                <div id="<?php echo $courses->course_id ?>" class="tab-pane in active">

                                    <table id="sample-table-1"
                                           class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Student Roll</th>
                                            <th>Student Name</th>
                                            <?php
                                            foreach ($attendances_of_teacher as $attendances) {
                                                if ($attendances->course_log_id == $courses->course_log_id) {
                                                    echo '<th>' . $attendances->attendance_date . '</th>';
                                                }
                                            }
                                            ?>


                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                        $no_data = 0;
                                        foreach ($students_of_specific_teacher as $students) {

                                            if ($students->course_log_id == $courses->course_log_id) {

                                                $no_data++;
                                                ?>
                                                <tr>
                                                <td><?php echo $students->roll_number ?></td>
                                                <td><?php echo $students->full_name ?></td>

                                                <?php
                                                foreach ($attendances_of_teacher as $attendances) {
                                                    if ($attendances->course_log_id == $courses->course_log_id) {
                                                        foreach ($attendance_details_of_teacher as $attendance_details) {
                                                            if ($attendance_details->attendance_id == $attendances->attendance_id && $attendance_details->user_id==$students->user_id) {
                                                                echo '<td>' . $attendance_details->attendance_status . '</td>';
                                                            }

                                                        }


                                                    }
                                                }
                                                ?>





                                                </tr>
                                            <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <p>
                                        <button class="btn btn-success btn-block"
                                                name="create_new_take_attendance_button"
                                                id="<?php echo $courses->course_log_id; ?>">
                                            <i class="icon-edit icon-2x icon-only"></i>
                                            Take Attendance
                                        </button>
                                    </p>
                                </div>
                            <?php
                            } else {
                                ?>

                                <div id="<?php echo $courses->course_id ?>" class="tab-pane">

                                    <table id="sample-table-1"
                                           class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Student Roll</th>
                                            <th>Student Name</th>
                                            <?php
                                            foreach ($attendances_of_teacher as $attendances) {
                                                if ($attendances->course_log_id == $courses->course_log_id) {
                                                    echo '<th>' . $attendances->attendance_date . '</th>';
                                                }
                                            }
                                            ?>


                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                        $no_data = 0;
                                        foreach ($students_of_specific_teacher as $students) {

                                            if ($students->course_log_id == $courses->course_log_id) {

                                                $no_data++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $students->roll_number ?></td>
                                                    <td><?php echo $students->full_name ?></td>

                                                    <?php
                                                    foreach ($attendances_of_teacher as $attendances) {
                                                        if ($attendances->course_log_id == $courses->course_log_id) {
                                                            foreach ($attendance_details_of_teacher as $attendance_details) {
                                                                if ($attendance_details->attendance_id == $attendances->attendance_id && $attendance_details->user_id==$students->user_id) {
                                                                    echo '<td>' . $attendance_details->attendance_status . '</td>';
                                                                }

                                                            }


                                                        }
                                                    }
                                                    ?>





                                                </tr>
                                            <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <p>
                                        <button class="btn btn-success btn-block"
                                                name="create_new_take_attendance_button"
                                                id="<?php echo $courses->course_log_id; ?>">
                                            <i class="icon-edit icon-2x icon-only"></i>
                                            Take Attendance
                                        </button>
                                    </p>


                                </div>
                            <?php
                            }
                        } ?>





                        <!-- <tr>
                                                    <td colspan='2'><?php /*echo 'No attendance are found under that course' */?></td>
                                                </tr>
-->

                    </div>


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
<!--/.row-fluid-->
</div>

<div id="modal_take_attendance" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Take attendance and details
        </div>
    </div>

    <form id="take_attendance_form" method="post">
        <div class="modal-body no-padding">
            <div class="row-fluid">
                <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">


                    <tbody>


                    <!--<tr>
                        <td colspan="2">Attendance Priority</td>
                        <td><input type="text" id="attendance_priority"/></td>
                    </tr>-->


                    </tbody>

                </table>


                <table>
                    <thead>
                    <tr>
                        <th>Student Roll</th>
                        <th>Student Name</th>
                        <th>Present</th>

                    </tr>
                    </thead>

                    <tbody id="students_in_course">


                    </tbody>
                </table>

            </div>
        </div>


        <div class="modal-footer">
            <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
                <i class="icon-remove"></i>
                Close
            </button>
            <button class="btn btn-small btn-success pull-left" id="save_taken_attendance" type="submit">
                <i class="icon-pencil"></i>
                Save
            </button>


        </div>
    </form>
</div>
