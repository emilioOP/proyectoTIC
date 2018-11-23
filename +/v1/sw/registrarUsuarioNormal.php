<?php


  if(isset($_GET["nombreUsuario"])){
    require_once"Data.php";
    $nombreUsuario=$_GET["nombreUsuario"];
    $pass1=$_GET["pass1"];
    $pass2=$_GET["pass2"];
    $idPrivilegio=$_GET["privilegio"];
    $d =new Data();
    $registro=true;
    $errorPass=false;
    $existe=$d->validarUsuario($nombreUsuario);
    if ($existe == 0) {
      $registro=false;
      if ($pass1==$pass2) {
        $d->registrarUsuario($nombreUsuario,$pass1,$idPrivilegio);
        $errorPass=true;
        echo "<info>";
        echo "<mensaje>Usuario Registrado con exito</mensaje>";
        echo "<estado>$errorPass</estado>";
        echo "</info>";

      }else {
        echo "<info>";
        echo "<mensaje>claves no coinciden</mensaje>";
        echo "<estado>$errorPass</estado>";
        echo "</info>";
      }
    }else {
      echo "<info>";
      echo "<mensaje>nombre de usuario ya existe</mensaje>";
      echo "<estado>$registro</estado>";
      echo "</info>";
    }
  }else{
    echo "<info>";
    echo "<mensaje>no se encuentran los parametros necesarios</mensaje>";
    echo "<estado>false</estado>";
    echo "</info>";

  }
 ?>
