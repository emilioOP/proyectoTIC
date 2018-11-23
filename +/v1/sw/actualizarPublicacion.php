<?php
if(isset($_GET["id"])){
     require_once "Data.php";
     // user = es el nombre de usuario del administrador
     // pass = es la password del administrador.
     $user = $_GET["user"];
     $pass = $_GET["pass"];
     // id = es la ID de la entrada al blog.
     // t = es el nuevo título de la entrada.
     // c = es e nuevo cuerpo de la entrada.
     $idPublicacion = $_GET["id"];
     $titulo = $_GET["t"];
     $cuerpo = $_GET["c"];

     // URL:
     // http://10.52.7.1/grupo_a/actualizarPublicacion.php?user=""&pass=""&id=""&t=""&c=""

     $d = new Data();

     $permiso = $d->getPrivilegio($user,$pass);
     $existe = $d->existeEntrada($idPublicacion);

     $men = null;

     if($permiso == 1){
          if($existe == 1){
               $d->actualizarPublicacion($idPublicacion,$titulo,$cuerpo);
               $men = "La publicación ha sido actuaizada con éxito";
               $isActualizado = "true";
          }else{
               $men = "La publicación no existe o no se encuentra disponible.";
               $isActualizado = "false";
          }
     }else{
          $men = "No posee los privilegios necesarios para realizar esta acción";
          $isActualizado = "false";
     }

 }else{
     $men = "No ha ingresado parámetros. No se puede llevar a cabo la operación.";
     $isActualizado = "false";
 }

 echo '<?xml version="1.0" encoding="UTF-8"?>';
 echo "<info>";
 echo "<mensaje>$men</mensaje>";
 echo "<status>$isActualizado</status>";
 echo "</info>";


?>
