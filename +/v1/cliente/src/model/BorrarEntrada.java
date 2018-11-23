/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author Emilio
 */
public class BorrarEntrada {
    private String url;

    public BorrarEntrada(String server, String user, String pass, String entrada) {
        this.url = server+"?user="+user+"&pass="+pass+"&entrada="+entrada;
    }

    public String getUrl() {
        return url;
    }
        
}
