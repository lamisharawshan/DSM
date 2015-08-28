<?php
class program_management_model extends CI_Model{

    function __construct(){
        parent::__construct();


    }


    function get_programs(){
        $query=$this->db->query("SELECT * FROM programs");
        return $query->result();
    }

    function get_semesters(){
        $query=$this->db->query("SELECT * FROM semesters");
        return $query->result();
    }

    function get_courses(){
        $query=$this->db->query("SELECT * FROM courses");
        return $query->result();
    }

    function get_program_specific($program_id){
        $query=$this->db->query("SELECT * FROM programs WHERE program_id='".$program_id."'");
        return $query->result();         

    }
    function get_semester_specific($semester_id){
        $query=$this->db->query("SELECT semesters.semester_id,semesters.semester_name,semesters.total_credit,semesters.status,semesters.date_of_modification,semesters.time_of_modification,semesters.user_of_modification,programs.program_name FROM semesters,programs WHERE semesters.program_id = programs.program_id AND semester_id='".$semester_id."'");
        return $query->result();       

    }

    function get_course_specific($course_id){
        $query=$this->db->query("SELECT courses.course_id,courses.course_code,courses.course_title,courses.course_credit,courses.status,courses.date_of_modification,courses.time_of_modification,courses.user_of_modification,semesters.semester_name,programs.program_name FROM courses,semesters,programs WHERE courses.semester_id=semesters.semester_id AND semesters.program_id = programs.program_id AND course_id='".$course_id."'");
        return $query->result();       

    }
    function add_new_program($data) {

        $this->db->insert('programs', $data);    
        return ($this->db->affected_rows() != 1) ? false : true;

    }


    function add_new_semester($data) {

        $this->db->insert('semesters', $data); 
		   
        return  mysql_insert_id();

    }

    function add_new_course($insert_course_data) {

        $this->db->insert('courses', $insert_course_data);    
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    function modify_program($data,$program_id) {

        $this->db->where('program_id',$program_id);
        $result = $this->db->update('programs', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }

    }

    function modify_semester($data,$semester_id) {

        $this->db->where('semester_id',$semester_id);
        $result = $this->db->update('semesters', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }

    }

    function modify_course($data,$course_id) {

        $this->db->where('course_id',$course_id);
        $result = $this->db->update('courses', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }

    }
    
    function get_program_notifications(){
        $query=$this->db->query("SELECT * FROM  program_notifications ORDER BY date_of_modification DESC");
        return $query->result();
    }
    
    function get_program_notification_files(){
        $query=$this->db->query("SELECT * FROM  program_notification_files");
        return $query->result();
    }
    
    function add_new_program_notification($data) {

        $this->db->insert('program_notifications', $data);    
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    
    function get_program_notification_data_specific($notification_id){
        $query=$this->db->query("SELECT program_notifications.program_notification_id,program_notifications.notification,program_notifications.status,program_notifications.date_of_modification,program_notifications.time_of_modification,program_notifications.user_of_modification,programs.program_name FROM program_notifications,programs WHERE programs.program_id = program_notifications.program_id AND program_notification_id='".$notification_id."'");
        return $query->result();      

    }
    
    function modify_program_notification($data,$notification_id) {

        $this->db->where('program_notification_id',$notification_id);
        $result = $this->db->update('program_notifications', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }

    }
    
    function add_to_activity_log($data) {

        $this->db->insert('activity_log', $data);                
    }
}
?>