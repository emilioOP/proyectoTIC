/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

/**
 *
 * @author Emilio
 */
public class ListarTrabajadoresSuscritos {
    private String url;
    private String controller = "listarTrabajadoresSuscritos.php";

    public ListarTrabajadoresSuscritos(String server, int id_evento, int asistido) {
        this.url = server+"/"+controller+"?id_evento="+id_evento+"&asistido="+asistido;
    }

    public String getUrl() {
        return url;
    }
}
