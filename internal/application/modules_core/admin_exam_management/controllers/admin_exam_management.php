<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_exam_management extends CI_Controller
{

    public function index()
    {
        $this->load->model('admin_exam_management_model');
        $this->initiate_semester_exam_management();

    }

    public function initiate_current_exam_management()              //// mello
    {
        $this->load->model('admin_exam_management_model');
        $data['program_details']= $this->admin_exam_management_model->get_program_names();
        $data['batch_details']=$this->admin_exam_management_model->get_current_batches_for_current_exam_management();
        //$data['semester_details']=$this->admin_exam_management_model->get_current_batch_semesters();
        $data['course_details']=$this->admin_exam_management_model->get_current_semester_courses();
        $data['exam_details']=$this->admin_exam_management_model->get_current_course_exams();

        $this->template->build('current_exam_management_view',$data);
    }

    public function view_current_exam_details($current_exam_id)                     ///// mello
    {
        $this->load->model('admin_exam_management_model');
        echo (json_encode($this->admin_exam_management_model->get_exam_details($current_exam_id)));
    }

    public function change_current_exam_access_status_to_publish($current_exam_id)
    {
        $this->load->model('admin_exam_management_model');

//        $data= array
//        (
//            'user_id'               => '' ,
//            'activity_date'         => date("d-M-Y") ,
//            'activity_time'         => date("h:m:s") ,
//            'activity_description'  => "Current Exam ID ".$current_exam_id." access status is set to published" ,
//            'user_ip'               => ''
//        );

        echo (json_encode($this->admin_exam_management_model->change_current_exam_access_status_to_publish($current_exam_id)));

//        echo (json_encode($this->admin_exam_management_model->unlock_current_exam_access_status($current_exam_id,$data)));
    }

    public function lock_current_exam_access_status($current_exam_id)
    {
        $this->load->model('admin_exam_management_model');

//        $data= array
//        (
//            'user_id'               => '' ,
//            'activity_date'         => date("d-M-Y") ,
//            'activity_time'         => date("h:m:s") ,
//            'activity_description'  => "Current Exam ID ".$current_exam_id." access status is set to published" ,
//            'user_ip'               => ''
//        );

        echo (json_encode($this->admin_exam_management_model->lock_current_exam_access_status($current_exam_id)));

//        echo (json_encode($this->admin_exam_management_model->unlock_current_exam_access_status($current_exam_id,$data)));
    }

    public function unlock_current_exam_access_status($current_exam_id)
    {
        $this->load->model('admin_exam_management_model');

//        $data= array
//        (
//            'user_id'               => '' ,
//            'activity_date'         => date("d-M-Y") ,
//            'activity_time'         => date("h:m:s") ,
//            'activity_description'  => "Current Exam ID ".$current_exam_id." access status is set to published" ,
//            'user_ip'               => ''
//        );

        echo (json_encode($this->admin_exam_management_model->unlock_current_exam_access_status($current_exam_id)));

//        echo (json_encode($this->admin_exam_management_model->unlock_current_exam_access_status($current_exam_id,$data)));
    }

    public function initiate_semester_exam_management() //23
    {
        $this->load->model('admin_exam_management_model');
        $data['program_details'] = $this->admin_exam_management_model->get_program_names();
        $data['batch_details'] = $this->admin_exam_management_model->get_current_batches();
        $data['semester_details'] = $this->admin_exam_management_model->get_current_semesters();
        $data['course_details'] = $this->admin_exam_management_model->get_current_courses();
        $this->template->build('semester_exam_management_view', $data);

    }

    public function publish_semester_result($semester_log_id)
    {
        $this->load->model('admin_exam_management_model');
        $student_in_a_semester = $this->admin_exam_management_model->students_details_in_a_particular_semester($semester_log_id);
        $student_in_a_semester_courses_result = $this->admin_exam_management_model->students_in_a_particular_semesters_all_courses_result($semester_log_id);

        // print_r($student_in_a_semester);
        foreach ($student_in_a_semester as $student_x) {
            $total_course_in_a_semester = 0;
            $total_gpa_in_a_semester = 0;
            $cgpa_of_a_student = 0;
            foreach ($student_in_a_semester_courses_result as $student_y) {

                if ($student_x->user_id == $student_y->user_id) {

                    $total_course_in_a_semester++;
                    /* echo $total_course_in_a_semester;
                      echo '</br>';
                      echo $student_x->user_id;
                      echo '</br>';
                      echo $student_x->full_name;
                      echo '</br>';
                      echo $student_y->course_title;
                      echo '</br>';
                      echo $student_y->course_credit;
                      echo '</br>';
                      echo '</br>';*/

                    $total_gpa_in_a_semester = $total_gpa_in_a_semester + $student_y->gpa;


                }
            }

            $cgpa_of_a_student = $total_gpa_in_a_semester / $total_course_in_a_semester;
            $cgpa_of_a_student = round($cgpa_of_a_student, 2);

            /* echo "cgpa" . $cgpa_of_a_student;
             echo '</br>';*/

            $data = array(

                'user_id' => $student_x->user_id,
                'semester_log_id' => $semester_log_id,
                'cgpa' => $cgpa_of_a_student,
                'date_of_modification' => date("d-M-Y"),
                'time_of_modification' => date("h:m:s"),
                'user_of_modification' => 0,
                'user_ip' => $this->input->ip_address()
            );

            $this->admin_exam_management_model->add_publish_semester_result($data);

            // print_r($data);
            // echo '</br>';
        }

        //header('Content-Type: application/x-jason; charset=utf-8');
        echo(json_encode($this->admin_exam_management_model->all_courses_details_in_a_particular_semester($semester_log_id)));
        /* $shovon =$this->admin_exam_management_model->all_courses_details_in_a_particular_semester($semester_log_id);
       print_r($shovon);*/

    }


    public function after_publish_semester_result_change_academic_status($semester_log_id)
    {
        $log_data = array(

            'user_id' => 0,
            'activity_date' => date("d-M-Y"),
            'activity_time' => date("h:m:s"),
            'activity_description' => 'publish semester result',
            'user_ip' => $this->input->ip_address()
        );

        $this->load->model('admin_exam_management_model');
        $this->admin_exam_management_model->after_publish_semester_result_change_academic_status($semester_log_id,$log_data);


    }


    public  function  get_semester_result_with_cgpa($semester_log_id)
    {
        $this->load->model('admin_exam_management_model');
        //header('Content-Type: application/x-jason; charset=utf-8');
        echo(json_encode($this->admin_exam_management_model->get_semester_result_with_cgpa($semester_log_id)));

       //$shovon =$this->admin_exam_management_model->get_semester_result_with_cgpa($semester_log_id);
        //print_r($shovon);

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */