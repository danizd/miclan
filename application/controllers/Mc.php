<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mc extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('users_m', '', TRUE);
		if($this->users_m->login() == false) redirect('user/login', 'refresh');

		redirect('vcab/events', 'refresh');
	}

	public function get_autocomplete_data($table = "", $show_search_term_as_option = true)
	{
		//if(empty($table)) exit();

		if($show_search_term_as_option !== true)
		{
			$show_search_term_as_option = false;
		}

		$this->load->model('users_m', '', TRUE);
		if($this->users_m->login() == false) exit();

		$search_term = $this->input->get_post('q');

		$this->lang->load('vcab', '', TRUE);
		$this->load->model('events_m', '', TRUE);

		$result = $this->events_m->get_autocomplete_data($table, $show_search_term_as_option, $search_term, $this->config->item('language'));

		header('Content-Type: application/json');
		echo json_encode(array("items" => $result));
	}

	public function resumen()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('adminuser/login_page', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/resumen/resumen_main');
		$this->load->view('footer', array("script" => "mc/resumen/javascript"));
	}

	public function noticias()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('adminuser/login_page', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/noticias/noticias_main');
		$this->load->view('footer', array("script" => "mc/noticias/javascript"));
	}

	public function trae_noticias()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('noticias_m');
		$result = $this->noticias_m->trae_noticias();
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay noticias"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));

		}

	}

	public function anadir_noticias()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();

	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('titulo', 'Título', 'required|min_length[3]');
	    $this->form_validation->set_rules('enlace', 'Enlace', 'required');

		if($this->form_validation->run() === true){

		    $config['upload_path'] =  './assets/images/noticias/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '10000';

			$current_date = new DateTime();
			$filename = $config['file_name'] = $current_date->format('Y_m_d_H_i_s_u') . "_" . rand(1000, 9999) . ".jpg";
			$this->load->library('upload', $config);
			if ( !$this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
			}	
			else
			{

					$datos_array = array(
				       'titulo' => $this->input->post('titulo'),
				       'enlace' => $this->input->post('enlace'),
				       'descripcion' => $this->input->post('descripcion'),
				       'foto' => $this->input->post('foto'), 
				       'userID' => $_SESSION['user_id'], 
				       'activada' => 1, 
				       'foto' => $filename
					);
			        $this->load->model('noticias_m');
					$result = $this->noticias_m->anadir_noticias($datos_array);
			}
			echo json_encode(array('status' => 'OK', 'msg' => "aaaaaaaa"));

		}else{
			$error = array(
                'titulo' => form_error('titulo'),
                'enlace' => form_error('enlace'),
                'descripcion' => form_error('descripcion')
            );

			echo json_encode(array('status' => 'ERROR', 'msg' => $error ));
			exit();
		}



	        
	    
	   

	}



}

/* End of file mc.php */
/* Location: ./application/controllers/mc.php */