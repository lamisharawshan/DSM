<?php 

	class student_documents_model extends CI_Model
	{
		function get_course_name()
		{
			$query = $this->db->query('SELECT * FROM courses WHERE semester_id=1');
			return $query->result(); 
		}
	  public function delete_file($file_dir)
        {
          $file= $this->get_file_ID($file_dir);
          $file_id=$file->document_id;
          if (! $this->db->where('document_id', $file_id)->delete('documents'))
          {
            return FALSE;
          }
         unlink('./application/modules_core/uploads/' . $file_dir);  
         return TRUE;
       }
       public function get_file_ID($file_dir)
      {
        return $this->db->select()
         ->from('documents')
         ->where('document_dir', $file_dir)
         ->get()
         ->row();
     }
		function get_files()
		{
			$query = $this->db->query('SELECT * FROM  documents where document_type="assignment" and user_type="student"');
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
          
           public function insert_file($file_name, $assname,$course_code,$file_size,$user_name,$user_type,$doc_type,$date,$student_roll,$doc_description)
           {
                    $id=22;
                    $status="activate";
                    $data = array(
                      'user_id'        => $id,
                      'document_name'  => $assname,
                      'document_dir'   => $file_name,
                      'document_size'  =>$file_size,
                      'course_code'    => $course_code,
                      'document_type'  =>$doc_type,
                      'user_name'      =>$user_name,
                      'student_id'     =>$student_roll,
                      'uploaded_time'  =>$date,
                      'user_type'      =>$user_type,
                      'document_description'=>$doc_description,
                      'doc_status'     =>$status
                     );
			$this->db->insert('documents', $data);
                  return $this->db->insert_id();

           }

	}