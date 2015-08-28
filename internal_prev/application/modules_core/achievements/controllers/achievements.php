<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Achievements extends CI_Controller {

	
	public function index()
	{
		//$this->load->model("get_image_data");
		//$data['small_picture'] = $this->get_image_data->get_small_image();
		//$this->template->build('achievements_views',$data);
	}
	
	public function view_achievements()
	{
		$this->load->model("achievements_model");
		$data['small_picture'] = $this->achievements_model->get_small_image();
		$this->template->build('achievements_views',$data);
	}
	
	public function modify_achievements($id)
	{
		$this->load->model("achievements_model");
		
		echo (json_encode($this->achievements_model->get_small_image_specific($id)));
	}
	
	public function save_modified_achievements()
	{
		//$data['id']=$id;
		//$this->load->template("welcome",$data);
		$description=$this->input->post('description');
		$small_path=$this->input->post('small_path');
		$big_path=$this->input->post('big_path');
		$status=$this->input->post('status');
		$id=$this->input->post('id');
		//echo $description;exit;
		
		$this->load->model("achievements_model");
		
		echo (json_encode($this->achievements_model->update_achievements($id,$description,$small_path,$big_path,$status)));
	}
	
	
	
	public function add_achievements()
	{
		
		$description=$this->input->post('description');
		$path=$this->input->post('path');
		$status=$this->input->post('status');
		$this->do_upload();
		
		//$this->do_resize($path);
		
		$this->load->model("achievements_model");
		echo (json_encode($this->achievements_model->add_achievements($description,$small_path,$big_path,$status)));
	}
	
	function do_upload()
	{ 	
		$config_upload['upload_path'] = './uploads';
		$config_upload['allowed_types'] = 'gif|jpg|png';
		$config_upload['max_size']    = '5000';
		$config_upload['encrypt_name'] = TRUE;

		$this->load->library('upload', $config_upload);

		if (!$this->upload->do_upload())
			{
			$upload = $this->upload->display_errors();
			}    
		else
		{
			$upload = $this->upload->data();
		}
		
		
		$this->big_img_resize($upload);
		$this->small_img_resize($upload);
		

	}
	
	public function small_img_resize($upload)
    {    
        $newpath = "./smallimg";
        
        $config['image_library'] = 'gd2';
        $config['source_image']   = $upload['full_path'];
        $config['new_image'] = $newpath;
        $config['maintain_ratio'] = TRUE;
        $config['width']     = 150;
        $config['height']    = 150;
        
        
        $this->load->library('image_lib', $config); 
        
        if ( ! $this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }
        
    }

    public function big_img_resize($upload)
    {
		$newpath="./bigimg";
		
        $config['image_library'] = 'gd2';
        $config['source_image']    = $upload['full_path'];
		$config['new_image'] = $newpath;
        $config['maintain_ratio'] = true;
        $config['width']     = 600;
        $config['height']    = 600;
		
        $this->load->library('image_lib', $config); 
				

        if ( ! $this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }
		
		
		
		
    } 
}