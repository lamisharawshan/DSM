<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_events extends CI_Controller {

	
	public function index()
	{

		//$this->template->build('welcome_message');
	}
	public function view_news_events()
	{

		$this->load->model("news_events_model");
		$data['all_events'] = $this->news_events_model->get_full_event_information();
		$this->template->build('news_events_view',$data);
	}

	public function modify_events($id)
	{
		$this->load->model("news_events_model");

		echo (json_encode($this->news_events_model->get_specific_event($id)));
	}

	public function save_modified_events()
	{
		$description=$this->input->post('description');
		$place=$this->input->post('place');
		$date=$this->input->post('date');
		$time=$this->input->post('time');
		$status=$this->input->post('status');
		$id=$this->input->post('id');
		//print($id);exit;
		$this->load->model("news_events_model");

		echo (json_encode($this->news_events_model->update_events($id,$description,$place,$date,$time,$status)));
	}



	public function add_news_events()
	{
	echo "<script type='text/javascript'>alert('Hi');</script>";
		$description=$this->input->post('description');
		$place=$this->input->post('place');
		$date=$this->input->post('date');
		$time=$this->input->post('time');
		$status=$this->input->post('status');

		$this->load->model("news_events_model");
		echo "<script type='text/javascript'>alert('$description');</script>";
		
		echo (json_encode($this->news_events_model->add_events($description,$place,$date,$time,$status)));
	}
}


