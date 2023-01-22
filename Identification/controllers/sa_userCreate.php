<?php
require(__ROOT__.'/controllers/Controller.php');

class SaUserCreateController extends Controller{

    public function get($request){
        $this->render('sa_userCreate',[]);
    }

    public function post($request){
        $userdb = new UserDB();

        if (isset($_POST['csvForm'])) {

            if(isset($_FILES['csvFile'])){
                $file_name = $_FILES['csvFile']['name'];
                $file_tmp = $_FILES['csvFile']['tmp_name'];
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                if($file_extension != 'csv'){
                    $this->render('sa_error',['message' => 'Seuls les fichiers CSV sont acceptés ici.']);
                } else {
                    // Déplacez le fichier uploadé vers le répertoire de destination
                    move_uploaded_file($file_tmp,"static/uploads/".$file_name);
                    
                    try{
                        // Ouvrir le fichier CSV
                        $file = fopen("static/uploads/".$file_name, "r");
    
                        // Initialiser un tableau pour stocker les informations
                        $data = array();
    
                        // Parcourir chaque ligne du fichier sauf la première (contenant les informations des colonnes)
                        $line_counter = 0;
                        while (($line = fgetcsv($file)) !== false) {
                            if ($line_counter != 0) {
                                $data[] = $line;
                            }
                            $line_counter++;
                        }

                        // Fermer et supprimer le fichier
                        fclose($file);
                        unlink("static/uploads/".$file_name);
    
                        // Utiliser les informations stockées dans le tableau $data pour insérer les utilisateurs 1 à 1
                        foreach ($data as $line) {
                            list($nom, $prenom, $role) = explode(";", $line[0]);
                            // Insérer dans la bdd (rôle n'est pas encore traité)
                            $user = $userdb->addUser($prenom,$nom);

                            // TEMPORAIRE//////////////////////////////////////////////////////////////////////////
                            $this->render('connect_info',['surname' => $nom, 'password' =>$prenom, 'idprof' => $role]);
                        }
                        

                    }catch(Exception $e){
                        $this->render('sa_error',['message' => $e->getMessage()]);
                    }

                }
            } else{
                $this->render('sa_error',['message' => 'Erreur lors de la récupération du fichier.']);
            } 
            
        } elseif (isset($_POST['oneUserForm'])) {

            // Traitement pour le formulaire 1 utilisateur
			$user = $userdb->addUser($_REQUEST['newUserPrenom'], $_REQUEST['newUserNom']);

            // TEMPORAIRE////////////////////////////////////////////////////////////////////////////////////////////////////
            $this->render('connect_info',['surname' => $_REQUEST['newUserNom'], 'password' => $_REQUEST['newUserPrenom'], 'idprof' => $_REQUEST['newUserRole']]);
        }
    }
}

?>