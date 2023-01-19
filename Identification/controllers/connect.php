<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/config.php');
require_once (__ROOT__.'/model/UserDB.php');

class ConnectController extends Controller{

    public function post($request){
        try{
			//récupération de l'utilisateur

          	// global $DB;
          	// $user = $DB->get_record('user', array('username' => $request['surname']));
			
			$userdb = new UserDB();
			$user = $userdb->getUser($request['surname']);

			$password = $request['password'];

			//vérification de l'existance de l'utilisateur
			if($user != false){

				//vérification du mot de passe
				if(password_verify($password, $user->password)){
					$this-> render('/connect_info',['surname' =>$request['surname'] , 'password' => $password, 'idprof' => null]);
				}else{
					$this-> render('/main',[]);
					echo  " mot de passe incorrect";
				}
			}
			else{
				$this-> render('/main',[]);
				echo "utilisateur introuvable";
			}
        }catch (Error $e){
            echo $e;
	    $this-> render('/error',['surname' => 'Error', 'password' => 'Error', 'idprof' => null]);
        }
    }
}
?>
