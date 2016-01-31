<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendientes_m extends CI_Model {
    public function trae_pendientes()
    {
        $this->db->select("
            pendientes.idPendientes, 
            pendientes.userID,
            pendientes.titulo, 
            pendientes.descripcion, 
            pendientes.prioridad, 
            pendientes.activada, 
            pendientes.creada, 
            admin_users.name as asignado,
            admin_users.photo as asignado_foto,
            variables_options.etiqueta,
            variables_options.clase,
         ");
        $this->db->from("pendientes");
        $this->db->join('admin_users', 'admin_users.idUsuario = pendientes.userID', 'LEFT JOIN');
        $this->db->join('variables_options', 'variables_options.valor = pendientes.prioridad', 'LEFT JOIN');
        $this->db->where('variables_options.variables_ID', 2);
        $this->db->where('pendientes.activada', 1);
        $this->db->order_by('pendientes.creada');
        $query = $this->db->get();
        $result = $query->result_array();
//var_dump($this->db->queries);


        if(is_array($result) && count($result) > 0)
        {
            return $result;
        }
        else
        {
            return array();
        }
    }
    public function anadir_pendientes($datos_array)
    {

         return $this->db->insert('pendientes', $datos_array);
    }

    public function trae_solucionados($id)
    {
        $this->db->select("
            pendientes.idPendientes, 
            pendientes.userID,
            pendientes.titulo, 
            pendientes.descripcion, 
            pendientes.prioridad, 
            pendientes.activada, 
            pendientes.creada, 
            admin_users.name as asignado,
            admin_users.photo as asignado_foto,
            variables_options.etiqueta,
            variables_options.clase,
         ");
        $this->db->from("pendientes");
        $this->db->join('admin_users', 'admin_users.idUsuario = pendientes.userID', 'LEFT JOIN');
        $this->db->join('variables_options', 'variables_options.valor = pendientes.prioridad', 'LEFT JOIN');
        $this->db->where('variables_options.variables_ID', 2);
        $this->db->where('pendientes.activada', 0);
        $this->db->where('pendientes.userID', $id);
        $this->db->order_by('pendientes.creada');
        $query = $this->db->get();
        $result = $query->result_array();
//var_dump($this->db->queries);


        if(is_array($result) && count($result) > 0)
        {
            return $result;
        }
        else
        {
            return array();
        }
    }



    public function tema_solucionado($id)
    {
        $this->db->where('pendientes.idPendientes', $id);
        $this->db->set('activada', 0, FALSE);
        $this->db->update('pendientes');

        if($this->db->affected_rows() != 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function cuenta_pendientes($id)
    {
        $this->db->select("pendientes.idPendientes");
        $this->db->from("pendientes");
        $this->db->where('pendientes.userID', $id);
        $query = $this->db->get();
        $result = $query->result_array();
            return count($result);
    }

}