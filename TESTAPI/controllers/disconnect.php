<?php
require(__ROOT__.'/controllers/Controller.php');

class UnconnectController extends Controller{

    public function post($request){
        session_destroy();
        $this-> render('/main',[]);
    }
}
?>