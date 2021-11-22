<?php

// mysql_connect("database-host", "username", "password");
// $conn = mysqli_connect("localhost","root","") or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
//@mysql_select_db("test",$conn);
// */

// /**
//  * mysql_connect is deprecated
//  * using mysqli_connect instead
//  */

$databaseHost = 'localhost';
$databaseName = 'matadero';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
?>