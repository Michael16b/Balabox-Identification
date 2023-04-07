<?php

class GroupsDB {


    public function addGroups(String $groupeName, String $desc) : void{
        global $DB, $USER, $CFG;

        // Récupérer l'ID du dernier cours créé
       // $lastcourse = $DB->get_record_sql('SELECT id FROM {course} ORDER BY id DESC LIMIT 1');
        // $lastcourseid = ($lastcourse) ? $lastcourse->id : 0;
        //$newcourseid = $lastcourseid + 1;

        // Créer le contexte pour le cours
        $context = context_course::instance($newcourseid);

        // Définir les données du groupe
        $data = new stdClass();
        $data->courseid = $newcourseid;
        $data->name = trim($groupeName);
        $data->description = trim($desc);
        $data->timecreated = time();
        $data->timemodified = $data->timecreated;
        $data->visibility = GROUPS_VISIBILITY_ALL;

        // Insérer le nouveau groupe
        $data->id = $DB->insert_record('groups', $data);

        // Récupérer les données du groupe créé
        $group = $DB->get_record('groups', array('id'=>$data->id));


        // Mettre à jour les caches de groupes pour le cours
        cache_helper::invalidate_by_definition('core', 'groupdata', array(), array($newcourseid));
        \core_group\visibility::update_hiddengroups_cache($newcourseid);

        // Mettre à jour la conversation de groupe (si applicable)
        if (\core_message\api::can_create_group_conversation($USER->id, $context)) {
            if (!empty($data->enablemessaging)) {
                \core_message\api::create_conversation(
                    \core_message\api::MESSAGE_CONVERSATION_TYPE_GROUP,
                    [],
                    $group->name,
                    \core_message\api::MESSAGE_CONVERSATION_ENABLED,
                    'core_group',
                    'groups',
                    $group->id,
                    $context->id
                );
            }
        }

        // Déclencher l'événement de création de groupe
        $params = array(
            'context' => $context,
            'objectid' => $group->id
        );
        $event = \core\event\group_created::create($params);
        $event->add_record_snapshot('groups', $group);
        $event->trigger();
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
