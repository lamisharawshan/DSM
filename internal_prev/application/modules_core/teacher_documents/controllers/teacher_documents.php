<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class teacher_documents extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('download');
            $this->load->model('teacher_documents_model','um',TRUE);
            
        }
  
        public function index()
       {
        
        $this->template->build('teacher_assignment_view');
       }
        public function view_assignments()
        {
            
        $this->load->model('teacher_documents_model');
        $data['course_info']=$this->teacher_documents_model->get_course_name();
		$data['documents']=$this->teacher_documents_model->get_files();
		$this->template->build('teacher_assignment_view',$data);
        }
        public function view_books()
        {
            
        $this->load->model('teacher_documents_model');
        $data['course_info']=$this->teacher_documents_model->get_course_name();
		$data['documents']=$this->teacher_documents_model->get_books();
		$this->template->build('teacher_book_view',$data);
        }
        public function view_owndoc()
        {
            
        $this->load->model('teacher_documents_model');
        $data['course_info']=$this->teacher_documents_model->get_course_name();
		$data['documents']=$this->teacher_documents_model->get_owndoc();
		$this->template->build('teacher_documents_view',$data);
        }

       function do_upload()
       {
       $config['upload_path'] = './application/modules_core/uploads/';
       $config['allowed_types'] = '*';
       $config['max_size']    = '50000';
       $config['max_width']  = '10000';
       $config['max_height']  = '768';
       //$config['file_name'] = mktime()."-".$_FILES['path']['name'];
       $this->load->helper('date');
       $datestring = " %Y / %m / %d - %h:%i %a";
       $time = time();
       $date=mdate($datestring, $time);   	
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $course_code=$this->input->post('course_code');
       $field_name="userfile";

       if ( ! $this->upload->do_upload($field_name))
       {
         echo  $this->upload->display_errors();
         $this->upload->display_errors('<p>', '</p>');
       }
     else
      {
       $data =  $this->upload->data();
       $assname=$this->input->post('assname');
       $course_code=$this->input->post('sample-table-2_length');
       $user_type=$this->input->post('user_type');
       $doc_type=$this->input->post('documents_type');
       $doc_description=$this->input->post('doc_description');
       $file_name= $data["file_name"] ;
       $file_size= $data["file_size"] ;
       $file_size=$file_size."kb";
       // uploading successfull, now do your further actions
       $data = array('upload_data' => $this->upload->data());
       $this->load->model('teacher_documents_model');
        //$this->load->view('teacher_assignment_view', $data);
       $id=12;
       $user_namearr=$this->teacher_documents_model->get_user_name($id);
       foreach($user_namearr as $row)
	   {
                    $user_name=$row->first_name;
       }
      
     $file_id = $this->teacher_documents_model->insert_file($file_name, $assname,$course_code,$file_size,$user_name,$user_type,$doc_type,$date,$doc_description);
   

      if($doc_type=="assignment")
		 {
		 $this->view_assignments();
		 }
         else if($doc_type=="books")
		 {
         $this->view_books();
		 }
		 else
		 $this->view_owndoc();
 }
}

    public function download ($file_path)
    {
            $this->load->helper('download'); //load helper
             
            //$file_path = $this->input->post("file_path",TRUE);
             
            $layout="no_theme"; //if you have layout
             
            $data['download_path'] = $file_path;        
                    
               
            if( ! empty($file_path))
            {
                $data = file_get_contents(base_url() ."/application/modules_core/uploads/".$file_path); // Read the file's contents
                $name = $file_path;
                force_download($name, $data);
 
            }                     
                     
}
          public function delete_book($file_dir)
         {
          $this->load->model('teacher_documents_model');
          if ($this->teacher_documents_model->delete_file($file_dir))
          {
           $this->view_books();
          }
          else
         {
           $status = 'error';
           $msg = 'Something went wrong when deleteing the file, please try again';
         }
        }
         public function delete_doc($file_dir)
         {
          $this->load->model('teacher_documents_model');
          if ($this->teacher_documents_model->delete_file($file_dir))
          {
           $this->view_owndoc();
          }
          else
         {
           $status = 'error';
           $msg = 'Something went wrong when deleteing the file, please try again';
         }
        }

	}