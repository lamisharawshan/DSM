<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Program Management
            <small>
                <i class="icon-double-angle-right"></i>
                Manage Program Structure
            </small>
        </h1>
    </div><!--/.page-header-->
    <h4 class="blue">
        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
        Programs
        <i class="icon-double-angle-right"></i>
        Semesters
        <i class="icon-double-angle-right"></i>
        Courses			
    </h4>
    <div class="hr hr32 hr-dotted"></div>

    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->

            <ul class="nav nav-list">

                <?php
                $program_staus=1;

                $program_counter=0;
                foreach($programs as $row1){
                    $program_counter++;
                    echo '<li>';
                    echo '	<a href="#" class="dropdown-toggle">';
                    echo '		<i class="icon-desktop"></i>';
                    echo '		<span class="menu-text">'; 
                    echo 		$row1->program_name ;
                    echo  ' <b>(';
                    echo $row1->status;
                    echo ')</b>';
                    echo '		</span>';
                    if($program_staus==1){
                        echo '		&nbsp;&nbsp;<button name="program_management_add_program_button" class="btn btn-small btn-success" >
                        <i class="icon-edit"></i>
                        Add New Program
                        </button>';

                        $program_staus=0;
                    }
                    echo '		&nbsp;&nbsp;<button name="program_management_modify_program_button" class="btn btn-small btn-warning"  id="'.$row1->program_id.'">
                    <i class="icon-wrench"></i>
                    Modify This Program
                    </button>';
                    echo'		<b class="arrow icon-angle-down"></b>';
                    echo '	</a>';
                    echo '		<ul class="submenu">';

                    $semester_staus=1;
                    $semester_counter=0;
                    foreach($semesters as $row2){

                        if($row1->program_id==$row2->program_id){
                            $semester_counter++;

                            echo '			<li>';
                            echo '				<a href="#" class="dropdown-toggle">
                            <i class="icon-double-angle-right"></i>';
                            echo 					$row2->semester_name	;
                            echo  ' <b>(';
                            echo $row2->status;
                            echo ')</b>';        

                            if($semester_staus==1){
                                echo '		&nbsp;&nbsp;<button name="program_management_add_semester_button" class="btn btn-small btn-success"  id="'.$row1->program_id.'">
                                <i class="icon-edit"></i>
                                Add New Semester
                                </button>';
                                $semester_staus=0;
                            }
                            echo '					&nbsp;&nbsp;<button name="program_management_modify_semester_button" class="btn btn-small btn-grey"  id="'.$row2->semester_id.'">
                            <i class="icon-wrench"></i>
                            Modify This Semester
                            </button>';

                            echo'					<b class="arrow icon-angle-down"></b>';
                            echo '				</a>';


                            echo '				<ul class="submenu">';

                            $course_staus=1;
                            $course_counter=0;
                            foreach($courses as $row3){
                                if($row1->program_id==$row2->program_id && $row2->semester_id==$row3->semester_id){
                                    $course_counter++;
                                    echo '			<li>  ';
                                    echo '  <a href="#" class="dropdown-toggle" style="text-decoration: none;"> ';
                                    echo '<i class="icon-pencil"></i>';

                                    echo 					$row3->course_title;
                                    echo  ' <b>(';
                                    echo $row3->status;
                                    echo ')</b>';

                                    // if($course_staus==1){
                                    //                                        echo '		&nbsp;&nbsp;<button name="program_management_add_course_button" class="btn btn-small btn-success"  id="'.$row2->semester_id.'">
                                    //                                        <i class="icon-edit"></i>
                                    //                                        Add New Course
                                    //                                        </button>';
                                    //                                        $course_staus=0;
                                    //                                    }
                                    //                                    echo '					&nbsp;&nbsp;<button name="program_management_modify_course_button" class="btn btn-small btn-yellow"  id="'.$row3->course_id.'">
                                    //                                    <i class="icon-wrench"></i>
                                    //                                    Modify This Course
                                    //                                    </button>';
                                    echo '					</a>  ';
                                    echo '</li>';
                                }

                            }
                            if($course_counter==0){
                                echo '	<li><a>	
                                <button name="program_management_add_course_button" class="btn btn-small btn-success"  id="'.$row2->semester_id.'">
                                <i class="icon-edit"></i>
                                Add New Course
                                </button></a>
                                </li>';
                            }

                            echo '				</ul>';

                            echo '			</li>';

                        }

                    }

                    if($semester_counter==0){
                        echo '	<li><a>	
                        <button name="program_management_add_semester_button" class="btn btn-small btn-success" id="'.$row1->program_id.'">
                        <i class="icon-edit"></i>
                        Add New Semester
                        </button></a>
                        </li>';
                    }

                    echo '		</ul>';
                    echo '</li>';

                }

                if($program_counter==0){
                    echo '	<li><a>	
                    <button name="program_management_add_program_button" class="btn btn-small btn-success"  >
                    <i class="icon-edit"></i>
                    Add New Program
                    </button></a>
                    </li>';
                }
                ?>


            </ul>



            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>





