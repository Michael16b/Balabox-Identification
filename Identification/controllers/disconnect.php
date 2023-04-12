<?php
require(__ROOT__.'/controllers/Controller.php');

class UnconnectController extends Controller{

    public function get($request){
        session_destroy();
        $this-> render('/main',[]);
    }
}
?>