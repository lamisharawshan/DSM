<?php
class Upcoming_events_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_all_upcoming_events_details()
    {
        $query = $this->db->query("SELECT * FROM `news_events` WHERE news_events_type='upcoming_events'");
        return $query->result();
    }


    function get_a_specific_upcoming_events_details($news_events_id)
    {

        $query = $this->db->query("SELECT *  FROM news_events WHERE news_events_id = '" . $news_events_id . "'");
        return $query->result();

    }

    function modify_upcoming_events($news_events_id,$modified_name, $modified_description,$modified_status,$log_data)
    {
         $this->db->insert('activity_log',$log_data);
        $query = $this->db->query("UPDATE news_events SET news_events_header='".$modified_name."',news_events_details='".$modified_description."', status = '" . $modified_status . "'  WHERE news_events_id='" . $news_events_id . "';");

    }



    function add_upcoming_events($data,$log_data)
    {

       $this->db->insert('activity_log',$log_data);
       $this->db->insert('news_events', $data);
       return $this->db->insert_id();
    }
}

?>