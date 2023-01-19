<?php

class groupsDBTest extends Assertions
{
    private $groupsDB;

    public function setUp(): void
    {
        $this->groupsDB = new groupsDB();
    }

    public function testAddGroups()
    {
        $groupName = "Test Group";
        $desc = "Test Description";
        $this->groupsDB->addGroups($groupName, $desc);

        $group = $this->groupsDB->getGroups($groupName);
        $this->assertEquals($groupName, $group->name);
        $this->assertEquals(10, $group->courseid);
        $this->assertEquals($desc, $group->description);
    }

    public function testDeleteGroups()
    {
        $groupName = "Test Group";
        $this->groupsDB->addGroups($groupName, "Test Description");
        $this->groupsDB->deleteGroups($groupName);

        $group = $this->groupsDB->getGroups($groupName);
        $this->assertNull($group);
    }

    public function testUpdateGroups()
    {
        $groupName = "Test Group";
        $desc = "Test Description";
        $newDesc = "New Test Description";
        $this->groupsDB->addGroups($groupName, $desc);
        $this->groupsDB->updateGroups($groupName, $newDesc);

        $group = $this->groupsDB->getGroups($groupName);
        $this->assertEquals($newDesc, $group->description);
    }

    public function testAddMember()
    {
        $groupName = "Test Group";
        $username = "testuser";
        $this->groupsDB->addGroups($groupName, "Test Description");
        $this->groupsDB->addMember($groupName, $username);

        $members = $this->groupsDB->getMembers($groupName);
        $this->assertContains($username, $members);
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