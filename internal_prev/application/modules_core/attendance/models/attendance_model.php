<?php

class Attendance_model extends CI_Model
{
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


    function get_all_attendances_of_teacher($teacher_id)
    {
        $query = $this->db->query("select * from  semester_log, course_log , courses , attendance_log
									where
										semester_log.status  = 'activated' and
										semester_log.academic_status = 'active' and
										semester_log.semester_log_id = course_log.semester_log_id and
										courses.course_id = course_log.course_id and
										attendance_log.course_log_id = course_log.course_log_id and
										course_log.teacher_id = '" . $teacher_id . "'
								");
        return $query->result();
    }

    function get_all_attendance_details_of_teacher($teacher_id)
    {
        $query = $this->db->query("select * from  semester_log, course_log , courses , attendance_log, attendance_details
									where
										semester_log.status  = 'activated' and
										semester_log.academic_status = 'active' and
										semester_log.semester_log_id = course_log.semester_log_id and
										courses.course_id = course_log.course_id and
										attendance_log.course_log_id = course_log.course_log_id and
										attendance_details.attendance_id = attendance_log.attendance_id and
										course_log.teacher_id = '" . $teacher_id . "'
								");
        return $query->result();
    }


    function get_students_of_specific_teacher($teacher_id)
    {
        $query = $this->db->query("select * from  semester_log, course_log , courses, students_in_semester_log, students
									where
										semester_log.status  = 'activated' and
                                        semester_log.academic_status = 'active' and
                                        semester_log.semester_log_id = course_log.semester_log_id and
                                        courses.course_id = course_log.course_id and
                                        semester_log.semester_log_id = students_in_semester_log.semester_log_id and
                                        students.user_id = students_in_semester_log.user_id and
                                        course_log.teacher_id = '" . $teacher_id . "'
                                  ");
        return $query->result();

    }
    
    function get_students_in_course_log($course_log_id)
    {
    $query = $this->db->query("select * from  semester_log, students_in_semester_log, students, course_log
									where
									    semester_log.semester_log_id = course_log.semester_log_id and
                                        semester_log.semester_log_id = students_in_semester_log.semester_log_id and
                                        students.user_id = students_in_semester_log.user_id and
                                        course_log.course_log_id = '" . $course_log_id . "'
                                  ");
        return $query->result();

    }

    function add_attendance_details($data)
    {
        $this->db->insert_batch('attendance_details', $data);

    }

    function add_into_attendance_log($course_log_id,$date,$time,$user_of_modification,$user_ip)
    {
        $this->db->query("INSERT INTO attendance_log (course_log_id,attendance_date,attendance_time,user_of_modification,user_ip) VALUES('".$course_log_id."','".$date."','".$time."','".$user_of_modification."','".$user_ip."')");
        return $this->db->insert_id();
    }

    function get_attendance_of_specific_course($course_log_id)
    {
        $query = $this->db->query("SELECT * FROM attendance_log");
        return $query->result();
    }

}