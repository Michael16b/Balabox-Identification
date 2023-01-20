<?php

class groupsDB {

    private function __construct() {}


    public function addGroups(String $groupeName, String $desc): void{
        $groupdata = new stdClass();
        $groupdata->name = $groupeName;
        $groupdata->courseid = 10;
        $groupdata->description = $desc;

        $groupid = groups_create_group($groupdata);
        }

    public function deleteGroups(String $groupeName): void{
        global $DB;
        $DB->delete_records('groups', array('name' => $groupeName));
    }

    public function updateGroups(String $groupeName, String $desc): void{
        global $DB;
        $groupdata = $DB->get_record('groups', array('name' => $groupeName));
        $groupdata->description = $desc;
        $DB->update_record('groups', $groupdata);
    }

    public function addMember(String $groupeName, String $username): void{
        global $DB;
        $groupdata = $DB->get_record('groups', array('name' => $groupeName));
        $userdata = $DB->get_record('user', array('username' => $username));
        groups_add_member($groupdata, $userdata);
    }

    public function deleteMember(String $groupeName, String $username): void{
        global $DB;
        $groupdata = $DB->get_record('groups', array('name' => $groupeName));
        $userdata = $DB->get_record('user', array('username' => $username));
        groups_remove_member($groupdata, $userdata);
    }

    public function getGroups(String $groupeName): String{
        global $DB;
        $groupdata = $DB->get_record('groups', array('name' => $groupeName));
        return $groupdata;
    }

    public function getMembers(String $groupeName): String{
        global $DB;
        $groupdata = $DB->get_record('groups', array('name' => $groupeName));
        $members = groups_get_members($groupdata->id);
        return $members;
    }

    

    

    
}


?>
