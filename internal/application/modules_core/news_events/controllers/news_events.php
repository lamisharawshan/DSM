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
	
		$add_header=$this->input->post('add_header');
        $add_details=$this->input->post('add_details');
        $add_place=$this->input->post('add_place');
        $add_date=$this->input->post('add_date');
        $add_time=$this->input->post('add_time');
        echo $add_time;
		$date_of_modification = date("d-M-Y");
        $time_of_modification =  date("h:m:s");
        $news_status_timestamp = strtotime($date_of_modification.' '.$time_of_modification);
        $news_status_timestamp = new DateTime("@$news_status_timestamp");
        $data = array(

            'news_events_header' => $add_header,
            'news_events_details' => $add_details,
            'news_events_place' => $add_place,
            'news_events_date' => $add_date,
            'news_events_time' => $add_time,
            'news_events_type' => 'news_events',
            'news_status_timestamp' => $news_status_timestamp->format('Y-m-d H:i:s'),
            'status' => 'activated',
            'date_of_modification' => $date_of_modification ,
            'time_of_modification' => $time_of_modification,
            'user_of_modification' => 0,
            'user_ip' => $this->input->ip_address()
        );

        $log_data = array(

            'user_id' => 0,
            'activity_date' => date("d-M-Y"),
            'activity_time' => date("h:m:s"),
            'activity_description' => 'add news events',
            'user_ip' => $this->input->ip_address()
        );

        $this->load->model('news_events_model');
        $news_events_id = $this->news_events_model->add_news_events($data,$log_data);

        //header('Content-Type: application/x-jason; charset=utf-8');
        echo(json_encode($this->news_events_model->get_a_specific_news_events_details($news_events_id)));
	}
}


