<?php

require_once(dirname(__FILE__) . '/userDB.php');

class GroupsDB {


    
    public function addGroups(String $groupeName, String $desc) : int {
        global $CFG;
    
        // Créer les données nécessaires pour créer un nouveau cours.
        $data = new stdClass();
        $data->fullname = $groupeName;
        $data->shortname = $groupeName;
        $data->summary = $desc;
        $data->format = "topics";
        $data->category = 1; // L'ID de la catégorie du cours.
    
        // Créer le cours.
        $newcourse = create_course($data);
    
        // Créer le groupe en utilisant le cours nouvellement créé comme contexte.
        $group = new stdClass();
        $group->name = $groupeName;
        $group->description = $desc;
        $group->courseid = $newcourse->id;
        $idGroup = groups_create_group($group);
    
        return $idGroup;
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

    public function addMember(String $groupId, String $firstName, String $lastName): void{
        global $DB;
        $group = $DB->get_record('groups', array('id' => $groupId));

        // Appeler la fonction addUser() pour récupérer l'ID de l'utilisateur.
        $userDB = new UserDB();
        $user = $userDB->addUser($firstName, $lastName);
        // Ajouter l'utilisateur au groupe.
        $user = $userDB->getRecord($user[0]);
        groups_add_member($group, $user);
    }

    public function deleteMember(String $groupeName, String $username): void{
        global $DB;
        $group = $DB->get_record('groups', array('name' => $groupeName));
        $user = $DB->get_record('user', array('username' => $username));
        groups_remove_member($group, $user);
    }

    public function getGroup(String $groupeName): array{
        global $DB;
        $group = $DB->get_record('groups', array('name' => $groupeName));
        return $group;
    }

    public function getMembers(String $groupeName) : array {
        
        $group = groups_get_group_by_name($groupeName);
        $members = groups_get_members($group->id);
        return $members;
    }
}


?>
