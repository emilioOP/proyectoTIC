<?php
require_once "Conexion.php";

class Data{
     private $c;

    public function __construct(){
              $this->c = new Conexion(
              "localhost",
              "root",
              "123456",
              "db_bodegaje"
         );

         /*$server, $user, $pass, $bd*/
    }

    public function prueba(){
      echo "OK";
    }

    public function getUsuario($mail, $pass){
         $query="call getUsuario('".$mail."', '".$pass."')";
         $rs=$this->c->ejecutar($query);

         if($reg = mysqli_fetch_array($rs)){
           //leer registro #1
           echo "<usuario>";
              echo "<id>";
                  echo $reg[0];
              echo "</id>";
              echo "<permiso>";
                  echo $reg[1];
              echo "</permiso>";
              echo "<nombre>";
                  echo $reg[2];
              echo "</nombre>";
              echo "<apellido>";
                  echo $reg[3];
              echo "</apellido>";
           echo "</usuario>";
         }
    }

    public function IngresarEvento($id_ciudad, $id_usuario, $inicio_evento, $termino_evento, $direccion, $cantidad_personal){
        $query="call ingresarEvento (".$id_ciudad.", ".$id_usuario.", '".$inicio_evento."', '".$termino_evento."', '".$direccion."', ".$cantidad_personal.");";
        $rs=$this->c->ejecutar($query);

        if($reg = mysqli_fetch_array($rs)){
            echo "<mensaje>";
              echo $reg[0];
            echo "</mensaje>";
        }
    }

    public function ListarEventos($tipo){
      switch ($tipo) {
        case 1: //Disponibles
          $query = "call listarEventosDisponibles()";
          break;
        case 2: //Iniciados
          $query = "call listarEventosIniciados()";
          break;
        default:
          print 'Error';
          break;
      }

      $rs = $this->c->ejecutar($query);
      while($reg= mysqli_fetch_array($rs)){
           echo "<evento>";
             echo "<id>";
                echo $reg[0];
             echo "</id>";
             echo "<empresa>";
                echo $reg[1];
             echo "</empresa>";
             echo "<ciudad>";
                echo $reg[2];
             echo "</ciudad>";
             echo "<direccion>";
                echo $reg[3];
             echo "</direccion>";
             echo "<inicio>";
                echo $reg[4];
             echo "</inicio>";
             echo "<termino>";
                echo $reg[5];
             echo "</termino>";
           echo "</evento>";
      }

    }

    public function suscribirEvento($id_evento, $id_usuario){
        $query="call suscribirEvt(".$id_usuario.", ".$id_evento.")";
        $rs=$this->c->ejecutar($query);

        if($reg = mysqli_fetch_array($rs)){
          //leer mensaje
          //echo "<respuesta>";
            echo "<id>";
              echo $reg[0];
            echo "</id>";
            echo "<mensaje>";
              echo $reg[1];
            echo "</mensaje>";
          //echo "</respuesta>";
        }
    }

    public function listarTrabajadoresSuscritos ($id_evento, $asistido){
      $query = "call listarTrabajadoresSuscritos (".$id_evento.", ".$asistido.")";
      $rs = $this->c->ejecutar($query);
      while($reg= mysqli_fetch_array($rs)){
          echo "<trabajador>";
            echo "<id>";
              echo $reg[0];
            echo "</id>";
            echo "<nombre>";
              echo $reg[1];
            echo "</nombre>";
            echo "<apellido>";
              echo $reg[2];
            echo "</apellido>";
          echo "</trabajador>";
      }
    }

    public function verEventosSuscritos($id_usuario){
      $query = "call getEventosSuscritosByTrabajador (".$id_usuario.")";
      $rs = $this->c->ejecutar($query);
      while($reg= mysqli_fetch_array($rs)){
        echo "<evento>";
          echo "<id>";
             echo $reg[0];
          echo "</id>";
          echo "<empresa>";
             echo $reg[1];
          echo "</empresa>";
          echo "<ciudad>";
             echo $reg[2];
          echo "</ciudad>";
          echo "<direccion>";
             echo $reg[3];
          echo "</direccion>";
          echo "<inicio>";
             echo $reg[4];
          echo "</inicio>";
          echo "<termino>";
             echo $reg[5];
          echo "</termino>";
        echo "</evento>";
      }
    }

    public function deSuscribirEvento($id_usuario, $id_evento){

    }

}
?>
