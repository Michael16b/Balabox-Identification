<?php
class UserDB {

    public function getRecord(string $surname){
        global $DB;
        return $DB->get_record('user', array('username' => $surname));
    }


    
    public final function RandomPassword() : String {
        $alphabet = '!@#$%^&*()_+-=abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $pass[rand(0,7)] = $alphabet[rand(0,15)]; // on ajoute un caractère spécial au hasard 
        return implode($pass);
    }

    public function checkUserName(String $username) : String {
        global $DB;
        $user = $DB->get_record('user', array('username' => $username));
        $i = 1;
        while ($user != false) {
            $TMPusername = $username + $i;
            $user = $DB->get_record('user', array('username' => $TMPusername));
            $i += 1;
        }

        return $username;
    }

    public function addUser(String $firstName, String $lastName): void{
        $user = new stdClass();
        $user->firstname =  $firstName;
        $user->lastname = $lastName;
        $user->username = $this->checkUserName(substr($firstName,0,1) + $lastName);
        $user->password = $this->RandomPassword();
        $user->email = $firstName + "." + $lastName + "@balabox.home" ;
        $user->auth = 'manual';
        $user->confirmed = 1;
        $user->lang = 'fr';
        $user->timecreated = time();
        $user->timemodified = time();

        $user->id = user_create_user($user);
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

}
?>
