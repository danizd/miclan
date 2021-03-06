<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Controller {
   public function index()
   {
      $this->load->library('form_validation');

      //   $this->config->set_item('language', 'spanish');      //   Setear dinámicamente el idioma que deseamos que ejecute nuestra aplicación
      if(!isset($_POST['username'])){   //   Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.   
         $this->load->view('login');      //   Por lo tanto le presentamos la pantalla del formulario de ingreso.
      }
      else{   
         $this->form_validation->set_rules('username', 'Username', 'required');
         $this->form_validation->set_rules('password','password','required');
         if(($this->form_validation->run()==FALSE)){            //   Verificamos si el usuario superó la validación
            $this->load->view('login');                     //   En caso que no, volvemos a presentar la pantalla de login
         }
         else{                                       //   Si ambos campos fueron correctamente rellanados por el usuario,
            $this->load->model('users_m');
            $result = $this->users_m->make_login();
           if(isset($result['make_login_result']) && isset($result['make_login_result']['status']) && $result['make_login_result']['status'] == 'success') redirect('mc/pulsometro', 'refresh');
            $this->load->view('login', $result);

         }

      }
   }
   public function logout()
   {
      $this->load->helper('url');
      $this->load->model('users_m');
      if($this->users_m->login() == false) redirect('/', 'refresh');

      $result = $this->users_m->logout();
      redirect('mc/index', 'refresh');
   }

}
?>