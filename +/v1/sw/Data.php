<?php
require_once "Conexion.php";

// Ultima atualizacion: José 12:40

class Data{
     private $c;

     public function __construct(){
          $this->c = new Conexion(
          "localhost",
          "grupo_a",
          "qwerty",
          "grupo_a"
     );
}

public function getUsuarioPublicacion($id){
     $query = "select count(*) idUsuario from publicaciones where id = $id";
     $rs = $this->c->ejecutar($query);
     $existe = 0;

     if($reg = mysqli_fetch_array($rs)){
          $existe= $reg[0];
     }

     return $existe;
}

public function getIdUsuario($user, $pass){
    $query = "select id from usuarios
              where nombreUsuario = '$user'
              and clave = '$pass'";

    $rs = $this->c->ejecutar($query);

    $idUsuario = 0;

    /*Si existe algún registro*/
    if($reg = mysqli_fetch_array($rs)){
        $idUsuario= $reg[0];
    }

    return $idUsuario;
}

public function setUsuarioEliminado($id){
     $query = "update publicaciones set idUsuario = '11' where id = $id";
     $this->c->ejecutar($query);
}

public function eliminarUsuario($id){
     $getPublicacion = $this->getUsuarioPublicacion($id);

     if($getPublicacion >= 1){
          $this->setUsuarioEliminado($id);
     }

     $query="delete from usuarios where id=$id";
     $this->c->ejecutar($query);
}

public function getPrivilegio($user, $pass){
     $query = "select p.id
     from permisos p, usuarios u
     where p.id = u.permiso
     and u.nombreUsuario = '$user'
     and u.clave = '$pass'";

     $rs = $this->c->ejecutar($query);

     $idPrivilegio = 0;

     /*Si existe algún registro*/
     if($reg = mysqli_fetch_array($rs)){
          $idPrivilegio = $reg[0];
     }

     return $idPrivilegio;
}

public function actualizarUsuario($id, $u, $p){
     $query = "update usuarios set nombreUsuario = '$u', clave = '$p' where id = $id";
     $this->c->ejecutar($query);
}





public function existeEntrada($idEntrada){
     $query="select count(*) from publicaciones where id=$idEntrada";

     $rs=$this->c->ejecutar($query);
     $existe=0;

     if($reg = mysqli_fetch_array($rs)){
          $existe= $reg[0];
     }

     return $existe;
}

public function existeUsuarioById($id){
     $query ="select count(*) from usuarios where id=$id";
     $rs=$this->c->ejecutar($query);
     $existe=0;

     if($reg = mysqli_fetch_array($rs)){
          $existe= $reg[0];
     }

     return $existe;

}
public function validarUsuario($nombre){
     $query ="select count(*) from usuarios where nombreUsuario='$nombre'";
     $rs=$this->c->ejecutar($query);
     $existe=0;

     if($reg = mysqli_fetch_array($rs)){
          $existe= $reg[0];
     }

     return $existe;

}
public function existeUsuarioByNombre($user){
     $query ="select count(*) from usuarios where nombreUsuario = '$user'";
     $rs = $this->c->ejecutar($query);
     $existe = 0;

     if($reg = mysqli_fetch_array($rs)){
          $existe= $reg[0];
     }

     return $existe;
}

public function existeUsuario($user){
     $query ="select count(*) from usuarios where nombreUsuario='$user'";
     $rs=$this->c->ejecutar($query);
     $existe=0;

     if($reg = mysqli_fetch_array($rs)){
          $existe= $reg[0];
     }

     return $existe;
}

public function logIn($user, $pass){
     $query="select count(*) from usuarios where nombreUsuario='$user' and clave='$pass'";
     $rs=$this->c->ejecutar($query);

     $acceso=0;
     if($reg = mysqli_fetch_array($rs)){
          $acceso= $reg[0];
     }

     return $acceso;
}

public function convertirUsuarioAdmi($user,$pass){
     $query="UPDATE usuarios SET permiso = 1 where nombreUsuario = '$user' and clave = '$pass'";
     $rs=$this->c->ejecutar($query);

     $existe=0;

     if($reg = mysqli_fetch_array($rs)){
          $existe= $reg[0];
     }

     return $existe;
}

public function registrarUsuario($nombreUsuario,$pass,$idPrivilegio){
     $q="insert into usuarios values (null,'$nombreUsuario','$pass','$idPrivilegio')";
     $this->c->ejecutar($q);
}

public function escribirPublicacion($titulo,$texto,$idUsuario){
      $titulo = str_replace('%', ' ', $titulo);
      $texto = str_replace('%', ' ', $texto);
     $q="insert into publicaciones values
     (null,
     NOW(),
     '$titulo',
     '$texto',
     '$idUsuario');";
     $this->c->ejecutar($q);
}

public function actualizarPublicacion($id, $t, $c){
     $query = "update publicaciones set titulo = '$t', texto = '$c' where id = $id";
     $this->c->ejecutar($query);
}

public function getListaPublicaciones(){
     $q="select texto from publicaciones";
     $rs=$this->c->ejecutar($q);
     while($reg = mysqli_fetch_array($rs)){
          echo $reg[0];
     }
}


public function getEntrada($titulo){
     $query="select p.fecha, p.titulo, p.texto , u.nombreUsuario
        from publicaciones p, usuarios u
        where p.titulo='$titulo' and p.idUsuario=u.id";
     $rs=$this->c->ejecutar($query);
     $existe=0;
     while($reg = mysqli_fetch_array($rs)){

          echo "<entradas>";
          echo "<fecha>";
          echo $reg[0];
          echo "</fecha>";
          echo "<titulo>";
          echo $reg[1];
          echo "</titulo>";
          echo "<texto>";
          echo $reg[2];
          echo "</texto>";
          echo "<usuario>";
          echo $reg[3];
          echo "</usuario>";
          echo "</entradas>";
          $existe=1;
     }
     return $existe;
}


public function  listarEntradas(){
     $query="select * from publicaciones ";
     $rs = $this->c->ejecutar($query);
     while($reg= mysqli_fetch_array($rs)){
          echo "<entradas>";
          echo "<fecha>";
          echo $reg[1];
          echo "</fecha>";
          echo "<titulo>";
          echo $reg[2];
          echo "</titulo>";
          echo "<texto>";
          echo $reg[3];
          echo "</texto>";
          echo "</entradas>";
     }

}
public function borrarEntrada($entrada){
     $query="delete from publicaciones where id=$entrada";
     $this->c->ejecutar($query);
}
}
?>
