<?php

class UserDB {

    public function getRecord(string $username){
        global $DB;
        return $DB->get_record('user', array('username' => $username));
    }

    public function getUserById(int $id){
        global $DB;
        return $DB->get_record('user', array('id' => $id));
    }

    public function getUsers(): array{
        global $DB;
        return $DB->get_records('user');
    }


    public final function RandomPassword() {
        $uppercase = range('A', 'Z');
        $lowercase = range('a', 'z');
        $numbers = range(0, 9);
        $special_chars = array('!', '@', '#', '$', '%', '^', '&', '*');
        $characters = array_merge($uppercase, $lowercase, $numbers, $special_chars);
    
        shuffle($characters);
    
        $password = '';
        $password .= $uppercase[array_rand($uppercase)];
        $password .= $lowercase[array_rand($lowercase)];
        $password .= $numbers[array_rand($numbers)];
        $password .= $special_chars[array_rand($special_chars)];
    
        for ($i = 0; $i < 4; $i++) {
            $password .= $characters[array_rand($characters)];
        }
    
        return str_shuffle($password);
    }

    public function checkUserName(String $username) : String {
        global $DB;
        $user = $DB->get_record('user', array('username' => $username));
        $i = 1;
        $TMPusername = $username;
        while ($user != false) {
            $TMPusername = $username . $i;
            $user = $DB->get_record('user', array('username' => $TMPusername));
            $i += 1;

        }

        return $TMPusername;
    }

    public function addUser(String $firstName, String $lastName, int $role = 4, String $groupName = 'Aucun'): array{
        $user = new stdClass();
        $user->firstname =  $firstName;
        $user->lastname = $lastName;
        $user->username = $this->checkUserName(strtolower(substr($firstName,0,1) . preg_replace('/[^a-zA-Z]/', '', $lastName)));
        $user->password = $this->RandomPassword();
        $password = $user->password;
        // password_hash($password, PASSWORD_DEFAULT);
        $user->email = $firstName."." . $lastName . "@balabox.home" ;
        $user->auth = 'manual';
        $user->confirmed = 1;
        $user->lang = 'fr';
        $user->timecreated = time();
        $user->timemodified = time();

        $user->id = user_create_user($user);
        role_assign($role, $user->id, context_system::instance());

        if ($groupName != 'Aucun') {
            $groupsDB = new GroupsDB();
            $group = $groupsDB->getGroup($groupName);
            $groupsDB->addMember($group->id, $user->username);
        }
        
        return array($user->username, $password,$role);
        }

    public function addRolesSystemMembers(String $username, String $role): void{
        global $DB;
        $user = $DB->get_record('user', array('username' => $username));
        $role = $DB->get_record('role', array('shortname' => $role));
        role_assign($role->id, $user->id, context_system::instance());
    }
    
    public function getUser_role(string $username) {
    	global $DB;
    	$user = $this->getRecord($username);
	    $roles =$DB->get_record('role_assignments', array('userid' => $user->id));
    	return  $roles->roleid;
    }

    public function getGroupOfUser(String $username): String {
        global $DB;
        $user = $this->getRecord($username);
        $groupName = $DB->get_record('groups_members', array('userid' => $user->id));
        return $groupName;
    }


    public function deleteUser(String $username): void{
        global $DB;
        $groupsDB = new GroupsDB();
        $group = $groupsDB->getGroupByUser($username);
        if ($group != false) {
            $groupsDB->deleteMember($group["name"], $username);
        }
        $DB->delete_records('user', array('username' => $username));
    }

    public function updateUser(String $username, String $firstName, String $lastName, bool $password) : array{
        global $DB;
        if ($password == false) {
            $user = $this->getRecord($username);
            $user->firstname = $firstName;
            $user->lastname = $lastName;
            $DB->update_record('user', $user);
            return array($username, $lastName, $firstName, $this->getUser_role($username));
        } else {
            $role = $this->getUser_role($username);
            $this->deleteUser($username);
            
            $user =  $this->addUser($firstName, $lastName, $role);
            return array($user[2], $lastName, $firstName, $user[0] , $user[1]);
        }
    }


}
?>
