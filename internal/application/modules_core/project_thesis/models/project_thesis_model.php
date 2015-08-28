<?php
class Project_thesis_model extends CI_Model{

	function __construct(){
			parent::__construct();
		
	
	}


	function get_projects_thesis_data(){
		$query=$this->db->query("SELECT * FROM project_thesis");
		return $query->result();
	}
    function get_projects_thesis_files_data(){
        $query=$this->db->query("SELECT * FROM project_thesis_files");
        return $query->result();
    }

    function get_project_thesis_specific($project_thesis_id){
        $query=$this->db->query("SELECT * FROM project_thesis WHERE project_thesis_id='".$project_thesis_id."'");
        return $query->result();

    }

    function project_thesis_download($project_thesis_files_id){
        $query=$this->db->query("SELECT * FROM project_thesis WHERE project_thesis_id='".$project_thesis_files_id."'");
        $name=$query->row()->file_name;
        $path=$query->row()->file_path;

        $data = file_get_contents($path); // Read the file's contents
        force_download($name, $data);
          
    }

    function add_new_project($data) {

        $this->db->insert('project_thesis', $data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    function add_new_thesis($data) {

        $this->db->insert('project_thesis', $data);
        return ($this->db->affected_rows() != 1) ? false : true;

    }
     function modify_project_thesis($data,$project_thesis_id) {

        $this->db->where('project_thesis_id',$project_thesis_id);
        $result = $this->db->update('project_thesis', $data);    
        if(!$result) {
            return false;
        }
        else {
            return true;
        }

    }

}
?>