
package model;

public class Entrada {
    private String fecha;
    private String titulo;
    private String texto;

    public Entrada(String fecha, String titulo, String texto) {
        this.fecha = fecha;
        this.titulo = titulo;
        this.texto = texto;
    }

    public Entrada() {
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getTexto() {
        return texto;
    }

    public void setTexto(String texto) {
        this.texto = texto;
    }
    
    
    
}
