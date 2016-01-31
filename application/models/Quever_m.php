<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quever_m extends CI_Model {
    public function trae_quever()
    {
        $this->db->select("
            quever.idQuever, 
            quever.userID,
            quever.descripcion, 
            quever.enlace, 
            quever.creada, 
            quever.descargada, 
            quever.vista, 
            quever.activada, 
            admin_users.name as autor,
            admin_users.photo as autor_foto
         ");
        $this->db->from("quever");
        $this->db->join('admin_users', 'admin_users.idUsuario = quever.userID', 'LEFT JOIN');
        $this->db->where('quever.activada', 1);
        $this->db->order_by('quever.creada');
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
    public function anadir_quever($datos_array)
    {

         return $this->db->insert('quever', $datos_array);
    }

    public function descargada_quever($id)
    {
    	$this->db->where('quever.idQuever', $id);
    	$this->db->set('descargada', 1, FALSE);
    	$this->db->update('quever');
    
    	if($this->db->affected_rows() != 1)
    	{
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }


    public function vista_quever($id)
    {
        $this->db->where('quever.idQuever', $id);
        $this->db->set('vista', 1, FALSE);
        $this->db->update('quever');
    
        if($this->db->affected_rows() != 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function cuenta_quever()
    {
    	$this->db->select("quever.idQuever");
    	$this->db->from("quever");
        $this->db->where('quever.activada', 1);
        $this->db->where('quever.descargada', 0);
    	$query = $this->db->get();
    	$result = $query->result_array();
			return count($result);
    }
    
}