<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'design_database';

$db = mysqli_connect($server, $username, $password, $database);

mysqli_set_charset($db, "utf8");

if (!isset($_SESSION)) {
  session_start();
}
?>