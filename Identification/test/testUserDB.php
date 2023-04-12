<?php

// inclure la classe UserDB à tester
require_once 'UserDB.php';

// tester la méthode getRecord
$userDB = new UserDB();
$username = 'testuser';
$record = $userDB->getRecord($username);
if ($record === false) {
    echo "La méthode getRecord ne fonctionne pas correctement.";
}

// tester la méthode getUserById
$id = 1;
$record = $userDB->getUserById($id);
if ($record === false) {
    echo "La méthode getUserById ne fonctionne pas correctement.";
}

// tester la méthode getUsers
$users = $userDB->getUsers();
if (empty($users)) {
    echo "La méthode getUsers ne fonctionne pas correctement.";
}

// tester la méthode RandomPassword
$password = $userDB->RandomPassword();
if (strlen($password) !== 10) {
    echo "La méthode RandomPassword ne fonctionne pas correctement.";
}

// tester la méthode checkUserName
$username = 'testuser';
$checkedUsername = $userDB->checkUserName($username);
if ($checkedUsername === $username) {
    echo "La méthode checkUserName ne fonctionne pas correctement.";
}

// tester la méthode addUser
$firstName = 'John';
$lastName = 'Doe';
$role = 3;
$userInfo = $userDB->addUser($firstName, $lastName, $role);
if (count($userInfo) !== 3) {
    echo "La méthode addUser ne fonctionne pas correctement.";
}

// tester la méthode addRolesSystemMembers
$username = 'testuser';
$role = 'manager';
$userDB->addRolesSystemMembers($username, $role);
$assignedRole = $userDB->getUser_role($username);
if ($assignedRole !== $role) {
    echo "La méthode addRolesSystemMembers ne fonctionne pas correctement.";
}

// tester la méthode getGroupOfUser
$username = 'testuser';
$groupName = $userDB->getGroupOfUser($username);
if ($groupName === false) {
    echo "La méthode getGroupOfUser ne fonctionne pas correctement.";
}

// tester la méthode deleteUser
$username = 'testuser';
$userDB->deleteUser($username);
$record = $userDB->getRecord($username);
if ($record !== false) {
    echo "La méthode deleteUser ne fonctionne pas correctement.";
}

// tester la méthode updateUser
$username = 'testuser';
$firstName = 'Jane';
$lastName = 'Doe';
$password = true;
$userInfo = $userDB->updateUser($username, $firstName, $lastName, $password);
if (count($userInfo) !== 5) {
    echo "La méthode updateUser ne fonctionne pas correctement.";
}

?>
