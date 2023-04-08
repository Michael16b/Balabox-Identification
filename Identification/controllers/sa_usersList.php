<?php
require(__ROOT__.'/controllers/Controller.php');


class SaUserList extends Controller{

    public function get($request){
        if($_SESSION['role'] != 1){
            $this->render('sa_error',['message' => "Vous n'avez pas de permission d'entrer dans cette page"]);
        }else{
            $groupsDB = new GroupsDB();
            $groups = $groupsDB->getGroups();
            
            $this->render('sa_usersList',['groups' => $groups]);
        }
    }

    public function post($request){
        if(isset($_POST['isDeleteGroup'])){
            $groupsDB = new GroupsDB();
            $groupsDB->deleteGroup($_POST['isDeleteGroup']);
            
            $groups = $groupsDB->getGroups();
            $this->render('sa_usersList',['groups' => $groups]);
        }
    }


}

?>
