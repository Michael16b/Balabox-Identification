<?php
require_once('config.php');
require_once($CFG->dirroot.'/course/lib.php');

class UserDAO {
    private static UserDAO $dao;

    private function __construct() {}


    

    public final function RandomPassword() : String {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public final function addUser(String $firstName, String $lastName): void{
        $user = new stdClass();
        $user->firstname =  $firstName;
        $user->lastname = $lastName;
        $user->username = substr($firstName,0,1) + $lastName;
        $user->password = $this->RandomPassword();
        $user->email = $firstName + "." + $lastName + "@gmail.com" ;
        $user->auth = 'manual';
        $user->confirmed = 1;
        $user->lang = 'fr';
        $user->timecreated = time();
        $user->timemodified = time();

        $user->id = user_create_user($user);
        }
    }
?>
