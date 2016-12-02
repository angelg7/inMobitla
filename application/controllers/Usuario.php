<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');
	}

	public function index()
	{
		$datos['usuario'] = $this->usuario_model ->cargarUsuario($_SESSION['id']);
		if ($_SESSION['tipo'] == 'admin'){
			$this->load->view('admin/adminNav',$datos);	
		}
		else{
			$this->load->view('usuario/userNav');
		}
		$this->load->view('usuario/perfil',$datos);
	}
	
	public function editarPerfil($id = ''){
		$datos['usuario'] = $this->usuario_model ->cargarUsuario($id);
		if ($_SESSION['tipo'] == 'admin'){
			$this->load->view('admin/adminNav');	
		}
		else{
			$this->load->view('usuario/userNav');
		}
		$this->load->view('usuario/registrarse',$datos);	
	}

}

