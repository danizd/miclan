<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends CI_Model{

	public function login()
	{
		session_start();
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == "yes" && isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['name']) && isset($_SESSION['user_full_name'])) return true;
		else return false;
	}

	public function make_login()
	{
		$attempt_limit = 5;
		
		$result = array();

		$flag_failed = 1;

		$post_user = $this->input->post('username');
		$post_password = $this->input->post('password');

		$user_ip = $this->input->ip_address();

		$condition = array (
								'username' => $post_user,
								'ip' => $user_ip,
								'attempt_date >' => date("Y-m-d H:i:s", time()-1800),
								'is_failed' => "1"
							);

	//	$this->load->database('microb',TRUE);

		$this->load->model('users_m');


		$this->db->where($condition);
		$query = $this->db->get('admin_login_attempts');
		$r = $query->num_rows();

		if($r > $attempt_limit)
		{
			$result['make_login_result'] = array('status' => 'error', 'type' => 'login_attempts_exceeded');
			$flag_failed = 1;
			$flag_attempts_exceeded = 1;
		}
		else if (empty($post_user) || empty($post_password))
		{
			$result['make_login_result'] = array('status' => 'error', 'type' => 'invalid_password');
			$flag_failed = 1;
		}
		else
		{
			$condition = array(
									'username' => $post_user,
									'password_hash' => crypt($post_password, $this->config->item('salt'))
								);

			$this->db->where($condition);
			$check_user_credentials_query = $this->db->get('admin_users');
			$check_user_credentials_result = $check_user_credentials_query->result_array();
			

			if(count($check_user_credentials_result) == 1)
			{
				if(isset($check_user_credentials_result['0']['blocked']) && $check_user_credentials_result['0']['blocked'] == true)
				{
					$result['make_login_result'] = array('status' => 'error', 'type' => 'user_is_not_allowed');
					$flag_failed = 1;
				}
				else
				{
					$user_id = (string)$check_user_credentials_result['0']['admin_users_id'];
					$username = $check_user_credentials_result['0']['username'];
					$name = $check_user_credentials_result['0']['name'];
					$user_full_name = (empty($check_user_credentials_result['0']['lastname'])) ? $check_user_credentials_result['0']['name'] : $check_user_credentials_result['0']['name'] . " " . $check_user_credentials_result['0']['lastname'];
					$flag_failed = 0;
				}
			}
			else
			{
				$result['make_login_result'] = array('status' => 'error', 'type' => 'invalid_password');
				$flag_failed = 1;
			}
		}

		$login_attempts_array = array (
										'username' => (string)$post_user,
										'ip' => $user_ip,
										'attempt_date' => date("Y-m-d H:i:s"),
										'is_failed' => ($flag_failed) ? "1" : "0",
										);

		if(empty($flag_attempts_exceeded)) $this->db->insert('admin_login_attempts', $login_attempts_array);

		if(empty($flag_failed))
		{	
			session_start();
			$_SESSION['logged_in'] = "yes";
			$_SESSION['user_id'] = $user_id;
			$_SESSION['username'] = $username;
			$_SESSION['name'] = $name;
			$_SESSION['user_full_name'] = $user_full_name;
	//		$_SESSION['user_role'] = $user_role;
			if(file_exists($this->config->item('avatars_path') . $user_id . '.jpg'))
			{
				$_SESSION['avatar'] = $user_id . '.jpg';
			}
			$result['make_login_result'] = array('status' => 'success');
		}
/*	
		$pass = crypt('cadena', '$5$rounds=5000$p1o1h3b4g6s4fgfd5j7fb7n6$');
		echo $pass;
		die;
	*/
		return $result;
	}

	public function logout()
	{
		$_SESSION = array();

		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		session_destroy();
	}



}