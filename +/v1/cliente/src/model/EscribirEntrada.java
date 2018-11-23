package model;

import java.util.StringTokenizer;

public class EscribirEntrada {
    private String url;
    
     public EscribirEntrada(String server,String titulo,String cuerpo, String user, String clave) {

         
         
         this.url = server+"?user="+user+"&pass="+clave+"&t="+titulo+"&c="+cuerpo;
        //?user=emilio&pass=123456&
        //t=Hola soy una publicacion&c=estoy probando si sirve la cosa esta
     }

    public String getUrl() {
        return url;
    }
}
