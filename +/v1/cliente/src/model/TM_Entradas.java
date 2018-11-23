package model;

import java.util.List;
import javax.swing.event.TableModelListener;
import javax.swing.table.TableModel;

public class TM_Entradas implements TableModel {

    private List<Entrada> entradas;

    public TM_Entradas(List<Entrada> entradas) {
        this.entradas = entradas;
    }

    @Override
    public int getRowCount() {
        return entradas.size();
    }

    @Override
    public int getColumnCount() {
        return 3;
    }

    @Override
    public String getColumnName(int columnIndex) {
        switch (columnIndex) {
            case 0:
                return "Fecha";
            case 1:
                return "Titulo";
            case 2:
                return "Texto";

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
        Entrada e = entradas.get(rowIndex);
        switch (columnIndex) {
            case 0:
                return e.getFecha();
            case 1:
                return e.getTitulo();
            case 2:
                return e.getTexto();
        }
        return null;
    }

    @Override
    public void setValueAt(Object aValue, int rowIndex, int columnIndex) {

    }

    @Override
    public void addTableModelListener(TableModelListener l) {

    }

    @Override
    public void removeTableModelListener(TableModelListener l) {

    }
}
