<?php

require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/static/assets/FPDF/fpdf.php');

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
        

            // CONDITION : TANT QUE LE FICHIER N'EST PAS PRESENT DANS /static/uploads, ALORS ON ATTEND 5s AVANT DE REESSAYER LA LECTURE
            while(empty($file_name)) {

                    if(isset($_FILES['csvFile']) && is_uploaded_file($_FILES['csvFile']['tmp_name'])){
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

                                                        if (count($data[0]) != 2) {
                                                            $this->render('sa_error',['message' => 'Le fichier CSV ne contient pas le bon nombre de colonnes. Il doit y avoir 2 colonnes :  Nom, Prénom']);
                                                        } else {
                                                        // Créer l'objet UserDB pour entrer des données dans la bdd Moodle
                                                        $groupDB = new GroupsDB();
                                                        // A VERIFIER : Créer la classe/////////////////////////////////////////////////
                                                        $idGroup = $groupDB->addGroups($_REQUEST['newClassName'], $_REQUEST['newClassSummary']);
                                                        foreach ($data as $line) {
                                                            $groupDB->addMember($idGroup, $line[1], $line[0]);
                                                        }
                                                        
                                                        // Création du fichier PDF
                                                        $pdf = new FPDF();
                                                        
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

                                                        $members = $groupDB->getMembers($_REQUEST['newClassName']);
                                                        $member = $members->fetch_object();
                                                        foreach ($member as $members) {
                                                            $pdf->Cell($w[0],6,iconv('UTF-8', 'windows-1252',$member->role),'LR');
                                                            $pdf->Cell($w[1],6,iconv('UTF-8', 'windows-1252',$member->lastname),'LR');
                                                            $pdf->Cell($w[2],6,iconv('UTF-8', 'windows-1252',$member->firstname),'LR');
                                                            $pdf->Cell($w[3],6,iconv('UTF-8', 'windows-1252',$member->username),'LR');
                                                            $pdf->Cell($w[4],6,iconv('UTF-8', 'windows-1252',$member->password),'LR');
                                                            $pdf->Ln();
                                                        }

                                                        $pdf->SetX($startX + ($pdf->GetPageWidth() - array_sum($w))/2);
                                                        $pdf->Cell(array_sum($w),0,'','T');
                                                        
                                                        //donner le pdf à la prochaine vue pour le téléchargement
                                                        $pdf_content = $pdf->Output('','S');
                                                        $this->render('sa_download', ['pdf_content' => $pdf_content]);


                                                    }
                                                    }catch(Exception $e){
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
