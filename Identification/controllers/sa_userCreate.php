<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/static/assets/FPDF/fpdf.php');

class SaUserCreateController extends Controller{

    public function get($request){
        session_start();
        if($_SESSION['idRole'] != 1){
<<<<<<< HEAD
            $this->render('sa_error',['message' => "Vous n'avez pas de permission d'entrer dans cette page"]);
=======
            $this->render('/',[]);
>>>>>>> b7904f8302411bfc414d7abc06378a6b3535ac94
        }else{
            $this->render('sa_userCreate',[]);
        }
    }

    public function post($request){
        session_start();
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
                    //move_uploaded_file($file_tmp,__ROOT__."static/uploads/".$file_name);

                    try{
                        // Ouvrir le fichier CSV
                        $file = fopen(__ROOT__."static/uploads/".$file_name, "r");
                        echo 'work';
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
                        //unlink("static/uploads/".$file_name);
                        /////////////////////////DEBUT A TESTER : PARTIE PDF UNIQUEMENT///////////////////////////////////////////////////////////////
                        //créer le fichier PDF
                        $pdf = new FPDF();
                        $pdf->AddPage();
                        $pdf->SetFont('Arial','B',16);

                        $pdf->Cell(25,10,'Rôle');
                        $pdf->Cell(25,10,'Nom');
                        $pdf->Cell(25,10,'Prénom');
                        $pdf->Cell(25,10,"Nom d'utilisateur");
                        $pdf->Cell(25,10,'Mot de passe');
                        $pdf->Ln();

                        // Utiliser les informations stockées dans le tableau $data pour insérer les utilisateurs 1 à 1
                        foreach ($data as $line) {
                            list($nom, $prenom, $role) = explode(";", $line[0]);
                            // Insérer dans la bdd (rôle n'est pas encore traité)
                            $user = $userdb->addUser($prenom,$nom);

                            //importer dans le fichier PDF
                            $pdf->Cell(25,10,$role);
                            $pdf->Cell(25,10,$nom);
                            $pdf->Cell(25,10,$prenom);
                            $pdf->Cell(25,10,$user[0]);
                            $pdf->Cell(25,10,$user[1]);
                            $pdf->Ln();

                        }
                        
                        //donner le pdf à la prochaine vue pour le téléchargement
                        $pdf_content = $pdf->Output('','S');
                        $this->render('sa_download', ['pdf_content' => $pdf_content]);

                        ///////////////////////// FIN A TESTER///////////////////////////////////////////////////////////////

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
            $username = substr($_REQUEST['newUserPrenom'],0,1) . $_REQUEST['newUserNom'];
            $userList = $userdb->getRecord($username);

            
            echo $user[2];
            $this->render('connect_info',['username' => $user[0], 'password' => $user[1], 'idprof' => intval($user[2])]); //$_REQUEST['newUserRole']
        }
    }
}

?>
