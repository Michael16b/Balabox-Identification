<?php
require_once(__ROOT__.'/controllers/Controller.php');

class ConnectController extends Controller{

    public function post($request){
        try{		//recuperation de l'utilisateur
			$userdb = new UserDB();
			$user = $userdb->getRecord($request['surname']);
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
					switch ($userRole){
						case 1:
							$this-> render('/sa_classCreate',['surname' =>$request['surname'] , 'password' => $password, 'role' => $userRole]);
							break;
						case 2:
							$this-> render('/connect_info',['surname' =>$request['surname'] , 'password' => $password, 'role' => $userRole]);
							break;
						case 3:
							$this-> render('/connect_info',['surname' =>$request['surname'] , 'password' => $password, 'role' => $userRole]);
							break;
						case 4:
							$this-> render('/connect_info',['surname' =>$request['surname'] , 'password' => $password, 'role' => $userRole]);
							break;
						case 5:
							$this-> render('/connect_info',['surname' =>$request['surname'] , 'password' => $password, 'role' => $userRole]);
							break;
					}
				
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
