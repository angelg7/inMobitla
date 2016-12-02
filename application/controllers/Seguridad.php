<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Seguridad extends CI_Controller {

		public function __construct()
		{
			define('NOLOGIN','true');
			parent::__construct();
			$this->load->model('usuario_model');
			$this->load->library('form_validation');	
		}

		public function index()
		{
			$this->load->view('usuario/login');
		}
		
		public function registro(){
		$_POST['tipo'] = 'normal'; 
	        if($this->input->post()){   
	        	if (isset($_SESSION['id'])){
	        		if ($_POST['email'] == $_SESSION['email']){
		        		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	        		}
	        		else{
	       				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuario.email]');
	        		}
		        	if ($_POST['cedula'] == $_SESSION['cedula']){
		        		$this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[3]');
		        	}
		        	else{
		        		$this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[3]|is_unique[usuario.cedula]');
		        	}	
		        	if($_SESSION['tipo'] == 'admin'){
		        		$_POST['tipo'] == 'admin';
		        	}
        		}		
	        	else
	        	{
            		$this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[3]|is_unique[usuario.cedula]');
            		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuario.email]');
            	}
            	$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]');
            	$this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[3]');
            	$this->form_validation->set_rules('celular', 'Celular', 'required');
            	$this->form_validation->set_rules('fax', 'Fax', 'min_length[3]');
            	$this->form_validation->set_rules('clave', 'Clave', 'required');
    
  		        $this->form_validation->set_message('is_unique', 'Este %s pertenece a otro usuario');
            	$this->form_validation->set_message('min_length[3]','El campo %s debe tener un mínimo de tres(3) caracteres');
            	$this->form_validation->set_message('required','El campo %s es obligatorio'); 
            	$this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
            	$this->form_validation->set_message('matches','Las contrasenas no coinciden');
               	         	
	            if($this->form_validation->run()!= false){
        			if ($_POST['id']){
        				
        				$imagen="fP";
					$direccion=$_FILES['foto']['tmp_name'];
					$nombreArchivo=$_FILES['foto']['name'];
					$cd = $_POST['cedula'];
					move_uploaded_file($direccion,$imagen."/".$cd.$nombreArchivo);
					
					$_POST['foto'] = $cd.$nombreArchivo; 
					$this->usuario_model->registrar($_POST);
					$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Tus datos han sido actualizados', 'bt' => 'info', 'link' => 'anuncio');
        				
        				
        			}
        			else
        			{	
        			
        				
        				$imagen="fP";
					$direccion=$_FILES['foto']['tmp_name'];
					$nombreArchivo=$_FILES['foto']['name'];
					$cd = $_POST['cedula'];
					move_uploaded_file($direccion,$imagen."/".$cd.$nombreArchivo);
					
					$_POST['foto'] = $cd.$nombreArchivo; 
					
        				$this->usuario_model->registrar($_POST);
						$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Felicidades, ahora posees una cuenta', 'bt' => 'info', 'link' => 'seguridad');
					}
					
					
					$this->load->view('mensaje',$dat);
            	}
            	else
            	{
	            	$usuario = new stdClass();
					foreach ($_POST as $campo => $valor) {
						$usuario->$campo = $valor;
					}
					$data['usuario'] = $usuario;
					$data['error'] = validation_errors();
					if ($_SESSION['tipo'] == 'admin'){
						$this->load->view('admin/adminNav');	
					}
					else{
						$this->load->view('usuario/userNav');
					}
					$this->load->view('usuario/registrarse',$data);
            	}
        	}
		}

		public function login()
		{
			$email = $this->input->post('email');
			$clave = $this->input->post('clave');
			if($usuario = $this->usuario_model->iniciarSesion($email,$clave))
			{
				$_SESSION['id'] = $usuario->id;
				$_SESSION['email'] = $usuario->email;
				$_SESSION['tipo'] = $usuario->tipo;
				$_SESSION['cedula'] = $usuario->cedula;
				redirect('anuncio');
			}
			else
			{
				$data = array('titulo' => 'Error', 'mensaje' => 'Este usuario no existe o la contraseña es incorrecta.', 'bt' => 'danger', 'link' => 'seguridad');
				$this->load->view('mensaje', $data);
			}
		}
		
		public function singUp()
		{
			$this->load->view('usuario/registrarse');
		}

		function logOut()
		{
			session_destroy();
			redirect('welcome');
		}
	}
?>