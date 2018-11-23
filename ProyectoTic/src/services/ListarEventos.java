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
public class ListarEventos {
    private String url;
    private int tipo;
    private String controller = "listarEventos.php";

    public ListarEventos(String server, int tipo) {
        this.tipo = tipo;
        this.url = server+"/"+controller+"?tipo="+tipo;
    }

    public String getUrl() {
        return url;
    }    
}
