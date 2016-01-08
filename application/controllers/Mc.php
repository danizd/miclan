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

		$this->load->helper('url');
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

		
		$this->load->helper('url');
		$this->load->model('users_m');

		$this->load->view('header');
		$this->load->view('mc/resumen/resumen_main');
		$this->load->view('footer', array("script" => "mc/resumen/javascript"));
	}



}

/* End of file mc.php */
/* Location: ./application/controllers/mc.php */