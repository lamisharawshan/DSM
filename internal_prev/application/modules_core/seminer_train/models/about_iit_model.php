<?php
class About_iit_model extends CI_Model{

	function __construct(){
			parent::__construct();
		
	
	}
	
	
	function get_choice(){
		$query=$this->db->query("select * from  programs
									
										 
								");
		return $query->result();
	}
	
	function get_selected_batch_details($program_id){
		$query=$this->db->query("select * from  batches,programs
									where
									batches.program_id= ".$program_id." and 
								    programs.program_id= ".$program_id."
										 
								");
		return $query->result();
	}
	function get_batch_students_list($batch_id){
		$query=$this->db->query("select * from  students
									where
									students.batch_id= ".$batch_id." 
								   
										 
								");
		return $query->result();
	}
	
	function get_student_profile($user_id){
		$query=$this->db->query("select * from  students
									where
									students.user_id= ".$user_id." 
								   
										 
								");
		return $query->result();
	}
	
}