
<?php 
  if (isset($_POST)) {
    
    require_once '../includes/conexion.php';
    

    $name = !empty($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;


    if ($name) {
      $sql = "INSERT INTO categorias VALUES(null, '$name')";
      $insert = mysqli_query($db, $sql);
      
    }else{
      $_SESSION['error'] = 'Error al intentar ingresar la categoria';
    }
  }
  header('location: ../index.php')
?>