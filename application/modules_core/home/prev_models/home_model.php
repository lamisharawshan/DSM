<?php
class Home_model extends CI_Model{

    function __construct(){
        parent::__construct();


    }

    function list_of_events()
    {
        $query=$this->db->query("SELECT * FROM news_events ORDER BY news_events_id DESC LIMIT 0,4 ");
        return $query->result();
    }

}
?>