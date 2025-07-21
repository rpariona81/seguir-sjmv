<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_message('loginok', 'Usuario o clave incorrectos');
		$this->form_validation->set_message('Clave', 'Ingrese contraseña');
	}

	public function index()
	{
		//$this->load->view('test');
		$datos[0] = $this->session->userdata('user_guard');
		$this->login();
		//print_r($datos);

		/*$data['contenido'] = 'welcome';
		$this->load->view('homeTemplate', $data);*/
		//$data['versionDB'] = $this->db->version();
		//$data['content'] = 'home';
		//$this->load->view('templates/guest', $data);

		//$this->load->view('react/index', $data);
	}

	public function viewLogin()
	{
		$this->load->view('auth/login');
	}

	public function login()
	{
		//session_start();
		if ($this->session->userdata('user_guard')) {
			//print_r($datos);
			//echo "si hay sesion";
			redirect(base_url() . $this->session->userdata('user_guard') . '/index');
		} else {
			//echo "no hay sesion";
			//$this->login();
			//$this->load->view('auth/login');
			$this->viewLogin();
		}
		//$this->load->view('auth/login');
	}

	public function error404()
	{
		$this->load->view('auth/login');
	}

	public function auth()
	{
		$login = $this->input->post('username');
		$password = $this->input->post('password');

		if ($login != NULL && $password != NULL) {

			$this->form_validation->set_rules('username', 'Usuario', 'required|callback_loginok');
			$this->form_validation->set_rules('password', 'Clave', 'required');
			//si el proceso falla mostramos errores
			if ($this->form_validation->run() == FALSE) {
				//$this->index();
				//$this->session->set_flashdata('error', $checkUser['error']);
				//$this->session->set_flashdata('error', 'Error de usuario o contraseña.');
				//redirect_back();
				$this->login();
				//redirect('/login');
				//return redirect_back();
				//en otro caso procesamos los datos
			} else {
				//redirect('encuestacsc/index');
				redirect(site_url($this->session->user_guard) . '/index');
				//redirect('admin/users');
			}
		} else {
			//redirect('home/acceso_denegado');
			$this->session->set_flashdata('error', 'Ingrese su usuario y contraseña.');
			//$this->index();
			$this->login();
		}
	}

	public function loginok()
	{
		$login = $this->input->post('username');
		$password = $this->input->post('password');
		//return $this->Usuariolib->login($login, $password);
		$this->load->library('LoginLib');
		$util = new LoginLib();
		$checkUser = $util->getLogin($login, $password);
		print_r($checkUser);
		$this->session->set_flashdata('error', $checkUser['error']);
		return $checkUser['isLogged'];
		/*if($checkUser->isLogged){
            redirect('/admin/users');
        }else{
            // Display error message
            $this->session->set_flashdata('flashError', 'Error de usuario y/o contraseña o usuario desactivado.');
            redirect('/home');
        }*/
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function registroATR()
	{
		/*$data['contenido'] = 'registra_atr';
		$this->load->view('homeTemplate', $data);*/

		$data['content'] = 'registra_atr';
		$this->load->view('templates/guest', $data);
	}

	public function loadentidades()
	{
		if ($this->input->is_ajax_request()) {
			//echo "test<br>";
			$region = $this->input->post('cod_region');
			$tipo = $this->input->post('cod_tipo_entidad');
			/*$datos=[$region,$tipo];*/

			/*$region = '0300';
				$tipo = 3;*/
			$data['entidad'] = Entidad_eloquent::getEntidades($region, $tipo);
			//print_r(json_encode($data));
			/*	$data['entidad'] = Entidad_eloquent::getEntidades($region, $tipo);
				dd($data);
					exit;*/
			$output = null;
			foreach ($data['entidad'] as $row => $value) {
				//here we build a dropdown item line for each query result  
				$output .= "<option value='" . $row . "'>" . $value . "</option>";
			}
			echo $output;
			//return $output;
		}
	}

	public function grabaAsistencia()
	{
		$request = $this->security->xss_clean($this->input->post());
		$this->form_validation->set_rules('REGION', 'Región', 'required');
		$this->form_validation->set_rules('TIPO_ENTIDAD', 'Tipo de entidad', 'required');
		$this->form_validation->set_rules('ENTIDAD', 'Entidad', 'required');
		$this->form_validation->set_rules('NOMBRES', 'Nombres', 'trim|required');
		$this->form_validation->set_rules('CARGO', 'Cargo', 'trim|required');

		//si el proceso falla mostramos errores
		if ($this->form_validation->run() == FALSE) {
			//return redirect_back();
			$this->registroATR();
		} else {
			$result = Registroasistentes_eloquent::saveRecord($request);
			if ($result) {
				$this->session->set_flashdata('message', 'Estimado ' . $result['nombres'] . ' se grabó su registro.');
				//return redirect()->back()->with('message', 'User status updated successfully!');
				return redirect_back();
			} else {
				$this->session->set_flashdata('error', 'Error en registro.');
				return redirect_back();
			}
		}
	}

	/*public function acceso_denegado()
	{
		$guard_name = $this->uri->segment(1);
		$controller = $this->uri->segment(2);
		$action = $this->uri->segment(3);
		$url = $guard_name . "/" . $controller . "/" . $action;
		header('Content-Type: Application/json');
		echo $guard_name . '<br>';
		echo $controller . '<br>';
		echo $action . '<br>';
		echo $url . '<br>';
		echo json_encode($this->session->all_userdata());
	}*/
}
