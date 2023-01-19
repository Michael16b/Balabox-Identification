<?php
require(__ROOT__.'/config.php');

class UserDB {

    public static function getRecord(array $surname){
        global $DB;
        return $DB->get_record('user', $surname);
    }

}
?>