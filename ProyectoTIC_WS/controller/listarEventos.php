<body>
  <?php
  require_once "../bd/Data.php";
  $d= new Data();

  $tipo=$_GET["tipo"];
  $d->listarEventos($tipo);
  ?>

</body>
