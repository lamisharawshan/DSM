<?php
class Contact_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();


    }

    function get_contact_info()
    {
        $query = $this->db->query("select * from contact ORDER BY contact_id DESC LIMIT 0,20");

        return $query->result();
    }
}
?>