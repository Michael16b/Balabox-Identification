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
        $this->setUp();
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);

        $group = $this->groupsDB->getGroups($this->testGroupName);
        $this->assertEquals($this->testGroupName, $group->name);
        $this->assertEquals(10, $group->courseid);
        $this->assertEquals($this->testDescription, $group->description);
        $this->tearDown();
    }

    public function testDeleteGroups()
    {
        $this->setUp();
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);
        $this->groupsDB->deleteGroups($this->testGroupName);

        $group = $this->groupsDB->getGroups($this->testGroupName);
        $this->assertNull($group);
        $this->tearDown();
    }

    public function testUpdateGroups()
    {
        $this->setUp();
        $newDesc = "New Test Description";
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);
        $this->groupsDB->updateGroups($this->testGroupName, $newDesc);

        $group = $this->groupsDB->getGroups($this->testGroupName);
        $this->assertEquals($newDesc, $group->description);
        $this->tearDown();
    }

    public function testAddMember()
    {
        $this->setUp();
        $this->groupsDB->addGroups($this->testGroupName, $this->testDescription);
        $this->groupsDB->addMember($this->testGroupName, $this->testUser);

        $members = $this->groupsDB->getMembers($this->testGroupName);
        $this->assertContains($this->testUser, $members);
    }

    public function testDeleteMember()
    {
        $groupName = "Test Group";
        $username = "testuser";
        $this->groupsDB->addGroups($groupName, "Test Description");
        $this->groupsDB->addMember($groupName, $username);
        $this->groupsDB->deleteMember($groupName, $username);

        $members = $this->groupsDB->getMembers($groupName);
        $this->assertNotContains($username, $members);
    }
}

?>