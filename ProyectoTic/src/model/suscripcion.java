/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author DiegoDX
 */
public class suscripcion {
    
    private int id;
    private String fecha;
    private int id_usuario;
    private int id_evento;
    private boolean activo;

    public suscripcion() {
    }

    public suscripcion(int id, String fecha, int id_usuario, int id_evento, boolean activo) {
        this.id = id;
        this.fecha = fecha;
        this.id_usuario = id_usuario;
        this.id_evento = id_evento;
        this.activo = activo;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public int getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(int id_usuario) {
        this.id_usuario = id_usuario;
    }

    public int getId_evento() {
        return id_evento;
    }

    public void setId_evento(int id_evento) {
        this.id_evento = id_evento;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }
    
}
