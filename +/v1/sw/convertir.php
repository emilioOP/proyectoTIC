<?php
if(isset($_GET["id"])){
    require_once "Data.php";
    $user = $_GET["user"];
    $pass = $_GET["pass"];
    $id = $_GET["id"];

    $d = new Data();

    $idPrivilegio = $d->getPermisoById($id);
    $existeUsuario = $d->existeUsuarioById($id);
    $existe=false;

    $men = null;
    $convertir = null;

    if($existeUsuario == 1){
        $existe=true;
    }

    if($existe){
        if($idPrivilegio == 1){
            $men= "El usuario ya es administrador";
            $convertir = "false";
        }else if($idPrivilegio == 2){
            $d->convertirUsuarioAdmi($id);

            $men= "El usuario se ha convertido a administrador";
            $convertir = "true";
        }else{
            $men= "Usuario invalido";
            $convertir = "false";
        }
    }else{
        $men= "No se encuentra usuario";
        $convertir = "false";
    }
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "<info>";
    echo "<mensaje>$men</mensaje>";
    echo "<convertir>$convertir</convertir>";
    echo "</info>";

}
?>
