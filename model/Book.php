<?php

class Book {
	public $title;
	public $author;
	public $description;
	public $department;
	
	public function __construct($title, $author, $description, $department)  
    {  
        $this->title = $title;
	    $this->author = $author;
	    $this->description = $description;
	    $this->department = $department;
    } 
}

?>