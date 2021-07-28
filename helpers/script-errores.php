<?php
function showError ($error){
  $text = '';
  if (!empty($error)) {
    $text = "<div class='error'>".$error."</div>";
  }
  return $text;
 }

function deleteError(){
  $borrado = false;

   if (isset($_SESSION['error'])) {
    $_SESSION['error'] = null;
    unset($_SESSION['error']);
  }

  if (isset($_SESSION['errors'])) {
    $_SESSION['errors'] = null;
    unset($_SESSION['errors']);
  }

  if (isset($_SESSION['success'])) {
    $_SESSION['success'] = null;
     unset($_SESSION['success']);
  }
    return $borrado;
}

function showCategories($db){
  $query = "SELECT * FROM categorias ORDER BY id DESC";
  $categorys = mysqli_query($db, $query);
if ($categorys) {
  $result = $categorys;
}else {
  echo 'error';
}

return $result;
}


function getCategories($db, $limit = null, $busqueda = null){
  $query = "SELECT e.*, c.nombre FROM entradas e 
INNER JOIN categorias c ON c.id = e.categoria_id ";

if ($busqueda) {
  $query.= "WHERE titulo LIKE '%$busqueda%'";
}

$query.= 'order by e.id DESC ';

if($limit){ 
  $query .= 'LIMIT 4;';
}

  $entry = mysqli_query($db, $query);

  $result = false;
  if ($entry) {
    $result = $entry;
  }

  return $result;
}

function getEntry($db, $id){
  $query = "SELECT e.*, c.nombre, CONCAT(u.nombre,' ', u.apellido) AS 'autor' FROM entradas e INNER JOIN categorias c ON c.id = e.categoria_id
  INNER JOIN usuarios u ON e.usuario_id = u.id  WHERE e.id = $id";
  $consult = mysqli_query($db, $query);

  $array = [];
  if ($consult) {
    $array = mysqli_fetch_assoc($consult);
    
  }
  return $array;

}



?>