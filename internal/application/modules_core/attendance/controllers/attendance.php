<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Attendance extends CI_Controller
{


    public function index()
    {

        $this->template->build('welcome_message');
    }

    public function view_attendance()
    {
        $teacher_id = '20';


        $this->load->model("attendance_model");
        $data['courses_of_teacher'] = $this->attendance_model->get_courses_of_teacher($teacher_id);
        $data['attendances_of_teacher'] = $this->attendance_model->get_all_attendances_of_teacher($teacher_id);
        $data['attendance_details_of_teacher'] = $this->attendance_model->get_all_attendance_details_of_teacher($teacher_id);
        $data['students_of_specific_teacher'] = $this->attendance_model->get_students_of_specific_teacher($teacher_id);
        //$data['get_students_of_specific_teacher'] = $this->attendance_model->get_students_of_specific_teacher($teacher_id);
        //$data['get_attendance_of_specific_course']=$this->attendance_model->get_attendance_of_specific_course();

        $this->template->build('attendance_view', $data);

    }
    
   public function view_students_in_course_log($course_log_id)
    {
	 $this->load->model("attendance_model");
	 echo(json_encode($this->attendance_model->get_students_in_course_log($course_log_id)));
    }

    public function take_student_attendance($course_log_id)
    {
        //$priority = $this->input->post('priority');
        $attend = $this->input->post('attend');
        $user_id = $this->input->post('user_id');
        $date= date("d-M-Y");
        $time=date("h:m:s");
        $user_of_modification = 0;
        $user_ip = $this->input->ip_address();
        $this->load->model("attendance_model");
        $attendance_id= $this->attendance_model->add_into_attendance_log($course_log_id,$date,$time,$user_of_modification,$user_ip);
        $data2 = array();

        for($ix=0;$ix<count($attend);$ix++)
        {
            $data2[] = array(

                'attendance_id' => $attendance_id,
                'user_id' => $user_id[$ix],
                'attendance_status' => $attend[$ix],

            );

        }


        echo(json_encode($this->attendance_model->add_attendance_details($data2)));

    }
}