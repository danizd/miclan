<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mc extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('users_m', '', TRUE);
		if($this->users_m->login() == false) redirect('/', 'refresh');
/*	
		$pass = crypt('tu_pass', '$5$rounds=5000$p1o1h3b4g6s4fgfd5j7fb7n6$');
		echo $pass;
		die;
	*/
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

	public function portada()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		$this->load->view('mc/portada/portada_main');
	}

	public function resumen()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/resumen/resumen_main');
		$this->load->view('footer', array("script" => "mc/resumen/javascript"));
	}
	
	
	public function trae_usuario()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		header('Content-Type: application/json');
		echo json_encode(array_merge(array("status" => "OK", "nombre" =>  $_SESSION["name"], "foto" => $_SESSION["photo"])));
	}
	
	
	
	public function noticias()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
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
	public function cuenta_noticias()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('noticias_m');
		$result = $this->noticias_m->cuenta_noticias();
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay noticias"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "numero" =>  $result)));
		
		}
	}

	public function extract_process()
	{
		$get_url = $this->input->post('url'); 


		include_once("./assets/include/simple_html_dom.inc.php");

		if(!empty($get_url ) && filter_var($_POST["url"], FILTER_VALIDATE_URL)) {		
			
			//extracting HTML content for the URL 
			$content = file_get_html($_POST["url"]); 
			
			//Parsing Title 
			foreach($content->find('title') as $element) {
				$title = $element->plaintext;
			}
			
			//Parsing Body Content
			foreach($content->find('body') as $element) {
				$body_content =  implode(' ', array_slice(explode(' ', trim($element->plaintext)), 0, 50));
			}

			$image_url = array();
			
			//Parse Site Images
			foreach($content->find('img') as $element){
				if(filter_var($element->src, FILTER_VALIDATE_URL)){
					list($width,$height) = getimagesize($element->src);
					if($width>150 || $height>150){
						$image_url[] =  $element->src;	
					}
				}
			}
			$image_div = "";
			if(!empty($image_url[0])) {
				$image_div = "<div class='image-extract'>" .
				"<input type='hidden' id='index' value='0'/>" .
				"<img id='image_url' src='" . $image_url[0] . "' />";
				if(count($image_url)>1) {
				$image_div .= "<div>" .
				"<input type='button' class='btnNav' id='prev-extract' onClick=navigateImage(" . json_encode($image_url) . ",'prev') disabled />" .
				"<input type='button' class='btnNav' id='next-extract' target='_blank' onClick=navigateImage(" . json_encode($image_url) . ",'next') />" .
				"</div>";
				}
				$image_div .="</div>";
				
			}
			
			$output = $image_div . "<div class='content-extract'>" .
			"<h3><a href='" . $_POST["url"] . "' target='_blank'>" . $title . "</a></h3>" .
			"<div>" . $body_content . "</div>".
			"</div>";
			echo $output;
		}

	}





	public function anadir_noticias()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
