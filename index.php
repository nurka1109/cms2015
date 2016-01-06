<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<!--
	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-ipad-retina.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-iphone.png" />

    <link rel="stylesheet" href="css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css" />
	-->
	<!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
    
</head>
<body>

<?php

//If the user is logged, we log him out
function make_alert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '");</script>';
}
if(isset($_SESSION['cms_username']))
{
	//We log him out by deleting the username and userid sessions
	unset($_SESSION['cms_username'], $_SESSION['cl_id']);
	make_alert('You have successfuly been loged out.');
}
else
{

	$ousername = '';
	//We check if the form has been sent
	
	if(isset($_POST['username'], $_POST['password']))
	{
		//We remove slashes depending on the configuration
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['username']);
			$username = mysql_real_escape_string(stripslashes($_POST['username']));
			$password = stripslashes($_POST['password']);
		}
		else
		{
			$password = $_POST['password'];
			$username = mysql_real_escape_string($_POST['username']);
			$ousername = $username;
		}
		
	}}
	else
	{
		$form = true;
	}
	if($form)
	{
		//We display a message if necessary
	/*if(isset($message))
	{
		make_alert($message);
	}*/
	//We display the form
?>

		<div id="content" class="c-login clearfix" style="width: 500px;">

			<div class="header">
					<img src="images/mygediz_login_formtitle.jpg" style="width: 500px;height:auto;">
			</div> <!-- /header -->

			<div class="breadcrumbs">
				<i class="fa fa-key"></i> Login
			</div>

			
			<div class="widget-content">
			<form action="login.php" method="post">
				<label>Student ID</label>
				<input type="text" for="username" name="username" id="username">
				<label>Password</label>
				<input type="password" for="password" name="password" id="password">
             <button type="submit" class="btn btn-blue" style="border-radius:0;float: right;">Login</button>
			</form>
			</div>
			

		</div> <!-- /content -->

	</div> <!-- /wrapper 


	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/excanvas.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.flot.js"></script>
	<script type="text/javascript" src="js/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="js/jquery.flot.categories.js"></script>
	<script type="text/javascript" src="js/jquery.flot.fillbetween.js"></script>
	<script type="text/javascript" src="js/jquery.flot.stack.js"></script>
	<script type="text/javascript" src="js/jquery.flot.crosshair.js"></script>

	<script type="text/javascript" src="js/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js/jquery.hashchange.min.js"></script>
	<script type="text/javascript" src="js/jquery.easytabs.min.js"></script>
-->
<?php
	}
}
?>
</body>
</html>
