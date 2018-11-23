<?php
    if(isset($_GET["user"])){
        require_once "Data.php";

        $user=$_GET["user"];
        $pass=$_GET["pass"];

        $d=new Data();

        $existeUsuario=false;
        if($d->existeUsusario($user)==1){
            $existeUsusario=true;
        }

        $ingreso=false;
        if($d->logIn($user,$pass)==1){
            $ingreso=true;
        }

        if($existeUsuario){
            if($ingreso){
                echo "<info>";
                echo "<mensaje>Usuario ingresado</mensaje>";
                echo "<login>true</login>";
                echo "</info>";
            }else{
                echo "<info>";
                echo "<mensaje>Clave usuario incorrecta</mensaje>";
                echo "<login>false</login>";
                echo "</info>";
            }
        }else{
            echo "<info>";
            echo "<mensaje>No se encuentra usuario</mensaje>";
            echo "<login>false</login/>";
            echo "</info>";
        }
    }else{
        echo "<info>";
        echo "<mensaje>No se han indicado parametros validos</mensaje>";
        echo "<login>false</login>";
        echo "</info>";
    }
?>
