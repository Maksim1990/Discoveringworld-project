<?php 
 $mysql_host = "localhost";
 $mysql_database = "myproject";
 $mysql_user = "admin";
 $mysql_password = "qwerty";

 $db = mysql_connect($mysql_host,$mysql_user,$mysql_password);
 mysql_connect($mysql_host,$mysql_user,$mysql_password);
 mysql_select_db($mysql_database);
?>