<?php
$mysql_host = "localhost";
$mysql_database = "myproject"; //create the database called "comment_sys"
$mysql_user = "admin";
$mysql_password = "qwerty";

mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database); 
?>