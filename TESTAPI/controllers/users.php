<?php
require(__ROOT__.'/controllers/Controller.php');

class UsersController extends Controller{
    public function get($request){
        $uc = new UsersConnected();
        $users = $uc->getUserConnected();
        $tg = new TokenGenerator();
        $token = $tg->generateUsersToken($users);
        if(isset($users)){
            echo $token;
        }else{
            echo "False";
        }
    }
}
?>