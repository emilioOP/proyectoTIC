
package model;

public class LeerEntrada {
    private String url;
    
     public LeerEntrada(String server,String titulo) {
        this.url = server+"?titulo="+titulo+"";
    }

    public String getUrl() {
        return url;
    }
    
}
