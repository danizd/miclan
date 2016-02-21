<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citas_m extends CI_Model {
    public function trae_citas()
    {
        $this->db->select("
            citas.title, 
            citas.start,
            citas.end, 
            citas.allDay, 
            citas.backgroundColor, 
            citas.borderColor, 
         ");
        $this->db->from("citas");
        $this->db->order_by('citas.start','asc');
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

    public function anadir_cita($datos_array)
    {

         return $this->db->insert('citas', $datos_array);
    }

    public function elimina_cita($datos_array)
    {
        $this->db->where('citas.title', $datos_array['title']);
        $this->db->where('citas.start', $datos_array['start']);
        $this->db->delete('citas');

        if($this->db->affected_rows() != 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

}