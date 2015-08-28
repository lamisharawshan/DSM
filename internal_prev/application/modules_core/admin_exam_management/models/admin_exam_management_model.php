<?php
class Admin_exam_management_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_program_names()
    {
        $query = $this->db->query("SELECT * FROM  `programs` WHERE STATUS =  'activated'");
        return $query->result();
    }

    function get_current_batches()
    {
        $query = $this->db->query("SELECT * FROM  `batches` WHERE status = 'activated'");
        return $query->result();
    }

    function get_current_batch_semester()
    {
        $query = $this->db->query("SELECT * FROM  `semester_log` WHERE status = 'activated'");
        return $query->result();
    }

    /* function get_current_semester_courses()///eita shovon er /// amar ta active ebong niche
     {
         $query= $this->db->query("");
         return $query->result();
     }
 */

    function get_current_semesters()
    {
        $query = $this->db->query("SELECT * FROM  semester_log WHERE status = 'activated'");
        return $query->result();
    }


    function get_current_courses()
    {
        $query = $this->db->query("SELECT * FROM  courses,course_log WHERE course_log.course_id = courses.course_id and course_log.status = 'activated'");
        return $query->result();
    }

    function  students_details_in_a_particular_semester($semester_log_id)
    {
        $query = $this->db->query("select * from semester_log, students_in_semester_log, students where semester_log.semester_log_id= '" . $semester_log_id . "' and semester_log.semester_log_id=students_in_semester_log.semester_log_id and students.user_id = students_in_semester_log.user_id");
        return $query->result();
    }


    function students_in_a_particular_semesters_all_courses_result($semester_log_id)
    {
        $query = $this->db->query("select * from semester_log, students_in_semester_log, course_log, student_course_result, courses where semester_log.semester_log_id= '" . $semester_log_id . "' and
	semester_log.semester_log_id=students_in_semester_log.semester_log_id and semester_log.semester_log_id=course_log.semester_log_id and course_log.course_id=courses.course_id and course_log.course_log_id = student_course_result.course_log_id and
	student_course_result.user_id = students_in_semester_log.user_id");
        return $query->result();
    }


    function add_publish_semester_result($data)
    {

        $this->db->insert('student_semester_result', $data);


    }

    function all_courses_details_in_a_particular_semester($semester_log_id)
    {
        $query = $this->db->query("SELECT * FROM semester_log,course_log,courses WHERE semester_log.semester_log_id='" . $semester_log_id . "' and semester_log.semester_log_id = course_log.semester_log_id and course_log.course_id = courses.course_id");
        return $query->result();
    }

    function after_publish_semester_result_change_academic_status($semester_log_id,$log_data)
    {
        $this->db->insert('activity_log',$log_data);
        $query = $this->db->query("UPDATE semester_log SET academic_status =  'passed' WHERE semester_log_id =  '" . $semester_log_id . "'");
    }

    function  get_semester_result_with_cgpa($semester_log_id)
    {
        $query = $this->db->query("SELECT * FROM  student_semester_result, students
                                            WHERE student_semester_result.user_id = students.user_id  and semester_log_id = '". $semester_log_id ."'");
        return $query->result();
    }


    //mello

    function get_current_batches_for_current_exam_management()
    {
        $query= $this->db->query("SELECT * FROM  batches,semester_log WHERE batches.status = 'activated' and batches.academic_status = 'active' and batches.batch_id=semester_log.batch_id and semester_log.status = 'activated' and semester_log.academic_status = 'active' ");
        return $query->result();
    }


    function get_current_semester_courses()
    {
        $query= $this->db->query("SELECT * FROM  course_log,courses WHERE course_log.course_id = courses.course_id and course_log.status = 'activated'");
        return $query->result();
    }

    function get_current_course_exams()
    {
        $query= $this->db->query("SELECT * FROM  `current_exams` WHERE status = 'activated'");
        return $query->result();
    }

    function get_exam_details($current_exam_id)
    {
        $query=$this->db->query("select * from  current_exams where current_exams_id = '".$current_exam_id."'");
        return $query->result();
    }

    function change_current_exam_access_status_to_publish($current_exam_id)
    {
        //        $this->db->insert('current_exams', $data);
        $this->db->query("update current_exams set access_status='published' where current_exams_id = '".$current_exam_id."'");
        $query=$this->db->query("select * from  current_exams where current_exams_id = '".$current_exam_id."'");
        return $query->result();
    }

    function lock_current_exam_access_status($current_exam_id)
    {
        //        $this->db->insert('current_exams', $data);
        $this->db->query("update current_exams set access_status='locked' where current_exams_id = '".$current_exam_id."'");
        $query=$this->db->query("select * from  current_exams where current_exams_id = '".$current_exam_id."'");
        return $query->result();
    }

    function unlock_current_exam_access_status($current_exam_id)
    {
        //        $this->db->insert('current_exams', $data);
        $this->db->query("update current_exams set access_status='unlocked' where current_exams_id = '".$current_exam_id."'");
        $query=$this->db->query("select * from  current_exams where current_exams_id = '".$current_exam_id."'");
        return $query->result();
    }
}

?>