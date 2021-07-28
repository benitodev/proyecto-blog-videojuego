<?php require_once 'helpers/script-errores.php'?>
<!DOCTYPE html>
<html lang="es">
  <?php require_once 'includes/head.php'?>
<body>
   <?php require_once 'includes/cabecera.php' ?>
   <section id="section-login">
     <h1 id="title-main">Logueate!</h1>
     <?php 
  if(isset($_SESSION['error'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error'].'</b></div>';
  }?>
  
   <main>
      <div id="login" class="block-aside">
      <form id="form-contact" action="helpers/validate-login.php" method="POST">
       <label class="labels-class" for="nombre">Email:</label>
       <?php 
       if (isset($_SESSION['errors']['email'])) {
      
         echo showError($_SESSION['errors']['email']);
        }
         ?>
      <input class="inputs-class" type="email" name="email">


     <label class="labels-class" for="apellido">contraseña:</label>
        <?php 
       if (isset($_SESSION['errors']['password'])) {
      
         echo showError($_SESSION['errors']['password']);
        }
         ?>
      <input class="inputs-class" type="password" name="password">
      <input  class="submit" type="submit" value="Enviar!" >
      </form>
      <?php if (isset($_SESSION['errors']) || isset($_SESSION['error'])){
        deleteError();}
        ?>
      </div>
   </main>
   </section>
</body>
</html>