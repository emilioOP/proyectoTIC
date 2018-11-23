<?php
if(isset($_GET["id"])){
  require_once "Data.php";



  $user = $_GET["user"];
  $pass = $_GET["pass"];
  $id = $_GET["id"];

  $newUser = $_GET["u"];
  $newPass = $_GET["p"];

  // URL:
  // http://10.52.7.1/grupo_a/actualizarUsuario.php?user=""&pass=""&id=""&u=""&p=""


  $d = new Data();
  $permiso = $d->getPrivilegio($user,$pass);
  $existe = $d->existeUsuarioById($id);

  $men = null;
  $isActualizado = null;

  if($permiso == 1){
    if($existe == 1){
      $d->actualizarUsuario($id, $newUser, $newPass);
      $men = "Usuario actualizado exitosamente";
      $isActualizado = "true";
    }else{
      $men = "El usuario especificado no existe";
      $isActualizado = "false";
    }

  }else{
    $men = "No posee los privilegios necesarios para realizar esta acción";
    $isActualizado = "false";
  }
  echo '<?xml version="1.0" encoding="UTF-8"?>';
  echo "<info>";
  echo "<mensaje>$men</mensaje>";
  echo "<status>$isActualizado</status>";
  echo "</info>";

}

?>
