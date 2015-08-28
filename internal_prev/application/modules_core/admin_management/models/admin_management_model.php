<?php
class admin_management_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    
    function get_admin_data(){
    
        $query=$this->db->query("SELECT `user_id`, admin_roles.admin_role_type, `full_name`, `description`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip` FROM `admins`,`admin_roles` WHERE admin_roles.admin_role_id=admins.admin_role_id");
        return $query->result();
    } 
    
    function get_admin_specific($admin_id){     
        $query=$this->db->query("SELECT  `user_id`, admin_roles.admin_role_type, `full_name`, `description`, `status`, `date_of_modification`, `time_of_modification`, `user_of_modification`, `user_ip` FROM `admins`,`admin_roles` WHERE admin_roles.admin_role_id=admins.admin_role_id AND user_id='".$admin_id."'");
        return $query->result();         

    }
    
    function modify_admin($data,$admin_id) {

        $this->db->where('user_id',$admin_id);
        $result = $this->db->update('admins', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }
    }
    
    function get_admin_roles(){
        $query=$this->db->query("SELECT  * from admin_roles");
        return $query->result();         

    }
    
    function add_new_admin($data) {

        $this->db->insert('admins', $data);    
        return ($this->db->affected_rows() != 1) ? false : true;

    }
    
    function add_new_user($data) {
        
        ///////////create user

        $this->db->insert('users', $data);    
        return  mysql_insert_id();

    }
    
    
    function add_to_activity_log($data) {

        $this->db->insert('activity_log', $data);                
    }
    
    //activity log
    
    function get_activity_log_data(){          
        
        $query=$this->db->query("SELECT `activity_log_id`, `activity_date`, `activity_time`, `activity_description`, `user_ip`,users.username FROM `activity_log`,`users` WHERE users.id=activity_log.user_id order by activity_log.user_id desc");
        return $query->result();
    }
}
?>