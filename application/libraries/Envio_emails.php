<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Envio_emails {

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function enviaEmail($a, $mensaje)
    {

		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.miclan.info',
			'smtp_port' => 26,
			'smtp_user' => 'info@miclan.info',
			'smtp_pass' => 'cadena300',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    
 
		//cargamos la configuración para enviar con gmail
		$ci = get_instance();
		$ci->load->library('email');
		$ci->email->initialize($configGmail);
		$ci->email->from('info@miclan.info');
		$ci->email->to($a);
		$ci->email->subject('Mensaje de MICLAN');
		$ci->email->message($mensaje);
		$ci->email->send();

		//con esto podemos ver el resultado
		//var_dump($ci->email->print_debugger());

    }

}