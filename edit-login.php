<?php require_once 'includes/redirection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'includes/head.php'?>
</head>
<body>
  <?php require_once 'includes/cabecera.php'?>

  <main>
     <h1 id="title-main">¡Agrega información de tu juego favorito!</h1>
    <?php
   if(isset($_SESSION['success'])){
   echo '<div class="alert"><b class="success">'. $_SESSION['success'].'</b></div>'; 
  }

     if(isset( $_SESSION['error'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error'].'</b></div>';
  }?>
  <div id="login" class="block-aside">
    <form id="form-contact" action="helpers/edit-user.php" method="POST">
       <label class="labels-class" for="nombre">Nombre:</label>
       <?php 
       if (isset($_SESSION['errors']['name'])) {
      
         echo showError($_SESSION['errors']['name']);
        }
         ?>
      <input class="inputs-class" type="text" name="name" value="<?= $_SESSION['login_date']['nombre']?>">

     <label class="labels-class" for="apellido">Apellido:</label>
        <?php 
       if (isset($_SESSION['errors']['surname'])) {
      
         echo showError($_SESSION['errors']['surname']);
        }
         ?>
      <input class="inputs-class" type="text" name="surname" value="<?= $_SESSION['login_date']['apellido']?>">

      <label  class="labels-class" for="email">Email:</label>
      <?php
     if (isset($_SESSION['errors']['email'])) {
  
         echo showError($_SESSION['errors']['email']);
        }
      ?>
      <input class="inputs-class" type="email" name="email" value="<?= $_SESSION['login_date']['email']?>">

      <input  class="submit" type="submit" value="Cambiar" >
    </form>
        <?php 
        
       if(isset($_SESSION['errors']) || isset($_SESSION['success']) || isset($_SESSION['error'])) {
        deleteError();       }
       ?>
  </div>
  </main>

  <?php require_once 'includes/footer.php'?>
</body>
</html>