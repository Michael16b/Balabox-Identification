<?php
require(__ROOT__.'/controllers/Controller.php');


class SaUserList extends Controller{

    public function filterUsers() {
        $user = new UserDB();
        $users = $user->getUsers();

        // Filter the users

        foreach ($users as $key => $user) {
            if ($user->username == 'guest' || $user->username == 'moodleuser') {
                unset($users[$key]);
            }
        } 
        
        $columnsToKeep = ['username', 'firstname', 'lastname'];
        $newUsers = array_map(function($user) use ($columnsToKeep) {
            return array_intersect_key((array) $user, array_flip($columnsToKeep));
        }, $users);

        return $newUsers;
    }

    public function get($request){
        if($_SESSION['role'] != 1){
            $this->render('sa_error',['message' => "Vous n'avez pas de permission d'entrer dans cette page"]);
        }else{
            $newUsers = $this->filterUsers();
            $this->render('sa_usersList',['users' => $newUsers]);
        }
    }

    public function delete($username) {
        $userDB = new UserDB();
        $userDB->deleteUser($username);

        $newUsers = $this->filterUsers();
        
        $this->render('sa_usersList',['users' => $newUsers]);
    }

    public function createPDF($user) {
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
        $pdf->Cell(($pdf->GetPageWidth() - array_sum($w))/2 - 10); // Ajouter de l'espace à gauche pour centrer le tableau
        for($i=0;$i<count($header);$i++)
            $pdf->Cell($w[$i],7,iconv('UTF-8', 'windows-1252',$header[$i]),1,0,'C',true);
        $pdf->Ln();

        $startX = $pdf->GetX();

        if ($user["role"] == 4) {
            $role = 'Eleve';
        } else if ($user["role"] == 3) {
            $role = 'Professeur Editeur';
        } else if ($user["role"] == 2) {
            $role = 'Professeur';
        } else if ($user["role"] == 1) {
            $role = 'Administrateur';
        }

        $pdf->SetTextColor(0, 0, 0); // définit la couleur de texte à noir
        $pdf->SetFont('Arial', '', 14); // définit la police de caractères sans gras
        $pdf->SetX(($pdf->GetPageWidth() - array_sum($w)/2 - 10));
        $pdf->Cell($w[0],10,iconv('UTF-8', 'windows-1252',$role),'LR');
        $pdf->Cell($w[1],10,iconv('UTF-8', 'windows-1252',$user["lastname"]),'LR');
        $pdf->Cell($w[2],10,iconv('UTF-8', 'windows-1252',$user["firstname"]),'LR');
        $pdf->Cell($w[3],10,iconv('UTF-8', 'windows-1252',$user["username"]),'LR');
        $pdf->Cell($w[4],10,iconv('UTF-8', 'windows-1252',$user["password"]),'LR');
        $pdf->Ln();

        $pdf->SetX($startX + ($pdf->GetPageWidth() - array_sum($w))/2 - 10);
        $pdf->Cell(array_sum($w),0,'','T');

        $pdf_content = $pdf->Output('','S');
        $this->render('sa_download', ['pdf_content' => $pdf_content]);
    }
    

    public function update($username, $newName,$newLastName, $newPassword) {
        $userDB = new UserDB();
        if ($newPassword == 'Non') {
            $newPassword = false;
        }
        $user = $userDB->updateUser($username, $newName, $newLastName, $newPassword);
        if ($user == false) {
            $this->render('sa_error',['message' => "Erreur de mise à jour de l'utilisateur"]);
        } else {
            if ($newPassword != false) {
                $this->createPDF($user);
            } else {
                $newUsers = $this->filterUsers();
                $this->render('sa_usersList',['users' => $newUsers]);
            }
            
        }
    }

    public function post($request){
        if(isset($_POST['isDeleteUser'])){
            $this->delete($_POST['isDeleteUser']);
        } else if (isset($_POST['isUpdateUser'])) {
            //$this->update($_POST['isUpdateUser'], $_POST['newName'], $_POST['newLastName'], $_POST['newPassword']);
            var_dump($_POST);

        } else {
            $this->render('sa_error',['message' => 
                                      "Erreur de requête POST
                                      <br>isDeleteUser: ".$_POST['isDeleteUser']."<br>
                                        isUpdateUser: ".$_POST['isUpdateUser']."<br>
                                        newName: ".$_POST['newName']."<br>
                                        isUpdateUser: ".$_POST['isUpdateUser']."<br>
                                        newLastName: ".$_POST['newLastName']."<br>
                                        newPassword: ".$_POST['newPassword']."<br>
                                        "
                                    ]);
        }
    }


}

?>
