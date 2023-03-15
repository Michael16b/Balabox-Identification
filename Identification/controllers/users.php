<?php
require(__ROOT__.'/controllers/Controller.php');

class UsersController extends Controller{
    public function get($request){
        if(isset($_GET['username'])){
		$user = new UserDB();
		$role = $user->getUser_role($_GET['username']); 
		if( ($role==3) || ($role == 2) ){
            		$uc = new UsersConnected();
            		$test = $uc->getUsersConnected();
            		echo $test;
		}
        }else{
            echo "False";
		$uc = new UsersConnected();
            		$test = $uc->getUsersConnected();
            		echo "ok";

        }
    }
}
?>
