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
	 public function institution()
    {
        $this->load->model('faculty_member_model');
        $data['faculty_member']=$this->faculty_member_model->get_members();
        $this->template->build('faculty_member_upload_view',$data);
    }

   
    public function delete_assignment($file_dir)
	         {
	          $this->load->model('faculty_member_model');
	          if ($this->faculty_member_model->delete_file($file_dir))
	          {
	           	$this->faculty();
	          }
	          else
	         {
	           $status = 'error';
	           $msg = 'Something went wrong when deleteing the file, please try again';
	         }
	        }


	public function choice_program_wise_batch()
    {
        $this->load->model('about_iit_model');
		$data['choice_For_Program'] = $this->about_iit_model->get_choice();
        $this->template->build('choice_program_wise_batch_view',$data);
    }

        function do_upload()
       {
         $config['upload_path'] = './application/modules_core/uploads/';
         $config['allowed_types'] = '*';
         $config['max_size']    = '1000000';
         $config['max_width']  = '1024000';
         $config['max_height']  = '768000';
         //$config['file_name'] = mktime()."-".$_FILES['path']['name'];
        $this->load->helper('date');
        $datestring = " %Y / %m / %d - %h:%i %a";
        $time = time();
        $date=mdate($datestring, $time);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $course_code=$this->input->post('course_code');
        $field_name="userfile";
        $membertype=$this->input->post('MemType');

        if ( ! $this->upload->do_upload($field_name))
        {

          echo  $this->upload->display_errors();
          $this->upload->display_errors('<p>', '</p>');
       }
       else
      {
          $data =  $this->upload->data();
          $Name=$this->input->post('Name');
          $designation=$this->input->post('designation');
          $Phone=$this->input->post('Phone');
          $file_name= $data["file_name"] ;
          $file_size= $data["file_size"] ;
          $file_size=$file_size."kb";

         // uploading successfull, now do your further actions
         $data = array('upload_data' => $this->upload->data());
         $config['upload_path'] = './application/modules_core/FacultyDescription/';
		          $config['allowed_types'] = '*';
		          $config['max_size']    = '1000000';
		          $config['max_width']  = '1024000';
		          $config['max_height']  = '768000';
		          //$config['file_name'] = mktime()."-".$_FILES['path']['name'];

		         $this->load->helper('date');
		         $datestring = " %Y / %m / %d - %h:%i %a";
		         $time = time();
		         $date=mdate($datestring, $time);
		         $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                 $pdfURL="userfile1";
                 $this->upload->do_upload($pdfURL);
                 $data =  $this->upload->data();
                  $file_name1= $data["file_name"] ;
                  $this->load->model('faculty_member_model');

                 $file_id = $this->faculty_member_model->insert_file($file_name, $Name,$designation,$Phone, $file_name1, $membertype);
                 //$this->load->view('upload_success', $data);
                 $this->institution();

       }


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