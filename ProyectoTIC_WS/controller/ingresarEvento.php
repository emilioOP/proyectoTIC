<?php
    require_once "../bd/Data.php";

    $id_ciudad=$_GET["id_ciudad"];
    $id_usuario=$_GET["id_usuario"];
    $inicio_evento=$_GET["inicio"];
    $termino_evento=$_GET["termino"];
    $direccion=$_GET["direccion"];
    $cantidad_personal=$_GET["cantidad_personal"];

    $d= new Data();
    $d ->IngresarEvento($id_ciudad, $id_usuario, $inicio_evento, $termino_evento, $direccion, $cantidad_personal);
?>
