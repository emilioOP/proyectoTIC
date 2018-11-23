
package model;


public class Usuario {
    private String url;
    
    public Usuario() {
    }

    
    public Usuario(String server,String usuario, String pass1,String pass2, int idPrivilegio) {
        this.url = server+"?nombreUsuario="+usuario+"&pass1="+pass1+"&pass2="+pass2+"&privilegio="+idPrivilegio+"";
    }

    public String getUrl() {
        return url;
    }
    
    

    
    
}
