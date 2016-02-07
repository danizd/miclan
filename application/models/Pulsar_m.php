<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pulsar_m extends CI_Model {
    public function trae_pulsar($nombre, $id)
    {
        $this->db->select("pulsar.valor as ". $nombre );
        $this->db->from("pulsar");
        $this->db->order_by('pulsar.creada',  "desc");
        $this->db->where('userID', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        if(is_array($result) && count($result) > 0)
        {
            return $result[0];
        }
        else
        {
            return array();
        }
    }
    public function trae_historico_pulsar($nombre, $id)
    {
        $this->db->select("pulsar.valor as ". $nombre );
        $this->db->from("pulsar");
        $this->db->order_by('pulsar.creada',  "asc");
        $this->db->where('userID', $id);
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
    public function anadir_pulsar($datos_array)
    {
    	return $this->db->insert('pulsar', $datos_array);
    }

}