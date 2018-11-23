/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

/**
 *
 * @author Emilio
 */
public class Login {
    private String url;

    public Login(String server, String user, String pass) {
        this.url = server+"?user="+user+"&pass="+pass+"";
    }

    public String getUrl() {
        return url;
    }
        
}
