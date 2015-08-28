<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_management extends CI_Controller {

    public function index()
    {	
        $this->load->model('admin_management_model');
        $this->template->build('welcome_message');
    }
    public function view_admin_list()
    {
        $this->load->model('admin_management_model');
        $data['admin'] = $this->admin_management_model->get_admin_data();
        $this->template->build('view_admin_list',$data);
    }

    public function get_admin_data( $admin_id){

        $this->load->model('admin_management_model'); 
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->admin_management_model->get_admin_specific($admin_id)));

    }

    public function modify_admin($admin_id)
    {

        $this->load->model('admin_management_model');
                                                  
        $data = array(                   
            'full_name' => $this->input->post('full_name'),  
            'description' => $this->input->post('description'), 
            'status' => $this->input->post('admin_status'),
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );                                                           
        $this->add_to_activity_log("Admin Modified - ".$this->input->post('full_name'));
        $data2['success']=$this->admin_management_model->modify_admin($data,$admin_id);  
        echo json_encode(array('val' => $data2['success']));
    }

    public function get_admin_roles_data( ){

        $this->load->model('admin_management_model'); 
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->admin_management_model->get_admin_roles()));

    }

    public function add_new_admin()
    {

        $this->load->model('admin_management_model');
        
        ///////////////////create user
        

        $data4=array (
            'username'=> $this->input->post('full_name'),
            'email'=> $this->input->post('full_name')."@gmail.com",
            'password'=>'iit123', 
            'ip_address'=> $this->input->ip_address(),  
            'active' => '1',
            'created_on' => date("Y-m-d")
        );

        $this->add_to_activity_log("New User Added - ".$this->input->post('first_name'));
        $user_id=$this->admin_management_model->add_new_user($data4);
                                               

        $data = array(            

            'full_name' => $this->input->post('full_name'), 
            'description' => $this->input->post('description'),
            'admin_role_id' => $this->input->post('admin_role'),
            'status' => 'activated',
            'user_id' =>$user_id,
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );
        $this->add_to_activity_log("New Admin Added - ".$this->input->post('first_name'));
        $data2['success']=$this->admin_management_model->add_new_admin($data);  
        echo json_encode(array('val' => $data2['success']));
    }

    public function add_to_activity_log($string)
    {

        $this->load->model('admin_management_model');               
        $data = array(                                         
            'activity_description' => $string, 
            'activity_date' => date("Y-m-d"),
            'activity_time' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_id' => 'an admin'
        );                 
        $this->admin_management_model->add_to_activity_log($data);                                                         
    }
    
    //activity log
    
    public function view_activity_log()
    {
        $this->load->model('admin_management_model');
        $data['activity'] = $this->admin_management_model->get_activity_log_data();
        $this->template->build('view_activity_log',$data);
    }

}