<?php
include('config.php')
?>

<?php
// $sn=$_SERVER['SERVER_NAME']; $su=$_SERVER['REQUEST_URI'];
// echo '<script type="text/javascript">alert("' . $su . '");</script>';

/*
	The following function will strip the script name from URL i.e.  http://www.something.com/search/book/fitzgerald will become /search/book/fitzgerald
	*/
	// function getCurrentUri()
	// {
		// $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		// $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		// if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		// $uri = '/' . trim($uri, '/');
		// return $uri;
	// }
 
	// $base_url = getCurrentUri();
	// $routes = array();
	// $routes = explode('/', $base_url);
	// foreach($routes as $route)
	// {
		// if(trim($route) != '')
			// array_push($routes, $route);
	// }
 
	// /*
	// Now, $routes will contain all the routes. $routes[0] will correspond to first route. For e.g. in above example $routes[0] is search, $routes[1] is book and $routes[2] is fitzgerald
	// */
 
	//if($routes[0] == "search")
	// if(isset($routes[0]))
	// {$i=0;
		// foreach($routes as $route)
	// {
		// echo $route,"/"; $i=$i+1;
	// }
		// if($routes[1] == "book")
		// {
			//searchBooksBy($routes[2]);
			// echo '<script type="text/javascript">alert("' . $routes[2] . '");</script>';		
		// }
	// }
	
header('Location: login.php');
?>
