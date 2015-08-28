<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Admin Management
            <small>
                <i class="icon-double-angle-right"></i>
                View Activity Log   
            </small>
        </h1>
    </div>
    <div class="hr hr32 hr-dotted"></div>

    <div class="row-fluid" >   
        <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
        <?php
        
        $acivity_count=0; 
        $activity_no=10;

        if(count($activity)==0){
            echo '<span class="blue">No Activity Found</span>';
        }
        else
        { 
        
            echo '<thead>
            <tr>
            <th>Activity User</th>
            <th>Activity Description</th>
            <th>Activity Date</th>
            <th>Activity Time</th>
            <th>User IP</th>    
            </tr>
            </thead>

            <tbody> ';   
            foreach($activity as $row1)
            {  
                $acivity_count++;           
                echo '<tr>'; 
                echo               
                '<td>'.$row1->username.'</td>
                <td>'.$row1->activity_description .'</td>                       
                <td>'.$row1->activity_date.'</td>  
                <td>'.$row1->activity_time .'</td>                       
                <td>'.$row1->user_ip.'</td>  ' ;
                echo '</tr>';
                if($acivity_count==50) break;
            }


            echo '</tbody>';
        }

        echo '</table>';   
        ?>   
    </div>
</div>


