<?php 
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['login_user'])) {
  session_destroy();
  header('location: index.php');
}
?>