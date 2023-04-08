<?php
require(__ROOT__.'/controllers/Controller.php');


class SaUserList extends Controller{

    public function get($request){
        if($_SESSION['role'] != 1){
            $this->render('sa_error',['message' => "Vous n'avez pas de permission d'entrer dans cette page"]);
        }else{
            $groupsDB = new GroupsDB();
            $groups = $groupsDB->getGroups();

            $user = new UserDB();
            $users = $user->getUsers();
            /*Chercher tous les utilisateurs qui n'ont pas de groupe */
            $usersWithoutGroup = array();
            foreach ($users as $user) {
                if($user->id != 1){
                    $user = $user->username;
                    foreach ($groups as $group) {
                        if($groupsDB->isMember($group['name'], $user)){
                            break;
                        } else {
                            array_push($usersWithoutGroup, $user);
                        } 
                    }
                }
            }
            
            $this->render('sa_usersList',['groups' => $groups, 'usersWithoutGroup' => $usersWithoutGroup]);
        }
    }
    public function delete($group) {
        $groupsDB = new GroupsDB();
        $groupsDB->deleteGroup($group);
        $groups = $groupsDB->getGroups();



        $this->render('sa_usersList',['groups' => $groups ]);
    }
    
    public function addMember($group) {
        $groupsDB = new GroupsDB();
        //$groupsDB->addMember($group);
        $groups = $groupsDB->getGroups();
        $this->render('sa_usersList',['groups' => $groups]);
    }

    public function post($request){
        if(isset($_POST['isDeleteGroup'])){
            $this->delete($_POST['isDeleteGroup']);
        } else if (isset($_POST['addMember'])) {

        }
    }


}

?>
