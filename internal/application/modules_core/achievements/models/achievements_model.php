<?php 

	class Achievements_model extends CI_Model
	{
	   // function __construct()
	   // {
			// parent::__construct();
	   // }
		function get_small_image()
		{
		$query = $this->db->query("SELECT * FROM achievement_pictures");
		return $query->result();
		}
		
		function get_small_image_specific($picture_id)
		{
		$query = $this->db->query("SELECT * FROM achievement_pictures WHERE picture_id='".$picture_id."'");
		return $query->result();
		}
		function add_achievements($description,$small_path,$big_path,$status)
		{
			$this->db->query("INSERT INTO achievement_pictures (picture_description, big_pic_path, small_pic_path, status) VALUES('".$description."','".$big_path."','".$small_path."','".$status."')");
			return $query->result();
		}
		
		function update_achievements($id,$description,$small_path,$big_path,$status)
		{
			//echo $id;exit;
			//UPDATE events SET event_details='1',event_place='dhaka',date='12-12-2014',time='12:12:12',status='activated' WHERE events_id=1
			$this->db->query("UPDATE achievement_pictures SET picture_description='".$description."',small_pic_path='".$small_path."',big_pic_path='".$big_path."',status='".$status."' WHERE picture_id='".$id."'");
			return $query->result();
		}
		
	}

