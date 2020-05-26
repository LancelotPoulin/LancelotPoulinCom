<?php

/*
Connection.php - Lancelot POULIN - 16.09.2017
Database infos
*/

$host_name = 'db699539729.db.1and1.com';
$database = 'db699539729';
$user_name = 'dbo699539729';
$password = 'Lancelot98!';
$connection = mysqli_connect($host_name, $user_name, $password, $database);
mysqli_set_charset($connection , "utf8");

?>