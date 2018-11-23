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

/**
 *
 * @author Emilio
 */
public class TM_Eventos implements TableModel {
    private List<Evento> eventos;

    public TM_Eventos(List<Evento> eventos) {
        this.eventos = eventos;
    }

    @Override
    public int getRowCount() {
        return eventos.size();
    }

    @Override
    public int getColumnCount() {
        return 6;
    }

    @Override
    public String getColumnName(int columnIndex) {
        switch (columnIndex) {
            case 0:
                return "ID_EVENTO";
            case 1:
                return "EMPRESA";
            case 2:
                return "CIUDAD";
            case 3:
                return "DIRECCION";
            case 4:
                return "INICIO";
            case 5:
                return "TERMINO";
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
        Evento e = eventos.get(rowIndex);
        switch (columnIndex) {
            case 0:
                return e.getId();
            case 1:
                return e.getEmpresa();
            case 2:
                return e.getCiudad();
            case 3:
                return e.getDirrecion();
            case 4:
                return e.getInicio();
            case 5:
                return e.getTermino();
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
