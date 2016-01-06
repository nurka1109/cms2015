<?php 
	//include_once("config.php");
	include_once("controller/Controller.php");

	$controller = new Controller();
	$controller->invoke();
	echo"Welcome Home";

?>