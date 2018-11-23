<?php

  require_once "Data.php";

  if (isset($_GET["user"])){

    $user=$_GET["user"];
    $pass=$_GET["pass"];
    $titulo = $_GET["t"];
    $cuerpo = $_GET["c"];

    $d=new Data();

    $idUsuario = $d->getIdUsuario($user, $pass);

    $men = null;

    $existe = $d->existeUsuarioById($idUsuario);

    if($existe == 1){
         $d->escribirPublicacion($titulo,$cuerpo,$idUsuario);
         $men = "La publicación ha sido creada con éxito";
    }else{
        $men = "No es posible ingresar la publicacion ";
}


echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<info>";
echo "<mensaje>$men</mensaje>";
echo "</info>";

  }
 ?>
