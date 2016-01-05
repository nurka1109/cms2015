<?php

if(!empty($_SESSION['cms_user_name'])||!isset($_SESSION['cms_user_name'])){
	header('Location: ../login.php');
}
else {
$id = $_SESSION['cms_username'];
$uname=$_SESSION['cms_user_name'];
$u_ipath=$_SESSION['cms_user_ipath'];
} 

$req = mysql_query("SELECT count(id) as mn FROM messages where user2='".$id."' and user2read=0");
if(!$req) $msg=0;
else{$dn = mysql_fetch_array($req);
$msg=$dn['mn'];
}
$req = mysql_query("SELECT count(id) as mn FROM messages where user1='".$id."'");
if(!$req) $msg_s=0;
else{$dn = mysql_fetch_array($req);
$msg_s=$dn['mn'];
}