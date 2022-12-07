<?php
require(__ROOT__.'/controllers/Controller.php');

class ConnectController extends Controller{

    public function post($request){
        $this->render('connect_info',['num' => $request['num'], 'password' => $request['password'], 'idprof' => null]);
    }
}

?>
