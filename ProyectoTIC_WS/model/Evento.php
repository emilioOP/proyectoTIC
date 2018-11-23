<?php
class Evento{
  private $ciudad;
  private $id_organizador;
  private $fecha_inicio;
  private $fecha_termino;
  private $direccion;
  private $n_personal;
  private $copado;
  private $activo;

  public function __construct($ciudad, $id_organizador,$fecha_inicio,$fecha_termino,$direccion,$n_personal, $copado, $activo){
      $this ->ciudad = $ciudad;
      $this ->id_organizador = $id_organizador;
      $this ->fecha_inicio = $fecha_inicio;
      $this ->fecha_termino = $fecha_termino;
      $this ->direccion = $direccion;
      $this ->n_personal = $n_personal;
      $this ->copado = $copado;
      $this ->activo = $activo;
  }

  public function getCiudad(){
      return $this ->ciudad;
  }

  public function getOrganizador(){
      return $this ->id_organizador;
  }

  public function getfecha_0(){
      return $this ->fecha_inicio;
  }

  public function getFecha_1(){
    return  $this ->fecha_termino;
  }

  public function getDireccion(){
    return $this ->direccion;
  }

  public function getPersonal(){
    return $this ->n_personal;
  }

  public function getCopado(){
      return $this ->copado;
  }

  public function getActivo(){
      return $this ->activo;
  }
}
?>
