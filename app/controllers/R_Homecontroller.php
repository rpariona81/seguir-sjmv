<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        if ($this->session->userdata('user_guard') != NULL) {
            redirect(base_url() . $this->session->userdata('user_guard'));
        }
        //$this->load->view('home');
        $this->load->view('auth/login');
    }

    /*public function viewLogin()
	{
		$this->load->view('auth/login');
	}*/

    public function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        //print_r($username);
        $this->load->library('LoginLib');
        $util = new LoginLib();
        $checkUser = $util->getLogin($username, $password);
        if($checkUser){
            redirect(site_url($this->session->userdata('user_guard')));
        }else{
            // Display error message
            $this->session->set_flashdata('flashError', 'Error de usuario y/o contraseña o usuario desactivado.');
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->clear_cache();
        //$this->session->set_userdata(array('user_id' => '', 'isLogged' => FALSE));
        session_destroy();
        $this->session->sess_destroy();
        redirect('/');
    }

    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}

/* End of file Controllername.php */