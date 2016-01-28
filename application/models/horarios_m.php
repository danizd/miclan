<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horarios_m extends CI_Model {
    public function trae_horarios()
    {
        $this->db->select("
            horarios.title, 
            horarios.start,
            horarios.end, 
            horarios.allDay, 
            horarios.backgroundColor, 
            horarios.borderColor, 
         ");
        $this->db->from("horarios");
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

    public function anadir_horario($datos_array)
    {

         return $this->db->insert('horarios', $datos_array);
    }

    public function elimina_horario($datos_array)
    {
        $this->db->where('horarios.title', $datos_array['title']);
        $this->db->where('horarios.start', $datos_array['start']);
        $this->db->delete('horarios');

        if($this->db->affected_rows() != 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function trae_semanas()
    {
    	$this->db->select("
							variables_options.etiqueta,
							variables_options.valor,
    			");
    	$this->db->from("variables_options");
    	$this->db->where('variables_options.variables_ID', 3);
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
    
    
    public function anadir_semana($datos_array)
    {
    	return $this->db->insert('variables_options', $datos_array);
    }
}