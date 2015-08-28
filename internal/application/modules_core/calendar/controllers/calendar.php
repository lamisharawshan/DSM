<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function index()
	{   
	   //$this->load->model('calendar_model');
       // $this->template->build('calendar_view');
	   $this->load->view('calendar_view');
	   $this->template->build('calendar_view');
	   
	}
/*
    public function view_calendar()
    {

		//echo "hello";
		 //$this->load->model('calendar_model');
       // $this->template->build('calendar_view');
        //$this->load->model('calendar_model');
      //  $data['basic']=$this->calendar_model->get_basic_info();
        //$this->template->build('calendar_view',$data);
		
		//echo "Helllo "+ $first_name +"HHHHHHHHIIIIIIi";
    }*/
	
	public function New_Event()
	{
		 
		$title=$this->input->post('title');
		$start=$this->input->post('start');	
			
//echo "Shantoooo "+ $first_name +"SKKKKKKKKKKKK";
		
		$this->load->model('calendar_model');
		
		echo (json_encode($this->calendar_model->edit_calendar($title ,$start)));
	}	
/*		
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
	*/
	
}

