<?php

if (isset($_POST)) {

  // Iniciar sesión para crear variables y pasarlas a contacto


  //traer la base de datos para insertar los usuarios
    require_once 'includes/conexion.php'; 

  

  $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
  $surname = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
  $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
  $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

  // array that will get errors!
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

  if (!empty($password) && strlen($password) > 5) {
    $email_validate = true;
  }else {
    $errors['password'] = 'La contraseña, tiene que ser mayor a 5 caracteres';
  }






  if (count($errors) == 0) {


                //INSERTAR DATOS DE LOS USUARIOS!
    /* Antes de ingresar los datos es importante cifrar la contraseña del usuario. Esto por cuestiones de prividad y legalidad!*/
     $password_secure = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

 

    $sql = "INSERT INTO usuarios VALUES(null, '$name', '$surname', '$email', CURDATE(), '$password_secure')";

    $register = mysqli_query($db, $sql);

    if ($register) {

      $_SESSION['success'] = 'Registrado correctamente';
    
    }else {
      $_SESSION['errors']['fail'] = 'Error al intentar crear el usuario, intenta probar otro correo!';

    }


  
  }else {
    $_SESSION['errors'] = $errors;
    
    
  }

  header('location: contacto.php');
}
?>