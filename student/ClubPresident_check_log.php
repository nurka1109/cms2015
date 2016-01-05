<?php

if(isset($_SESSION['cms_user_type']) and $_SESSION['cms_user_type']==2){
$id = $_SESSION['cms_username'];
$uname=$_SESSION['cms_user_name'];
$u_ipath=$_SESSION['cms_user_ipath'];
}
else {
	header('Location: ../login.php');
} 