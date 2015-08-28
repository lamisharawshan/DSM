<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Batch_management extends CI_Controller {

    public function index()
    {    
        $this->load->model('batch_management_model');
        $this->template->build('welcome_message');
    }
    public function view_batch()
    {
        $data = $this->get_programs_batches_students_data();
        $this->template->build('view_batch',$data);
    }

    public function get_programs_batches_students_data(){

        $this->load->model('batch_management_model');
        $data['programs']= $this->batch_management_model->get_programs();
        $data['batches']= $this->batch_management_model->get_batches();
        $data['students']= $this->batch_management_model->get_students();

        return $data;
    }

    public function get_programs_batches_students_restudents_data(){

        $this->load->model('batch_management_model');
        $data['programs']= $this->batch_management_model->get_programs();
        $data['batches']= $this->batch_management_model->get_batches();
        $data['students']= $this->batch_management_model->get_students();
        $data['re_students']= $this->batch_management_model->get_re_students();

        return $data;
    }


    public function get_program_data( $program_id){

        $this->load->model('batch_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_program_specific($program_id)));

    }

    public function get_batch_data($batch_id){

        $this->load->model('batch_management_model'); 
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_batch_specific($batch_id)));

    }

    public function get_student_data( $student_id){

        $this->load->model('batch_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_student_specific($student_id)));

    }

    public function get_re_student_data( $student_id){

        $this->load->model('batch_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_re_student_specific($student_id)));

    }


    //manage

    public function manage_batch()
    {
        $data = $this->get_programs_batches_students_restudents_data();
        $this->template->build('manage_batch',$data);
    }

    public function add_new_batch( $program_id )
    {

        $this->load->model('batch_management_model');                 
        $data = array(            

            'batch_name' => $this->input->post('batch_name'),   
            'program_id' => $program_id, 
            'academic_status' => 'active',
            'status' => 'activated' ,
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );  
        $this->add_to_activity_log("New Batch Added - ".$this->input->post('batch_name'));                
        $batch_id=$this->batch_management_model->add_new_batch($data);
        $data2['success']=true;

        ///////////////////create user

        for ($ix=0; $ix<count( $_POST['roll_no']); $ix++)
        {
            $email=$_POST['roll_no'][$ix].'@gmail.com';
            $data4=array (
                'username'=> $_POST['roll_no'][$ix],
                'password'=>'iit123',
                'ip_address'=> $this->input->ip_address(),
                'email'=>$email, 
                'active' => '1',
                'created_on' => date("Y-m-d")
            );

            $this->add_to_activity_log("New User Added - ".$_POST['roll_no'][$ix]);
            $user_id=$this->batch_management_model->add_new_user($data4);

            $data3 = array(            

                'roll_number' =>  $_POST['roll_no'][$ix],
                'registration_number' =>  $_POST['reg_no'][$ix],
                'full_name' => $_POST['full_name'][$ix],
                'batch_id' => $batch_id,
                'user_id'=>$user_id,
                're_admission_status' => 'deactivated',
                'status' => 'activated',
                'date_of_modification' => date("Y-m-d"),
                'time_of_modification' => date("h:m:s"),
                'user_ip' => $this->input->ip_address(),
                'user_of_modification' => 'an admin'
            );        
            $this->add_to_activity_log("New Student Added - ".$_POST['roll_no'][$ix]);
            $data2['success']=$this->batch_management_model->add_new_student($data3);
        }

        echo json_encode(array('val' => $data2['success']));
    }


    public function add_new_student( $batch_id )
    {

        $this->load->model('batch_management_model');                 
        $email=$this->input->post('roll_number').'@gmail.com';

        ///////////////////create user

        $data4=array (

            'username'=> $this->input->post('roll_no'),
            'password'=>'iit123',
            'ip_address'=> $this->input->ip_address(),
            'email'=>$email, 
            'active' => '1',
            'created_on' => date("Y-m-d")
        );
        $this->add_to_activity_log("New User Added - ".$this->input->post('roll_number'));

        $user_id=$this->batch_management_model->add_new_user($data4);


        $data = array(            

            'roll_number' =>  $this->input->post('roll_number'),
            'registration_number' =>  $this->input->post('registration_number'),
            'full_name' => $this->input->post('full_name'), 
            'batch_id' => $batch_id,
            'user_id'=>$user_id,
            're_admission_status' => 'deactivated',
            'status' => 'activated',
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );                                                                                    
        $this->add_to_activity_log("New Student Added - ".$this->input->post('roll_number'));
        $data2['success']=$this->batch_management_model->add_new_student($data);                 


        echo json_encode(array('val' => $data2['success']));
    }

    public function re_add_new_student($user_id )
    {

        $this->load->model('batch_management_model');                 
        $data = array(                   
            'batch_id' => $this->input->post('batch_id'),
            'roll_number' => $this->input->post('roll_number'),
            're_admission_status' => 'deactivated',
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        ); 
        $this->add_to_activity_log("Student Re-Added - ".$this->input->post('roll_number')." to batch ".$this->input->post('batch_id'));
        $data2['success']=$this->batch_management_model->re_add_new_student($data,$user_id);                 
        echo json_encode(array('val' => $data2['success']));
    }

    public function modify_batch($batch_id)
    {

        $this->load->model('batch_management_model');

        $data = array(                   
            'batch_name' => $this->input->post('batch_name'),                  
            'status' => $this->input->post('batch_status'),                  
            'academic_status' => $this->input->post('batch_academic_status'),
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );                                                           
        $this->add_to_activity_log("Batch Modified - ".$this->input->post('batch_name'));
        $data2['success']=$this->batch_management_model->modify_batch($data,$batch_id);  
        echo json_encode(array('val' => $data2['success']));
    }

    public function modify_student($student_id)
    {

        $this->load->model('batch_management_model');  

        $data = array(                   
            'full_name' => $this->input->post('full_name'),  
            'roll_number' => $this->input->post('roll_number'),
            'registration_number' => $this->input->post('registration_number'),                  
            'status' => $this->input->post('student_status'),                  
            're_admission_status' => $this->input->post('student_re_admission_status'),
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_of_modification' => 'an admin'
        );                                                           
        $this->add_to_activity_log("Student Modified - ".$this->input->post('roll_number'));
        $data2['success']=$this->batch_management_model->modify_student($data,$student_id);  
        echo json_encode(array('val' => $data2['success']));
    }

    //promote batch


    public function get_programs_batches_students_semesters_data(){

        $this->load->model('batch_management_model');
        $data['programs']= $this->batch_management_model->get_programs();
        $data['batches']= $this->batch_management_model->get_batches();
        $data['students']= $this->batch_management_model->get_students();
        $data['semesters']= $this->batch_management_model->get_semesters();      

        return $data;
    }

    public function promote_batch()
    {
        $data = $this->get_programs_batches_students_semesters_data();
        $this->template->build('promote_batch',$data);
    }

    public function get_semester_data($semester_id){

        $this->load->model('batch_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_semester_specific($semester_id)));

    }

    public function get_semester_choice_data($batch_id){

        $this->load->model('batch_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_semester_choice_data($batch_id)));

    }

    public function get_semester_choice_course_data($semester_id){

        $this->load->model('batch_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_semester_choice_course_data($semester_id)));

    }

    public function modify_batch_log_semester_course($batch_id)
    {

        $this->load->model('batch_management_model');                               
        $data2['success']=$this->batch_management_model->update_semester_log_previous_data($batch_id);    
        if($data2['success']==true)
        {
            $program_id=$this->batch_management_model->get_batch_program_id($batch_id);
            $semester_id=$this->input->post('batch_management_semsester_selection');
            $batch_name= $this->batch_management_model->get_batch_name($batch_id);
            $semester_name= $this->batch_management_model->get_semester_name($semester_id);
            $semester_log_name=$batch_name." ".$semester_name;
            $data=array(
                'semester_log_name' => $semester_log_name,
                'starting_date' => date("Y-m-d h:m:s"),
                'program_id' => $program_id,
                'batch_id' => $batch_id,    
                'semester_id' =>$semester_id,                                                      
                'status' =>'activated',                  
                'academic_status' => 'active',
                'date_of_modification' => date("Y-m-d"),
                'time_of_modification' => date("h:m:s"),
                'user_ip' => $this->input->ip_address(),
                'user_of_modification' => 'an admin'
            );

            $this->add_to_activity_log("Semester Log Added - ".$semester_log_name);
            $semester_log_id=$this->batch_management_model->add_semester_log($data); 

            $data2['success']= $this->batch_management_model->get_courses_in_semester($semester_id,$semester_log_id);  
            $data2['success']= $this->batch_management_model->add_students_in_semester_log($batch_id,$semester_log_id);         
        }                                                                          
        echo json_encode(array('val' => $data2['success']));
    }


    public function add_to_activity_log($string)
    {

        $this->load->model('batch_management_model');               
        $data = array(                                         
            'activity_description' => $string, 
            'activity_date' => date("Y-m-d"),
            'activity_time' => date("h:m:s"),
            'user_ip' => $this->input->ip_address(),
            'user_id' => 'an admin'
        );                 
        $this->batch_management_model->add_to_activity_log($data);                                                         
    }


    public function get_teachers_data(){ 
        $this->load->model('batch_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_teachers()));
    }


    public function batch_notification()
    {
        $data = $this->get_programs_batches_semesters_notification_notification_files_data();
        $this->template->build('batch_notification',$data);
    }

    public function get_programs_batches_semesters_notification_notification_files_data(){

        $this->load->model('batch_management_model');
        $data['programs']= $this->batch_management_model->get_programs();
        $data['batches']= $this->batch_management_model->get_batches();        
        $data['semesters']= $this->batch_management_model->get_semesters();    
        $data['notification']= $this->batch_management_model->get_notification();    
        $data['notification_file']= $this->batch_management_model->get_notification_file(); 

        return $data;
    }

    public function add_new_batch_notification( $semester_log_id)
    {

        $this->load->model('batch_management_model');               
        $data = array(            

            'notification' => $this->input->post('notification'), 
            'semester_log_id' => $semester_log_id,
            'status' => 'activated',
            'user_of_modification' => 'admin',
            'date_of_modification' => date("Y-m-d"),
            'user_ip' => $this->input->ip_address(),
            'time_of_modification' => date("h:m:s")
        );        
        $this->add_to_activity_log("New Batch Notification Added - ".$this->input->post('notification'));
        $data2['success']=$this->batch_management_model->add_new_batch_notification($data); 

        echo json_encode(array('val' => $data2['success']));

    }

    public function get_batch_notification_data($notification_id){

        $this->load->model('batch_management_model');   
        header('Content-Type: application/x-jason; charset=utf-8');
        echo (json_encode($this->batch_management_model->get_batch_notification_data_specific($notification_id)));

    }

    public function modify_batch_notification($notification_id)
    {

        $this->load->model('batch_management_model');

        $data = array(                   
            'notification' => $this->input->post('notification'),
            'status' => $this->input->post('notification_status'),
            'user_of_modification' => 'admin',
            'date_of_modification' => date("Y-m-d"),
            'time_of_modification' => date("h:m:s")
        );                                                           
        $this->add_to_activity_log("Batch Notification Modified - ".$this->input->post('notification'));
        $data2['success']=$this->batch_management_model->modify_batch_notification($data,$notification_id);
        //$this->template->build('welcome_message');
        echo json_encode(array('val' => $data2['success']));
    }
}