<?php
include 'databconnect.php';
if($_SERVER["REQUEST_METHOD"] == "submit")
{

//if(isset($_POST['username'])){
$admin_username=htmlspecialchars($_POST['admin_username'],ENT_QUOTES,"UTF-8");
//}
//if(isset($_POST['password']))
//{


$admin_password=htmlspecialchars($_POST['admin_password'],ENT_QUOTES,"UTF-8");
//}

//execute query

// $query ="SELECT * from `admin_insert` where username='$username' and password='$password'";

$query ="SELECT * from pbs_admin pbs, gallery_photos gp where pbs.photo_id = gp.id and pbs.admin_username = $admin_username and pbs.admin_password = $admin_password"; 
 
//$con=mysqli_query($query);
	$rs=$db->query($query);
	$rs->data_seek(0);
	while($row = $rs->fetch_assoc())
		 
	 
//while($row = mysqli_fetch_array($con))
{
	
	if($_POST['admin_username']==$row['admin_username'] && $_POST['admin_password']==$row['admin_password'])
	{
		$_SESSION['admin_id']=$row['admin_id'];
		$_SESSION['admin_name']=$row['admin_name'];
		$_SESSION['admin_username']=$row['admin_username']; 
		$_SESSION['thumbnails']=$row['thumbnails'];
		
		header("Location:add_clubs.php");
	}
	else 
	{
		echo "You got credentials wrong";
	}
}


}


?>