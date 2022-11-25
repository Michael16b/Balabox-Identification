<?php
    //récupération de l'API moodle
    require(__DIR__ . '/config.php');
    
    function test_requete_database() {
        global $DB;

        //test 1 récupérer info 
        $user = $DB->get_record('user', ['id' => '1']);
        echo "récupérer info user id 1 <br>";
        var_dump($user);
        echo "<br>";

        //test2 récupérer info
        $user = $BD->get_record('user', ['firstname' => 'G1', 'lastname' => 'G1']);
        echo "récupérer info user G1 G1 <br>";
        var_dump($user);
        echo "<br>";

        //test 3 insérer de la données
        $DB->insert_record('user', ['firstname' => 'test', 'lastname' => 'test', 'password' => 'test']);
        echo "insérer user test test<br>";
        echo "<br>";

        //test 4 récupérer information du nouveau user
        $user = $BD->get_record('user', ['firstname' => 'test', 'lastname' => 'test', 'password' => 'test']);
        echo "récupérer info user test test <br>";
        var_dump($user);
        echo "<br>";

        //test 6 insérer de la données
        $DB->insert_record('user', ['firstname' => 'test1', 'lastname' => 'test1', 'password' => 'test1']);
        echo "ajouter un user test1 test1 test1 <br>";
        echo "<br>";

        //test 7 récupérer information du nouveau user
        $user = $BD->get_record('user', ['firstname' => 'test1', 'lastname' => 'test1', 'password' => 'test1']);
        echo "récupérer info user test1 test1 <br>";
        var_dump($user);
        echo "<br>";

    }
?>