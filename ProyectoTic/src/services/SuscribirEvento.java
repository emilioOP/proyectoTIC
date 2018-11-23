/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

/**
 *
 * @author DiegoDX
 */
public class SuscribirEvento {
    private String url;
    private String controller = "suscribirEvento.php";
    
    public SuscribirEvento(String server,int idU,int idE){
        this.url = server+"/"+controller+"?id_usuario="+idU+"&id_evento="+idE+"";
    }
    
    public String getUrl() {
        return url;
    }    
}
 