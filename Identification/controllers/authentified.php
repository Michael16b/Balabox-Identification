<?php
require(__ROOT__.'/controllers/Controller.php');

class AuthentifiedController extends Controller{
    public function get($request){
        // Check if session ID provided in query parameter
        if(isset($_GET['id'])){
            $session_id = $_GET['id'];
            $uc = new UsersConnected();
            var_dump($uc->getUserBySessionId($session_id));
        } else {
            // No session ID provided, return error
            echo json_encode(array('error' => 'Session ID not provided'));
            var_dump(getUser_role('moodleuser'));
            return;
        }
    }
}
?>
