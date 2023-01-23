<?php
require(__ROOT__.'/controllers/Controller.php');

class SeeConfigController extends Controller{

    public function get($request){
        $this->render('seeconfig',[]);
    }
}

?>
