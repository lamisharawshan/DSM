<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice_announcement extends CI_Controller {

	
	public function index()
	{

		//$this->template->build('welcome_message');
	}
	public function view_notice_announcement()
	{

		$this->load->model("notice_announcement_model");
		$data['all_events'] = $this->notice_announcement_model->get_full_notice_announcement_information();
		$this->template->build('notice_announcement_view',$data);
	}

	public function modify_notice_announcement($id)
	{
		$this->load->model("notice_announcement_model");

		echo (json_encode($this->notice_announcement_model->get_specific_notice_announcement($id)));
	}

	public function save_modified_notice_announcement()
	{
		$description=$this->input->post('description');
		$title=$this->input->post('title');
		$date=date("Y-m-d");

		$status=$this->input->post('status');
		$id=$this->input->post('id');
		//print($id);exit;
		$this->load->model("notice_announcement_model");
        $this->notice_announcement_model->update_notice_announcement($id,$description,$title,$date,$status);
        echo (json_encode($this->notice_announcement_model->get_specific_notice_announcement($id)));


    }



	public function add_notice_announcement()
	{
		$description=$this->input->post('description');
		$title=$this->input->post('title');
        $date=date("Y-m-d");


		$this->load->model("notice_announcement_model");
        $insert_id=$this->notice_announcement_model->add_notice_announcement($description,$title,$date);
		echo (json_encode($this->notice_announcement_model->get_specific_notice_announcement($insert_id)));
	}
}


