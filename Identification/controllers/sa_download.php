<?php
require(__ROOT__.'/controllers/Controller.php');

class SaDownloadController extends Controller{

    public function get($request){
        session_start();
        if($_SESSION['idRole'] != 1){
            $this->render('/',[]);
        }else{
            $this->render('sa_confirm',[]);
        }
    }
}

?>
