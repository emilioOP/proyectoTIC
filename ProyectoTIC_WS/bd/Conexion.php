<?php
  class Conexion{
    private $con;

    public function __construct($server, $user, $pass, $bd){
      $this->con=mysqli_connect($server, $user, $pass, $bd);

      if(!$this->con){
        die("Error al conectar: ".mysqli_error);
        echo "Error conexion";

        }
    }

    public function ejecutar($query){
        return mysqli_query($this->con, $query);
    }

  }
?>
