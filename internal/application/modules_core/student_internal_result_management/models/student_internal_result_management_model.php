<?php
class Student_internal_result_management_model extends CI_Model{

	function __construct(){
			parent::__construct();
		
	
	}
	
	function get_all($user_id){
		$query=$this->db->query("select * from  students_in_semester_log,semester_log,course_log,courses
									where 	
											students_in_semester_log.semester_log_id= semester_log.semester_log_id and 
											semester_log.academic_status= 'active' and 
											semester_log.status='activated' and
											course_log.semester_log_id=semester_log.semester_log_id and
											course_log.course_id = courses.course_id and
											
											

											students_in_semester_log.user_id = '24'
								");
		return $query->result();
	}
	
	function get_currentSem_table_detail($user_id){
		$query=$this->db->query("select * from  students_in_semester_log,semester_log,course_log,courses,current_exams,current_exam_results
									where 	
											students_in_semester_log.semester_log_id= semester_log.semester_log_id and 
											semester_log.academic_status= 'active' and 
											semester_log.status='activated' and
											course_log.semester_log_id=semester_log.semester_log_id and
											course_log.course_id = courses.course_id and
										    current_exams.course_log_id =course_log.course_log_id and 
											current_exams.current_exams_id = current_exam_results.current_exams_id  and 
											
											current_exam_results.user_id = '24' and 
											students_in_semester_log.user_id = '22'
								");
		return $query->result();
	}

	function get_prevSem_table_detail($user_id){
	    $query=$this->db->query("Select * from student_course_result,course_log,courses
								where
										course_log.course_log_id =	student_course_result.course_log_id and
										courses.course_id = course_log.course_id  and
								 		
								
										student_course_result.user_id = '22'	
								");
		return $query->result();
	}
	
	
}
?>