<?php
require(__ROOT__.'/controllers/Controller.php');

class AuthentifiedController extends Controller{


    public function get($request){
        if(isset($_SESSION['username'])){
            $tg = new TokenGenerator();
            $jwt = $tg->generateToken($_SESSION['role'],$_SESSION['username'],$_SESSION['password']);
            echo var_dump($idRole);
        }else{
            echo "False";
        }
    }
}
?>