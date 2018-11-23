package model;

public class Ciudad {
    
    private int id;
    private int id_region;
    private String nombre;

    public Ciudad() {
    }

    public Ciudad(int id, int id_region, String nombre) {
        this.id = id;
        this.id_region = id_region;
        this.nombre = nombre;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getId_region() {
        return id_region;
    }

    public void setId_region(int id_region) {
        this.id_region = id_region;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    @Override
    public String toString() {
        return this.nombre;
    }
    
    
    
    
    
}
