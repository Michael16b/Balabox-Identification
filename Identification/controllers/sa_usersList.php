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
            $usersWithoutGroup = array_unique($usersWithoutGroup);
            $this->render('sa_usersList',['groups' => $groups, 'usersWithoutGroup' => $usersWithoutGroup]);
        }
    }

    public function delete($group) {
        $groupsDB = new GroupsDB();
        $groupsDB->deleteGroup($group);
        $groups = $groupsDB->getGroups();
        $this->render('sa_usersList',['groups' => $groups ]);
    }
    
    public function addMember($group, $member) {
        $groupsDB = new GroupsDB();
        $groupInfo = $groupsDB->getGroup($group);
        $groupsDB->addMember($groupInfo->id, $member);
        $groups = $groupsDB->getGroups();
        $this->render('sa_usersList',['groups' => $groups]);
    }

    public function deleteMember($group, $member) {
        $groupsDB = new GroupsDB();
        $groupsDB->deleteMember($group, $member);
        $groups = $groupsDB->getGroups();
        $this->render('sa_usersList',['groups' => $groups]);
    }

    public function updateGroup($group, $newName, $newDescription) {
        $groupsDB = new GroupsDB();
        if ($groupsDB->getGroup($newName) != null) {
            $this->render('sa_error',['message' => "Le nom du groupe existe déjà"]);
        } else {
                if ($newDescription == "" || $newDescription == null) {
                    $groupsDB->updateGroups($group, $newName);
                } else { 
                    $groupsDB->updateGroups($group, $newName, $newDescription);
                }
                $groups = $groupsDB->getGroups();
                $this->render('sa_usersList',['groups' => $groups]);
    }
    }

    public function post($request){
        if(isset($_POST['isDeleteGroup'])){
            $this->delete($_POST['isDeleteGroup']);
        } else if (isset($_POST['addMember'])) {
            $this->addMember($_POST['addMember'], $_POST['member']);
        } else if (isset($_POST['deleteMember'])) {
            $this->deleteMember($_POST['deleteMember'], $_POST['member']);
        } else if (isset($_POST['updateGroup']) && isset($_POST['newName'])) {
            $this->updateGroup($_POST['updateGroup'], $_POST['newName'], $_POST['newDescription']);

        } else {
            $this->render('sa_error',['message' => 
                                      "Erreur de requête POST
                                      <br>isDeleteGroup: ".$_POST['isDeleteGroup']."<br>
                                        addMember: ".$_POST['addMember']."<br>
                                        deleteMember: ".$_POST['deleteMember']."<br>
                                        updateGroup: ".$_POST['updateGroup']."<br>
                                        newName: ".$_POST['newName']."<br>
                                        newDescription: ".$_POST['newDescription']."<br>
                                        "
                                    ]);
        }
    }


}

?>
