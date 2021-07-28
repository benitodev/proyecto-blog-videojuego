<?php

if (isset($_POST)) {
  //incluir la base de dato
  require_once '../includes/conexion.php';

  //validar si existen los datos a comprobar y escapar caracteres así mysql no lo reconoce como sintaxis mala
  $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
  $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
  
  //MANEJADOR DE ERRORES
  $error = [];

  //VALIDACIONES DE EMAIL Y CONTRASEÑA
  if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validate_email = true;
  }else {
    $error['email'] = 'Error al enviar el email';
  }

  if (!empty($password) && strlen($password) > 5) {
    $validate_password = true;
  }else {
    $error['password'] = 'Error en la contraseña, verifique que sea mayor a 5 caract ';
  }

  //Si no registramos ningún error pasamos a traer la información del usuario a través de una consulta con su email
  if (count($error) == 0) {
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $query);

    if ($login) {
     $user = mysqli_fetch_assoc($login);


    $password_verify = password_verify($password, $user['password']);

      if ($password_verify) {
        $_SESSION['login_date'] = $user;

        $_SESSION['login_user'] = 'Bienvenido ' . $user['nombre'] . ' ' . $user['apellido'];

        header('location: ../index.php');
        die();
      }else {
        $_SESSION['error'] = 'Error entering password';
     

      }
    }else {
      $_SESSION['error'] = 'Error al ingresar el usuario';
    }

  }else {
    $_SESSION['errors'] = $error;
  }

  header('location: ../login.php');
//  password_verify($password, $password_secure);
}
?>