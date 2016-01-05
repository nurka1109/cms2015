<?php
//We start sessions
session_start();

//We log to the DataBase
mysql_connect('localhost', 'root', '');
mysql_select_db('cms_sks');
mysql_set_charset("UTF8");
header('Content-type: text/html; charset=utf-8');

//Top site root URL
$url_root = 'http://www.example.com/';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

$url_home = 'login.php';


?>