/*
	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('titulo', 'Título', 'required|min_length[3]');
	  $this->form_validation->set_rules('enlace', 'Enlace', 'required');
		$error = Array();

		if ($this->form_validation->run() == false) 
		{
			$error['titulo'] =  form_error('titulo');
			$error['enlace'] =  form_error('enlace');
			$error['descripcion'] =  form_error('descripcion');
			
			echo json_encode(array('status' => 'ERROR', 'msg' => $error ));
			exit();
		
		}	
		else
		{
			$config['upload_path'] =  './assets/images/noticias/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '10000';
			
			$current_date = new DateTime();
			$filename = $config['file_name'] = $current_date->format('Y_m_d_H_i_s_u') . "_" . rand(1000, 9999) . ".jpg";
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload('foto')){
				$error['foto'] = $this->upload->display_errors();
				echo json_encode(array('status' => 'ERROR', 'msg' => $error ));
				exit();
			}
			
			$datos_array = array(
					'titulo' => $this->input->post('titulo'),
					'enlace' => $this->input->post('enlace'),
					'descripcion' => $this->input->post('descripcion'),
					'foto' => $this->input->post('foto'),
					'userID' => $_SESSION['user_id'],
					'activada' => 1,
					'foto' => $filename
			);
			
			*/
			$datos_array = array(
					'enlace' => $this->input->post('enlace'),
					'descripcion' => $this->input->post('descripcion'),
					'userID' => $_SESSION['user_id'],
					'activada' => 1,
			);
		
			$this->load->model('noticias_m');
			$result = $this->noticias_m->anadir_noticias($datos_array);
			echo json_encode(array('status' => 'OK'));
			exit();
		//}
		
	}
	
	public function desactiva_noticia()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('noticias_m');
		$id = $this->input->post('id');
		$result = $this->noticias_m->desactiva_noticia($id);
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
	

	public function citas()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/citas/citas_main');
		$this->load->view('footer', array("script" => "mc/citas/javascript"));
	}
	
	public function informes()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/informes/informes_main');
		$this->load->view('footer', array("script" => "mc/informes/javascript"));
	}

	public function trae_informes()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('informes_m');
		$result = $this->informes_m->trae_informes();

		$num_crisis_saloa = $this->informes_m->cuenta_informes(3, 1);
		$result[0]['num_crisis_saloa'] = $num_crisis_saloa;
		$num_urgencias_saloa = $this->informes_m->cuenta_informes(3, 2);
		$result[0]['num_urgencias_saloa'] = $num_urgencias_saloa;
		$num_cabecera_saloa = $this->informes_m->cuenta_informes(3, 3);
		$result[0]['num_cabecera_saloa'] = $num_cabecera_saloa;
		$num_otros_saloa = $this->informes_m->cuenta_informes(3, 4);
		$result[0]['num_otros_saloa'] = $num_otros_saloa;


		$num_urgencias_elena = $this->informes_m->cuenta_informes(2, 2);
		$result[0]['num_urgencias_elena'] = $num_urgencias_elena;
		$num_cabecera_elena = $this->informes_m->cuenta_informes(2, 3);
		$result[0]['num_cabecera_elena'] = $num_cabecera_elena;
		$num_otros_elena = $this->informes_m->cuenta_informes(2, 4);
		$result[0]['num_otros_elena'] = $num_otros_elena;


		$num_urgencias_dani = $this->informes_m->cuenta_informes(1, 2);
		$result[0]['num_urgencias_dani'] = $num_urgencias_dani;
		$num_cabecera_dani = $this->informes_m->cuenta_informes(1, 3);
		$result[0]['num_cabecera_dani'] = $num_cabecera_dani;
		$num_otros_dani = $this->informes_m->cuenta_informes(1, 4);
		$result[0]['num_otros_dani'] = $num_otros_dani;
//var_dump($result);
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay informes"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));

		}

	}

