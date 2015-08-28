<?php
	class teacher_internal_exam_management_model extends CI_Model
	{

		function __construct()
		{
			parent::__construct();


		}

		function get_courses_of_teacher($teacher_id)
		{
			$query = $this->db->query("select * from  semester_log, course_log , courses
									where 	
										semester_log.status  = 'activated' and
										semester_log.academic_status = 'active' and
										semester_log.semester_log_id = course_log.semester_log_id and
										courses.course_id = course_log.course_id and
										course_log.teacher_id = '" . $teacher_id . "'
								");

			return $query->result();
		}

		function get_course_exams_of_teacher($teacher_id)
		{
			$query = $this->db->query("select * from  semester_log, course_log, courses, current_exams
									where 	
										semester_log.status  = 'activated' and
										semester_log.academic_status = 'active' and
										semester_log.semester_log_id = course_log.semester_log_id and
										courses.course_id = course_log.course_id and
										current_exams.course_log_id = course_log.course_log_id and		
										course_log.teacher_id = '" . $teacher_id . "'
		 
								");

			return $query->result();
		}


		function get_exam_details($exam_id)
		{
			$query = $this->db->query("select * from current_exams where current_exams_id = ?", array($exam_id));

			return $query->result_array();
		}

		function get_exam_results($exam_id)
		{
			$query = $this->db->query("select * from  current_exam_results,students
									where
									    current_exam_results.user_id = students.user_id and
										current_exams_id = '" . $exam_id . "'

								");

			return $query->result();
		}


		function get_students_in_semester_log($course_log_id)
		{
			$query = $this->db->query("select * from  semester_log,students_in_semester_log , students ,course_log
									where
									    course_log.semester_log_id = semester_log.semester_log_id and
									    semester_log.semester_log_id = students_in_semester_log.semester_log_id and
									    students.user_id = students_in_semester_log.user_id and
										course_log.course_log_id = '" . $course_log_id . "'

								");

			return $query->result();
		}

		function get_exams_of_course_log($course_log_id)
		{
			$query = $this->db->query("select * from  course_log,current_exams
									where
									    course_log.course_log_id = current_exams.course_log_id and
									    current_exams.course_log_id = '" . $course_log_id . "'

								");

			return $query->result();
		}


		function get_course_log_of_exam($current_exams_id)
		{
			$query = $this->db->query("select * from  current_exams
									where
									    current_exams.current_exams_id= '" . $current_exams_id . "'

								");

			return $query->result();
		}


		function add_new_exams($data)
		{
			$this->db->insert('current_exams', $data);

			return $this->db->insert_id();
		}

		function add_new_exam_results($data)
		{
			$this->db->insert_batch('current_exam_results', $data);
			//return $this->db->insert_id();;
		}


		function update_current_exam_top_marks($current_exam_id, $data)
		{
			$sql = "UPDATE current_exams SET top_marks='" . $data . "' WHERE current_exams_id= '" . $current_exam_id . "'";
			$this->db->query($sql);
			//return $this->db->insert_id();;
		}

		function get_student_results_in_current_exam($current_exams_id)
		{
			$query = $this->db->query("select * from  current_exam_results,students
									where
									    current_exam_results.user_id = students.user_id and
									    current_exam_results.current_exams_id= '" . $current_exams_id . "'

								");

			return $query->result();
		}

		function modify_exams($current_exam_id, $data)
		{
			$this->db->where('current_exams_id', $current_exam_id);
			$this->db->update('current_exams', $data);

		}

		function modify_exam_results($data)
		{
			$this->db->query($data);

		}
		function lock_exam($current_exam_id)
		{
			$this->db->query("update current_exams set access_status = 'locked' where current_exams_id='".$current_exam_id."'");

		}

		function get_exam_results_of_course_log($course_log_id){
			$query = $this->db->query("select * from current_exams, current_exam_results
										where current_exams.course_log_id = ".$course_log_id." and
										current_exams.status = 'activated' and
										current_exams.current_exams_id = current_exam_results.current_exams_id");
			return $query->result();
		}
		function insert_student_course_result($data)
		{
			$this->db->insert_batch('student_course_result', $data);

		}
		function lock_all_exams_in_course_log($course_log_id)
		{
			$this->db->query("update current_exams set access_status= 'locked' where course_log_id ='".$course_log_id."'");

		}
		function update_course_log_result_status($course_log_id)
		{
			$this->db->query("update course_log set result_status = 'published' where course_log_id ='".$course_log_id."'");

		}

	}

?>