
<!DOCTYPE html>
<html lang="es">
  <?php require_once 'includes/head.php'?>
  <body>
    
    <?php require_once 'includes/cabecera.php' ?>
   <main id="main">
     <?php 
    if (isset($_SESSION['login_user'])) {
      echo '<div class="box-login"> 
      <h2 id="title-main" style="font-family:  Tourney, cursive;    color: rgba(248, 248, 248, 0.52); background-color: rgba(36, 30, 30, 0.334);>" >'. $_SESSION['login_user'].
      '</h2>'. 
      '<a href="edit-login.php" class="buttons-login">Editar perfil</a>'  .
      '<a href="entry-login.php" class="buttons-login">Agregar entradas</a>' . 
      '<a href="category-login.php" class="buttons-login">Agregar categoria</a>' .  
      '<a href="close-login.php" class="buttons-login">Cerrar sesión</a>'.
      '</div>';
    }
    ?>
   

   <div id="title-box" class="box-animate">
     <h1 id="title-main">Últimos juegos destacados</h1>
   </div>
   
    <form id="search-game" action="search-entry.php" method="POST">
    <input type="text" name="search" class="inputs-class" style="width:40vw; height: 50px; margin: 0px 25px;">
    <input type="submit" class="submit">
    </form>
   
   <section id="featured-games">
     <?php $entrys = getCategories($db, true, null);
            if(!empty($entrys)) :
              while($entry = mysqli_fetch_assoc($entrys)) :
                ?>
      <article id="inputs">
        <a href="entry-pages?id=<?= $entry['id']?>"><h2 id="title"><?= $entry['titulo']?></h2></a>
        <div id="img-game"></div>
        <p><?= substr($entry['descripcion'], 0, 200)?></p> 
        <a href="category-pages?id=<?= $entry['categoria_id']?>">  <h2 class="categories" style="color: rgba(192, 188, 197, 0.918); background-color: rgba(24, 2, 2, 0.205); padding: 10px; margin: 20px 0px;"><?= $entry['nombre']?></h2></a>
  </article>
  <?php      endwhile;
          endif;
          ?>

</section>

           <div id="show-entries">
            <a href="entries.php" class="buttons-login" style="margin: 3rem 0;">Ver todas las entradas</a>
          </div>
  </main>
    <?php require_once 'includes/footer.php'?>
    </body>
</html>
