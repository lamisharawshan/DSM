<?php
class batch_management_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }


    function get_programs(){
        $query=$this->db->query("SELECT * FROM programs");
        return $query->result();
    }

    function get_batches(){
        $query=$this->db->query("SELECT * from batches");
        return $query->result();
    }

    function get_students(){
        $query=$this->db->query("SELECT * FROM students");
        return $query->result();
    }

    function get_semesters(){
        $query=$this->db->query("SELECT * FROM semester_log");
        return $query->result();
    }

    function get_re_students(){        
        $query=$this->db->query("SELECT students.user_id,students.full_name,students.roll_number,students.registration_number,students.re_admission_status,students.status,batches.batch_name FROM students,batches WHERE re_admission_status='activated' AND students.batch_id=batches.batch_id");
        return $query->result();
    }

    function get_batch_specific($batch_id){
        $query=$this->db->query("SELECT batches.batch_id, batches.batch_name, batches.program_id, batches.academic_status, batches.status, batches.date_of_modification, batches.time_of_modification, batches.user_of_modification, semesters.semester_name
            FROM `batches` , `semester_log` , `semesters`
            WHERE batches.batch_id = semester_log.batch_id
            AND semester_log.semester_id = semesters.semester_id
            AND semester_log.academic_status = 'active' AND batches.batch_id='".$batch_id."'");
        if($query->result()==NULL)
            $query=$this->db->query("SELECT * from batches WHERE batch_id='".$batch_id."'");
        return $query->result();           

    }

    function get_student_specific($student_id){
        $query=$this->db->query("SELECT * FROM students WHERE user_id='".$student_id."'");
        return $query->result();          
    }

    function get_re_student_specific($student_id){   
        $query=$this->db->query("SELECT students.user_id,students.full_name,students.roll_number,students.registration_number,students.re_admission_status,students.status,batches.batch_name FROM students,batches WHERE re_admission_status='activated' AND students.batch_id=batches.batch_id AND user_id='".$student_id."'");
        return $query->result();
    }



    //manage

    function add_new_batch($data) {

        $this->db->insert('batches', $data);          
        return  mysql_insert_id();

    }

    function add_new_user($data) {
        
        ///////////////////create user
        

        $this->db->insert('users', $data);    
        return  mysql_insert_id();

    }


    function add_new_student($insert_stu_data) {

        $this->db->insert('students', $insert_stu_data);    
        return ($this->db->affected_rows() != 1) ? false : true;

    }


    function re_add_new_student($data,$user_id) {

        $this->db->where('user_id',$user_id);
        $result = $this->db->update('students', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }

    }

    function modify_batch($data,$batch_id) {

        $this->db->where('batch_id',$batch_id);
        $result = $this->db->update('batches', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }

    }

    function modify_student($data,$student_id) {

        $this->db->where('user_id',$student_id);
        $result = $this->db->update('students', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }
    }

    //promote batch

    function get_semester_specific($semester_id){
        $query=$this->db->query("SELECT `semester_log_id` , `semester_log_name` , `starting_date` , `ending_date` , semester_log.academic_status, semester_log.status, semester_log.date_of_modification, semester_log.time_of_modification, semester_log.user_of_modification, semesters.semester_name
            FROM semester_log, semesters
            WHERE semester_log.semester_id = semesters.semester_id && semester_log.semester_log_id = '".$semester_id."'");
        return $query->result();
    }


    function get_semester_choice_data($batch_id){
        $query=$this->db->query("SELECT semester_id,semester_name,semesters.status FROM `semesters`,`batches` WHERE batches.program_id=semesters.program_id AND batches.batch_id='".$batch_id."'");
        return $query->result();
    }

    function get_semester_choice_course_data($semester_id){
        $query=$this->db->query("SELECT * FROM `courses` WHERE semester_id='".$semester_id."'");
        return $query->result();
    }

    function get_batch_program_id($batch_id){
        $query=$this->db->query("SELECT program_id FROM `batches` WHERE batch_id='".$batch_id."'");
        $row = $query->row();
        return $row->program_id;
    }

    function get_batch_name($batch_id){
        $query=$this->db->query("SELECT batch_name FROM `batches` WHERE batch_id='".$batch_id."'");
        $row = $query->row();
        return $row->batch_name;
    }

    function get_semester_name($semester_id){
        $query=$this->db->query("SELECT semester_name FROM `semesters` WHERE semester_id='".$semester_id."'");
        $row = $query->row();
        return $row->semester_name;
    }

    function update_semester_log_previous_data($batch_id){
        $query=$this->db->query("SELECT * FROM `semester_log` WHERE academic_status='active' AND batch_id='".$batch_id."'");


        if($query->num_rows()>0)
        {                         
            $semester_log_id=$query->row()->semester_log_id;                                                                                                                                                                                                
            $result=$this->db->query("UPDATE `semester_log` SET academic_status='passed',`ending_date`='".date("Y-m-d h:m:s")."' WHERE semester_log_id='".$semester_log_id."'");

            $dataA = array(                                         
                'activity_description' => "Semester Log Modified ".$query->row()->semester_log_name, 
                'activity_date' => date("Y-m-d"),
                'activity_time' => date("h:m:s"),
                'user_ip' => $this->input->ip_address(),
                'user_id' => 'an admin'
            );                 
            $this->add_to_activity_log($dataA);

            if(!$result) {
                return false;
            }
            else {
                return true;
            }
        } 
        return true;
    }

    function add_semester_log($data) {

        $this->db->insert('semester_log', $data);    
        return  mysql_insert_id();

    }

    function get_courses_in_semester($semester_id,$semester_log_id){
        $query=$this->db->query("SELECT * FROM `courses` WHERE semester_id='".$semester_id."'");
        $ix=0; 
        
        foreach($query->result() as $row)  
        {                                        
        
            $data3=array(
                'semester_log_id' => $semester_log_id,
                'course_id' => $row->course_id,        
                'teacher_id' => $_POST['teacher'][$ix],                                                
                'status' =>'activated',                                                                
                'result_status' =>'pending', 
                'date_of_modification' => date("Y-m-d"),
                'time_of_modification' => date("h:m:s"),
                'user_ip' => $this->input->ip_address(),
                'user_of_modification' => 'an admin'
            ); 
             $ix++;               
                                                                   
            $this->db->insert('course_log', $data3);  
            $dataA = array(                                         
                'activity_description' => "Course Log Added with course=".$row->course_id, 
                'activity_date' => date("Y-m-d"),
                'activity_time' => date("h:m:s"),
                'user_ip' => $this->input->ip_address(),
                'user_id' => 'an admin'
            );                 
            $this->add_to_activity_log($dataA);                        
        }
        return ($this->db->affected_rows() != 1) ? false : true; 
    }      



    function add_students_in_semester_log($batch_id,$semester_log_id){  
        $data1['update'] = "0";
        $query=$this->db->query("SELECT * FROM `students` WHERE batch_id='".$batch_id."'");  
        foreach($query->result() as $row)
        {                                
            $data1['update'] = "1";
            $data3=array(
                'semester_log_id' => $semester_log_id,
                'user_id' => $row->user_id,                                                       
                'status' =>'activated',       
                'date_of_modification' => date("Y-m-d"),
                'time_of_modification' => date("h:m:s"),
                'user_ip' => $this->input->ip_address(),
                'user_of_modification' => 'an admin'
            );                                                                      
            $this->db->insert('students_in_semester_log', $data3);  
            $dataA = array(                                         
                'activity_description' => "Students_in_Semester_Log Added with user_id=".$row->user_id, 
                'activity_date' => date("Y-m-d"),
                'activity_time' => date("h:m:s"),
                'user_ip' => $this->input->ip_address(),
                'user_id' => 'an admin'
            );                 
            $this->add_to_activity_log($dataA);                        
        }   
        if($data1['update'] == "0") return true; 
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    function add_to_activity_log($data) {

        $this->db->insert('activity_log', $data);                
    }

    function get_teachers(){
        $query=$this->db->query("SELECT * FROM teachers WHERE status='activated'");
        return $query->result();
    }
    
    //noti
    
    function get_notification(){
        $query=$this->db->query("SELECT * FROM notifications_in_semester_log");
        return $query->result();
    }
    
    function get_notification_file(){
        $query=$this->db->query("SELECT * FROM notification_files_in_semester_log");
        return $query->result();
    }
    
     function add_new_batch_notification($data) {

        $this->db->insert('notifications_in_semester_log', $data);    
        return ($this->db->affected_rows() != 1) ? false : true;

    }
    
    function get_batch_notification_data_specific($notification_id){
        $query=$this->db->query("SELECT notifications_in_semester_log.notification_in_semester_log_id,notifications_in_semester_log.notification,notifications_in_semester_log.status,notifications_in_semester_log.date_of_modification,notifications_in_semester_log.time_of_modification,notifications_in_semester_log.user_of_modification,semester_log.semester_log_name FROM notifications_in_semester_log,semester_log WHERE semester_log.semester_log_id = notifications_in_semester_log.semester_log_id AND notification_in_semester_log_id='".$notification_id."'");
        return $query->result();      

    }
    
    function modify_batch_notification($data,$notification_id) {

        $this->db->where('notification_in_semester_log_id',$notification_id);
        $result = $this->db->update('notifications_in_semester_log', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }

    }
}
?>
