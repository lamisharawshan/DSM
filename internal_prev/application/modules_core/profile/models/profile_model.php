<?php
class profile_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function get_basic_info()
    {
        $query=$this->db->query("select * from users,profile,students where users.id=profile.user_id and profile.user_id=students.user_id and profile.user_id=22");
        return $query->result();
    }
	
	function edit_Profile($username ,$e_mail,$contact,$social_network_address,$address)
		{
			$id=22;
			
		$this->db->query("UPDATE profile SET username ='$username ' , e_mail='$e_mail', contact='$contact', social_network_address 	='$social_network_address' ,address='$address' WHERE user_id =".$id );
					return $query->result();
		}
	 
	 
	function edit_Password($new_password)
		{
			$id=22;
		$this->db->query("UPDATE users SET password='$new_password' WHERE id =22" );
		return $query->result();
		}
		
		
	function edit_description($description)
		{
			$id=22;
		$this->db->query("UPDATE profile SET description='$description' WHERE user_id =22" );
		return $query->result();
		}
		
}