<?php

use PHPUnit\Framework\TestCase;

require_once 'model/UserDB.php';

class UserDBTest extends TestCase
{
    public function setUp(): void
    {
        // Ajoute deux utilisateurs à la base de données
        $userDB = new UserDB();
        $userDB->addUser('John', 'Doe', 2);
        $userDB->addUser('Jane', 'Doe', 3);
    }

    public function testGetUsers()
    {
        // Crée une instance de UserDB
        $userDB = new UserDB();

        // Appelle la méthode getUsers
        $users = $userDB->getUsers();

        // Vérifie que la méthode retourne un tableau
        $this->assertIsArray($users);

        // Vérifie que le tableau contient des éléments
        $this->assertNotEmpty($users);

        // Vérifie que chaque élément du tableau est un objet
        foreach ($users as $user) {
            $this->assertIsObject($user);
        }
    }
}
