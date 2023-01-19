<?php
require_once('config.php');
require_once($CFG->dirroot.'/course/lib.php');

class createCourse {
    private static UserDAO $dao;

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

    

    
}


?>
