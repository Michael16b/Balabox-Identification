<?php
require_once(__ROOT__.'/controllers/Controller.php');

class ConnectController extends Controller{

	public function get($request){
		$this-> render('/main',[]);
	}

	public function connection($role){
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
		}
	}
    public function post($request){
        try{
			// test //
			$role = 1;
			$_SESSION['username'] = $request['username'];
			$_SESSION['password'] = $request['password'];
			$_SESSION['role'] = $role;
			

			$uc = new UsersConnected();
			$uc->newConnection($request['username'], $role, session_id());
			$this-> render('/sa_classCreate',[]);
			
			//fin test //
	/*
			//recuperation de l'utilisateur
			$userdb = new UserDB();
			$user = $userdb->getRecord($request['username']);
			$username = $request['username'];
			$password = $request['password'];

			//vérification de l'existance de l'utilisateur
			if($user != false){

				//vérification du mot de passe
				if(password_verify($password, $user->password)){
					role_assign(4, $user->id, context_system::instance());
					$userRole = $userdb->getUser_role($request['username']);
					//définition des variables de session
					$_SESSION['role'] = $userRole;
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$this->connection($userRole);
				}else{
					$this-> render('/main',[]);
					echo  " mot de passe incorrect";
				}
			}
			else{
				$this-> render('/main',[]);
				echo "utilisateur introuvable";
			}										*/						
        }catch (Error $e){
            echo $e;
	    $this-> render('/error',['surname' => 'Error', 'password' => 'Error', 'idprof' => null]);
        }
    }
}
?>
