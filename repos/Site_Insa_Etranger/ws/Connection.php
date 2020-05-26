<?php

/*
Connection.php - Lancelot POULIN - 16.09.2017
Database infos
*/

$host_name = 'db765444796.hosting-data.io';
$database = 'db765444796';
$user_name = 'dbo765444796';
$password = 'insaetranger';
$connection = mysqli_connect($host_name, $user_name, $password, $database);
mysqli_set_charset($connection , "utf8");

?>