/*	public function trae_tipos_informe()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('informes_m');
		$result = $this->informes_m->trae_tipos_informe();
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay tipos"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));

		}
	}
*/
	public function anadir_informe()
	{
	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('titulo', 'Título', 'required|min_length[3]');
	  $this->form_validation->set_rules('sintomas', 'Sintomas', 'required');
	  $this->form_validation->set_rules('tipo', 'Tipo', 'required');
	  $this->form_validation->set_rules('quien', 'Quien', 'required');
	  $this->form_validation->set_rules('fechaInicio', 'Fecha Inicio', 'required');
	  $this->form_validation->set_rules('fechaFin', 'Fecha Fin', 'required');
	  $this->form_validation->set_rules('tratamiento', 'Tratamiento', 'required');
		$error = Array();

		if ($this->form_validation->run() == false) 
		{
			$error['titulo'] =  form_error('titulo');
			$error['sintomas'] =  form_error('sintomas');
			$error['tipo'] =  form_error('tipo');
			$error['quien'] =  form_error('quien');
			$error['fechaInicio'] =  form_error('fechaInicio');
			$error['fechaFin'] =  form_error('fechaFin');
			$error['tratamiento'] =  form_error('tratamiento');
			
			echo json_encode(array('status' => 'ERROR', 'msg' => $error ));
			exit();
		
		}	
		else
		{
			$datos_array = array(
					'titulo' => $this->input->post('titulo'),
					'sintomas' => $this->input->post('sintomas'),
					'tipo' => $this->input->post('tipo'),
					'userID' => $this->input->post('quien'),
					'fechaInicio' => $this->input->post('fechaInicio'),
					'fechaFin' => $this->input->post('fechaFin'),
					'tratamiento' => $this->input->post('tratamiento'),

			);
			$this->load->model('informes_m');
			$result = $this->informes_m->anadir_informe($datos_array);
			echo json_encode(array('status' => 'OK'));
			exit();
		}

	}

	public function horarios()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/horarios/horarios_main');
		$this->load->view('footer', array("script" => "mc/horarios/javascript"));
	}



	public function trae_horarios()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('horarios_m');
		$result = $this->horarios_m->trae_horarios();
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay noticias"));
		}
		else
		{
			echo json_encode( $result);

		}
	}
	
	public function trae_semanas()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('horarios_m');
		$result = $this->horarios_m->trae_semanas();
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
	
	public function anadir_semana()
	{
		$datos_array = array(
				'etiqueta' => $this->input->post('etiqueta'),
				'valor' => $this->input->post('valor'),	
				'variables_ID' => 3
		);
		$this->load->model('horarios_m');
		$result = $this->horarios_m->anadir_semana($datos_array);
		echo json_encode(array('status' => 'OK'));
		exit();
	}
	
	public function anadir_horario()
	{
		$datos_array = array(
				'title' => $this->input->post('title'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'description' => $this->input->post('description'),
				'allDay' => $this->input->post('allDay'),
				'backgroundColor' => $this->input->post('backgroundColor'),
				'borderColor' => $this->input->post('borderColor'),

		);
		$this->load->model('horarios_m');
		$result = $this->horarios_m->anadir_horario($datos_array);
		echo json_encode(array('status' => 'OK'));
		exit();
	}

	public function elimina_horario()
	{
		$datos_array = array(
				'title' => $this->input->post('title'),
				'start' => $this->input->post('start'),
		);
		$this->load->model('horarios_m');
		$result = $this->horarios_m->elimina_horario($datos_array);
		echo json_encode(array('status' => 'OK'));
		exit();
	}

	public function pendientes()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/pendientes/pendientes_main');
		$this->load->view('footer', array("script" => "mc/pendientes/javascript"));
	}

	public function trae_pendientes()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('pendientes_m');
		$result = $this->pendientes_m->trae_pendientes();
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay temas pendientes"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));

		}

	}

	public function trae_solucionados()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('pendientes_m');
		$id = $this->input->post('id');
		$result = $this->pendientes_m->trae_solucionados($id);
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay temas solucionados"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));

		}

	}

	public function tema_solucionado()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('pendientes_m');
		$id = $this->input->post('id');
		$result = $this->pendientes_m->tema_solucionado($id);
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay temas solucionados"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));

		}

	}




	public function anadir_pendientes()
	{
	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('titulo', 'Título', 'required|min_length[3]');
	  $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
	  $this->form_validation->set_rules('prioridad', 'Prioridad', 'required');
	  $this->form_validation->set_rules('asignado', 'Asignado', 'required');
		$error = Array();

		if ($this->form_validation->run() == false) 
		{
			$error['titulo'] =  form_error('titulo');
			$error['descripcion'] =  form_error('descripcion');
			$error['prioridad'] =  form_error('prioridad');
			$error['asignado'] =  form_error('asignado');
			
			echo json_encode(array('status' => 'ERROR', 'msg' => $error ));
			exit();
		
		}	
		else
		{
			$datos_array = array(
					'titulo' => $this->input->post('titulo'),
					'descripcion' => $this->input->post('descripcion'),
					'prioridad' => $this->input->post('prioridad'),
					'userID' => $this->input->post('asignado'),
					'activada' => 1,
			);
			$this->load->model('pendientes_m');
			$result = $this->pendientes_m->anadir_pendientes($datos_array);
			echo json_encode(array('status' => 'OK'));
			exit();
		}

	}


	public function cuenta_pendientes()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('pendientes_m');
		$id = $_SESSION['user_id'];
		$result = $this->pendientes_m->cuenta_pendientes($id);
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay peliculas o series"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "numero" =>  $result)));
		
		}
	}



	public function trae_citas()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('citas_m');
		$result = $this->citas_m->trae_citas();
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay noticias"));
		}
		else
		{
			echo json_encode( $result);

		}

	}
	public function trae_listado_citas()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('citas_m');
		$result = $this->citas_m->trae_citas();
		foreach ($result as $key => $value) {
			$date = date("d-m-Y", strtotime($result[$key]['start']));
			$result[$key]['start'] = date("d-m-Y", strtotime($date));
		}
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


	public function anadir_cita()
	{
		$datos_array = array(
				'title' => $this->input->post('title'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'description' => $this->input->post('description'),
				'allDay' => $this->input->post('allDay'),
				'backgroundColor' => $this->input->post('backgroundColor'),
				'borderColor' => $this->input->post('borderColor'),

		);
		$this->load->model('citas_m');
		$result = $this->citas_m->anadir_cita($datos_array);
		echo json_encode(array('status' => 'OK'));
		exit();
	}

	public function elimina_cita()
	{
		$datos_array = array(
				'title' => $this->input->post('title'),
				'start' => $this->input->post('start'),
		);
		$this->load->model('citas_m');
		$result = $this->citas_m->elimina_cita($datos_array);
		echo json_encode(array('status' => 'OK'));
		exit();
	}


	public function saloa()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/saloa/saloa_main');
		$this->load->view('footer', array("script" => "mc/saloa/javascript"));
	}

	public function quever()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) redirect('/', 'refresh');
		$this->load->view('header');
		$this->load->view('mc/que_ver/quever_main');
		$this->load->view('footer', array("script" => "mc/que_ver/javascript"));
	}
	public function trae_quever()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('quever_m');
		$result = $this->quever_m->trae_quever();
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay peliculas o series"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));

		}

	}
	public function cuenta_quever()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('quever_m');
		$result = $this->quever_m->cuenta_quever();
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay peliculas o series"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "numero" =>  $result)));
		
		}
	}

	

	public function anadir_quever()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
			$datos_array = array(
					'enlace' => $this->input->post('enlace'),
					'descripcion' => $this->input->post('descripcion'),
					'userID' => $_SESSION['user_id'],
					'descargada' => 0,
					'vista' => 0,
					'activada' => 1,
			);
		
			$this->load->model('quever_m');
			$result = $this->quever_m->anadir_quever($datos_array);
			echo json_encode(array('status' => 'OK'));
			exit();
		
	}
	
	public function descargada_quever()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('quever_m');
		$id = $this->input->post('id');
		$result = $this->quever_m->descargada_quever($id);
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay peliculas o series"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));
	
		}
	
	}
		
	public function vista_quever()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('quever_m');
		$id = $this->input->post('id');
		$result = $this->quever_m->vista_quever($id);
		header('Content-Type: application/json');
		if(count($result) == 0)
		{
			echo json_encode(array("status" => "ERROR", "msg" => "No hay peliculas o series"));
		}
		else
		{
			echo json_encode(array_merge(array("status" => "OK", "aaData" =>  $result)));
	
		}
	
	}

	public function sendMailGmail()
	{
		//cargamos la libreria email de ci
		$this->load->library("email");
 
		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'daniel.zas.dacosta',
			'smtp_pass' => 'password',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);
 
		$this->email->from('nombre o correo que envia');
		$this->email->to("para quien es");
		$this->email->subject('Bienvenido/a a uno-de-piera.com');
		$this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');
		$this->email->send();
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());
	}

	public function trae_pulsar()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$this->load->model('pulsar_m');
		$result1 = $this->pulsar_m->trae_pulsar('Dani', 1);
		$result2 = $this->pulsar_m->trae_pulsar('Elena', 2);
		$usuario = array('usuario' => $_SESSION['user_id']);
		$result = $result1 + $result2 + $usuario;
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
	
	public function anadir_pulsar()
	{
		$this->load->model('users_m');
		if($this->users_m->login() == false) exit();
		$datos_array = array(
				'valor' => $this->input->post('valor'),
				'userID' => $_SESSION['user_id'],
		);
		$this->load->model('pulsar_m');
		$result = $this->pulsar_m->anadir_pulsar($datos_array);
		echo json_encode(array('status' => 'OK'));
		exit();
	
	}
	

}

/* End of file mc.php */
/* Location: ./application/controllers/mc.php */