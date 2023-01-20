<?php
require_once(__ROOT__.'/controllers/Controller.php');

class ConnectController extends Controller{

    public function post($request){
        try{
	/*/	//récupération de l'utilisateur
          	global $DB;
          	$user = $userDB->getRecord('user', array('username' => $request['surname']));	
*/
			$userdb = new UserDB();
			$user = $userdb->getRecord($request['surname']);
			$password = $request['password'];

			//vérification de l'existance de l'utilisateur
			if($user != false){

				//vérification du mot de passe
				if(password_verify($password, $user->password)){
					$userRole = userdb->getUser_role();	
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
