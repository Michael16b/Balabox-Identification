<?php
require(__ROOT__.'/controllers/Controller.php');

class GroupesController extends Controller{
    public function get($request){
        $groups = new GroupsDB();
        echo json_encode($groups->getGroups());
    }
}
?>
