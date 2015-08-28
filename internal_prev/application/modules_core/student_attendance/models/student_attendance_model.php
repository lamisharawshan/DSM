<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_attendance_model extends CI_Model {

	function __construct(){
			parent::__construct();
	}
	
		
	function get_courses_of_student($student_id){
	
		$query=$this->db->query("select * from  semester_log, course_log , courses,teachers,students,students_in_semester_log
									where 	
										semester_log.status  = 'activated' and
										semester_log.academic_status = 'active' and
										semester_log.semester_log_id = course_log.semester_log_id and
										students_in_semester_log.semester_log_id=semester_log.semester_log_id and
										courses.course_id = course_log.course_id and
										students_in_semester_log.user_id=students.user_id and
										course_log.teacher_id=teachers.user_id and
										students.user_id = '".$student_id."' 
								");
		return $query->result();
	}
	
	function get_attendance_of_student($student_id){
	
		$query=$this->db->query("select * from  semester_log, course_log , courses,students,students_in_semester_log,attendance_log,attendance_details
									where 	
										semester_log.status  = 'activated' and
										semester_log.academic_status = 'active' and
										semester_log.semester_log_id = course_log.semester_log_id and
										students_in_semester_log.semester_log_id=semester_log.semester_log_id and
										courses.course_id = course_log.course_id and
										course_log.course_log_id=attendance_log.course_log_id and 
										attendance_log.attendance_id=attendance_details.attendance_id and 
										students_in_semester_log.user_id=students.user_id and 
										attendance_details.user_id=students.user_id and 
										attendance_details.user_id='".$student_id."' 
								");
		return $query->result();
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */