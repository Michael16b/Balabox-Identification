<?php

require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/config.php');


class ConnectController extends Controller{
    public function get($request){
        $this-> render('connect_form', []);
    }

    public function post($request){
        try{
	  $password = hash('sha256', $password);
          global $DB;
          //$user = $DB->get_record('user', array('surname' => $request['surname'], 'password' => $password));
          $user = $DB-> get_record_sql('SELECT id FROM {USER} WHERE surname = ? AND password = ?', [$request['surname'], $password]);
            //var_dump($user);
        }catch (Error $e){
            echo $e;
	    $this-> render('connect_info',['surname' => 'Error', 'password' => 'Error', 'idprof' => null]);
        }
         $this->render('connect_info',['surname' => $user['surname'], 'password' => $user['password'], 'idprof' => null]);
    }
}

?>
