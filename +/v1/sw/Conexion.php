<?php
  class Conexion{
    private $con;

    public function __construct($server, $user, $pass, $bd){
      echo "Construyendo conexion";
      $this->con=mysqli_connect($server, $user, $pass, $bd);

      if(!$this->con){
        die("Error al conectar: ".mysqli_error);
        echo "Error conexion";

        }else{
        echo "Conexion correcta";
    }

//      $sBD=mysqli_select_db($bd, $this->con);

//      if(!$sBD){
//        die("Error al seleccionar: ".mysqli_error);
//        echo "Error de seleccion";
//    }else{
//        echo "Seleccion correcta";
//    }
    }

    public function ejecutar($query){
        return mysqli_query($this->con, $query);
    }

  }
?>
