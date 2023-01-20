<?php
require(__ROOT__.'/controllers/Controller.php');

class SaUserCreateController extends Controller{

    public function get($request){
        $this->render('sa_userCreate',[]);
    }

    public function post($request){
        if (isset($_POST['csvForm'])) {
            // Traitement pour le formulaire csv
        } elseif (isset($_POST['oneUserForm'])) {
            // Traitement pour le formulaire 1 utilisateur

            $userdb = new UserDB();
			$user = $userdb->addUser($_REQUEST['newUserPrenom'], $_REQUEST['newUserNom']);
            $this->render('confirm',['nom' => 'utilisateur']);
        } else {
            // Afficher une erreur car aucun formulaire valide n'a été soumis
        }
    }
}

?>