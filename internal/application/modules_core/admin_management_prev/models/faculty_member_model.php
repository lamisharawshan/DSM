<?php

	class faculty_member_model extends CI_Model
	{
		function get_course_name()
		{
			$query = $this->db->query('SELECT * FROM courses WHERE semester_id=1');
			return $query->result();
		}
	  public function delete_file($file_dir)
        {
          $file= $this->get_file_ID($file_dir);
          $file_id=$file->ID;
          if (! $this->db->where('ID', $file_id)->delete('faculty_member'))
          {
            return FALSE;
          }
         unlink('./application/modules_core/FacultyDescription/' . $file_dir);
         return TRUE;
       }
       public function get_file_ID($file_dir)
      {
        return $this->db->select()
         ->from('faculty_member')
         ->where('pdfURL', $file_dir)
         ->get()
         ->row();
     }
		function get_members()
		{
			$query = $this->db->query('SELECT * FROM `faculty_member` ORDER BY `ID` DESC');
			return $query->result();
		}
            function get_books()
            {
                  $query = $this->db->query('SELECT * FROM  documents where document_type !="assignment"');
			return $query->result();
            }
            function get_user_name($id)
             {
            $query = $this->db->query('SELECT first_name  FROM   students where user_id=22');
			return $query->result();
             }
            function get_student_roll($id)
             {
            $query = $this->db->query('SELECT roll_number  FROM   students where user_id=22');
			return $query->result();
             }

           public function insert_file($file_name, $Name,$designation,$Phone, $pdfURL, $membertype)
           {
                    $id=22;
                    $status="activate";
                    $data = array(
                      'Picture'    => $file_name,
                      'Name'       => $Name,
                      'Designation'=> $designation,
                      'Phone'      =>$Phone,
                      'pdfURL'     =>$pdfURL,
                      'mem_type'   =>$membertype
                                           );
			$this->db->insert('faculty_member', $data);
                  return $this->db->insert_id();

           }

	}