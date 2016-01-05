<?php

$req = mysql_query("SELECT (SELECT count(id) FROM messages where user2='".$id."' and checked=0) as mn,(SELECT count(id) FROM messages where user2='".$id."' and `user2read`=0) as ur,(SELECT count(id) as mn FROM messages where user1='".$id."') as ms");
if(!$req) $msg=0;
else{
$dn = mysql_fetch_array($req);
$msg=$dn['mn'];
$msg_ur=$dn['ur'];
$msg_s=$dn['ms'];
}