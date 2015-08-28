<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_management extends CI_Controller
{


    public function index()
    {
        $this->load->model('site_management_model');
        $this->template->build('site_management_view');
    }

    public function view_albums()
    {

        $this->load->model('site_management_model');
        $data['album_list'] = $this->site_management_model->get_all_albums();
        $this->template->build('site_management_view', $data);


    }


	public function create_new_album()
	{

		$this->load->model('site_management_model');

		$status='';
		$msg='';
		$file_element_name='userfile';

		if(empty($_POST['album_picture_description'])){
			$status='error';
			$msg='Please Enter the Description';
		}
		if($status!='error'){
			$config['upload_path'] = base_url().'assets/uploaded_images/';
			$config['allowed_types'] = 'gif|jpg|png|doc|txt';
			$config['max_size']  = 1024 * 1000;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload($file_element_name))
			{
				$status = 'error';
				$msg = $this->upload->display_errors('', '');
			}
			else
			{
				$data = $this->upload->data();
				$file_id = $this->files_model->insert_file($data['file_name'], $_POST['album_picture_description']);
				if($file_id)
				{
					$status = "success";
					$msg = "File successfully uploaded";
				}
				else
				{
					unlink($_FILES[$file_element_name]);
					$status = "error";
					$msg = "Something went wrong when saving the file, please try again.";
				}

			}
			echo json_encode(array('status'=>$status, 'msg'=>$msg));
		}

		$album_title= $this->input->post('album_title_input');
		$title_picture= $this->input->post('title_picture_radio_button');
		$album_pictures= $this->input->post('album_pictures');
		$album_picture_description= $this->input->post('album_picture_description');


		//$this->template->build('site_management_view', $data);


	}

	//NOT REQUIRED BELOW HERE
    public function view_exam_details($exam_id)
    {

        $this->load->model('teacher_internal_exam_management_model');
        echo (json_encode($this->teacher_internal_exam_management_model->get_exam_details($exam_id)));

    }


    public function view_exam_results($exam_id)
    {

        $this->load->model('teacher_internal_exam_management_model');
        //header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->teacher_internal_exam_management_model->get_exam_results($exam_id)));

    }

    public function view_students_in_semester_log($course_log_id)
    {

        $this->load->model('teacher_internal_exam_management_model');
        //header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->teacher_internal_exam_management_model->get_students_in_semester_log($course_log_id)));

    }

    public function get_exams_of_course_log($course_log_id)
    {

        $this->load->model('teacher_internal_exam_management_model');
        //header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->teacher_internal_exam_management_model->get_exams_of_course_log($course_log_id)));

    }

    public function get_course_log_of_exam($current_exams_id)
    {

        $this->load->model('teacher_internal_exam_management_model');
        //header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->teacher_internal_exam_management_model->get_course_log_of_exam($current_exams_id)));

    }

    public function get_student_results_in_current_exam($current_exams_id)
    {

        $this->load->model('teacher_internal_exam_management_model');
        //header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->teacher_internal_exam_management_model->get_student_results_in_current_exam($current_exams_id)));

    }





    public function add_new_exam_and_results($exam_percentage)
    {

        $this->load->model('teacher_internal_exam_management_model');

        $exam_name= $this->input->post('create_exam_exam_name');
        $exam_type= $this->input->post('create_exam_exam_type');
        $exam_date= $this->input->post('create_exam_exam_date');
        $total_marks= $this->input->post('create_exam_total_marks');
        //$exam_percentage= $this->input->post('create_exam_exam_percentage');
        $course_log_id= $this->input->post('course_log_id');



        $data = array(

            'exam_name' => $exam_name,
            'course_log_id' => $course_log_id,
            'total_marks' => $total_marks,
            'marks_percentage' => $exam_percentage,
            'exam_type' => $exam_type,
            'exam_date' => $exam_date,
            'date_of_modification' => date("d-M-Y"),
            'time_of_modification' => date("h:m:s"),
            'user_of_modification' => 0,
            'user_ip' => $this->input->ip_address()
        );

        $current_exam_id=$this->teacher_internal_exam_management_model->add_new_exams($data);

        $top_mark=0;
        $data2 = array();
        for ($ix=0; $ix<count( $_POST['current_exam_results']); $ix++)
        {
            if(floatval($_POST['current_exam_results'][$ix])>$top_mark)$top_mark=floatval($_POST['current_exam_results'][$ix]);
            $data2[] = array(

                'current_exams_id' =>  $current_exam_id,
                'user_id' =>  $_POST['user_id'][$ix],
                'marks' => $_POST['current_exam_results'][$ix],
                'date_of_modification' => date("d-M-Y"),
                'time_of_modification' => date("h:m:s"),
                'user_of_modification' => 0,
                'user_ip' => $this->input->ip_address(),
            );


        }
        $this->teacher_internal_exam_management_model->add_new_exam_results($data2);

        $this->teacher_internal_exam_management_model->update_current_exam_top_marks($current_exam_id,$top_mark);

        //header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->teacher_internal_exam_management_model->get_exam_details($current_exam_id)));
        //echo (json_encode($top_mark));
    }



    public function modify_current_exam_and_result($exam_percentage)
    {

        $this->load->model('teacher_internal_exam_management_model');

        $exam_name= $this->input->post('modify_exam_exam_name');
        $exam_type= $this->input->post('modify_exam_exam_type');
        $exam_date= $this->input->post('modify_exam_exam_date');
        $total_marks= $this->input->post('modify_exam_total_marks');
        //$exam_percentage= $this->input->post('modify_exam_exam_percentage');
        $status= $this->input->post('modify_exam_status');

        $current_exam_id= $this->input->post('current_exams_id');


        $data = array(

            'exam_name' => $exam_name,
            'total_marks' => $total_marks,
            'marks_percentage' => $exam_percentage,
            'exam_type' => $exam_type,
            'exam_date' => $exam_date,
            'status'=> $status,
            'date_of_modification' => date("d-M-Y"),
            'time_of_modification' => date("h:m:s"),
            'user_of_modification' => 0,
            'user_ip' => $this->input->ip_address()
        );

        $this->teacher_internal_exam_management_model->modify_exams($current_exam_id,$data);

        $top_mark=0;
        $data2 = 'UPDATE '.'current_exam_results SET marks = CASE ';

        for ($ix=0; $ix<count( $_POST['edited_current_exam_results']); $ix++)
        {
            if(floatval($_POST['edited_current_exam_results'][$ix])>$top_mark)$top_mark=floatval($_POST['edited_current_exam_results'][$ix]);


	        $data2 .= " WHEN  current_exams_id =".$current_exam_id." AND user_id = ".$_POST['edited_user_id'][$ix]." THEN ".$_POST['edited_current_exam_results'][$ix]." ";





        }
	    $data2 .=' ELSE marks END';



	    $this->teacher_internal_exam_management_model->modify_exam_results($data2);

        $this->teacher_internal_exam_management_model->update_current_exam_top_marks($current_exam_id,$top_mark);

        //header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->teacher_internal_exam_management_model->get_exam_details($current_exam_id)));

    }


	public function lock_exam($current_exams_id)
	{

		$this->load->model('teacher_internal_exam_management_model');
		$this->teacher_internal_exam_management_model->lock_exam($current_exams_id);
		//header('Content-Type: application/x-jason; charset=utf-8');
		echo (json_encode($this->teacher_internal_exam_management_model->get_exam_details($current_exams_id)));

	}


	public function lock_course_and_exams($course_log_id){
		$this->load->model('teacher_internal_exam_management_model');


		$data['students']=$this->teacher_internal_exam_management_model->get_students_in_semester_log($course_log_id);
		$data['exams']=$this->teacher_internal_exam_management_model->get_exam_results_of_course_log($course_log_id);

		//print_r($data['students']);

		$insert_data = array();
		foreach($data['students'] as $students){
			$course_mark = 0;
			foreach($data['exams'] as $current_exams){
				if($students->user_id == $current_exams->user_id){
					$course_mark+=(
						round(floatval($current_exams->marks),2)
						*round(floatval($current_exams->marks_percentage),2)
						/round(floatval($current_exams->total_marks),2));
				}

			}

			$grade_gpa = $this->calculate_gpa_grade(round(floatval($course_mark),0));


			$insert_data[] = array(

				'user_id' =>  $students->user_id,
				'course_log_id' =>  $course_log_id,
				'marks' => round(floatval($course_mark),0),
				'grade' => $grade_gpa['grade'],
				'gpa' => $grade_gpa['gpa'],
				'passing_status' => $grade_gpa['passing_status'],
				'date_of_modification' => date("d-M-Y"),
				'time_of_modification' => date("h:m:s"),
				'user_of_modification' => 0,
				'user_ip' => $this->input->ip_address(),
			);
		}

		$this->teacher_internal_exam_management_model->insert_student_course_result($insert_data);

		$this->teacher_internal_exam_management_model->lock_all_exams_in_course_log($course_log_id);

		$this->teacher_internal_exam_management_model->update_course_log_result_status($course_log_id);

		echo(json_encode($this->teacher_internal_exam_management_model->get_exams_of_course_log($course_log_id)));


	}

	public function calculate_gpa_grade($mark){
		$gpa=0;
		$grade='F';
		$passing_status='failed';
		if($mark>=80){
			$gpa=4.00;
			$grade='A+';
			$passing_status='passed';
		}elseif($mark>=75){
			$gpa=3.75;
			$grade='A';
			$passing_status='passed';
		}elseif($mark>=70){
			$gpa=3.50;
			$grade='A-';
			$passing_status='passed';
		}elseif($mark>=65){
			$gpa=3.25;
			$grade='B+';
			$passing_status='passed';
		}elseif($mark>=60){
			$gpa=3.00;
			$grade='B';
			$passing_status='passed';
		}elseif($mark>=55){
			$gpa=2.75;
			$grade='B-';
			$passing_status='passed';
		}elseif($mark>=50){
			$gpa=2.50;
			$grade='C+';
			$passing_status='passed';
		}elseif($mark>=45){
			$gpa=2.25;
			$grade='C';
			$passing_status='passed';
		}elseif($mark>=40){
			$gpa=2.00;
			$grade='D';
			$passing_status='passed';
		}
		$result = array(
			'gpa'    => $gpa,
			'grade'  => $grade,
			'passing_status'=> $passing_status,
		);
		return $result;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */