<?php

require('Assertions.php');
require_once('../user/lib.php');
require_once('../group/lib.php');
require_once('../course/lib.php');

class AddGroupsTest {

    private $assert;
  
    public function __construct() {
      $this->assert = new Assertions();
    }
  
    public function testAddGroups() {
      // Test avec un groupe et une description valides
      $groupName = "Groupe de test";
      $groupDesc = "Description de test";
      $idGroup = $this->addGroups($groupName, $groupDesc);
      $this->assert->assertNotEmpty($idGroup);
  
      // Vérifier que le groupe a été créé avec les bonnes informations
      $group = groups_get_group($idGroup);
      $this->assert->assertEquals($groupName, $group->name);
      $this->assert->assertEquals($groupDesc, $group->description);
  
      // Test avec un groupe valide et une description vide
      $groupName = "Groupe de test";
      $idGroup = $this->addGroups($groupName);
      $this->assert->assertNotEmpty($idGroup);
  
      // Vérifier que le groupe a été créé avec le nom correct et une description par défaut
      $group = groups_get_group($idGroup);
      $this->assert->assertEquals($groupName, $group->name);
      $this->assert->assertEquals('Pas de description', $group->description);
      echo "Test réussi";
    }
  
    private function addGroups(String $groupName, String $groupDesc = 'Pas de description') : int {
      // Créer les données nécessaires pour créer un nouveau cours.
      $data = new stdClass();
      $data->fullname = $groupName;
      $data->shortname = $groupName;
      $data->summary = $groupDesc;
      $data->format = "topics";
      $data->category = 1; // L'ID de la catégorie du cours.
  
      // Créer le cours.
      $newcourse = create_course($data);
  
      // Créer le groupe en utilisant le cours nouvellement créé comme contexte.
      $group = new stdClass();
      $group->name = $groupName;
      $group->description = $groupDesc;
      $group->courseid = $newcourse->id;
      $idGroup = groups_create_group($group);
  
      return $idGroup;
    }
  }
  
  // Exécuter le test
  $test = new AddGroupsTest();
  $test->testAddGroups();
  

?>