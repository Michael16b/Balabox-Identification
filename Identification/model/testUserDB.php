<?php

require_once(dirname(__FILE__) . '/userDB.php');


class TestUserDB {
    

    public function TestGetRecord(string $username){
        $userDB = new UserDB();
        $user = $userDB->getRecord($username);
        if ($user != false){
            echo "TestGetRecord: OK";
        } else {
            echo "TestGetRecord: KO";
        }

    }

    public function TestGetUserById(int $id){
        $userDB = new UserDB();
        $user = $userDB->getUserById($id);
        if ($user != false){
            echo "TestGetUserById: OK";
        } else {
            echo "TestGetUserById: KO";
        }

    }

    public function TestGetUsers(){
        $userDB = new UserDB();
        $users = $userDB->getUsers();
        if ($users != false){
            echo "TestGetUsers: OK";
        } else {
            echo "TestGetUsers: KO";
        }

    }


    public function TestCheckUserName(String $username) {
        $userDB = new UserDB();
        $user = $userDB->checkUserName($username);
        if ($user != false){
            echo "TestCheckUserName: OK";
        } else {
            echo "TestCheckUserName: KO";
        }

        
    }

    public function TestAddUser(String $firstName, String $lastName, int $role = 4){
        $userDB = new UserDB();
        $user = $userDB->addUser($firstName, $lastName, $role);
        if ($user != false){
            echo "TestAddUser: OK";
        } else {
            echo "TestAddUser: KO";
            }
        }

    public function TestAddRolesSystemMembers(String $username, String $role): void{
        global $DB;
        $userDB = new UserDB();
        $userDB->addRolesSystemMembers($username, $role);
        $user = $userDB->getRecord($username);
        $roles =$DB->get_record('role_assignments', array('userid' => $user->id));
        if ($roles->roleid == $role){
            echo "TestAddRolesSystemMembers: OK";
        } else {
            echo "TestAddRolesSystemMembers: KO";
        }
    }
    
    public function TestGetUser_role(string $username) {
        $userDB = new UserDB();
        $role = $userDB->getUser_role($username);
        if ($role != false){
            echo "TestGetUser_role: OK";
        } else {
            echo "TestGetUser_role: KO";
        }
    }

    public function TestGetGroupOfUser(String $username) {
        $userDB = new UserDB();
        $group = $userDB->getGroupOfUser($username);
        if ($group != false){
            echo "TestGetGroupOfUser: OK";
        } else {
            echo "TestGetGroupOfUser: KO";
        }
    }


    public function TestDeleteUser(String $username): void{
        $userDB = new UserDB();
        $userDB->deleteUser($username);
        $user = $userDB->getRecord($username);
        if ($user == false){
            echo "TestDeleteUser: OK";
        } else {
            echo "TestDeleteUser: KO";
        }
    }

    public function TestUpdateUser(String $username, String $firstName, String $lastName, bool $password) {
        $userDB = new UserDB();
        $userDB->updateUser($username, $firstName, $lastName, $password);
        $user = $userDB->getRecord($username);
        if ($user->firstname == $firstName && $user->lastname == $lastName){
            echo "TestUpdateUser: OK";
        } else {
            echo "TestUpdateUser: KO";
        }
    }


}
?>
