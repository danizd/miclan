<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Almacen_m extends CI_Model {
    public function trae_archivos()
    {
        $this->db->select("
            almacen.titulo, 
            almacen.descripcion, 
            almacen.archivo, 
            almacen.categoria, 
            almacen.creada, 
            admin_users.name as autor,
         ");
        $this->db->from("almacen");
        $this->db->join('admin_users', 'admin_users.idUsuario = almacen.userID', 'LEFT JOIN');
        $this->db->join('variables_options', 'variables_options.valor = almacen.categoria', 'LEFT JOIN');
        $this->db->where('variables_options.variables_ID', 4);
        $this->db->order_by('almacen.creada');
        $query = $this->db->get();
        $result = $query->result_array();

        if(is_array($result) && count($result) > 0)
        {
            return $result;
        }
        else
        {
            return array();
        }
    }
    public function anadir_archivo($datos_array)
    {
         return $this->db->insert('almacen', $datos_array);
    }



    
}