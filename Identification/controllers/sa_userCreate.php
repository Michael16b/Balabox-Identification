<?php
require(__ROOT__.'/controllers/Controller.php');

class MainController extends Controller{

    public function get($request){
        $this->render('sa_userCreate',[]);
    }

    public function post($request){
        if (isset($_POST['csvForm'])) {
            // Traitement pour le formulaire csv
        } elseif (isset($_POST['oneUserForm'])) {
            // Traitement pour le formulaire 1 utilisateur
            $this->render('connect_info',['surname' => $_REQUEST['newUserNom'], 'password' => $_REQUEST['newUserPrenom'], 'idprof' => $_REQUEST['newUserRole']]);
        } else {
            // Afficher une erreur car aucun formulaire valide n'a été soumis
        }
    }
}

?>