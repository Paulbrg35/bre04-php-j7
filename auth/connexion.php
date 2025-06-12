<?php
$host = "db.3wa.io";
$port = "3306";
$dbname = "paulbourgeon_php_j7";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

$user = "paulbourgeon";
$password = "1e737408cf748bbd6ec9667085ab9238";

$db = new PDO(
    $connexionString,
    $user,
    $password
);
?>