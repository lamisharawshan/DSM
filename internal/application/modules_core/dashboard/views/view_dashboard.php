<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Dashboard
            <small>
                <i class="icon-double-angle-right"></i>
                Overview
            </small>
        </h1>
    </div>

    <div class="hr hr32 hr-dotted"></div>

    <div class="row-fluid">
        <div class="span12">
            <?php
            if($session_user_group=='students'){
                if(count($program_notification)!=0){
                    echo '<h4 class="blue">
                    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
                    Program Notifications

                    </h4>';

                    echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                    <thead>
                    <tr>

                    <th>Notification</th>
                    <th>Date</th>
                    <th>Attachments</th>      
                    </tr>
                    </thead>

                    <tbody>';
                    foreach($program_notification as $row1){
                        $program_notification_files_count=0;
                        foreach($program_notification_files as $row2){
                            if($row1->program_notification_id==$row2->program_notification_id) $program_notification_files_count++;
                        }
                        echo '<tr>   
                        <td';
                        if($program_notification_files_count!=0) echo ' ROWSPAN="'.$program_notification_files_count.'"';
                        echo '>';
                        echo $row1->notification;
                        echo '</td>
                        <td';
                        if($program_notification_files_count!=0) echo ' ROWSPAN="'.$program_notification_files_count.'"';
                        echo '>';
                        echo $row1->date_of_modification;
                        echo  '</td>';                   
                        if($program_notification_files_count==0) echo '<td>No Attachments</td></tr>'; 
                        else {           
                            $count=0;
                            foreach($program_notification_files as $row2){
                                if($row1->program_notification_id==$row2->program_notification_id) 
                                {
                                    if($count!=0) echo '<tr>';
                                    $count++;
                                    echo '<td><button name="dashboard_download_prog_notification_file_btn" class="btn btn-small btn btn-purple"  id="'.$row2->program_notification_files_id.'">
                                    <i class="icon-download-alt"></i>
                                    '.$row2->file_name.'
                                    </button></td></tr>';
                                }
                            }
                        }            
                    }


                    echo '</tbody>
                    </table>';
                }



                if(count($batch_notification)!=0){
                    echo '<h4 class="blue">
                    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
                    Batch Notifications

                    </h4>';

                    echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                    <thead>
                    <tr>

                    <th>Notification</th>
                    <th>Date</th>
                    <th>Attachments</th>      
                    </tr>
                    </thead>

                    <tbody>';
                    foreach($batch_notification as $row1){
                        $batch_notification_files_count=0;
                        foreach($batch_notification_files as $row2){
                            if($row1->notification_in_semester_log_id==$row2->notification_in_semester_log_id) $batch_notification_files_count++;
                        }
                        echo '<tr>   
                        <td';
                        if($batch_notification_files_count!=0) echo ' ROWSPAN="'.$batch_notification_files_count.'"';
                        echo '>';
                        echo $row1->notification;
                        echo '</td>
                        <td';
                        if($batch_notification_files_count!=0) echo ' ROWSPAN="'.$batch_notification_files_count.'"';
                        echo '>';
                        echo $row1->date_of_modification;
                        echo  '</td>';                   
                        if($batch_notification_files_count==0) echo '<td>No Attachments</td></tr>'; 
                        else {           
                            $count=0;
                            foreach($batch_notification_files as $row2){
                                if($row1->notification_in_semester_log_id==$row2->notification_in_semester_log_id) 
                                {
                                    if($count!=0) echo '<tr>';
                                    $count++;
                                    echo '<td><button name="dashboard_download_batch_notification_file_btn" class="btn btn-small btn btn-purple"  id="'.$row2->p_n_files_id.'">
                                    <i class="icon-download-alt"></i>
                                    '.$row2->file_name.'
                                    </button></td></tr>';
                                }
                            }
                        }            
                    }
                    echo '</tbody>
                    </table>';
                }
            }
            else if($session_user_group=='teachers'){
                if(count($programs)!=0)
                {
                    echo '<div class="tabbable">';
                    echo '<ul class="nav nav-tabs" id="teacher_dashboard_program_tab">';
                    $count=0;
                    foreach($programs as $row1){
                        echo '<li';
                        if($count==0) echo ' class="active"';
                        echo '>';
                        echo '<a data-toggle="tab" href="#'.$row1->program_id.'">         
                        '.$row1->program_name.'
                        </a>
                        </li>';
                        $count++;
                    }
                    echo '</ul>';
                    echo '</div>';



                    echo '<div class="tab-content">';                                    
                    $count2=0;     
                    foreach($programs as $row5){    
                        echo '<div id='.$row5->program_id.'';
                        if($count2==0) echo ' class="tab-pane in active"';
                        else echo ' class="tab-pane"';
                        echo '>';
                        echo '<h4 class="blue">
                        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
                        '.$row5->program_name.' Notifications

                        </h4><table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                        <thead>
                        <tr>

                        <th>Notification</th>
                        <th>Date</th>
                        <th>Attachments</th>      
                        </tr>
                        </thead>

                        <tbody>';

                        if(count($program_notification_all)!=0){

                            foreach($program_notification_all as $row1){

                                if($row5->program_id==$row1->program_id)
                                {
                                    $program_notification_files_count=0;
                                    foreach($program_notification_files as $row2){
                                        if($row1->program_notification_id==$row2->program_notification_id) $program_notification_files_count++;
                                    }
                                     
                                    echo '<tr>   
                                    <td';
                                    if($program_notification_files_count!=0) echo ' ROWSPAN="'.$program_notification_files_count.'"';
                                    echo '>';
                                    echo $row1->notification;
                                    echo '</td>
                                    <td';
                                    if($program_notification_files_count!=0) echo ' ROWSPAN="'.$program_notification_files_count.'"';
                                    echo '>';
                                    echo $row1->date_of_modification;
                                    echo  '</td>';                   
                                    if($program_notification_files_count==0) echo '<td>No Attachments</td></tr>'; 
                                    else { 
                                    
                                    
                                                       
                                        $files_count=0;
                                        foreach($program_notification_files as $row3){
                                            if($row1->program_notification_id==$row3->program_notification_id) 
                                            {
                                                if($files_count!=0) echo '<tr>';
                                                $files_count++;
                                                echo '<td><button name="dashboard_download_prog_notification_file_btn" class="btn btn-small btn btn-purple"  id="'.$row2->program_notification_files_id.'">
                                                <i class="icon-download-alt"></i>
                                                '.$row3->file_name.'
                                                </button></td></tr>';
                                            }
                                        }
                                        
                                    
                                       
                                        
                                        
                                    }  
                                }

                            }
                        }  
                        echo '</tbody>

                        </table>';


                        echo '</div>';
                        $count2++;


                    }         
                    echo '</div>';  

                }

            }
            ?>

        </div>
    </div>
</div>

