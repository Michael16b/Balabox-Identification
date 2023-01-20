<?php
require(__ROOT__.'/controllers/Controller.php');

class SaCourseCreateController extends Controller{

    public function get($request){
        $this->render('sa_courseCreate',[]);
    }

    public function post($request){
        // Récupérer les informations du formulaire
        $fullName = $_REQUEST['courseFullName'];
        $shortName = $_REQUEST['courseShortName'];
        $summary = $_REQUEST['courseSummary'];
        $format = $_REQUEST['courseFormat'];

        $courseDB = new CourseDB();
        $courseDB->addCourse($fullName, $shortName, $summary, $format);
        $this->render('connect_info', ['surname' => $shortName, 'password' => $fullName, 'idprof' => $format]);


    }
}

?> 