<?php
require_once(__ROOT__.'/controllers/Controller.php');


class ConnectController extends Controller{

	public function get($request){
		$this-> render('/main',[]);
	}

	public function connection($role){
		echo "ok2";
		switch ($role){		
			case 1:
				$this-> render('/sa_classCreate',[]);
				break;
			case 2:
				$this-> render('/connect_info',[]);
				break;
			case 3:
				$this-> render('/connect_info',[]);
				break;
			case 4:
				$this-> render('/connect_info',[]);
				break;
			case 5:
				$this-> render('/connect_info',[]);
				break;
			default:
				$this-> render('/main',[]);
				echo "erreur de role";
				echo "votre role est : $role";
				break;
		}
	}
    public function post($request){
        try{
			// test //
			/*
			$role = 1;
			$_SESSION['username'] = $request['username'];
			$_SESSION['password'] = $request['password'];
			$_SESSION['role'] = $role;

			$uc = new UsersConnected();
			$uc->newConnection($request['username'], $role);
			$this-> render('/sa_classCreate',[]);
			*/
			//fin test //
			//recuperation de l'utilisateur

			$userdb = new UserDB();
			$user = $userdb->getRecord($request['username']);
			$username = $request['username'];
			$password = $request['password'];

			//vérification de l'existance de l'utilisateur
			if($user != false){
				if ($username == "moodleuser") {
					role_assign(1, $user->id, context_system::instance());
				}
				//vérification du mot de passe
				if(password_verify($password, $user->password)){
					$userRole = $userdb->getUser_role($request['username']);
					//définition des variables de session
					$_SESSION['role'] = $userRole;
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$uc = new UsersConnected();
					$uc->newConnection($request['username'], $userRole);
					echo "ok";
					$this->connection($userRole);

				}else{
					$this-> render('/main',[]);
					echo " mot de passe incorrect";
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
