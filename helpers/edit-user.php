<?php

  if (isset($_POST)) {
    
    //conection from database
    require_once '../includes/conexion.php';

    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
     $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $surname = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
  


    $errors = [];

  if (!empty($name) && !is_numeric($name) && !preg_match("^[A-Z][a-zA-Z]+$^  ", $name)) {
    $name_validate = true;
  }else {
    $errors['name'] = 'Error en el nombre, no escribir números!';
  }

   if (!empty($surname) && !is_numeric($surname) && !preg_match("^[A-Z][a-zA-Z]+$^  ", $surname)) {
    $surname_validate = true;
  }else {
    $errors['surname'] = 'Error en el apellido, no escribir números';
  }

   if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_validate = true;
  }else {
    $errors['email'] = 'Error en el email';
  }

  $id =  $_SESSION['login_date']['id'];
    $previous_sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
    $previous_validate = mysqli_query($db, $previous_sql);

    $user = mysqli_fetch_assoc($previous_validate);


    if ($user['id'] == $id || empty($user)) {
   
    
  if (count($errors) == 0) {
    $sql = "UPDATE usuarios SET nombre='$name', apellido='$surname', email='$email' WHERE id = '$id'";
    $validate = mysqli_query($db, $sql);



    if ($validate) {
      $_SESSION['login_date']['nombre'] = $name;
      $_SESSION['login_date']['apellido'] = $surname;
      $_SESSION['login_date']['email'] = $email;
      $_SESSION['success'] = 'Datos cambiados con éxito';
    }else{
      $_SESSION['error'] = 'Error al intentar conectar con la base de datos';
    }


  }else{
    $_SESSION['errors'] = $errors;
  }
}else {
  $_SESSION['error'] = 'Ya existe el email ingresado';
}
header('location: ../edit-login.php');
}


?>