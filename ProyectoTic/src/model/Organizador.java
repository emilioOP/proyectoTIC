package model;

public class Organizador {
    private int id;
    private int id_usario;
    private int id_empresa;
    private boolean activo;

    public Organizador() {
    }

    public Organizador(int id, int id_usario, int id_empresa, boolean activo) {
        this.id = id;
        this.id_usario = id_usario;
        this.id_empresa = id_empresa;
        this.activo = activo;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getId_usario() {
        return id_usario;
    }

    public void setId_usario(int id_usario) {
        this.id_usario = id_usario;
    }

    public int getId_empresa() {
        return id_empresa;
    }

    public void setId_empresa(int id_empresa) {
        this.id_empresa = id_empresa;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }
    
    
}
