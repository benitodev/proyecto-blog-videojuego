<?php 
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['login_user'])) {
  header('location: index.php');
}
?>