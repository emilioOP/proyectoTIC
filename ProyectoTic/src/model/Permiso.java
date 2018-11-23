package model;

public class Permiso {
    private int id;
    private String permiso;

    public Permiso() {
    }

    public Permiso(int id, String permiso) {
        this.id = id;
        this.permiso = permiso;
    }
    
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getPermiso() {
        return permiso;
    }

    public void setPermiso(String permiso) {
        this.permiso = permiso;
    }

}
