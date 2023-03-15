<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/controllers/connect.php');
class MainController extends Controller{

    public function get($request){
        //persistant connection
        if(isset($_SESSION['username'])){
            $connect = new ConnectController();
            $uc->newConnection($request['username'], $role);
            $this->connection($userRole);
            $connect->connection($_SESSION['role']);
        }else{
            $this->render('connect',[]);
        }
    }
}

?>
