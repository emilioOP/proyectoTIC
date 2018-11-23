<body>
  <?php
    require_once "../bd/Data.php";
    $d= new Data();

    $id_usuario = $GET["id_usuario"];
    $d->listarEventosPorEmpresa($id_usuario);
   ?>
</body>
