<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Batch Management
            <small>
                <i class="icon-double-angle-right"></i>
                Manage Batch Structure
            </small>
        </h1>
    </div><!--/.page-header-->
    <h4 class="blue">
        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
        Programs
        <i class="icon-double-angle-right"></i>
        Batches
        <i class="icon-double-angle-right"></i>
        Students			
    </h4>
    <div class="hr hr32 hr-dotted"></div>

    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->

            <ul class="nav nav-list">

                <?php         
                foreach($programs as $row1){
                    echo '<li>';
                    echo '	<a href="#" class="dropdown-toggle">';
                    echo '		<i class="icon-desktop"></i>';
                    echo '		<span class="menu-text">'; 
                    echo 		$row1->program_name ;
                    echo  ' <b>(';
                    echo $row1->status;
                    echo ')</b>';
                    echo '		</span>';
                    echo'		<b class="arrow icon-angle-down"></b>';
                    echo '	</a>';
                    echo '		<ul class="submenu">';

                    $batch_staus=1;
                    $batch_counter=0;
                    foreach($batches as $row2){

                        if($row1->program_id==$row2->program_id){
                            $batch_counter++;

                            echo '			<li>';
                            echo '				<a href="#" class="dropdown-toggle">
                            <i class="icon-double-angle-right"></i>';
                            echo 					$row2->batch_name;   
                            echo  ' <b>(';
                            echo $row2->status;
                            echo ')</b>';

                            if($batch_staus==1){
                                echo '		&nbsp;&nbsp;<button name="batch_management_add_batch_button" class="btn btn-small btn-success"  id="'.$row1->program_id.'">
                                <i class="icon-edit"></i>
                                Add New Batch
                                </button>';
                                $batch_staus=0;
                            }
                            echo '					&nbsp;&nbsp;<button name="batch_management_modify_batch_button" class="btn btn-small btn-grey"  id="'.$row2->batch_id.'">
                            <i class="icon-wrench"></i>
                            Modify This Batch
                            </button>';

                            echo'					<b class="arrow icon-angle-down"></b>';
                            echo '				</a>';


                            echo '				<ul class="submenu">';

                            $student_staus=1;
                            $student_counter=0;
                            foreach($students as $row3){
                                if($row1->program_id==$row2->program_id && $row2->batch_id==$row3->batch_id && $row3->re_admission_status=="deactivated"){
                                    $student_counter++;
                                    echo '			<li>
                                    <a href="#" class="dropdown-toggle" style="text-decoration: none;">
                                    <i class="icon-pencil"></i>';

                                    echo 					$row3->roll_number;
                                    echo  ' <b>(';
                                    echo $row3->status;
                                    echo ')</b>';

                                    if($student_staus==1){
                                        echo '		&nbsp;&nbsp;<button name="batch_management_add_student_button" class="btn btn-small btn-success"  id="'.$row2->batch_id.'">
                                        <i class="icon-edit"></i>
                                        Add New Student
                                        </button>';  
                                        echo '        &nbsp;&nbsp;<button name="batch_management_re_add_student_button" class="btn btn-small btn-success"  id="'.$row2->batch_id.'">
                                        <i class="icon-edit"></i>
                                        Re-Add Pending Student
                                        </button>';
                                        $student_staus=0;
                                    }
                                    echo '					&nbsp;&nbsp;<button name="batch_management_modify_student_button" class="btn btn-small btn-yellow"  id="'.$row3->user_id.'">
                                    <i class="icon-wrench"></i>
                                    Modify This Student
                                    </button>';
                                    echo '					</a>
                                    </li>';
                                }

                            }
                            if($student_counter==0){
                                echo '	<li><a>	
                                <button name="batch_management_add_student_button" class="btn btn-small btn-success"  id="'.$row2->batch_id.'">
                                <i class="icon-edit"></i>
                                Add New Student
                                </button></a>
                                </li>';  
                                echo '    <li><a>    
                                <button name="batch_management_re_add_student_button" class="btn btn-small btn-success"  id="'.$row2->batch_id.'">
                                <i class="icon-edit"></i>
                                Re-Add Pending Student
                                </button></a>
                                </li>';
                            }

                            echo '				</ul>';

                            echo '			</li>';

                        }

                    }

                    if($batch_counter==0){
                        echo '	<li><a>	
                        <button name="batch_management_add_batch_button" class="btn btn-small btn-success" id="'.$row1->program_id.'">
                        <i class="icon-edit"></i>
                        Add New Batch
                        </button></a>
                        </li>';
                    }

                    echo '		</ul>';
                    echo '</li>';

                }
                ?>


            </ul>



            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>


<div id="batch_management_modal_add_batch" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>


    <form id="batch_management_add_batch_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div> 


                <div class="control-group">
                    <label class="control-label" for="form-field-username">Batch Name</label>
                    <input type="text" id="form-field-username" name="batch_name" placeholder="Batch Name" value=""  required/>
                </div>
                <h5 class="blue bigger">Student Information</h5>

                <input type="text" id="no_of_students" name="no_of_students" placeholder="No of Students" value="" pattern="[0-9]*" title="numbers only"/>
                <button type="button" class="btn btn-small" name="batch_mng_add_batch_stu_btn" id="batch_mng_add_batch_stu_btn">
                    Add Students
                </button>

                <div  id="btch_manage_stu_info"class="slim-scroll" data-height="200">
                <div id="btch_manage_entry_point"  class="modal hide"></div>
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

