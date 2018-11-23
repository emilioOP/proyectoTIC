<body>
  <?php
      require_once "../bd/Data.php";
      $id_evento = $_GET["id_evento"];
      $asistido = $_GET["asistido"];
      //$id_ciudad=$_GET["id_ciudad"];

      $d = new Data();
      $d ->listarTrabajadoresSuscritos($id_evento, $asistido);
  ?>
</body>
