<?php
class Course{

    public function  __construct() { }

    public function init($fullName,$shortname ,$summary ,$format ){
        $this-> fullName = $fullName;
        $this-> shortname = $shortname;
        $this-> summary = $summary;
        $this-> format = $format;
        $this->showgrades = 1;
        $this->newsitems = 5;
        $this-> startdate = time();


    }

    public function getFullName(): string { return $this->fullName; }
    public function getShortName(): string { return $this->shortname; }
    public function getSummary(): string { return $this->summary; }
    public function getCategory(): string { return $this->default; }
    public function getFormat(): string { return $this->format;}
    public function getShowGrades(): int { return $this->showgrades; }
    public function getNewsItems(): int { return $this->newsitems; }
    public function getStartDate(): int { return $this->startdate; }
    

    
    public function  __toString(): string { return $this->fullName. " ".
                                            $this->shortname. " ".
                                            $this->summary. " ".
                                            $this->default. " ".
                                            $this->format. " ".
                                            $this->showgrades. " ".
                                            $this->newsitems. " ".
                                            $this->startdate;
                                        }
    


}
?>