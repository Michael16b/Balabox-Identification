<?php
require_once(__ROOT__.'/controllers/Controller.php');

class ConnectController extends Controller{

    public function post($request){
        try{
			$userdb = new UserDB();
			$user = $userdb->getRecord($request['username']);
			$password = $request['password'];

			//vérification de l'existance de l'utilisateur
			if($user != false){

				//vérification du mot de passe
				if(password_verify($password, $user->password)){
					$userRole = $userdb->getUser_role($user->username);

					// démarrage de la session
					session_start();

					 //définition des variables de session
					$_SESSION['idRole'] = $userRole;

					$this-> render('/connect_info',['surname' =>$request['surname'] , 'password' => $password, 'idprof' => $userRole]);
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
