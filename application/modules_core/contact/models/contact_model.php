<?php
class Contact_model extends CI_Model{

    function __construct(){
        parent::__construct();


    }

    function set_contacts_info_in_db($data)
    {
        $this->db->insert('contact',$data);
    }

}
