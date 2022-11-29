<?php
    //récupération de l'API moodle
    require_once(__DIR__ . '/config.php');
    require_once($CFG->libdir . '/externallib.php');
    require_once($CFG->drroot . '/user/lib.php');

    class local_custom_service_external extends external_api {

        public static function test_requete_database() {
            global $DB, $CFG;

            //test 1 récupérer info par un id
            $user = $DB->get_record('user', ['id' => '1']);
            echo "récupérer info user de id 1 <br>";
            var_dump($user);
            echo "<br>";

            //test2 récupérer info par suername et lastname
            $user = $BD->get_record('user', ['firstname' => 'G1', 'lastname' => 'G1']);
            echo "récupérer info user firstname = G1 lastname = G1 <br>";
            var_dump($user);
            echo "<br>";

            //test 3 insérer de la données par fisrtname et lastname
            $userTest = new stdClass();
            $userTest->firstname = 'test';
            $userTest->lastname = 'test';
            $idTest = $DB->insert_record('user', $userTest);
            echo "insérer user fistname = test lastaname = test<br>";

            //test 4 insérer de la données par fisrtname et lastname et paswword
            $userTest1 = new stdClass();
            $userTest1->firstname = 'test1';
            $userTest1->lastname = 'test1';
            $userTest1->password = 'test1';
            $idTest1 = $DB->insert_record('user', $userTest1);
            echo "ajouter un user firstname = test1 lastname = test1 password = test1 <br>";

            //test 5 insérer de la données par fisrtname et lastname et paswword
            $userTest2 = new stdClass();
            $userTest2->firstname = 'test1';
            $userTest2->lastname = 'test1';
            $userTest2->password = 'test1';
            $idTest2 = $DB->insert_record('user', $userTest1);
            $idTest2 = $DB->insert_record('user', ['firstname' => 'test1', 'lastname' => 'test1', 'password' => 'test1']);
            echo "ajouter un user firstname = test2 lastname = test2 password = test2 <br>";

            //test 4 récupérer information du nouveau user
            $user = $BD->get_record('user', ['firstname' => 'test', 'lastname' => 'test', 'password' => 'test']);
            echo "récupérer info user test test <br>";
            var_dump($user);
            echo "<br>";

            //test 7 récupérer information du nouveau user
            $user = $BD->get_record('user', ['firstname' => 'test1', 'lastname' => 'test1', 'password' => 'test1']);
            echo "récupérer info user test1 test1 <br>";
            var_dump($user);
            echo "<br>";
        }
    }
?>