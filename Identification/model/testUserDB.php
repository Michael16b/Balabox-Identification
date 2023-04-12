<?php

// inclure la classe UserDB à tester
require_once('userDB.php');

$validTest = 0;

echo "Test de la méthode getRecord \n";

$username = 'testuser';

echo "Cas 1: tester la méthode getRecord avec un nom d'utilisateur inexistant : $username  \n";
$userDB = new UserDB();

try {
    $record = $userDB->getRecord('testuser');
    if ($record !== null) {
        echo "La méthode getRecord ne fonctionne pas correctement. \n";
    }
} catch (Exception $e) {
    echo "La méthode getRecord fonctionne pas correctement et renvoie l'exception : $e. \n";
}


?>
