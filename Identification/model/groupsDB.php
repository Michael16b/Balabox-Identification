<?php

class GroupsDB {


    
    public function addGroups(String $groupeName, String $desc) : void{
        $group = new stdClass();
        $group->name = $groupeName;
        $group->description = $desc;
        groups_create_group($group);
        }
    
    public function deleteGroups(String $groupeName): void{
        global $DB;
        $DB->delete_records('groups', array('name' => $groupeName));
    }

    public function updateGroups(String $oldGroupName, String $groupeName, String $desc): void{
        global $DB;
        $group = groups_get_group_by_name($oldGroupName);
        $group->name = $groupeName;
        $group->description = $desc;
        groups_update_group($group);

    }

    public function addMember(String $groupeName, String $username): void{
        global $DB;
        $group = $DB->get_record('groups', array('name' => $groupeName));
        $user = $DB->get_record('user', array('username' => $username));
        groups_add_member($group, $user);
    }

    public function deleteMember(String $groupeName, String $username): void{
        global $DB;
        $group = $DB->get_record('groups', array('name' => $groupeName));
        $user = $DB->get_record('user', array('username' => $username));
        groups_remove_member($group, $user);
    }

    public function getGroups(String $groupeName): String{
        global $DB;
        $group = $DB->get_record('groups', array('name' => $groupeName));
        return $group;
    }

    public function getMembers(String $groupeName): String{
        global $DB;
        $group = $DB->get_record('groups', array('name' => $groupeName));
        $members = groups_get_members($group->id);
        return $members;
    }
}


?>
