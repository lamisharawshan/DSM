<?php
class calendar_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

	
	    function edit_calendar($title ,$start)
    {
$this->db->query("INSERT INTO Calendar1 (title ,start) VALUES('Hello','start')");
			//return $query->result();
    }
	
}