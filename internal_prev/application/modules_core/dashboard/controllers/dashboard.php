<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    
	public function __construct() {	
      parent::__construct();
		$this->no_cache();				
	}
	protected function no_cache(){
       
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
    }
    public function index()
    {	
		if($this->session->userdata('user_id'))
		{
			$this->load->model('dashboard_model'); 
			$data['session_user_id']=$this->session->userdata('user_id');
			$data['session_user_group']=$this->session->userdata('user_type');
			$data['program_notification']= $this->dashboard_model->get_program_notification($data['session_user_id']); 
			$data['program_notification_files']= $this->dashboard_model->get_program_notification_files();
			$data['batch_notification']= $this->dashboard_model->get_batch_notification($data['session_user_id']); 
			$data['batch_notification_files']= $this->dashboard_model->get_batch_notification_files();             
			$data['programs']= $this->dashboard_model->get_programs();     
			$data['program_notification_all']= $this->dashboard_model->get_program_notification_all();      
			$this->template->build('view_dashboard',$data);
			
		}
		else 
		{
			redirect('../../users/login','refresh');
		}
    }
    public function view_dashboard()
    {
        
    }

    
}                                                     