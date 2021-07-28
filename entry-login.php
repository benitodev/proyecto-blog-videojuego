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
    <form action="helpers/save-entries.php" id="form-contact" method="POST">
      <label for="name" class="labels-class">Titulo del juego</label>
      <?php
     if(isset( $_SESSION['errors']['name'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['errors']['name'].'</b></div>';
  }?>
      <input type="text" name="name" class="inputs-class">

      <label for="" class="labels-class">Descripción del juego</label>
       <?php
     if(isset( $_SESSION['errors']['description'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['errors']['description'].'</b></div>';
  }?>
      <textarea name="description" id="" cols="30" rows="10" class="inputs-class"></textarea>

      <label for="category" class="labels-class">Elige la categoria</label>
        <?php
     if(isset( $_SESSION['errors']['id_category'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['errors']['id_category'].'</b></div>';
  }?>
      <select name="category" class="inputs-class">
        <?php 
          $categories = showCategories($db);
          if (!empty($categories)) : 
            while ($category = mysqli_fetch_assoc($categories)) :
        ?>
            <option value="<?= $category['id']?>"> <?= $category['nombre']?></option>
      <?php  endwhile;  
          endif;?>
      </select>
      
      <input type="submit" class="submit">
    </form>
  <?php if (isset($_SESSION['error']) || isset($_SESSION['errors']) || isset($_SESSION['success'])) {
    deleteError();
  }?>
 </div>
  </main>
  <?php require_once 'includes/footer.php'?>
</body>
</html>