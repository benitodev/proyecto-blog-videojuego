<?php 
  if (isset($_POST)) {
    
    //Conection from database
    require_once '../includes/conexion.php';

    $name = isset($_POST['name']) ? mysqli_real_escape_string($db ,$_POST['name']) : false;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($db ,$_POST['description']) : false;
    $id_category = isset($_POST['category']) ?   (int) $_POST['category'] : false;
    $id_user = $_SESSION['login_date']['id'];


    //array capturator
    $errors = [];


    if (empty($name) ) {
      $errors['name'] = 'El nombre del juego está vacío';
    }
  

      if (empty($description)) {
      $errors['description'] = 'El nombre de la categoria está vacío';
    }
  

      if (empty($id_category) && !is_numeric($id_category)) {
      $errors['id_category'] = 'Error en la categoria del juego';
    }

    if (count($errors) == 0) {
      if (isset($_GET['id_entry'])) {
       $id_entry = $_GET['id_entry'];
      $sql = "UPDATE entradas SET titulo = '$name', descripcion = '$description', categoria_id = '$id_category' WHERE id = $id_entry AND usuario_id = $id_user";  
      }else {
        $sql = "INSERT INTO entradas VALUES(null, $id_user, $id_category, '$description', '$name')";
      }

      $validate = mysqli_query($db, $sql);
      

      if ($validate) {
        $_SESSION['success'] = 'Entrada ingresada correctamente';
      }else{
        $_SESSION['error'] = 'Error al intentar ingresar los datosss';
      }

     header("location: ../entry-pages.php?id=$id_entry");
    }else{
      $_SESSION['errors'] = $errors;
      if (isset($_GET['id_entry'])) {
        header("location: ../edit-entry.php?id_entry=$id_entry");
      }else {
        header('location: ../entry-login.php');
      }
    }

    
  }
?>