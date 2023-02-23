<?php

class UsersConnected{

    private $logFile = __ROOT__."/logs.txt";

    /**
     * Create a new connection in the log
     * @param username the username of user
     */
    public function newConnection($username, $role): void{
        //if(!checkAlreadyConnect()){
            $fileHandle = fopen($this->logFile, "a");
            $logEntry = $username. "/" .$role . "\n";
            fwrite($fileHandle, $logEntry);
            fclose($fileHandle);
        //}
    }

    private function checkAlreadyConnect($username){
        $fileHandle = fopen($this->logFile, "r");
        $logs = file_get_contents($this->logFile);
        $ok = strpos($log, $username);
    }

    public function getUserConnected(){
        return file_get_contents($this->logFile);
    }
}
?>