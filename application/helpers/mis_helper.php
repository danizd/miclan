<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
if(!function_exists('trae_usuario_por_id'))
{
	function trae_usuario_por_id($id)
	{
		$ci =& get_instance();
		$ci->db->select('admin_users.idUsuario, admin_users.name, admin_users.email');
		$ci->db->from('admin_users');
		$ci->db->where('idUsuario', $id);
		$query = $ci->db->get();  
		return $query->result();
	}

}
//end application/helpers/mis