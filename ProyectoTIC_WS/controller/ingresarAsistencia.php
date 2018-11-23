<body>
  <?php
    require_once "../bd/Data.php";
    $id_evento=$_GET["id_evento"];
    $id_trabajador=$_GET["id_trabajador"];

    $d= new Data();
    $d ->ingresarAsistencia($id_evento, $id_trabajador);
   ?>
</body>
