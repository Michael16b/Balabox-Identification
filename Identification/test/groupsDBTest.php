<?php

class groupsDBTest extends Assertions
{
    // A ameliorer
    private $groupsDB;
    private $testGroupName = "Test Group";
    private $testDescription = "Test Description";
    private $testUser = "testuser";


    public function setUp(): void
    {
        $this->groupsDB = new groupsDB();

    }

    public function tearDown(): void
    {
        $this->groupsDB->deleteGroups($this->testGroupName);
    }

    public function testAddGroups()
    {
        var_dump("testAddGroups");
        $this->setUp();
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);

        $group = $this->groupsDB->getGroups($this->testGroupName);
        $this->assertEquals($this->testGroupName, $group->name);
        $this->assertEquals(10, $group->courseid);
        $this->assertEquals($this->testDescription, $group->description);
        $this->tearDown();
        var_dump("testAddGroups : OK");
    }

    public function testDeleteGroups()
    {
        var_dump("testDeleteGroups");
        $this->setUp();
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);
        $this->groupsDB->deleteGroups($this->testGroupName);

        $group = $this->groupsDB->getGroups($this->testGroupName);
        $this->assertNull($group);
        $this->tearDown();
        var_dump("testDeleteGroups : OK");
    }

    public function testUpdateGroups()
    {
        var_dump("testUpdateGroups");
        $this->setUp();
        $newDesc = "New Test Description";
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);
        $this->groupsDB->updateGroups($this->testGroupName, $newDesc);

        $group = $this->groupsDB->getGroups($this->testGroupName);
        $this->assertEquals($newDesc, $group->description);
        $this->tearDown();
        var_dump("testUpdateGroups : OK");
    }

    public function testAddMember()
    {
        var_dump("testAddMember");
        $this->setUp();
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);
        $this->groupsDB->addMember($this->testGroupName, $this->testUser);

        $members = $this->groupsDB->getMembers($this->testGroupName);
        $this->assertContains($this->testUser, $members);
        $this->tearDown();
        var_dump("testAddMember : OK");
    }

    public function testDeleteMember()
    {
        var_dump("testDeleteMember");
        $this->setUp();
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);
        $this->groupsDB->addMember($this->testGroupName, $this->testUser);
        $this->groupsDB->deleteMember($this->testGroupName, $this->testUser);

        $members = $this->groupsDB->getMembers($this->testGroupName);
        $this->assertNotContains($this->testUser, $members);
        $this->tearDown();
        var_dump("testDeleteMember : OK");
    }
}

?>