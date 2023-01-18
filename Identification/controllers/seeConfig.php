<?php
require(__ROOT__.'/controllers/Controller.php');

class ConnectController extends Controller{

    public function get($request){
        $this->render('seeconfig',[]);
    }
}

?>
