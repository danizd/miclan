<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Almacen_m extends CI_Model {
    public function trae_archivos()
    {
    	/*
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
        
        */
        
    	$aColumns = array(
    			'almacen.archivo',
    			'almacen.titulo',
    			'almacen.descripcion',
    			'variables_options.etiqueta',
    			'almacen.creada',
    			'variable_options.'
    	);
    	
    		$aColumns_with_alias = array(
    			'almacen.archivo',
    			'almacen.titulo',
    			'almacen.descripcion',
    			'variables_options.etiqueta',
    			'almacen.creada'
    		);
    	
    		$aColumns_SQL_name = array(
    			'archivo',
    			'titulo',
    			'descripcion',
    			'etiqueta',
    			'creada'
    		);
    	
    		$this->db->join('variables_options', 'variables_options.valor = almacen.categoria', 'LEFT JOIN');

    	
    		$this->db->where('variables_options.variables_ID',  4);
    	
    		// DB table to use
    		$sTable = 'almacen';
    	
    		$iDisplayStart = $this->input->get_post('iDisplayStart', true);
    		$iDisplayLength = $this->input->get_post('iDisplayLength', true);
    		$iSortCol_0 = $this->input->get_post('iSortCol_0', true);
    		$iSortingCols = $this->input->get_post('iSortingCols', true);
    		$sSearch = $this->input->get_post('sSearch', true);
    		$sEcho = $this->input->get_post('sEcho', true);
    	
    		// Paging
    		if(isset($iDisplayStart) && $iDisplayLength != '-1')
    		{
    			$this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
    		}
    	
    		// Ordering
    		if(isset($iSortCol_0))
    		{
    			for($i=0; $i<intval($iSortingCols); $i++)
    			{
    				$iSortCol = $this->input->get_post('iSortCol_'.$i, true);
    				$bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
    				$sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    	
    				if($bSortable == 'true')
    				{
    					$this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
    				}
    			}
    		}
    	
    	
    		if(isset($sSearch) && !empty($sSearch))
    		{
    			for($i=0; $i<count($aColumns); $i++)
    			{
    				$bSearchable = $this->input->get_post('bSearchable_'.$i, true);
    	
    				// Individual column filtering
    				if(isset($bSearchable) && $bSearchable == 'true')
    				{
    					$this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
    				}
    			}
    		}
    	
    	
    		for($i=0; $i<count($aColumns); $i++)
    		{
    			$bFilter = $this->input->get_post('sSearch_'.$i, true);
    	
    			// Individual column filtering
    			if(!empty($bFilter))
    			{
    				$this->db->like($aColumns[$i], $this->db->escape_like_str($bFilter));
    				 
    			}
    		}
    	
    		// Select Data
    		$this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns_with_alias)), false);
    		$rResult = $this->db->get($sTable);
    	
//echo $this->db->last_query();
    	
    		// Data set length after filtering
    		$this->db->select('FOUND_ROWS() AS found_rows');
    		$iFilteredTotal = $this->db->get()->row()->found_rows;
    	
    		// Total data set length
    		$iTotal = $this->db->count_all($sTable);
    	
    		// Output
    		$output = array(
    				'sEcho' => intval($sEcho),
    				'iTotalRecords' => $iTotal,
    				'iTotalDisplayRecords' => $iFilteredTotal,
    				'aaData' => array()
    		);
    		 
    		//var_dump($this->db->queries);
    	
    		foreach($rResult->result_array() as $aRow)
    		{
    			$row = array();
    	
    			foreach($aColumns_SQL_name as $col_key => $col)
    			{
    	
    	
    				if($col_key == 11 || $col_key == 12)
    				{
    					$row[] = $this->_toLocalizedDate(strtotime($aRow[$col]));
    				}
    				else
    				{
    					$row[] = $aRow[$col];
    				}
    			}
    	
    			$output['aaData'][] = $row;
    		}
    	
    		return $output;
    	}
    	
    	
    	
        
        
        
        
        
    
    public function anadir_archivo($datos_array)
    {
         return $this->db->insert('almacen', $datos_array);
    }



    
}