<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_management extends CI_Controller {

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
        $this->load->model('program_management_model');
        $this->template->build('welcome_message');
    }
    public function view_program()
    {
        $data = $this->get_programs_semesters_courses_data();
        $this->template->build('view_program',$data);
    }

    public function get_programs_semesters_courses_data(){

        $this->load->model('program_management_model');
        $data['programs']= $this->program_management_model->get_programs();
        $data['semesters']= $this->program_management_model->get_semesters();
        $data['courses']= $this->program_management_model->get_courses();

        return $data;
    }

    public function get_program_data( $program_id){

        $this->load->model('program_management_model'); 
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->program_management_model->get_program_specific($program_id)));

    }

    public function get_semester_data( $semester_id){

        $this->load->model('program_management_model');
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->program_management_model->get_semester_specific($semester_id)));

    }

    public function get_course_data( $course_id){

        $this->load->model('program_management_model');  
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->program_management_model->get_course_specific($course_id)));

    }

    //END of VIEW PROGRAM STRUCTURE//

    //BEGINNING OF MANAGE PROGRAM STRUCTURE//

    public function manage_program()
    {
        $data = $this->get_programs_semesters_courses_data();
        $this->template->build('manage_program',$data);

    }

    public function add_new_program()
    {

        $this->load->model('program_management_model');

        $data = array(            

            'program_name' => $this->input->post('program_name'),
            'program_description' => $this->input->post('program_description'),
            'status' => 'activated',
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );
        $this->add_to_activity_log("New Program Added - ".$this->input->post('program_name'));
        $data2['success']=$this->program_management_model->add_new_program($data);  
        echo json_encode(array('val' => $data2['success']));
    }



    public function add_new_semester( $program_id )
    {

        $this->load->model('program_management_model');              
        $data = array(            

            'semester_name' => $this->input->post('semester_name'),
            'total_credit' => $this->input->post('total_credit'),
            'program_id' => $program_id,
            'status' => 'activated',
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );  

        $this->add_to_activity_log("New Semester Added - ".$this->input->post('semester_name'));
        $semester_id=$this->program_management_model->add_new_semester($data);
        for ($ix=0; $ix<count( $_POST['course_code']); $ix++)
        {
            $data3 = array(            

                'course_code' =>  $_POST['course_code'][$ix],
                'course_title' =>  $_POST['course_title'][$ix],
                'course_credit' => $_POST['course_credit'][$ix],
                'semester_id' => $semester_id,
                'status' => 'activated',
                'date_of_modification' => date("Y-m-d"),
                'time_of_modification' => date("h:m:s"),
                'user_ip' => $this->input->ip_address(),
                'user_of_modification' => 'an admin'
            );        
            $this->add_to_activity_log("New Course Added - ".$_POST['course_code'][$ix]);
            $data2['success']=$this->program_management_model->add_new_course($data3);
        }

        echo json_encode(array('val' => $data2['success']));
    }


    public function add_new_course( $semester_id )
    {

        $this->load->model('program_management_model');               
        $data = array(            

            'course_code' => $this->input->post('course_code'),
            'course_title' => $this->input->post('course_title'),
            'course_credit' => $this->input->post('course_credit'),
            'semester_id' => $semester_id,
            'status' => 'activated',
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );        
        $this->add_to_activity_log("New Course Added - ".$this->input->post('course_code'));
        $data2['success']=$this->program_management_model->add_new_course($data);   
        echo json_encode(array('val' => $data2['success']));
    }

    public function modify_program($program_id)
    {

        $this->load->model('program_management_model');

        $data = array(                   
            'program_name' => $this->input->post('program_name'),
            'program_description' => $this->input->post('program_description'),
            'status' => $this->input->post('program_status'),
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );                                                           
        $this->add_to_activity_log("Program Modified - ".$this->input->post('program_name'));
        $data2['success']=$this->program_management_model->modify_program($data,$program_id);  
        echo json_encode(array('val' => $data2['success']));
    }

    public function modify_semester($semester_id)
    {

        $this->load->model('program_management_model');

        $data = array(                   
            'semester_name' => $this->input->post('semester_name'),
            'total_credit' => $this->input->post('total_credit'),
            'status' => $this->input->post('semester_status'),
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );                                                           
        $this->add_to_activity_log("Semester Modified - ".$this->input->post('semester_name'));
        $data2['success']=$this->program_management_model->modify_semester($data,$semester_id);   
        echo json_encode(array('val' => $data2['success']));
    }


    public function modify_course($course_id)
    {

        $this->load->model('program_management_model');

        $data = array(                   
            'course_code' => $this->input->post('course_code'),
            'course_title' => $this->input->post('course_title'),
            'course_credit' => $this->input->post('course_credit'),
            'status' => $this->input->post('course_status'),
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );                                                           
        $this->add_to_activity_log("Course Modified - ".$this->input->post('course_code'));
        $data2['success']=$this->program_management_model->modify_course($data,$course_id);     
        echo json_encode(array('val' => $data2['success']));
    }

    //END of MANAGE PROGRAM STRUCTURE//

    //BEGINNING OF PROGRAM NOTIFICATION//

    public function program_notification()
    {
        $this->load->model('program_management_model');
        $data['programs']= $this->program_management_model->get_programs();
        $data['program_notifications']=$this->program_management_model->get_program_notifications();
        $data['program_notification_files']=$this->program_management_model->get_program_notification_files();
        $this->template->build('notification_program',$data);
    }

    public function add_new_program_notification( $program_id )
    {

        $this->load->model('program_management_model');               
        $data = array(            

            'notification' => $this->input->post('notification'), 
            'program_id' => $program_id,
            'status' => 'activated',
            'user_of_modification' => 'admin',
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s")
        );        
        $this->add_to_activity_log("New Program Notification Added - ".$this->input->post('notification'));
        $data2['success']=$this->program_management_model->add_new_program_notification($data); 
        echo json_encode(array('val' => $data2['success']));

    }

    public function get_program_notification_data($notification_id){

        $this->load->model('program_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->program_management_model->get_program_notification_data_specific($notification_id)));

    }

    public function modify_program_notification($notification_id)
    {

        $this->load->model('program_management_model');

        $data = array(                   
            'notification' => $this->input->post('notification'),
            'status' => $this->input->post('notification_status'),
            'user_of_modification' => 'admin',
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s")
        );                                                           
        $this->add_to_activity_log("Program Notification Modified - ".$this->input->post('notification'));
        $data2['success']=$this->program_management_model->modify_program_notification($data,$notification_id);
        //$this->template->build('welcome_message');
        echo json_encode(array('val' => $data2['success']));
    }
    
    
    public function add_to_activity_log($string)
    {

        $this->load->model('program_management_model');               
        $data = array(                                         
            'activity_description' => $string, 
            'activity_date' => date("Y-m-d"),
            'activity_time' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_id' => 'an admin'
        );                 
        $this->program_management_model->add_to_activity_log($data);                                                         
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */