
<?php require_once 'includes/redirection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'includes/head.php'?>
</head>
<body>
  <?php require_once 'includes/cabecera.php'?>
  <main>
    
    <h1 id="title-main">Agrega tus categorias de juegos</h1>
    <?php
     if(isset( $_SESSION['error'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error'].'</b></div>';
  }?>
    <div id="login" class="block-aside">
        <form action="helpers/save-category.php" id="form-contact" method="POST">
          <label for="text" class="labels-class"></label>
          <input type="text" name="name" class="inputs-class">
          <input type="submit" class="submit">
        </form>
  </div>
  </main>
  <?php require_once 'includes/footer.php'?>
  <?php if (isset($_SESSION['error'])) {
    deleteError();
  }?>
</body>
</html>
