<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_iit extends CI_Controller {


	public function index()
	{

		$this->template->build('welcome_message');
	}

    public function institution()
    {

        $this->template->build('institution_view');
    }

    public function faculty()
    {

        $this->template->build('faculty_view');
    }
	
	public function choice_program_wise_batch()
    {
        $this->load->model('about_iit_model');
		$data['choice_For_Program'] = $this->about_iit_model->get_choice();
        $this->template->build('choice_program_wise_batch_view',$data);
    }

    public function students()
    {

        $this->template->build('students_view');
    }

    public function projects()
    {

        $this->template->build('projects_view');
    }

    public function thesis()
    {

        $this->template->build('thesis_view');
    }
	public function individual_batch($program_id)
    {
	    $this->load->model('about_iit_model');
		$data['selected_batch_details'] = $this->about_iit_model->get_selected_batch_details($program_id);
        $this->template->build('batch_select_view',$data);
    }
	public function selected_batch_student($batch_id)
    {
        $this->load->model('about_iit_model');
		$data['batch_students'] = $this->about_iit_model->get_batch_students_list($batch_id);
        $this->template->build('batch_student_view',$data);
    }
	
	public function individual_student($user_id)
    {
        $this->load->model('about_iit_model');
		$data['student_profile'] = $this->about_iit_model->get_student_profile($user_id);
		
		
        $this->template->build('individual_student_view',$data);
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */