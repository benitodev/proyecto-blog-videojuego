<!DOCTYPE html>
<html lang="en">
  <?php require_once 'includes/head.php'?>
<body>
  <?php require_once 'includes/cabecera.php'?>
  <main>

  <section id="featured-games">
  <?php 

  if (isset($_GET)) :
    
    require_once 'includes/conexion.php';

    $id = isset($_GET['id']) ? $_GET['id'] : false;

    $sql = "SELECT e.*, c.nombre  FROM entradas e INNER JOIN categorias c ON c.id = e.categoria_id WHERE e.categoria_id = $id";
    $validate = mysqli_query($db, $sql);

    if (!empty($validate) && mysqli_num_rows($validate) > 0) :
      while ($entry = mysqli_fetch_assoc($validate)) :
      
 
?>
 <article id="inputs">
        <a href="entry-pages?id=<?= $entry['id']?>"><h2 id="title"><?= $entry['titulo']?></h2></a>
        <div id="img-game"></div>
        <p><?= substr($entry['descripcion'], 0, 200)?></p> 
       <a href="category-pages?id=<?= $entry['categoria_id']?>">  <h2 class="categories" style="color: rgba(192, 188, 197, 0.918); background-color: rgba(24, 2, 2, 0.205); padding: 10px; margin: 20px 0px;"><?= $entry['nombre']?></h2></a>
  </article>
<?php 
  endwhile;
  else:
    ?>
   <div class="alert" style="width: 100%; height: 15vh; align-items: center;"><b class="success" style="width: 100%; font-size: 30px;">No existen entradas en esta categoría</b></div>';

<?php    
  endif;
endif;
?>
  </section>
  </main>
  <?php require_once 'includes/footer.php'?>
  </header>
</body>
</html>