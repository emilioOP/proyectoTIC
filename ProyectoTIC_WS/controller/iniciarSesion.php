<?php
  require_once "../bd/Data.php";
  $email=$_GET["email"];
  $pass=$_GET["pass"];

  $d= new Data();
  $d->getUsuario($email, $pass);
?>
