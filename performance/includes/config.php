<?php
  error_reporting(0);
  $dbconfig['db_server'] = 'localhost';
  $dbconfig['db_username'] = 'root';
  $dbconfig['db_password'] = '';
  $dbconfig['db_name'] = 'performance';
  
  $conn = mysql_connect($dbconfig['db_server'], $dbconfig['db_username'], $dbconfig['db_password']);
  mysql_select_db($dbconfig['db_name'], $conn) or die(mysql_error());
  
  session_start();
?>