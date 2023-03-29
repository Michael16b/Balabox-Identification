<?php

require(__ROOT__.'/controllers/Controller.php');

class SaClassCreateController extends Controller{

    public function get($request){
        if($_SESSION['role'] != 1){
            $this->render('sa_error',['message' => "Vous n'avez pas de permission d'entrer dans cette page"]);
        }else{
            $this->render('sa_classCreate',[]);
        }
    }

    public function post($request){
        $file_name = '';
        $upload_dir = sys_get_temp_dir();
        echo ($upload_dir);

            // CONDITION : TANT QUE LE FICHIER N'EST PAS PRESENT DANS /static/uploads, ALORS ON ATTEND 5s AVANT DE REESSAYER LA LECTURE
                echo("début");
            while(empty($file_name)) {

                    if(isset($_FILES['csvFile']) && is_uploaded_file($_FILES['csvFile']['tmp_name'])){
                        $file_name = $_FILES['csvFile']['name'];
                        $file_tmp = $_FILES['csvFile']['tmp_name'];
                        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                                var_dump($file_name);
                                var_dump($file_tmp);
                                var_dump($file_extension);
                                                if($file_extension != 'csv'){
                                                    $this->render('sa_error',['message' => 'Seuls les fichiers CSV sont acceptés ici.']);
                                                } else {
                                            echo("avant déplacement");

                                $destination_file = '/tmp/'.$file_name;
                                                    // Déplacez le fichier uploadé vers le répertoire de destination
                                                    var_dump(move_uploaded_file($file_tmp,$destination_file));
                                var_dump(is_uploaded_file($file_name));


                                    
                                                    try{
                                            echo("avant ouverture");
                                                        // Ouvrir le fichier CSV
                                                        $file = fopen($destination_file, "r");
                                            echo("après ouverture");
                                                        // Initialiser un tableau pour stocker les informations
                                                        $data = array();
                                echo("debut file");
                                echo($file);
                                echo("fin file");
                                                        // Parcourir chaque ligne du fichier sauf la première (contenant les informations des colonnes)
                                                        $line_counter = 0;
                                                        while (($line = fgetcsv($file)) !== false) {
                                //var_dump($line);
                                //var_dump(fgetcsv($file));
                                                            if ($line_counter != 0) {
                                                                $data[] = $line;

                                                            }
                                                            $line_counter++;
                                                        }
                                echo("après aprcours lignes");
                                echo($data);
                                                        // Fermer et supprimer le fichier
                                                        fclose($file);
                                                        unlink($destination_file);
                                echo("fermeture fichier");
                                                        // Créer l'objet UserDB pour entrer des données dans la bdd Moodle
                                                        $groupDB = new GroupsDB();

                                                        // A VERIFIER : Créer la classe/////////////////////////////////////////////////
                                                        $idGroup = $groupDB->addGroups($_REQUEST['newClassName'], $_REQUEST['newClassSummary']);
                                echo("création groupes");
                                                        // Utiliser les informations stockées dans le tableau $data pour insérer les utilisateurs 1 à 1
                                                        foreach ($data as $line) {
                                                            list($username) = explode(";", $line[0]);
                                                            $groupDB->addMember($idGroup, $username);
                                                        }
                                            $this->render('sa_error',['message' => "réussi"]);
                                                    }catch(Exception $e){
                                echo($e);
                                $this->render('sa_error',['message' => $e->getMessage()]);
                            }

                        }
                    } else{
                        sleep(5); // Attendre 5 secondes avant de vérifier à nouveau
                    }
                }

    }
}

?>            		
