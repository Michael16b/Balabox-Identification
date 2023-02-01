<?php
class userDBTest extends Assertions
{
    private $userdb;
    private $testUsername = 'johndoe';
    private $testFirstName = 'John';
    private $testLastName = 'Doe';

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
        var_dump("testGetRecord");
        $this->setUp();
        // Test the getRecord method
        $surname = array('lastname' => $this->testLastName);
        $record = $this->userdb->getRecord($surname);
        $this->assertNotNull($record);
        $this->assertEquals($this->testUsername, $record->username);
        $this->tearDown();
        var_dump("testGetRecord : OK");
    }

    public function testRandomPassword()
    {   
        var_dump("testRandomPassword");
        $this->setUp();
        // Test the RandomPassword method
        $password = $this->userdb->RandomPassword();
        $this->assertNotEmpty($password);
        $this->assertEquals(8, strlen($password));
        $this->tearDown();
        var_dump("testRandomPassword : OK");
    }

    public function testAddUser()
    {
        var_dump("testAddUser");
        $this->setUp();
        // Test the addUser method
        $firstName = 'Jane';
        $lastName = 'Doe';
        $username = substr($firstName,0,1) . $lastName;
        $this->userdb->addUser($firstName, $lastName);
        $user = $this->userdb->getRecord( array('username' => $username));
        $this->assertTrue($user);
        // Clean up by deleting the test user
        $this->userdb->deleteUser($username);
        $this->tearDown();
        var_dump("testAddUser : OK");
    }

    public function testDeleteUser()
    {
        var_dump("testDeleteUser");
        $this->setUp();
        // Test the deleteUser method
        $this->userdb->deleteUser($this->testUsername);
        $user = $this->userdb->getUser($this->testUsername);
        $this->assertFalse($user);
        $this->tearDown();
        var_dump("testDeleteUser : OK");
    }
}
?>

