<?php
require(__ROOT__.'/controllers/Controller.php');

class MainController extends Controller{

    public function get($request){
        if(isset($_SESSION['username'])){
            $connect = new UsersConnected();
            $uc->newConnection($request['username'], $role);
            $this->connection($userRole);
            $connect->connection($_SESSION['role']);
        }else{
            $this->render('connect',[]);
        }
        $this->render('main',[]);
    }
}

?>
