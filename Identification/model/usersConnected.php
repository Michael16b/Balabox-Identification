<?php

class UsersConnected{

    private $logFile = __ROOT__."/logs.txt";

    /**
     * Create a new connection in the log
     * @param username the username of user
     */
    public function newConnection($username, $role): void{
        //if(!checkAlreadyConnect()){
            $fileHandle = fopen($this->logFile, "a+");
            if($this->checkAlreadyConnect($username) === false){
                $logEntry = $username. "/" .$role . "\n";
                fwrite($fileHandle, $logEntry);
            }
            fclose($fileHandle);
        //}
    }

    private function checkAlreadyConnect($username){
        $logs = file_get_contents($this->logFile);
        // check if the user already exist
        return strpos($logs, $username);
    }

    public function getUserConnected(){
        $list = "";
        $fileHandle = fopen($this->logFile, "r");
        while (!feof($fileHandle)) {
            $line = fgets($fileHandle);
            $parties = explode('/', $line);
            if(array_key_exists(1, $parties)){
                if ($parties[1] == "4" || $parties[1] == "5"){
                    $list = $list . "{" . '"username"='. '"'. $parties[0]. '"' . "}". ",";
                }
            }
            
        }
        fclose($fileHandle);
        $list = substr($list, 0, -1);
        $list = $list . "]";
        return "[".$list;
    }

    public function on_shudown(){
        //session closed
        session_destroy();

        //reboot the logs

    }
}
?>