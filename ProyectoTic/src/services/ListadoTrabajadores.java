/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

public class ListadoTrabajadores {
    private String url;
    private String controller = "listarTrabajadores.php";
    
    public ListadoTrabajadores(String server,int idE){
        this.url = server+"/"+controller+"?id_evento="+idE+"";
    }
    
    public String getUrl() {
        return url;
    } 
}
