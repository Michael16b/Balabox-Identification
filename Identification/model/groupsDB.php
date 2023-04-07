<?php

class GroupsDB {


    
    public function addGroups(String $groupeName, String $desc) : int {
        global $DB, $USER;
        $data = new stdClass();
        $data->name = trim($groupeName);
        $data->description = trim($desc);
        $data->descriptionformat = FORMAT_HTML;
        $data->timecreated = time();
        $data->timemodified = $data->timecreated;
        $data->courseid = null; //pas de contrainte de classe
        $data->idnumber = null; //pas de contrainte sur le numéro d'identification

        $data->visibility = \core\group\constants::GROUPS_VISIBILITY_ALL;

        $data->participation = true;
        $data->enablemessaging = true;

        $data->id = $DB->insert_record('groups', $data);

        $group = $DB->get_record('groups', array('id'=>$data->id));

        // Group conversation messaging.
        if (\core_message\api::can_create_group_conversation($USER->id)) {
            if (!empty($data->enablemessaging)) {
                \core_message\api::create_conversation(
                    \core_message\api::MESSAGE_CONVERSATION_TYPE_GROUP,
                    [],
                    $group->name,
                    \core_message\api::MESSAGE_CONVERSATION_ENABLED,
                    'core_group',
                    'groups',
                    $group->id,
                    \core\context_system::instance()->id);
            }
        }

        return $group->id;
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