<div id="program_management_modal_add_program" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>


    <form id="program_management_add_program_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Program Name</label>

                        <div class="controls">
                            <input type="text" id="form-field-username" name="program_name" placeholder="Program Name" value="" required/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-first">Program Description</label>

                        <div class="controls">
                            <textarea class="span12" id="form-field-8" name="program_description" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-small" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>                     

            <button type="submit" class="btn btn-small btn-primary">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>



<div id="program_management_modal_add_semester" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>


    <form name="program_management_add_semester_form" id="program_management_add_semester_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">

                <h5 class="blue bigger">Semester Information</h5>
                <div class="vspace"></div>
                    <div class="control-group">  
                        <input type="text" id="form-field-username" name="semester_name" placeholder="Semester Name" value=""  required/>

                        <input type="text" id="form-field-8" name="total_credit" placeholder="Total Credit" value=""  required pattern="[0-9]*" title="numbers only"/>
                    </div>
                    <h5 class="blue bigger">Course Information</h5>

					<div  class="slim-scroll" data-height="200">
                        
                            <input type="text" name="course_code[]" placeholder="Course Code" value=""  required/>
    
                            <input type="text" name="course_title[]" placeholder="Course Title" value=""  required/>
    
                            <input type="text" name="course_credit[]" placeholder="Course Credit" value=""  required pattern="[0-9]*" title="numbers only"/>
    
                            <button type="button" class="btn btn-small" name="prog_mng_add_course_btn" id="prog_mng_add_course_btn">
                                Add Another Course
                            </button>
                	</div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-small" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>                     

            <button type="submit" class="btn btn-small btn-primary">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>
</div>



<!--<div id="program_management_modal_add_course" class="modal hide" tabindex="-1">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="blue bigger">Fill Up The Following Form</h4>
</div>


<form id="program_management_add_course_form" method = "post">
<div class="modal-body overflow-visible">
<div class="row-fluid">


<div class="vspace"></div>

<div class="span7">


<div class="control-group">
<label class="control-label" for="form-field-username">Course Code</label>

<div class="controls">
<input type="text" id="form-field-username" name="course_code" placeholder="Course Code" value=""  required/>
</div>
</div>

<div class="control-group">
<label class="control-label" for="form-field-username">Course Title</label>

<div class="controls">
<input type="text" id="form-field-username" name="course_title" placeholder="Course Title" value=""  required/>
</div>
</div>

<div class="control-group">
<label class="control-label" for="form-field-first">Course Credit</label>

<div class="controls">
<input type="text" id="form-field-8" name="course_credit" placeholder="Course Credit" value=""  required pattern="[0-9]*" title="numbers only"/>
</div>                                          
</div>
</div>
</div>
</div>

<div class="modal-footer">
<button class="btn btn-small" data-dismiss="modal">
<i class="icon-remove"></i>
Cancel
</button>                     

<button type="submit" class="btn btn-small btn-primary">
<i class="icon-ok"></i>
Save
</button>
</div>
</form>
</div>-->




<div id="program_management_add_success" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Successfully Added</h4>
    </div>


    <div class="modal-footer">
        <button class="btn btn-small" data-dismiss="modal">
            <i class="icon-ok"></i>
            OK
        </button>

    </div> 
</div>



<div id="program_management_modal_modify_program" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Modify the Information</h4>
    </div>


    <form id="program_management_modify_program_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Program Name</label>

                        <div class="controls">
                            <input type="text" id="program_name" name="program_name" /> 
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-first">Program Description</label>

                        <div class="controls">
                            <textarea class="span12" id="program_description" name="program_description"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Status</label>

                        <div class="controls">
                            <select id="program_status" name="program_status">
                                <option value="activated" >Active</option>
                                <option value="deactivated">Deactive</option>  
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-small" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>                     

            <button type="submit" class="btn btn-small btn-primary">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>                        
</div>



<div id="program_management_modal_modify_semester" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Modify the Information</h4>
    </div>


    <form id="program_management_modify_semester_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Semester Name</label>

                        <div class="controls">
                            <input type="text" id="semester_name" name="semester_name" /> 
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-first">Semester Credit</label>

                        <div class="controls">
                            <input type="text" id="total_credit" name="total_credit" placeholder="Total Credit" value=""  required pattern="[0-9]*" title="numbers only"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Status</label>

                        <div class="controls">
                            <select id="semester_status" name="semester_status">
                                <option value="activated" >Active</option>
                                <option value="deactivated">Deactive</option>  
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-small" data-dismiss="modal">
                <i class="icon-remove"></i>
                Cancel
            </button>                     

            <button type="submit" class="btn btn-small btn-primary">
                <i class="icon-ok"></i>
                Save
            </button>
        </div>
    </form>                        
</div>




<div id="program_management_modify_success" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Successfully Modified</h4>
    </div>


    <div class="modal-footer">
        <button class="btn btn-small" data-dismiss="modal">
            <i class="icon-ok"></i>
            OK
        </button>

    </div> 
</div>