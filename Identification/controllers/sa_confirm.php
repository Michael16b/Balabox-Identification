<?php
require(__ROOT__.'/controllers/Controller.php');

class SaConfirmController extends Controller{

    public function get($request){
        session_start();
        if($_SESSION['role'] != 1){
            $this->render('/',[]);
        }else{
            $this->render('sa_confirm',[]);
        }
        $this->render('sa_userCreate',[]);
    }
}

?>
