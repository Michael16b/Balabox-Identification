<?php
require(__ROOT__.'/controllers/Controller.php');

class AuthentifiedController extends Controller{
    public function get($request){
        var_dump($_GET);
        // Check if session ID provided in query parameter
        if(isset($_GET['id'])){
            $session_id = $_GET['id'];
            $uc = new UsersConnected();
            echo $uc->getUserBySessionId($session_id);
        } else {
            // No session ID provided, return error
            $this->render('sa_error',["message" => "Session ID not provided"]);
            return;
        }
    }
}
?>