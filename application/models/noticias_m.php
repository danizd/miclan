<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias_m extends CI_Model {
    public function trae_noticias()
    {
        $this->db->select("
            noticias.idNoticia, 
            noticias.userID,
            noticias.descripcion, 
            noticias.enlace, 
            noticias.creada, 
            admin_users.name as autor,
            admin_users.photo as autor_foto
         ");
        $this->db->from("noticias");
        $this->db->join('admin_users', 'admin_users.idUsuario = noticias.userID', 'LEFT JOIN');
        $this->db->where('noticias.activada', 1);
        $this->db->order_by('noticias.creada');
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
    public function anadir_noticias($datos_array)
    {

         return $this->db->insert('noticias', $datos_array);
    }

    public function desactiva_noticia($id)
    {
    	$this->db->where('noticias.idNoticia', $id);
    	$this->db->set('activada', 0, FALSE);
    	$this->db->update('noticias');
    
    	if($this->db->affected_rows() != 1)
    	{
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }
    
    public function cuenta_noticias()
    {
    	$this->db->select("noticias.idNoticia");
    	$this->db->from("noticias");
    	$this->db->where('noticias.activada', 1);
    	$query = $this->db->get();
    	$result = $query->result_array();
			return count($result);
    }
    
}