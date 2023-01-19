<?php
require_once('config.php');
require_once($CFG->dirroot.'/course/lib.php');

class courseDB {

    private function __construct() {}


    public function addCourse(String $fullName, String $shortName, String $summary, String $format): void{
        $course = new stdClass();
        $course->fullname = $fullName;
        $course->shortname = $shortName;
        $course->category = 1;
        $course->summary = $summary;
        $course->format = $format;
        $course->showgrades = 1;
        $course->newsitems = 5;
        $course->startdate = time();

        $course->id = create_course($course);
        }

    public function deleteCourse(String $shortName): void{
        global $DB;
        $DB->delete_records('course', array('shortname' => $shortName));
    }

    public function updateCourse(String $shortName, String $fullName, String $summary, String $format): void{
        global $DB;
        $course = $DB->get_record('course', array('shortname' => $shortName));
        $course->fullname = $fullName;
        $course->summary = $summary;
        $course->format = $format;
        $DB->update_record('course', $course);
    }

    public function addRolesMembers(String $shortName, String $username, String $role): void{
        global $DB;
        $course = $DB->get_record('course', array('shortname' => $shortName));
        $user = $DB->get_record('user', array('username' => $username));
        $role = $DB->get_record('role', array('shortname' => $role));
        role_assign($role->id, $user->id, context_course::instance($course->id));
    }

    public function deleteRolesMembers(String $shortName, String $username, String $role): void{
        global $DB;
        $course = $DB->get_record('course', array('shortname' => $shortName));
        $user = $DB->get_record('user', array('username' => $username));
        $role = $DB->get_record('role', array('shortname' => $role));
        role_unassign($role->id, $user->id, context_course::instance($course->id));
    }

    public function addRolesMembers(String $shortName, String $username, String $role): void{
        global $DB;
        $course = $DB->get_record('course', array('shortname' => $shortName));
        $user = $DB->get_record('user', array('username' => $username));
        $role = $DB->get_record('role', array('shortname' => $role));
        role_assign($role->id, $user->id, context_course::instance($course->id));
    }

    

    
}


?>
