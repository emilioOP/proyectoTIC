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
public class IniciarSesion {
    private String url;
    private String controller = "IniciarSesion.php";

    public IniciarSesion(String server, String mail, String pass) {
        this.url = server+"/"+controller+"?email="+mail+"&pass="+pass+"";
    }

    public String getUrl() {
        return url;
    }    
}
