package model;

public class Empresa {
   private int id;
   private int id_ciudad;
   private String rut;
   private String razon_social;
   private String direcion;
   private boolean activo;

    public Empresa() {
    }

    public Empresa(int id, int id_ciudad, String rut, String razon_social, String direcion, boolean activo) {
        this.id = id;
        this.id_ciudad = id_ciudad;
        this.rut = rut;
        this.razon_social = razon_social;
        this.direcion = direcion;
        this.activo = activo;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getId_ciudad() {
        return id_ciudad;
    }

    public void setId_ciudad(int id_ciudad) {
        this.id_ciudad = id_ciudad;
    }

    public String getRut() {
        return rut;
    }

    public void setRut(String rut) {
        this.rut = rut;
    }

    public String getRazon_social() {
        return razon_social;
    }

    public void setRazon_social(String razon_social) {
        this.razon_social = razon_social;
    }

    public String getDirecion() {
        return direcion;
    }

    public void setDirecion(String direcion) {
        this.direcion = direcion;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }
   
   
}
