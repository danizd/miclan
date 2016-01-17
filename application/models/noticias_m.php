<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias_m extends CI_Model {
    public function trae_noticias()
    {
        $this->db->select("
            noticias.idNoticia, 
            noticias.userID,
            noticias.titulo, 
            noticias.descripcion, 
            noticias.foto, 
            noticias.enlace, 
            noticias.creada, 
            admin_users.name as autor,
            admin_users.photo as autor_foto
         ");
        $this->db->from("noticias");
        $this->db->join('admin_users', 'admin_users.idUsuario = noticias.userID', 'LEFT JOIN');
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


}