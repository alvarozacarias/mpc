<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_mantenimiento extends CI_Model {
    public function __construct() {
        parent::__construct();

    }

    public function getAllMantenimiento(){
        $this->db->select('m.idMantenimiento,t.nombreTipoMantenimiento,i.idItem,i.nombreItem,c.nombreCiudad,p.nombre1,m.fechaMantenimiento,m.frecuenciaMantenimiento,m.descripcion,m.estadoMantenimiento');
        $this->db->from('Mantenimiento as m');
        $this->db->join('Item as i','m.idItem=i.idItem','INNER');
        $this->db->join('TipoMantenimiento as t','m.idTipoMantenimiento = t.idTipoMantenimiento','INNER');
        $this->db->join('Ciudad as c','m.idCiudad = c.idCiudad','INNER');
        $this->db->join('Personal as p','m.idPersonal = p.idPersonal','INNER');

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }

    public function CreateMantenimiento($mantenimiento, $item, $ciudad, $personal, $fecha, $frecuencia, $descripcion, $estado){
        $data = array(
            'idTipoMantenimiento' => $mantenimiento,
            'idItem' => $item,
            'idCiudad' => $ciudad,
            'idPersonal' => $personal,
            'fechaMantenimiento' => $fecha,
            'frecuenciaMantenimiento' => $frecuencia,
            'descripcion' => $descripcion,
            'estadoMantenimiento' => $estado
        );
        return $this->db->insert('Mantenimiento', $data);
    }

    public function getMantenimientoById($id){
        $this->db->select('*');
        $this->db->from('Mantenimiento');
        $this->db->where('idMantenimiento',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->row();
        }else{
            return null;
        }
    }

    public function updateMantenimiento ($id, $usuario, $contrasena){

        $data = array(
            'USUARIO' => $usuario,
            'CONTRASENA' => $contrasena
        );
        $this->db->where('id_usuario', $id);
        $this->db->update('usuarios', $data);
    }
    
    
}
?>





