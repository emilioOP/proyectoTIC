package model;

public class Evento {
    private int id;
    private int id_ciudad;
    private int id_usuario;
    
    private String empresa;
    private String ciudad;

    public String getCiudad() {
        return ciudad;
    }

    public void setCiudad(String ciudad) {
        this.ciudad = ciudad;
    }

    public String getEmpresa() {
        return empresa;
    }

    public void setEmpresa(String empresa) {
        this.empresa = empresa;
    }
    
    private String fecha_ingreso;
    private String inicio;
    private String termino;
    private String dirrecion;
    private int cantidad_personal;
    private boolean copado;
    private boolean activo;

    public Evento() {
    }

    public Evento(int id, String empresa, String ciudad, String inicio, String termino, String dirrecion) {
        this.id = id;
        this.empresa = empresa;
        this.ciudad = ciudad;
        this.inicio = inicio;
        this.termino = termino;
        this.dirrecion = dirrecion;
    }
    
    

    public Evento(int id, int id_ciudad, int id_organizador, String empresa, String fecha_ingreso, String inicio, String termino, String dirrecion, int cantidad_personal, boolean copado, boolean activo) {
        this.id = id;
        this.empresa = empresa;
        this.id_ciudad = id_ciudad;
        this.id_usuario = id_organizador;
        this.fecha_ingreso = fecha_ingreso;
        this.inicio = inicio;
        this.termino = termino;
        this.dirrecion = dirrecion;
        this.cantidad_personal = cantidad_personal;
        this.copado = copado;
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

    public int getId_organizador() {
        return id_usuario;
    }

    public void setId_organizador(int id_organizador) {
        this.id_usuario = id_organizador;
    }

    public String getFecha_ingreso() {
        return fecha_ingreso;
    }

    public void setFecha_ingreso(String fecha_ingreso) {
        this.fecha_ingreso = fecha_ingreso;
    }

    public String getInicio() {
        return inicio;
    }

    public void setInicio(String inicio) {
        this.inicio = inicio;
    }

    public String getTermino() {
        return termino;
    }

    public void setTermino(String termino) {
        this.termino = termino;
    }

    public String getDirrecion() {
        return dirrecion;
    }

    public void setDirrecion(String dirrecion) {
        this.dirrecion = dirrecion;
    }

    public int getCantidad_personal() {
        return cantidad_personal;
    }

    public void setCantidad_personal(int cantidad_personal) {
        this.cantidad_personal = cantidad_personal;
    }

    public boolean isCopado() {
        return copado;
    }

    public void setCopado(boolean copado) {
        this.copado = copado;
    }

    public boolean isActivo() {
        return activo;
    }

    public void setActivo(boolean activo) {
        this.activo = activo;
    }
    
    
}
