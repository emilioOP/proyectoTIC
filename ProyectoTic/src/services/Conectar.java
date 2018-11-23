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
public class Conectar {
    private String url;
    private String controller = "prueba.php";   
    
    public Conectar(String server){
        this.url = server+"/"+controller;
    }
    
    public String getUrl() {
        return url;
    }     
}
