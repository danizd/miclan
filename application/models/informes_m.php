<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informes_m extends CI_Model {
    public function trae_informes()
    {
        $this->db->select("
            informes.idInformes, 
            informes.userID,
            informes.titulo, 
            informes.sintomas, 
            informes.tratamiento, 
            informes.tipo, 
            informes.fechaInicio, 
            informes.fechaFin, 
            admin_users.name as autor,
            variables_options.etiqueta,
            variables_options.clase,
         ");
        $this->db->from("informes");
        $this->db->join('admin_users', 'admin_users.idUsuario = informes.userID', 'LEFT JOIN');
        $this->db->join('variables_options', 'variables_options.valor = informes.tipo', 'LEFT JOIN');
        $this->db->where('variables_options.variables_ID', 1);
        $this->db->order_by('informes.fechaInicio');
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
    public function anadir_informe($datos_array)
    {
         return $this->db->insert('informes', $datos_array);
    }

    public function cuenta_informes($nombreId, $tipo)
    {
    	$this->db->select("count(informes.idInformes) as idInformes");
        $this->db->from("informes");
        $this->db->where('tipo', $tipo);
        $this->db->where('userID', $nombreId);
        $query = $this->db->get();
        $result = $query->result_array();
        if(is_array($result) && count($result) > 0)
        {
            return $result[0];
        }
        else
        {
            return array('idInformes' => 0);
        }
    }

    public function trae_tipos_informe()
    {
    	$this->db->select("variables_options.etiqueta, variables_options.valor");
        $this->db->from("variables_options");
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


}