<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Admin Management
            <small>
                <i class="icon-double-angle-right"></i>
                View Admin List   
            </small>
        </h1>
    </div>
    <div class="hr hr32 hr-dotted"></div>

    <div class="row-fluid">   
        <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
        <?php

        if(count($admin)==0){
            echo '<span class="blue">No Admin Found</span>';
        }
        else
        { 
            echo '<thead>
            <tr>
            <th>Admin Name</th>
            <th>Admin Role</th>
            <th>Status</th> 
            <th>View</th>
            <th>Edit</th>    
            </tr>
            </thead>

            <tbody> ';   
            foreach($admin as $row1){                 

                echo '<tr>'; 
                echo               
                '<td>'.$row1->full_name.'</td>
                <td>'.$row1->admin_role_type.'</td>                       
                <td>'.$row1->status.'</td>
                <td><button name="admin_management_admin_view_details_btn" class="btn btn-small btn-grey"   id="'.$row1->user_id.'">
                <i class="icon-bar-chart"></i>
                View Details
                </button></td>
                <td><button name="admin_management_admin_modify_btn" class="btn btn-small btn-purple"   id="'.$row1->user_id.'">
                <i class="icon-edit"></i>
                Modify Admin
                </button></td>' ;
                echo '</tr>';
            }


            echo '</tbody>';
        }

        echo '</table>';
        echo '<button name="admin_management_admin_add_btn" class="btn btn-small btn-success">
        <i class=" icon-legal"></i>
        Add New Admin
        </button>';
        ?>   
    </div>
</div>


<div id="admin_management_modal_view_admin" class="modal hide fade" tabindex="-1">
    <div class="modal-header no-padding">
        <div class="table-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            View Admin Details
        </div>
    </div>

    <div class="modal-body no-padding">
        <div class="row-fluid">
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Description</th>
                        <th>Status</th>

                        <th>
                            <i class="icon-time bigger-110"></i>
                            Modificaton Date
                        </th>
                        <th>
                            <i class="icon-time bigger-110"></i>
                            Modificaton Time
                        </th>
                        <th>User</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td id = "admin_management_admin_name_td"></td>
                        <td id = "admin_management_admin_role_td"></td>
                        <td id = "admin_management_admin_description_td"></td>
                        <td id = "admin_management_admin_status_td"></td>
                        <td id = "admin_management_admin_date_td"></td>
                        <td id = "admin_management_admin_time_td"></td>
                        <td id = "admin_management_admin_user_td"></td>
                    </tr>


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


<div id="admin_management_modal_modify_admin" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Modify the Information</h4>
    </div>


    <form id="admin_management_modify_admin_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Full Name</label>

                        <div class="controls">
                            <input type="text" id="full_name" name="full_name" /> 
                        </div>
                    </div>          

                    <div class="control-group">
                        <label class="control-label" for="form-field-first">Description</label>

                        <div class="controls">
                            <textarea class="span12" id="description" name="description"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Status</label>

                        <div class="controls">
                            <select id="admin_status" name="admin_status">
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

<div id="admin_management_modify_success" class="modal hide" tabindex="-1">
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

<div id="admin_management_modal_add_admin" class="modal hide" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="blue bigger">Fill Up The Following Form</h4>
    </div>


    <form id="admin_management_add_admin_form" method = "post">
        <div class="modal-body overflow-visible">
            <div class="row-fluid">


                <div class="vspace"></div>

                <div class="span7">


                    <div class="control-group">
                        <label class="control-label" for="form-field-username">Full Name</label>

                        <div class="controls">
                            <input type="text" id="form-field-username" name="full_name" placeholder="Full Name" value="" required/>
                        </div>
                    </div>        
                    
                    <select id="admin_role" name="admin_role">
                    </select>

                    <div class="control-group">
                        <label class="control-label" for="form-field-first">Description</label>

                        <div class="controls">
                            <textarea class="span12" id="form-field-8" name="description" placeholder="Description"></textarea>
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

<div id="admin_management_add_success" class="modal hide" tabindex="-1">
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