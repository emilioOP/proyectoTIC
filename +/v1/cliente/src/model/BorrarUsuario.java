/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author LAB-315
 */
public class BorrarUsuario {
    private String url;
    
   public BorrarUsuario(String server, int id, String user, String pass) {
        this.url = server+"?id="+id+"&user="+user+"&pass="+pass;
    }

    public String getUrl() {
        return url;
    }
   
   
    
}
