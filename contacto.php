<?php require_once 'helpers/script-errores.php'?>
<!DOCTYPE html>
<html lang="es">
  <?php require_once 'includes/head.php'?>
<body>
 <?php require_once 'includes/cabecera.php' ?>
  <main id="main">
  <h1 id="title-main">Registrate</h1>
  <?php if (isset($_SESSION['success'])) {
    echo '<div class="alert"><b class="success">'.$_SESSION['success'].'</b></div>';

  }
  
  if(isset( $_SESSION['errors']['fail'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['errors']['fail'].'</b></div>';
  }
  
  ?>
  <div id="login" class="block-aside">
    <div id="form-login" class="login-class"><b>¿Ya te has registrado? Logueate <a href="login.php">¡aquí!</a></b></div>
    <form id="form-contact" action="helpers/register.php" method="POST">
       <label class="labels-class" for="nombre">Nombre:</label>
       <?php 
       if (isset($_SESSION['errors']['name'])) {
      
         echo showError($_SESSION['errors']['name']);
        }
         ?>
      <input class="inputs-class" type="text" name="name">

     <label class="labels-class" for="apellido">Apellido:</label>
        <?php 
       if (isset($_SESSION['errors']['surname'])) {
      
         echo showError($_SESSION['errors']['surname']);
        }
         ?>
      <input class="inputs-class" type="text" name="surname">

      <label  class="labels-class" for="email">Email:</label>
      <?php
     if (isset($_SESSION['errors']['email'])) {
  
         echo showError($_SESSION['errors']['email']);
        }
      ?>
      <input class="inputs-class" type="email" name="email">

      <label  class="labels-class" for="password">Contraseña:</label>
        <?php
     if (isset($_SESSION['errors']['password'])) {

         echo showError($_SESSION['errors']['password']);
        }
      ?>
      <input  class="inputs-class" type="password" name="password">

      <input  class="submit" type="submit" value="registrar!" >
    </form>
        <?php 
        
       if(isset($_SESSION['errors']) || isset($_SESSION['success'])) {
        deleteError();       }
       
       ?>
  </div>
  </main>
   <?php require_once 'includes/footer.php'?>
</body>
</html>