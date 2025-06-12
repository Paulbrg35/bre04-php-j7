<?php
session_start();

require_once 'connexion.php';

$route = isset($_GET['route']) ? $_GET['route'] : null;

require_once 'layout.phtml';
?>