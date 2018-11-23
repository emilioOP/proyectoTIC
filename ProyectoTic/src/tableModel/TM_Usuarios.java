/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tableModel;

import java.util.List;
import javax.swing.event.TableModelListener;
import javax.swing.table.TableModel;
import model.Evento;
import model.Usuario;

/**
 *
 * @author Emilio
 */
public class TM_Usuarios implements TableModel {
    private List<Usuario> usuarios;

    public TM_Usuarios(List<Usuario> usuarios) {
        this.usuarios = usuarios;
    }    
    
    @Override
    public int getRowCount() {
        return usuarios.size();
    }

    @Override
    public int getColumnCount() {
        return 3;
    }

    @Override
    public String getColumnName(int columnIndex) {
        switch (columnIndex) {
                    case 0:
                        return "ID_Usuario";
                    case 1:
                        return "Nombre";
                    case 2:
                        return "Apellido";
                }
                return null;
    }

    @Override
    public Class<?> getColumnClass(int columnIndex) {
        return String.class;
    }

    @Override
    public boolean isCellEditable(int rowIndex, int columnIndex) {
        return false;
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        Usuario u = usuarios.get(rowIndex);
        
        switch (columnIndex) {
            case 0:
                return u.getId();
            case 1:
                return u.getNombre();
            case 2:
                return u.getApellido();
        }
        return null;        
    }

    @Override
    public void setValueAt(Object aValue, int rowIndex, int columnIndex) {
        //throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public void addTableModelListener(TableModelListener l) {
        //throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public void removeTableModelListener(TableModelListener l) {
        //throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}
