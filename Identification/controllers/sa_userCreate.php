<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/static/assets/FPDF/fpdf.php');

class SaUserCreateController extends Controller{

    public function get($request){
        if($_SESSION['role'] != 1){
            $this->render('sa_error',['message' => "Vous n'avez pas de permission d'entrer dans cette page"]);
        }else{
            $this->render('sa_userCreate',[]);
        }
    }

    public function post($request){
        $userdb = new UserDB();

        if (isset($_POST['csvForm'])) {
            $file_name = '';
            // CONDITION : TANT QUE LE FICHIER N'EST PAS PRESENT DANS /static/uploads, ALORS ON ATTEND 5s AVANT DE REESSAYER LA LECTURE
            while(empty($file_name)) {
                if(isset($_FILES['csvFile']) && is_uploaded_file($_FILES['csvFile']['tmp_name'])) {
                    $file_name = $_FILES['csvFile']['name'];
                    $file_tmp = $_FILES['csvFile']['tmp_name'];
                    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                        if($file_extension != 'csv'){
                            $this->render('sa_error',['message' => 'Seuls les fichiers CSV sont acceptés ici.']);
                        } else {
                            $destination_file = '/tmp/'.$file_name;
                            try{
                                // Ouvrir le fichier CSV
                                $file = fopen($destination_file, "r");
                                // Initialiser un tableau pour stocker les informations
                                $data = array();
                                // Parcourir chaque ligne du fichier sauf la première (contenant les informations des colonnes)
                                $line_counter = 0;
                                while (($line = fgetcsv($file, 0, ";")) !== false) {
                                    if ($line_counter != 0) {
                                        $data[] = $line;

                                    }
                                    $line_counter++;
                                }
                                // Fermer et supprimer le fichier
                                fclose($file);
                                if (count($data[0]) != 4) {
                                    $this->render('sa_error',['message' => 'Le fichier CSV ne contient pas le bon nombre de colonnes. Il doit y avoir 4 colonnes : Rôle, Nom, Prénom et Nom d\'utilisateur.']);
                                } else {
                                //créer le fichier PDF
                                $pdf = new FPDF();

                                // Définir la police
                                $pdf->AddPage();
                                $pdf->Image(__ROOT__.'/static/img/logo_balabox.png',10,6,30);
                                $pdf->SetFillColor(255, 165, 0); // définit la couleur de fond à orange
                                $pdf->SetTextColor(255, 255, 255); // définit la couleur de texte à blanc
                                $pdf->SetFont('Arial', 'B', 14); // définit la police de caractères en gras avec une taille de 14


                                // Ajout du header
                                $header = array('Rôle', 'Nom', 'Prénom', 'Nom d\'utilisateur', 'Mot de passe');
                                $w = array(30,25,25,45,35);
                                

                                // Centrer le tableau
                                $pdf->SetY(45);
                                $pdf->Cell(($pdf->GetPageWidth() - array_sum($w))/2); // Ajouter de l'espace à gauche pour centrer le tableau
                                for($i=0;$i<count($header);$i++)
                                    $pdf->Cell($w[$i],7,iconv('UTF-8', 'windows-1252',$header[$i]),1,0,'C',true);
                                $pdf->Ln();

                                $startX = $pdf->GetX();
                                
                                foreach ($data as $line) {
                                    // Insérer dans la bdd (rôle n'est pas encore traité)
                                    $role = 4;
                                    
                                    if ($line[2] == 'Professeur') {
                                        $role = 3;
                                    }
                                    $user = $userdb->addUser($line[0],$line[1],$role);
                                    $pdf->SetTextColor(0, 0, 0); // définit la couleur de texte à noir
                                    $pdf->SetFont('Arial', '', 14); // définit la police de caractères sans gras

                                    // importer dans le fichier PDF
                                    $pdf->SetX($startX + ($pdf->GetPageWidth() - array_sum($w))/2);
                                    $pdf->Cell($w[0], 10, iconv('UTF-8', 'windows-1252', $line[2]), 'LR', 0, 'L');
                                    $pdf->Cell($w[1], 10, iconv('UTF-8', 'windows-1252', $line[0]), 'LR', 0, 'L');
                                    $pdf->Cell($w[2], 10, iconv('UTF-8', 'windows-1252', $line[1]), 'LR', 0, 'L');
                                    $pdf->Cell($w[3], 10, iconv('UTF-8', 'windows-1252', $user[0]), 'LR', 0, 'L');
                                    $pdf->Cell($w[4], 10, iconv('UTF-8', 'windows-1252', $user[1]), 'LR', 0, 'L');
                                    $pdf->Ln();
                                }
                                $pdf->SetX($startX + ($pdf->GetPageWidth() - array_sum($w))/2);
                                $pdf->Cell(array_sum($w),0,'','T');
                                
                                //donner le pdf à la prochaine vue pour le téléchargement
                                $pdf_content = $pdf->Output('','S');
                                $this->render('sa_download', ['pdf_content' => $pdf_content]);
                            }
                        }
                            catch(Exception $e){
                                $this->render('sa_error',['message' => $e->getMessage()]);
    }

}
                } else{
                    sleep(5); // Attendre 5 secondes avant de vérifier à nouveau
                } 
            }
        } elseif (isset($_POST['oneUserForm'])) {

            // Traitement pour le formulaire 1 utilisateur
			$user = $userdb->addUser($_REQUEST['newUserPrenom'], $_REQUEST['newUserNom']);

            
            $this->render('sa_add_user_valid',[$user[0], $user[1]]); //$_REQUEST['newUserRole']
        }
    }
}

?>
