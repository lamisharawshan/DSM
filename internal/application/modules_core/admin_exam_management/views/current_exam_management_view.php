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
                    foreach ($program_details as $program_tab) {
                        if ($first) {
                            ?>
                            <li class="active">
                                <a data-toggle="tab" href="#<?php echo $program_tab->program_id ?>">
                                    <i class="icon-list-alt"></i>
                                    <?php echo $program_tab->program_name ?>
                                </a>
                            </li>
                            <?php
                            $first = false;
                        } else {
                            ?>
                            <li>
                                <a data-toggle="tab" href="#<?php echo $program_tab->program_id ?>">
                                    <i class="icon-list-alt"></i>
                                    <?php echo $program_tab->program_name ?>
                                </a>
                            </li>

                        <?php
                        }

                    }

                    ?>

                </ul>

                <div class="tab-content">
                    <?php $first = true; ?>
                    <?php foreach ($program_details as $program_row) { ?>

                        <div id="<?php echo $program_row->program_id ?>" class="
                                            <?php if ($first) {
                            echo 'tab-pane in active';
                            $first = false;
                        } else echo 'tab-pane';
                        ?>">

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

                                                            <?php echo $batch_row->batch_name; ?>

                                                        </span>

                                                &nbsp;&nbsp;
                                                ( <?php echo $batch_row->semester_log_name; ?> )
                                                <!--<button name="program_view_details"
                                                        class="btn btn-small btn-warning"
                                                        id="' . $row1->program_id . '">
                                                    <i class="icon-bar-chart"></i>
                                                    View Details
                                                </button>-->
                                                <b class="arrow icon-angle-down"></b>
                                            </a>

                                            <ul class="submenu">

                                                <?php foreach ($course_details as $course_row) {
                                                    if ($course_row->semester_log_id == $batch_row->semester_log_id) {

                                                        ?>
                                                        <li>
                                                            <a href="#" class="dropdown-toggle">
                                                                <i class="icon-double-angle-right"></i>
                                                                <?php echo $course_row->course_code . " " . "( " . $course_row->course_title . " )"; ?>
                                                                &nbsp;&nbsp;
                                                                <button name="publish_course_result"
                                                                        class="btn btn-small btn-success"
                                                                        id="">
                                                                    <i class="icon-edit"></i>
                                                                    Publish Course Result
                                                                </button>
                                                                <b class="arrow icon-angle-down"></b>
                                                            </a>


                                                            <ul class="submenu" id="current_exams_list">
                                                                <!--expeimenting div reload by adding & using id -->

                                                                <?php foreach ($exam_details as $exam_row) {
                                                                    if ($exam_row->course_log_id == $course_row->course_log_id) {
                                                                        ?>
                                                                        <li>
                                                                            <a href="#" class="dropdown-toggle">
                                                                                <i class="icon-pencil"></i>

                                                                                <?php echo $exam_row->exam_name; ?>

                                                                                &nbsp;&nbsp;
                                                                                <button
                                                                                    name="admin_exam_view_details"
                                                                                    class="btn btn-small btn-yellow"
                                                                                    id="<?php echo $exam_row->current_exams_id; ?>">
                                                                                    <i class="icon-bar-chart"></i>
                                                                                    View Exam Details
                                                                                </button>
                                                                                <?php if ($exam_row->access_status == "unlocked") { ?>

                                                                                    <button
                                                                                        name="nonclickable_publish_exam_result"
                                                                                        class="btn btn-small btn-primary disabled"
                                                                                        id="<?php echo $exam_row->current_exams_id; ?>">
                                                                                        <i class="icon-edit"></i>
                                                                                        Publish
                                                                                    </button>

                                                                                    <button
                                                                                        name="nonclickable_unlock_exam_result"
                                                                                        class="btn btn-small btn-primary disabled"
                                                                                        id="<?php echo $exam_row->current_exams_id; ?>">
                                                                                        <i class="icon-edit"></i>
                                                                                        Unlock
                                                                                    </button>

                                                                                <?php
                                                                                } elseif($exam_row->access_status == "locked") {
                                                                                    ?>
                                                                                    <button
                                                                                        name="clickable_publish_exam_result"
                                                                                        class="btn btn-small btn-primary"
                                                                                        id="<?php echo $exam_row->current_exams_id; ?>">
                                                                                        <i class="icon-edit"></i>
                                                                                        Publish
                                                                                    </button>

                                                                                    <button
                                                                                        name="clickable_unlock_exam_result"
                                                                                        class="btn btn-small btn-primary"
                                                                                        id="<?php echo $exam_row->current_exams_id; ?>">
                                                                                        <i class="icon-edit"></i>
                                                                                        Unlock
                                                                                    </button>
                                                                                <?php
                                                                                }

                                                                                else {
                                                                                ?>
                                                                                    <button
                                                                                        name="nonclickable_publish_exam_result"
                                                                                        class="btn btn-small btn-primary disabled"
                                                                                        id="<?php echo $exam_row->current_exams_id; ?>">
                                                                                        <i class="icon-edit"></i>
                                                                                        Publish
                                                                                    </button>

                                                                                    <button
                                                                                        name="clickable_unlock_exam_result"
                                                                                        class="btn btn-small btn-primary"
                                                                                        id="<?php echo $exam_row->current_exams_id; ?>">
                                                                                        <i class="icon-edit"></i>
                                                                                        Unlock
                                                                                    </button>

                                                                                <?php
                                                                                }
                                                                                ?>


                                                                            </a>

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


<div id="modal_view_current_exams" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Exam Details
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

        <tr>
            <td>Exam Name</td>
            <td id="admin_view_exam_name_id"></td>
        </tr>
        <tr>
            <td>Exam Type</td>
            <td id="admin_view_exam_type_id"></td>
        </tr>
        <tr>
            <td>Total Marks</td>
            <td id="admin_view_total_marks_id"></td>
        </tr>
        <tr>
            <td>Percentage</td>
            <td id="admin_view_percentage_id"></td>
        </tr>
        <tr>
            <td>Exam Date</td>
            <td id="admin_view_exam_date_id"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td id="admin_view_exam_status_id"></td>
        </tr>
    </table>


    <div class="modal-footer">
        <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
            <i class="icon-remove"></i>
            Close
        </button>


    </div>
</div>

<div id="modal_confirm_publish_exams" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Confirm Publishing Exam
        </div>
    </div>

    <form method="post" id="admin_publish_confirmation_form">

        <input type="hidden" id="hidden_cuurent_exam_id" value=""/>

        <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

            <tr>
                <td>Are you sure you want to PUBLISH the exam result ?</td>
            </tr>
            <tr>
                <td>Once published ,techers can not modify the result till you unlock the access status</td>
            </tr>
        </table>


        <div class="modal-footer">
            <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>
            <button class="btn btn-small btn-success pull-left" name="admin_confirming_exam_published" type="submit">
                <i class="icon-pencil"></i>
                Yes
            </button>

        </div>

    </form>

</div>

<div id="modal_publish_confirmation_dialog" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Exam is Published
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

        <tr>
            <td>Your exam result has been PUBLISHED successfully!</td>
        </tr>
        <tr>
            <td>Unlock the exam access status to make the result modifyable for the teacher</td>
        </tr>
    </table>


    <div class="modal-footer">

        <button class="btn btn-small btn-success pull-left" data-dismiss="modal">
            <i class="icon-check"></i>
            Ok
        </button>
    </div>
</div>

<div id="modal_confirm_unlock_exams" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Confirm Unlocking Exam
        </div>
    </div>

    <form method="post" id="admin_unlock_confirmation_form">

        <input type="hidden" id="hidden_cuurent_exam_id" value=""/>

        <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

            <tr>
                <td> Are you sure you want to UNLOCK the exam result ? </td>
            </tr>
            <tr>
                <td> Once unlocked ,you can not publish the result till teacher lock the exam. </td>
            </tr>
        </table>


        <div class="modal-footer">
            <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>
            <button class="btn btn-small btn-success pull-left" name="admin_confirming_exam_unlock" type="submit">
                <i class="icon-pencil"></i>
                Yes
            </button>

        </div>

    </form>

</div>

<div id="modal_unlock_confirmation_dialog" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Exam is Unlocked
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

        <tr>
            <td> Your exam result has been Unlocked successfully! </td>
        </tr>
        <tr>
            <td> Teacher must lock the exam result first for you to publish it. </td>
        </tr>
    </table>


    <div class="modal-footer">

        <button class="btn btn-small btn-success pull-left" data-dismiss="modal">
            <i class="icon-check"></i>
            Ok
        </button>
    </div>
</div>

<div id="modal_nonclickable_unlock_dialog" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Action Failed
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

        <tr>
            <td> Your exam result is already Unlocked </td>
        </tr>
        <tr>
            <td> Teacher must lock the exam result first for you to unlock it. </td>
        </tr>
    </table>


    <div class="modal-footer">

        <button class="btn btn-small btn-success pull-left" data-dismiss="modal">
            <i class="icon-check"></i>
            Ok
        </button>
    </div>
</div>

<div id="modal_nonclickable_publish_dialog" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Action Failed
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

        <tr>
            <td> Your can not publish this exam result </td>
        </tr>
        <tr>
            <td> Teacher must lock the exam result first for you to publish it. </td>
        </tr>
        <tr>
            <td> Or teacher must make an unlock request first </td>
        </tr>
    </table>


    <div class="modal-footer">

        <button class="btn btn-small btn-success pull-left" data-dismiss="modal">
            <i class="icon-check"></i>
            Ok
        </button>
    </div>
</div>

