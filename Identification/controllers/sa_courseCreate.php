<?php
require(__ROOT__.'/controllers/Controller.php');

class MainController extends Controller{

    public function get($request){
        $this->render('sa_courseCreate',[]);
    }

    public function post($request){
        // Récupérer les informations du formulaire
        $fullName = $_REQUEST['courseFullName'];
        $shortName = $_REQUEST['courseShortName'];
        $summary = $_REQUEST['courseSummary'];
        $format = $_REQUEST['courseFormat'];


    }
}

?> 