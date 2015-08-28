<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_thesis extends CI_Controller {


	public function index()
	{	
		$this->load->model('project_thesis_model');
		$this->template->build('welcome_message');
	}
	public function project_thesis_view()
	{
        $this->load->model('project_thesis_model');
		$data['project_thesis'] = $this->project_thesis_model->get_projects_thesis_data();
        $data['project_thesis_files'] = $this->project_thesis_model->get_projects_thesis_files_data();
		$this->template->build('project_thesis_view',$data);
	}

    public function get_project_thesis_specific( $project_thesis_id){

        $this->load->model('project_thesis_model');
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->project_thesis_model->get_project_thesis_specific($project_thesis_id)));

    }

    public function project_thesis_download( $project_thesis_files_id){

        $this->load->model('project_thesis_model');
        $this->project_thesis_model->project_thesis_download($project_thesis_files_id);
    }

    public function add_new_project()
    {

        $this->load->model('project_thesis_model');

        $data = array(

            'title' => $this->input->post('project_title'),
            'description' => $this->input->post('project_description'),
            'status' => 'activated',
            'date_of_modification' => date("Y-m-d"),
            'type' => 'project',
            'user_ip' => $this->input->ip_address(),
            'user_id' => '22'
        );
        $data2['success']=$this->project_thesis_model->add_new_project($data);
        echo json_encode(array('val' => $data2['success']));
    }

    public function add_new_thesis()
    {

        $this->load->model('project_thesis_model');

        $data = array(

            'title' => $this->input->post('thesis_title'),
            'description' => $this->input->post('thesis_description'),
            'status' => 'activated',
            'date_of_modification' => date("Y-m-d"),
            'type' => 'thesis',
            'user_ip' => $this->input->ip_address(),
            'user_id' => '22'
        );
        $data2['success']=$this->project_thesis_model->add_new_thesis($data);
        echo json_encode(array('val' => $data2['success']));
    }

    public function modify_project_thesis($project_thesis_id)
    {

        $this->load->model('project_thesis_model');

        $data = array(                   
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
            'date_of_modification' => date("Y-m-d"),
            'user_ip' => $this->input->ip_address(),
            'user_id' => '22'
        );                                                                                           
        $data2['success']=$this->project_thesis_model->modify_project_thesis($data,$project_thesis_id);  
        echo json_encode(array('val' => $data2['success']));
    }
}

