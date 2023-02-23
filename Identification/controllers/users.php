<?php
require(__ROOT__.'/controllers/Controller.php');

class UsersController extends Controller{
    public function get($request){
        if(isset($_GET['username'])){
            $uc = new UsersConnected();
            $test = $uc->getUserConnected();
            echo $test;
        }else{
            echo "False";
        }
    }
}
?>