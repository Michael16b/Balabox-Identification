<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/controllers/connect.php');
class MainController extends Controller{

    public function get($request){
        //persistant connection
        if(isset($_SESSION['username'])){
            $connect = new ConnectController();
            $connect->connection($_SESSION['role']);
        }else{
            $this->render('main',[]);
        }
    }
}
?>

