<?php

	class seminer_train_user_model extends CI_Model
	{

	  public function delete_file($file_dir)
        {
          $file= $this->get_file_ID($file_dir);
          $file_id=$file->ID;
          if (! $this->db->where('ID', $file_id)->delete('seminer'))
          {
            return FALSE;
          }
         unlink('./application/modules_core/uploads/' . $file_dir);
         return TRUE;
       }
       public function get_file_ID($file_dir)
      {
        return $this->db->select()
         ->from('seminer')
         ->where('Seminer_des', $file_dir)
         ->get()
         ->row();
     }
		function get_seminer()
		{
			$query = $this->db->query('SELECT * FROM seminer');
			return $query->result();
		}

           public function insert_file($Title, $seminerfile)
           {
                    $id=22;
                    $status="activate";
                    $data = array(
                      'Seminer_Title'    => $Title,
                      'Seminer_des'       => $seminerfile
                                           );
			$this->db->insert('seminer', $data);
                  return $this->db->insert_id();

           }







           public function training_delete_file($file_dir)
		           {
		             $file= $this->training_get_file_ID($file_dir);
		             $file_id=$file->ID;
		             if (! $this->db->where('ID', $file_id)->delete('training'))
		             {
		               return FALSE;
		             }
		            unlink('./application/modules_core/uploads/' . $file_dir);
		            return TRUE;
		          }
		          public function training_get_file_ID($file_dir)
		         {
		           return $this->db->select()
		            ->from('training')
		            ->where('training_des', $file_dir)
		            ->get()
		            ->row();
		        }
		   		function get_training()
		   		{
		   			$query = $this->db->query('SELECT * FROM training');
		   			return $query->result();
		   		}

		              public function training_insert_file($Title, $trainingfile)
		              {
		                       $status="activate";
		                       $data = array(
		                         'training_Title'    => $Title,
		                         'training_des'       => $trainingfile
		                                              );
		   			$this->db->insert('training', $data);
		                     return $this->db->insert_id();

		              }


	}