<html>
<head>
	<!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>MVC_PHP</title>

	  <!-- CSS
    ================================================== -->       
    <!-- Bootstrap css file-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

<?php 

	echo 'Title:' . $book->title . '<br/>';
	echo 'Author:' . $book->author . '<br/>';
	echo 'Description:' . $book->description . '<br/>';
	echo 'Description:' . $book->department . '<br/>';

?>

</body>
</html>