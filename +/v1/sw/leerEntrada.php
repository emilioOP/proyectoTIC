<?php
require_once"Data.php";

if(isset($_GET["titulo"])){
  $titulo=$_GET["titulo"];
  $d =new Data();
  $existe=$d->getEntrada($titulo);
  if ($existe==0) {

    echo "<entradas>";
    echo "<fecha>";
    echo "</fecha>";
    echo "<titulo>";
    echo "</titulo>";
    echo "<texto>";
    echo "Esta publicacion no existe";
    echo "</texto>";
    echo "<usuario>";
    echo "</usuario>";
    echo "</entradas>";
  }
}else {

  echo "<entradas>";
  echo "<fecha>";
  echo "</fecha>";
  echo "<titulo>";
  echo "</titulo>";
  echo "<texto>";
  echo "error al retornar dato";
  echo "</texto>";
  echo "<usuario>";
  echo "</usuario>";
  echo "</entradas>";

}
 ?>
