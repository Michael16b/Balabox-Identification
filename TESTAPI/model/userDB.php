<?php
class UserDB {

    public function getRecord(string $username){
        global $DB;
        return $DB->get_record('user', array('username' => $username));
    }


    public final function RandomPassword() {
        $uppercase = range('A', 'Z');
        $lowercase = range('a', 'z');
        $numbers = range(0, 9);
        $specialChars = array('!', '@', '#', '$', '%', '^', '&', '*');
        $characters = array_merge($uppercase, $lowercase, $numbers, $specialChars);
        shuffle($characters);
        return implode(array_slice($characters, 0, 12));
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

    public function addUser(String $firstName, String $lastName){
        $user = new stdClass();
        $user->firstname =  $firstName;
        $user->lastname = $lastName;
        $user->username = $this->checkUserName(strtolower(substr($firstName,0,1) . $lastName));
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
        role_assign(4, $user->id, context_system::instance());


        //echo $this->getUser_role($user->username);
        $userRole = json_encode($this->getUser_role($user->username));
        return array($user->username, $password,$this->getUser_role($user->username));
        }


    public function deleteUser(String $username): void{
        global $DB;
        $DB->delete_records('user', array('username' => $username));
    }

    public function updateUser(String $username, String $firstName, String $lastName): void{
        global $DB;
        $user = $DB->get_record('user', array('username' => $username));
        $user->firstname = $firstName;
        $user->lastname = $lastName;
        $DB->update_record('user', $user);
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
}
?>
