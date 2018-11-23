<?php
if(isset($_GET["id"])){
     require_once "Data.php";
     // user = es el nombre de usuario del administrador
     // pass = es la password del administrador.
     $user = $_GET["user"];
     $pass = $_GET["pass"];
     // id = ID del usuario ha borrar.
     $id = $_GET["id"];

     // URL:
     // http://10.52.7.1/grupo_a/eliminarUsuario.php?user=""&pass=""&id=""

     $d = new Data();

     $permiso = $d->getPrivilegio($user,$pass);
     $existe = $d->existeUsuarioById($id);

     $men = null;
     $del = null;

     if($permiso == 1){
          if($existe == 1){
              $d->eliminarUsuario($id);
              $men = "Usuario Eliminado con éxito";
              $del = "true";
          }else{
               $men = "El usuario especificado no existe";
               $del = "false";
          }



     }else{
          $men = "No posee los privilegios necesarios para realizar esta acción";
          $del = "false";
     }


}else{
    $men = "No ha ingresado parámetros. No se puede llevar a cabo la operación.";
    $del = "false";
}

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<info>";
echo "<mensaje>$men</mensaje>";
echo "<delete>$del</delete>";
echo "</info>";
?>
