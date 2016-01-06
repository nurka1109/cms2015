<?php

class Student {
	public $studentid;
	public $name;
	public $surname;
	public $department;
	
	public function __construct($studentid, $name, $surname, $department)  
    {  
        $this->studentid = $studentid;
	    $this->name = $name;
	    $this->surname = $surname;
		$this->department=$department;
    } 
}

?>