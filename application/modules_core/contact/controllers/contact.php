<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

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

		$this->template->build('welcome_message');
	}

    public function contact_page()
    {

        $this->template->build('contact_view');
    }

    public function set_contacts_info_in_db()
    {
        $name=$this->input->post('contacts_name');
        $email=$this->input->post('contacts_email');
        $message=$this->input->post('contacts_message');

        $data= array
        (
            'name'                   => $name ,
            'e_mail'                  => $email ,
            'message'                => $message ,
            'date'                   => date("d-M-Y") ,
            'time'                   => date("h:m:s")
        );


        $this->load->model('contact_model');
        $this->contact_model->set_contacts_info_in_db($data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */