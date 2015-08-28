<?php 

	class News_events_model extends CI_Model
	{
	   // function __construct()
	   // {
			// parent::__construct();
	   // }
		function get_full_event_information()
		{
		$query = $this->db->query("SELECT * FROM news_events");
		return $query->result();
		}
		
		function get_specific_event($id)
		{
		$query = $this->db->query("SELECT * FROM events WHERE events_id='".$id."'");
		return $query->result();
		}
		function add_events($description,$place,$date,$time,$status)
		{
			$this->db->query("INSERT INTO events (event_details, event_place, date, time, status) VALUES('".$description."','".$place."','".$date."','".$time."','".$status."')");
			return $query->result();
		}
		function add_news_events($data,$log_data)
    	{
    	   $this->db->insert('activity_log',$log_data);
     	   $this->db->insert('news_events', $data);
      	   return $this->db->insert_id();
    	}
		function get_a_specific_news_events_details($news_events_id)
    	{

        	$query = $this->db->query("SELECT *  FROM news_events WHERE news_events_id = '" . $news_events_id . "'");
        	return $query->result();

    	}
		
		function update_events($id,$description,$place,$date,$time,$status)
		{
			$this->db->query("UPDATE events SET event_details='".$description."',event_place='".$place."',date='".$date."',status='".$status."' WHERE events_id=".$id."");
			//UPDATE events SET event_details='1',event_place='dhaka',date='12-12-2014',time='12:12:12',status='activated' WHERE events_id=1
			return $query->result();
		}
		
	}

