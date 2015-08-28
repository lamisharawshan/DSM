<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_attendance extends CI_Controller {

	public function index()
	{
		$this->load->model('student_attendance_model');
		//$role =2;
	//	if($role==2)$this->get_teacher_courses();
		//else $this->get_single_student_courses();
		$this->template->build('attendance_courses_teacher_view');
	}
	public function get_student_courses(){
	
		$student_id ='24';
		$this->load->model('student_attendance_model');
		$data['courses_of_student']=$this->student_attendance_model->get_courses_of_student($student_id);
		$data['students_attendance_of_courses']=$this->student_attendance_model->get_attendance_of_student($student_id);
		$this->template->build('attendance_students_view', $data);
		//$this->load->view('attendance_courses_teacher_view', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */