<?php

class courseDBTest extends Assertions
{
    private $courseDB;
    

    public function setUp()
    {
        $this->courseDB = new courseDB();
    }

    public function testAddCourse()
    {
        global $DB;
        $this->courseDB->addCourse("Test Course", "test", "Summary", "weeks");

        $course = $DB->get_record('course', array('shortname' => 'test'));
        $this->assertNotNull($course);
        $this->assertEquals("Test Course", $course->fullname);
        $this->assertEquals("Summary", $course->summary);
        $this->assertEquals("weeks", $course->format);
    }

    public function testDeleteCourse()
    {
        global $DB;
        $this->courseDB->addCourse("Test Course", "test", "Summary", "weeks");

        $course = $DB->get_record('course', array('shortname' => 'test'));
        $this->assertNotNull($course);

        $this->courseDB->deleteCourse("test");

        $course = $DB->get_record('course', array('shortname' => 'test'));
        $this->assertNull($course);
    }

    public function testUpdateCourse()
    {
        global $DB;
        $this->courseDB->addCourse("Test Course", "test", "Summary", "weeks");

        $course = $DB->get_record('course', array('shortname' => 'test'));
        $this->assertNotNull($course);
        $this->assertEquals("Test Course", $course->fullname);
        $this->assertEquals("Summary", $course->summary);
        $this->assertEquals("weeks", $course->format);

        $this->courseDB->updateCourse("test", "New Test Course", "New Summary", "topics");

        $course = $DB->get_record('course', array('shortname' => 'test'));
        $this->assertNotNull($course);
        $this->assertEquals("New Test Course", $course->fullname);
        $this->assertEquals("New Summary", $course->summary);
        $this->assertEquals("topics", $course->format);
    }

    public function testAddRolesMember()
    {
        global $DB;
        
        // On crée un cours de test
        $this->courseDB->addCourse("Test Course", "test", "Summary", "weeks");
        $course = $DB->get_record('course', array('shortname' => 'test'));
        $context = context_course::instance($course->id);

        // On vérifie qu'un utilisateur donné n'a pas encore un rôle donné
        $student1 = $DB->get_record('user', array('username' => 'student1'));
        $this->assertEquals(false, user_has_role_assignment($student1->id, 5, $context->id));

        // On teste la méthode addRolesMember
        $this->courseDB->addRolesMember("test", "student1", "student");

        // On vérifie que l'utilisateur a maintenant le rôle donné
        $this->assertEquals(true, user_has_role_assignment($student1->id, 5, $context->id));
    }
}

?>