<?php

include_once("model/Book.php");

class Model {
	public function getBookList()
	{
		// here goes some hardcoded values to simulate the database
		return array(
			"Jungle Book" => new Book("0123456789", "David", "Kafuko", "Comp. Eng."),
			"Moonwalker" => new Book("0123456789", "Luckner", "Thurin", "Comp. Eng."),
			"Moonwalker" => new Book("0123456789", "Mehmet", "Bulbul", "Comp. Eng.")
		);
	}
	
	public function getBook($title)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allBooks = $this->getBookList();
		return $allBooks[$title];
	}
	
	
}

?>