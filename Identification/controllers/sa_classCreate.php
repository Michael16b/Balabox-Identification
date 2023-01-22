<?php
require(__ROOT__.'/controllers/Controller.php');

class SaClassCreateController extends Controller{

    public function get($request){
        session_start();
        if($_SESSION['idRole'] != 1){
            $this->render('/',[]);
        }else{
            $this->render('sa_classCreate',[]);
        }
    }

    public function post($request){

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

                    // Créer l'objet UserDB pour entrer des données dans la bdd Moodle
                    $userdb = new UserDB();

                    // A VERIFIER : Créer la classe/////////////////////////////////////////////////
                    $user = $userdb->addGroups($_REQUEST['newClassName'], $_REQUEST['newClassSummary']);

                    // Utiliser les informations stockées dans le tableau $data pour insérer les utilisateurs 1 à 1
                    foreach ($data as $line) {
                        list($nom, $prenom) = explode(";", $line[0]);
                        
                        // TEMPORAIRE//////////////////////////////////////////////////////////////////////////
                        // echo $nom . " " . $prenom . " " . $_REQUEST['newClassName'] . "<br>";

                        // A VERIFIER : Entrer les utilisateurs dans leur classe//////////////////////////////////
                        // REMPLACER LES ??
                        $user = $userdb->addMember($_REQUEST['newClassName'], ?????);
                    }
                    

                }catch(Exception $e){
                    $this->render('sa_error',['message' => $e->getMessage()]);
                }

            }
        } else{
            $this->render('sa_error',['message' => 'Erreur lors de la récupération du fichier.']);
        } 

    }
}

?>