<?php 
  require_once '../includes/conexion.php';

  if (isset($_SESSION['login_date']) && isset($_GET['id'])) {

    $id_entry = $_GET['id'];
    $id_user = $_SESSION['login_date']['id']; 
    $sql = "DELETE FROM entradas WHERE usuario_id = $id_user AND id = $id_entry";
    $validate = mysqli_query($db, $sql);

  }
  header('location: ../index.php');
?>