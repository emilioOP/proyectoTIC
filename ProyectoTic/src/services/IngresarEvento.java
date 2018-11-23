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
public class IngresarEvento {
    private String url;
    private String controller = "ingresarEvento.php";
    
    public IngresarEvento(
            String server, 
            int id_ciudad, 
            int id_usuario, 
            String inicio, 
            String termino, 
            String direccion, 
            int cantidad_personal
    )
    {
        this.url = server+"/"+controller+"?"
                + "id_ciudad="+id_ciudad+"&"
                + "id_usuario="+id_usuario+"&"
                + "inicio="+inicio+"&"
                + "termino="+termino+"&"
                + "cantidad_personal="+cantidad_personal+"&"             
                + "direccion="+direccion;
    }
    
    public String getUrl() {
        return url;
    }       
}
