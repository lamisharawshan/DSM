<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_internal_result_management extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->model('student_internal_result_management_model');
		//$this->template->build('student_internal_result_management_view');
		$this->view_result();
	}
	public function view_result()
	{
		$user_id='23';
		$this->load->model('student_internal_result_management_model');
		$data['allDataForCurrentSem']=$this->student_internal_result_management_model->get_all($user_id);
		$data['tabDetail']=$this->student_internal_result_management_model->get_currentSem_table_detail($user_id);
		$data['prevSemResults']=$this->student_internal_result_management_model->get_prevSem_table_detail($user_id);
		$this->template->build('student_internal_result_management_view',$data);
		
		
		//$data[examType]=$this->student_internal_result_management_model->
		//$data[totalMarks]=$this->student_internal_result_management_model->
		//$data[ownMarks]=$this->student_internal_result_management_model->
		//$data[percentage]=$this->student_internal_result_management_model->
		
	}	
}
