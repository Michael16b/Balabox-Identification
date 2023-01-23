<?php
require(__ROOT__.'/controllers/Controller.php');

class SaCourseCreateController extends Controller{

    public function get($request){
        session_start();
        if($_SESSION['idRole'] != 1){
            $this->render('sa_error',['message' => "Vous n'avez pas de permission d'entrer dans cette page"]);
        }else{
            $this->render('sa_courseCreate',[]);
        }
    }

    public function post($request){
        // Récupérer les informations du formulaire
        $fullName = $_REQUEST['courseFullName'];
        $shortName = $_REQUEST['courseShortName'];
        $summary = $_REQUEST['courseSummary'];
        $format = $_REQUEST['courseFormat'];

        $courseDB = new CourseDB();
        $courseDB->addCourse($fullName, $shortName, $summary, $format);

        $this->render('confirm', ['nom' => 'cours']);

    }
}
?> 