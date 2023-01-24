<?php
class userDBTest extends Assertions
{
    private $userdb;
    private $testUsername = 'johndoe';
    private $testFirstName = 'John';
    private $testLastName = 'Doe';
    private $testRole = 'student';

    protected function setUp()
    {
        // Initialize the UserDB object
        $this->userdb = new UserDB();
        // Create a test user
        $this->userdb->addUser($this->testFirstName, $this->testLastName);
    }

    protected function tearDown()
    {
        // Delete the test user after each test
        $this->userdb->deleteUser($this->testUsername);
    }

    public function testGetRecord()
    {
        // Test the getRecord method
        $surname = array('lastname' => $this->testLastName);
        $record = $this->userdb->getRecord($surname);
        $this->assertNotNull($record);
        $this->assertEquals($this->testUsername, $record->username);
    }

    public function testRandomPassword()
    {
        // Test the RandomPassword method
        $password = $this->userdb->RandomPassword();
        $this->assertNotEmpty($password);
        $this->assertEquals(8, strlen($password));
    }

    public function testAddUser()
    {
        // Test the addUser method
        $firstName = 'Jane';
        $lastName = 'Doe';
        $username = substr($firstName,0,1) . $lastName;
        $this->userdb->addUser($firstName, $lastName);
        $user = $this->userdb->getRecord( array('username' => $username));
        $this->assertTrue($user);
        // Clean up by deleting the test user
        $this->userdb->deleteUser($username);
    }

    public function testDeleteUser()
    {
        // Test the deleteUser method
        $this->userdb->deleteUser($this->testUsername);
        $user = $this->userdb->getUser($this->testUsername);
        $this->assertFalse($user);
    }
}
?>