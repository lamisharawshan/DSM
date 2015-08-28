<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_iit extends CI_Controller {


	public function index()
	{

		$this->template->build('welcome_message');
	}

    public function institution()
    {
        $this->load->model('faculty_member_model');
        $data['faculty_member']=$this->faculty_member_model->get_members();
        $this->template->build('faculty_member_upload_view',$data);
    }

    public function faculty()
    {
        $this->load->model('faculty_member_model');
        $data['faculty_member']=$this->faculty_member_model->get_members();
	    $this->template->build('faculty_member_view',$data);

    }
    public function delete_assignment($file_dir)
	         {
	          $this->load->model('faculty_member_model');
	          if ($this->faculty_member_model->delete_file($file_dir))
	          {
	           	$this->faculty();
	          }
	          else
	         {
	           $status = 'error';
	           $msg = 'Something went wrong when deleteing the file, please try again';
	         }
	        }


	public function choice_program_wise_batch()
    {
        $this->load->model('about_iit_model');
		$data['choice_For_Program'] = $this->about_iit_model->get_choice();
        $this->template->build('choice_program_wise_batch_view',$data);
    }

         function do_upload()
       {
         $config['upload_path'] = './application/modules_core/uploads/';
         $config['allowed_types'] = '*';
         $config['max_size']    = '1000000';
         $config['max_width']  = '1024000';
         $config['max_height']  = '768000';
         //$config['file_name'] = mktime()."-".$_FILES['path']['name'];
        $this->load->helper('date');
        $datestring = " %Y / %m / %d - %h:%i %a";
        $time = time();
        $date=mdate($datestring, $time);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $course_code=$this->input->post('course_code');
        $field_name="userfile";
        $membertype=$this->input->post('MemType');

        if ( ! $this->upload->do_upload($field_name))
        {

          echo  $this->upload->display_errors();
          $this->upload->display_errors('<p>', '</p>');
       }
       else
      {
          $data =  $this->upload->data();
          $Name=$this->input->post('Name');
          $designation=$this->input->post('designation');
          $Phone=$this->input->post('Phone');
          $file_name= $data["file_name"] ;
          $file_size= $data["file_size"] ;
          $file_size=$file_size."kb";

         // uploading successfull, now do your further actions
         $data = array('upload_data' => $this->upload->data());
         $config['upload_path'] = './application/modules_core/uploads/';
		          $config['allowed_types'] = '*';
		          $config['max_size']    = '1000000';
		          $config['max_width']  = '1024000';
		          $config['max_height']  = '768000';
		          //$config['file_name'] = mktime()."-".$_FILES['path']['name'];

		         $this->load->helper('date');
		         $datestring = " %Y / %m / %d - %h:%i %a";
		         $time = time();
		         $date=mdate($datestring, $time);
		         $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                 $pdfURL="userfile1";
                 $this->upload->do_upload($pdfURL);
                 $data =  $this->upload->data();
                  $file_name1= $data["file_name"] ;
                  $this->load->model('faculty_member_model');

                 $file_id = $this->faculty_member_model->insert_file($file_name, $Name,$designation,$Phone, $file_name1, $membertype);
                 //$this->load->view('upload_success', $data);
                 $this->institution();

       }


   function pdf($item)
    {

        fopen("base_url().site/application/modules_core/FacultyDescription/bangladeshBank.pdf", "");

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