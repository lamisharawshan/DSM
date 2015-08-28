<?php
class dashboard_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function get_program_notification($user_id){
        $query=$this->db->query("SELECT `program_notification_id` , program_notifications.program_id,`notification`,program_notifications.date_of_modification
            FROM `program_notifications` , `batches` , `students`
            WHERE program_notifications.program_id = batches.program_id
            AND batches.batch_id = students.batch_id
            AND students.user_id ='".$user_id."'  ORDER BY program_notifications.date_of_modification DESC");
        return $query->result();
    }

    function get_program_notification_files(){
        $query=$this->db->query("SELECT * from `program_notification_files`");
        return $query->result();
    }

    function get_batch_notification($user_id){
        $query=$this->db->query("SELECT `notification_in_semester_log_id` , `notification`, notifications_in_semester_log.date_of_modification
            FROM `notifications_in_semester_log` , `semester_log`,`students`
            WHERE notifications_in_semester_log.semester_log_id = semester_log.semester_log_id
            AND semester_log.batch_id = students.batch_id
            AND semester_log.academic_status='active'
            AND students.user_id ='".$user_id."'  ORDER BY notifications_in_semester_log.date_of_modification DESC");
        return $query->result();
    }

    function get_batch_notification_files(){
        $query=$this->db->query("SELECT * from `notification_files_in_semester_log`");
        return $query->result();
    }
    function get_programs(){
        $query=$this->db->query("SELECT * from `programs`");
        return $query->result();
    }
    
    function get_program_notification_all(){
        $query=$this->db->query("SELECT * from `program_notifications`");
        return $query->result();
    }

}
?>