<?php
class User{

    public function  __construct() { }

    public function init($username,$password,$firstName,$lastName,$eMail){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->eMail = $eMail;
        $this->auth = 'manual';
        $this->confirmed = 1;
        $this->lang = 'fr';
        $this->timecreated = time();
        $this->timemodified = time();

    }

    public function getFirstName(): string { return $this->firstName; }
    public function getLastName(): string { return $this->lastName; }
    public function getUsername(): string { return $this->username; }
    public function getPassword(): string { return $this->password; }
    public function getEMail(): string { return $this->eMail; }
    public function getAuth(): string { return $this->auth; }
    public function getConfirmed(): int { return $this->confirmed; }
    public function getLang(): string { return $this->lang; }
    public function getTimeCreated(): int { return $this->timecreated; }
    public function getTimeModified(): int { return $this->timemodified; }
    

    
    public function  __toString(): string { return $this->firstName. " ".
                                            $this->lastName. " ".
                                            $this->username. " ".
                                            $this->password. " ".
                                            $this->eMail. " ".
                                            $this->auth. " ".
                                            $this->confirmed. " ".
                                            $this->lang. " ".
                                            $this->timecreated. " ".
                                            $this->timemodified;
                                        }
    


}
?>