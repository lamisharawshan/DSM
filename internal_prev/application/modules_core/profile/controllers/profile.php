<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{   
	   $this->load->model('profile_model');
        $this->template->build('profile_view');
	   
	}

    public function view_profile()
    {
        $this->load->model('profile_model');
        $data['basic']=$this->profile_model->get_basic_info();
        $this->template->build('profile_view',$data);
		
		//echo "Helllo "+ $first_name +"HHHHHHHHIIIIIIi";
    }
	
	public function modified_profile()
	{
		 
		$username=$this->input->post('username');
		$e_mail=$this->input->post('e_mail');
		$contact=$this->input->post('contact');
		$social_network_address=$this->input->post('social_network_address');
		$address=$this->input->post('address');	
			
	//	echo "Shantoooo "+ $first_name +"SKKKKKKKKKKKK";
		
		$this->load->model('profile_model');
		
		echo (json_encode($this->profile_model->edit_Profile($username ,$e_mail,$contact,$social_network_address,$address)));
	}	
		
	public function modified_password()
	{
	//	echo "HABDHGDHF";
		
		$new_password=$this->input->post('password');
		
		$this->load->model('profile_model');

		echo (json_encode($this->profile_model->edit_Password($new_password)));
	}
	
	
		public function modified_description()
	{
	//	echo "HABDHGDHF";
		
		$description=$this->input->post('description');
		
		$this->load->model('profile_model');

		echo (json_encode($this->profile_model->edit_description($description)));
	}
	
	
}

