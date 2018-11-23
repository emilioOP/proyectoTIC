<body>
  <?php
  require_once "../bd/Data.php";
  $d= new Data();

  $id_trabajador = $_GET["id_trabajador"];
  $d->verEventosSuscritos($id_trabajador);
  ?>

</body>
