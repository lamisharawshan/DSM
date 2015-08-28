<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notice extends CI_Controller {
 public function __construct()
        {
            parent::__construct();

            $this->load->helper('download');
            $this->load->model('notice_model','um',TRUE);

        }


	public function index()
	{

		$this->template->build('welcome_message');
	}

    public function notice_view()
    {
        $this->load->model('notice_model');
		$data['faculty_member']=$this->notice_model->get_notice();
	    $this->template->build('notice_view',$data);
    }

    public function delete_notice($file_dir)
	         {
	          $this->load->model('notice_model');
	          if ($this->notice_model->delete_file($file_dir))
	          {
	           	$this->notice_view();
	          }
	          else
	         {
	           $status = 'error';
	           $msg = 'Something went wrong when deleteing the file, please try again';
	         }
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
        $Title=$this->input->post('Title');
        $des=$this->input->post('comment');
        $field_name="seminerfile";

        if ( ! $this->upload->do_upload($field_name))
        {

          echo  $this->upload->display_errors();
          $this->upload->display_errors('<p>', '</p>');
       }
       else
      {
          $data =  $this->upload->data();
          $file_name= $data["file_name"] ;
		  $file_size= $data["file_size"] ;
		  $file_size=$file_size."kb";

          // uploading successfull, now do your further actions
          $data = array('upload_data' => $this->upload->data());
          $this->load->model('notice_model');

          $file_id = $this->notice_model->insert_file($Title,$des,$file_name);
          //$this->load->view('upload_success', $data);
          $this->notice_view();

       }


    }
   function pdf($item)
    {

        fopen("base_url().site/application/modules_core/FacultyDescription/bangladeshBank.pdf", "");

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

   public function training()
	    {
	        $this->load->model('seminer_train_model');
			$data['faculty_member']=$this->seminer_train_model->get_training();
		    $this->template->build('training_view',$data);
	    }

               public function delete_training($file_dir)
			 	         {
			 	          $this->load->model('seminer_train_model');
			 	          if ($this->seminer_train_model->training_delete_file($file_dir))
			 	          {
			 	           	$this->training();
			 	          }
			 	          else
			 	         {
			 	           $status = 'error';
			 	           $msg = 'Something went wrong when deleteing the file, please try again';
			 	         }
			 	        }



			         function training_do_upload()
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
			         $Title=$this->input->post('Title');
			         $field_name="trainingfile";

			         if ( ! $this->upload->do_upload($field_name))
			         {

			           echo  $this->upload->display_errors();
			           $this->upload->display_errors('<p>', '</p>');
			        }
			        else
			       {
			           $data =  $this->upload->data();
			           $file_name= $data["file_name"] ;
			 		  $file_size= $data["file_size"] ;
			 		  $file_size=$file_size."kb";

			           // uploading successfull, now do your further actions
			           $data = array('upload_data' => $this->upload->data());
			           $this->load->model('seminer_train_model');
			           $file_id = $this->seminer_train_model->training_insert_file($Title, $file_name);
			           //$this->load->view('upload_success', $data);


			        }
                   $this->training();

			     }

			     public function training_download ($file_path)
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
			 	            $this->training();

			 	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */