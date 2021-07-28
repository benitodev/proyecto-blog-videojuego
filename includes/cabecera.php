<?php require_once 'conexion.php'?>
<?php require_once 'helpers/script-errores.php'?>

  <header id="header">
   

    <nav id="nav">
    
 <a href="index.php" id="logo"> Blog de Videojuegos</a>

     <ul id="lists">
      <li><a href="index.php">Inicio</a></li>
 <?php 
    $categorias = showCategories($db);
     while($categoria = mysqli_fetch_assoc($categorias)) :
  ?>   
        <li><a href="category-pages.php?id=<?=$categoria['id']?>"><?= $categoria['nombre']?></a></li>
<?php endwhile;?>  
  
      <li><a href="nosotros-4.php">Nosotros</a></li>
      <li><a href="contacto.php">Contacto</a></li>
    </ul>
    </nav>

  </header>