<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Life_in_iit extends CI_Controller {


	public function index()
	{

		$this->template->build('welcome_message');
	}

    

    public function newsandevents()
    {

        $this->template->build('newsandevents_view');
    }

    public function achievements()
    {

        $this->template->build('achievements_view');
    }

    public function gallery()
    {

        $this->template->build('gallery_view');
    }

    public function club()
    {

        $this->template->build('club_view');
    }
	public function show_details()
    {

        $this->template->build('show_details_view');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */