<body>
  <?php
      require_once "../bd/Data.php";
      $d= new Data();
      $id_usuario = $_GET["id_usuario"];
      $id_evento = $_GET["id_evento"];

      $d->deSuscribirEvento($id_usuario, $id_evento);
   ?>
</body>
