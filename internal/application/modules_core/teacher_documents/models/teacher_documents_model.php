<?php 

	class teacher_documents_model extends CI_Model
	{
		function get_course_name()
		{
			$query = $this->db->query('SELECT * FROM courses,course_log WHERE course_log.teacher_id=11 and courses.course_id=course_log.course_id');
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
			$query = $this->db->query('SELECT * FROM  documents where document_type="assignment" ');
			return $query->result(); 
		}
            function get_books()
		{
			$query = $this->db->query('SELECT * FROM  documents where document_type="books" ');
			return $query->result(); 
		}
            function get_owndoc()
		{
			$query = $this->db->query('SELECT * FROM  documents where document_type="other" ');
			return $query->result(); 
		}
            function get_user_name($id)
             {
              	$query = $this->db->query('SELECT first_name  FROM   teachers where user_id=20');
			return $query->result();
             }
           

           public function insert_file($file_name, $assname,$course_code,$file_size,$user_name,$user_type,$doc_type,$date,$doc_description)
           {
                    $id=20;
                    $status="activate";
                    $data = array(
                      'user_id'        => $id,
                      'document_name'  => $assname,
                      'document_dir'   => $file_name,
                      'document_size'  =>$file_size,
                      'course_code'    => $course_code,
                      'document_type'  =>$doc_type,
                      'user_name'      =>$user_name,
                      'uploaded_time'  =>$date,
                      'user_type'      =>$user_type,
                      'document_description'=>$doc_description,
                      'doc_status'     =>$status
                     );
			$this->db->insert('documents', $data);
                  return $this->db->insert_id();

           }

	}