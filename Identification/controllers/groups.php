<?php
require(__ROOT__.'/controllers/Controller.php');

class GroupesController extends Controller{
    public function get($request){
        try{
            header("HTTP/1.1 200 OK");
            $groups = new GroupsDB();
            echo json_encode($groups->getGroups());
        }catch(Exception $e){
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(array('error' => $e->getMessage()));
        }
    }
}
?>
