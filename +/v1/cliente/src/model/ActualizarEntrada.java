package model;

public class ActualizarEntrada {

    private String url;

    public ActualizarEntrada(String server, int idPublicacion, String adminName, String adminPass, String titulo, String cuerpo) {
        this.url = server + "?user=" + adminName + "&pass=" + adminPass + "&id=" + idPublicacion + "&t=" + titulo + "&c=" + cuerpo;
    }

    public String getUrl() {
        return url;
    }
    
}
