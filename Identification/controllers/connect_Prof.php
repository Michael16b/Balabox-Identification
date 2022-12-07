<?php
require(__ROOT__.'/controllers/Controller.php');

class ConnectController extends Controller{

    public function get($request){
        $this->render('connect_prof',[]);
    }

    public function post($request){
        $this->render('connect_info',['idprof' => $request['idprof'], 'password' => $request['password'], 'num' => null]);
    }
}

?>
