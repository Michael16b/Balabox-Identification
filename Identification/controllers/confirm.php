<?php
require(__ROOT__.'/controllers/Controller.php');

class ConfirmController extends Controller{

    public function get($request){
        $this->render('confirm',[]);
    }
}

?>
