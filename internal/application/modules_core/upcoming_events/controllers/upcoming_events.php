<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class upcoming_events extends CI_Controller
{


    public function index()
    {
        $this->show_upcoming_events();

    }

    public function show_upcoming_events()
    {
        $this->load->model('upcoming_events_model');
        $data['upcoming_events_details'] = $this->upcoming_events_model->get_all_upcoming_events_details();
        //$this->template->build('upcoming_events_view', $data);
		
		$this->template->build('up_events_view', $data);

        //  print_r( $this->upcoming_events_model->get_all_upcoming_events_details());
    }


    public function  modify_upcoming_events($news_events_id)
    {
        $this->load->model('upcoming_events_model');



        //header('Content-Type: application/x-jason; charset=utf-8');
        echo(json_encode($this->upcoming_events_model->get_a_specific_upcoming_events_details($news_events_id)));
/*
        $shovon=$this->upcoming_events_model->get_a_specific_upcoming_events_details($news_events_id);
        print_r($shovon);*/
    }

    public function save_modified_upcoming_events()
    {

        $news_events_id=$this->input->post('news_events_id');
        $modified_name=$this->input->post('modified_name');
        $modified_description=$this->input->post('modified_description');
        $modified_status=$this->input->post('modified_status');

        $log_data = array(

            'user_id' => 0,
            'activity_date' => date("d-M-Y"),
            'activity_time' => date("h:m:s"),
            'activity_description' => 'modify upcoming events',
            'user_ip' => $this->input->ip_address()
        );


        $this->load->model('upcoming_events_model');
        $this->upcoming_events_model->modify_upcoming_events($news_events_id,$modified_name,$modified_description,$modified_status,$log_data);


        //header('Content-Type: application/x-jason; charset=utf-8');
        echo(json_encode($this->upcoming_events_model->get_a_specific_upcoming_events_details($news_events_id)));


        //call model foe dhup

    }

    public function add_upcoming_events()
    {

        $add_header=$this->input->post('add_header');
        $add_details=$this->input->post('add_details');
        $add_place=$this->input->post('add_place');
        $add_date=$this->input->post('add_date');
        $add_time=$this->input->post('add_time');
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
            'news_events_type' => 'upcoming_events',
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
            'activity_description' => 'add upcoming events',
            'user_ip' => $this->input->ip_address()
        );

        $this->load->model('upcoming_events_model');
        $news_events_id = $this->upcoming_events_model->add_upcoming_events($data,$log_data);

        //header('Content-Type: application/x-jason; charset=utf-8');
        echo(json_encode($this->upcoming_events_model->get_a_specific_upcoming_events_details($news_events_id)));

        //echo $data;

    }


}