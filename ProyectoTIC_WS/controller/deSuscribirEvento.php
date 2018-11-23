<body>
  <?php
    require_once "../bd/Data.php";
    $id_evento=$_GET["id_evento"];
    $id_usuario=$_GET["id_usuario"];

    $d= new Data();
    $d ->deSuscribirEvento($id_usuario, $id_evento);
   ?>
</body>
