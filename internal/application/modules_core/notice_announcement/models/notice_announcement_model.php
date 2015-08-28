<?php 

	class Notice_announcement_model extends CI_Model
	{
	   // function __construct()
	   // {
			// parent::__construct();
	   // }
		function get_full_notice_announcement_information()
		{
		$query = $this->db->query("SELECT * FROM notice_announcement");
		return $query->result();
		}
		
		function get_specific_notice_announcement($id)
		{
		$query = $this->db->query("SELECT * FROM notice_announcement WHERE notice_announcement_id='".$id."'");
		return $query->result();
		}
		function add_notice_announcement($description,$title,$date)
		{
            $this->db->query("INSERT INTO notice_announcement (title, description, date_of_modification) VALUES('".$title."','".$description."','".$date."')");
			return $this->db->insert_id();
		}
		
		function update_notice_announcement($id,$description,$title,$date,$status)
		{
            $this->db->query("UPDATE notice_announcement SET title='".$title."',description='".$description."',date_of_modification='".$date."',status='".$status."' WHERE notice_announcement_id=".$id."");
            //return $this->db->affected_rows();

		}
		
	}

