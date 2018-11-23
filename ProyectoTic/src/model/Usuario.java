package model;

public class Usuario {
    private int id;
    private int id_permiso;
    private int id_ciudad;
    private String rut;
    private String nombre;
    private String apellido;
    private String telefono;
    private String domicilio;
    private String email;
    private String pass;
    private boolean activo;

    public Usuario(int id, int id_permiso, String nombre, String apellido) {
        this.id = id;
        this.id_permiso = id_permiso;
        this.nombre = nombre;
        this.apellido = apellido;
    }

    public Usuario(int id, String nombre, String apellido) {
        this.id = id;
        this.nombre = nombre;
        this.apellido = apellido;
    }
    
    public Usuario(int id, int id_permiso, int id_ciudad, String rut, String nombre, String apellido, String telefono, String domicilio, String email, String pass, boolean activo) {
        this.id = id;
        this.id_permiso = id_permiso;
        this.id_ciudad = id_ciudad;
        this.rut = rut;
        this.nombre = nombre;
        this.apellido = apellido;
        this.telefono = telefono;
        this.domicilio = domicilio;
        this.email = email;
        this.pass = pass;
        this.activo = activo;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getId_permiso() {
        return id_permiso;
    }

    public void setId_permiso(int id_permiso) {
        this.id_permiso = id_permiso;
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

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public void setApellido(String apellido) {
        this.apellido = apellido;
    }

    public String getTelefono() {
        return telefono;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public String getDomicilio() {
        return domicilio;
    }

    public void setDomicilio(String domicilio) {
        this.domicilio = domicilio;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPass() {
        return pass;
    }

    public void setPass(String pass) {
        this.pass = pass;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }

    @Override
    public String toString() {
        return this.nombre+" "+this.apellido;
    }
    
    
    
    
}
