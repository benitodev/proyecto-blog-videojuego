<?php require_once 'includes/redirection.php'?>
<?php require_once 'includes/conexion.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'includes/head.php'?>
</head>
<body>
  <?php require_once 'includes/cabecera.php'?>
  <main>

    <?php require_once 'helpers/script-errores.php';
     $id = $_GET['id'];
     $entry = getEntry($db, $id);
    if (!isset($entry['id'])) {
      header('location: index.php');
    }
    ?>
  <?php 
  if (isset($_GET)) :
   
   
?>
  <article id="inputs">
        <a href="entry-pages?id=<?= $entry['id']?>"><h1 id="title"><?= $entry['titulo']?></h1></a>
        <div id="img-game"></div>
        <p class="paragraph"><?=($entry['descripcion'])?></p> 
        <a href="category-pages?id=<?= $entry['categoria_id']?>">  <h2 class="categories" style="color: rgba(192, 188, 197, 0.918); background-color: rgba(24, 2, 2, 0.205); padding: 10px; margin: 20px 0px;"><?= $entry['nombre']?></h2></a>
        <small class="paragraph">Autor: <?=$entry['autor']?></small>
  </article>

<?php 
endif;
?>

  <?php if ($_SESSION['login_date']['id'] == $entry['usuario_id']) : ?>

     <a href="helpers/delete-entry.php?id=<?=$entry['id']?>" class="buttons-login">Borrar entrada</a>
      <a href="edit-entry.php?id=<?=$entry['id']?>" class="buttons-login">Editar entrada</a>
    <?php endif;?>
  </main>
  <?php require_once 'includes/footer.php'?>
</body>
</html>