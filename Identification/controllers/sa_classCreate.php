<?php
require(__ROOT__.'/controllers/Controller.php');

class SaClassCreateController extends Controller{

    public function get($request){
        $this->render('sa_classCreate',[]);
    }

    public function post($request){
        $this->render('confirm',['nom' => 'classe']);
    }
}

?>