<div id="batch_management_modal_add_student" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>


    <form id="batch_management_add_student_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Full Name</label>

                        <div class="controls">
                            <input type="text" id="full_name" name="full_name" placeholder="Full Name" value="" required/>
                        </div>
                    </div>  
                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Roll Number</label>

                        <div class="controls">
                            <input type="text" id="roll_number" name="roll_number" placeholder="Roll Number" value="" required/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Registration Number</label>

                        <div class="controls">
                            <input type="text" id="registration_number" name="registration_number" placeholder="Registration Number" value="" required/>
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

<div id="batch_management_modal_re_add_student" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>

    <form id="batch_management_re_add_student_form" method = "post">
        <div class="modal-body overflow-visible">
        <div class="row-fluid">


        <div class="vspace"></div>

        <?php
        $re_add_status=0;
        foreach($re_students as $row){
            $re_add_status=1;
        }
        if($re_add_status==0)
        {
            echo "<h5 class='blue'>No pending student</h5>" ;
        }
        else 
        {
            echo "<div class='control-group'>
            <label class='control-label' for='form-field-username'>Select Pending Student</label>

            <div class='controls'>
            <select id='batch_management_readd_selection' name='batch_management_readd_selection'>";

            foreach($re_students as $row){
                echo "<option value='";
                echo $row->user_id;
                echo "'>";
                echo $row->roll_number;
                echo "</option>"; 
            }

            echo "</select>
            </div>
            </div>  ";
            echo "<div class='control-group' id='batch_management_readd_student_information'> 
            <h5 class='blue'> 
            <i class='icon-hand-right icon-animated-hand-pointer blue'></i>Full Name:  
            <label class='control-label' id='batch_management_readd_full_name_td' style='display: inline-block; color:red;'>";
            echo $re_students[0]->full_name;
            echo "</label>
            <br/>                                                                
            <i class='icon-hand-right icon-animated-hand-pointer blue'></i>Roll Number:
            <label class='control-label' id='batch_management_readd_roll_no_td' style='display: inline-block; color:red;'>";
            echo $re_students[0]->roll_number;
            echo "</label>
            <br/>                                                                
            <i class='icon-hand-right icon-animated-hand-pointer blue'></i>Registration Number:
            <label class='control-label' id='batch_management_readd_reg_no_td' style='display: inline-block; color:red;'>";
            echo $re_students[0]->registration_number;
            echo "</label>
            <br/>                    
            <i class='icon-hand-right icon-animated-hand-pointer blue'></i>Current Batch:
            <label class='control-label' id='batch_management_readd_batch_name_td' style='display: inline-block; color:red;'>";
            echo $re_students[0]->batch_name;
            echo "</label>
            </h5>
            </div>
            <input type='hidden' id='batch_id' name='batch_id' value=''>

            <div class='control-group'>
            <label class='control-label' for='form-field-username'>New Roll Number</label>

            <div class='controls'>
            <input type='text' id='roll_number' name='roll_number' placeholder='New Roll Number' value='' required/>
            </div>
            </div> ";
        }


        echo '</div>
        </div>

        <div class="modal-footer">';
        if($re_add_status==0)
        {
            echo '<button class="btn btn-small" data-dismiss="modal">
            <i class="icon-remove"></i>
            OK
            </button>';
        }
        else
        {
            echo '
            <button class="btn btn-small" data-dismiss="modal">
            <i class="icon-remove"></i>
            Cancel
            </button>                     

            <button type="submit" class="btn btn-small btn-primary">
            <i class="icon-ok"></i>
            Save
            </button>';
        }
        echo '</div>';
        ?>
    </form>
</div>


<div id="batch_management_modal_modify_batch" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Modify the Information</h4>
    </div>


    <form id="batch_management_modify_batch_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Batch Name</label>

                        <div class="controls">
                            <input type="text" id="batch_name" name="batch_name"/> 
                        </div>
                    </div>  

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Academic Status</label>

                        <div class="controls">
                            <select id="batch_academic_status" name="batch_academic_status">
                                <option value="passed" >Passed</option>
                                <option value="active">Active</option>  
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Status</label>

                        <div class="controls">
                            <select id="batch_status" name="batch_status">
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


<div id="batch_management_modal_modify_student" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Modify the Information</h4>
    </div>


    <form id="batch_management_modify_student_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Full Name</label>

                        <div class="controls">
                            <input type="text" id="full_name" name="full_name" /> 
                        </div>

                        <label class="control-label" for="form-field-username">Roll Number</label>

                        <div class="controls">
                            <input type="text" id="roll_number" name="roll_number" /> 
                        </div>
                        <label class="control-label" for="form-field-username">Registration Number</label>

                        <div class="controls">
                            <input type="text" id="registration_number" name="registration_number" /> 
                        </div>
                    </div>  

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Re-Admission Status</label>

                        <div class="controls">
                            <select id="student_re_admission_status" name="student_re_admission_status">
                                <option value="activated" >Active</option>
                                <option value="deactivated">Deactive</option>  
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Status</label>

                        <div class="controls">
                            <select id="student_status" name="student_status">
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


<div id="batch_management_modify_success" class="modal hide" tabindex="-1">
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

<div id="batch_management_modal_add_success" class="modal hide" tabindex="-1">
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