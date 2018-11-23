<body>
  <?php
    require_once "../bd/Data.php";
    $id_evento=$_GET["id_evento"];

    $d= new Data();
    $d ->eliminarEvento($id_evento);
   ?>
</body>
