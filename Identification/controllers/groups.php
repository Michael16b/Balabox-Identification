<?php
require(__ROOT__.'/controllers/Controller.php');

class GroupesController extends Controller{
    public function get($request){
        try{
            header("Access-Control-Allow-Origin: *");
            header('Access-Control-Allow-Methods: GET, POST');
            header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
            header("Access-Control-Allow-Credentials: true");
            header("HTTP/1.1 200 OK");
            $groups = new GroupsDB();
            echo json_encode($groups->getGroups());
        }catch(Exception $e){
            header("Access-Control-Allow-Origin: *");
            header('Access-Control-Allow-Methods: GET, POST');
            header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
            header("Access-Control-Allow-Credentials: true");
            header("HTTP/1.1 400 Bad Request");

            echo json_encode(array('error' => $e->getMessage()));
        }
    }
}
?>
