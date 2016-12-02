<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$_SESSION['tipo'] == 'admin'){
			redirect('seguridad/logOut');
		}
		
		$this->load->model('admin_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('admin/adminNav');
		$this->load->view('usuario/perfil');
	}

	public function usuarios()
	{
		if ($_POST) {
			$filtro =  $_POST['filtro'];
		} else {
			$filtro = '';
		}

		$datos['usuarios'] = $this->admin_model->cargarUsuarios($filtro);
		$this->load->view('admin/adminNav');
		$this->load->view('admin/usuarios', $datos);
	}
	
	public function registro(){
		if($this->input->post()){   
		        $this->form_validation->set_rules('cedula', 'Cedula', 'required|min_length[3]|is_unique[usuario.cedula]');
		        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuario.email]');
		        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]');
		        $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[3]');
		        $this->form_validation->set_rules('celular', 'Celular', 'required');
		        $this->form_validation->set_rules('fax', 'Fax', 'required|min_length[3]');
		        $this->form_validation->set_rules('clave', 'Clave', 'required|matches[passconf]');
		
		        $this->form_validation->set_message('is_unique', 'Este %s pertenece a otro usuario');
		        $this->form_validation->set_message('min_length[3]','El campo %s debe tener un mínimo de tres(3) caracteres');
		        $this->form_validation->set_message('required','El campo %s es obligatorio'); 
		        $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
		       	
		        if($this->form_validation->run()!= false){ 
		        	$_POST['tipo'] = 'admin';
		        	$this->usuario_model->registrar($_POST);
					$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Administrador agregado', 'bt' => 'info', 'link' => 'admin/usuarios');
					$this->load->view('mensaje',$dat);
		        }else{
		        	$usuario = new stdClass();
					foreach ($_POST as $campo => $valor) {
						$usuario->$campo = $valor;
					}
					$data['usuario'] = $usuario;
					$data['error'] = validation_errors();
					$data['usuarios'] = $this->admin_model->cargarUsuarios();
					$this->load->view('admin/adminNav');
					$this->load->view('admin/usuarios',$data);
		        }
		    }
		}
		
		public function info($id = ''){
			if($id){
				$datos = $this->admin_model->info($id);
				//$datos = $this->anuncio_model->accionesTipos();
				$datos['anuncios'] = $this->admin_model->getAnuncios();
				$datos['fotos'] = $this->admin_model->getFoto();
				$this->load->view('admin/adminNav');
				$this->load->view('admin/userInfo',$datos);
			}else{
				$this->usuarios();
			}
		}
		
		public function del($id=''){
			if($id){
				if($datos = $this->admin_model->del($id)){
					$dat = array('titulo' => 'Exito', 'mensaje' => 'Este usuario ha sido eliminado correctamente junto a sus anuncios publicados', 'bt' => 'success', 'link' => 'admin/usuarios');
					$this->load->view('mensaje',$dat);
				}else{
					$dat = array('titulo' => 'Error', 'mensaje' => 'No tienes permiso para eliminar un usuario administrador', 'bt' => 'danger', 'link' => 'admin/usuarios');
					$this->load->view('mensaje',$dat);
				}
			}else{
				$this->usuarios();
			}
		}
		
		public function delAnuncio($id = ''){
			if($id){
				if($this->admin_model->delAnuncio($id)){
					$dat = array('titulo' => 'Exito', 'mensaje' => 'Este anuncio ha sido eliminado correctamente', 'bt' => 'info', 'link' => 'admin');
				$this->load->view('mensaje',$dat);
				}else{
					$dat = array('titulo' => 'Error', 'mensaje' => 'Ha ocurrido un error al intentar eliminar el anuncio', 'bt' => 'danger', 'link' => 'admin');
					$this->load->view('mensaje',$dat);
				}
			}else{
				$dat = array('titulo' => 'Error', 'mensaje' => 'Este anuncio no existe', 'bt' => 'danger', 'link' => 'admin');
				$this->load->view('mensaje',$dat);
			}
			
		}
		
		public function opcionesTipos(){
			$datos = $this->admin_model->accionesTipos();
			$this->load->view('admin/adminNav');
			$this->load->view('admin/opTp',$datos);
		}

		public function newAccion($id='')
		{
			if ($this->input->post()) {
				if ($id) {
					$this->form_validation->set_rules('accion', 'Accion', 'required|min_length[3]');
				}else{
					$this->form_validation->set_rules('accion', 'Accion', 'required|min_length[3]|is_unique[acciones.accion]');
				}
		        $this->form_validation->set_message('min_length[3]','El campo %s debe tener un mínimo de tres(3) caracteres');
		        $this->form_validation->set_message('is_unique', 'Esta accion ya existe.');
		        $this->form_validation->set_message('required', 'Es obligatorio que indique la accion que desea agregar');
		         if($this->form_validation->run()!= false){ 
					$this->admin_model->newAccion($_POST,$id);		
		        	$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Accion agregada o editada correctamente', 'bt' => 'info', 'link' => 'admin/opcionesTipos');
					$this->load->view('mensaje',$dat);
		        }else{
		        	$accion = new stdClass();
					foreach ($_POST as $campo => $valor) {
						$accion->$campo = $valor;
					}
					$datos = $this->admin_model->accionesTipos();
					$datos['accion'] = $accion;
					$datos['errorAccion'] = validation_errors();
					$this->load->view('admin/opTp',$datos);
		        }
			}
		}

		public function editAccion($id='')
		{
			if ($id) {
				$datos = $this->admin_model->accionesTipos();
				$datos['accion'] = $this->admin_model->getAccion($id)[0];		
				$this->load->view('admin/adminNav');
				$this->load->view('admin/opTp',$datos);
			}
		}


		public function newTipo($id='')
		{
			if ($this->input->post()) {
				if ($id) {
					$this->form_validation->set_rules('tipo', 'Tipo', 'required|min_length[3]');
				}else{
					$this->form_validation->set_rules('tipo', 'Tipo', 'required|min_length[3]|is_unique[tipos.tipo]');
				}
			        $this->form_validation->set_message('min_length[3]','El campo %s debe tener un mínimo de tres(3) caracteres');
			        $this->form_validation->set_message('is_unique', 'Esta tipo de inmuelbe ya existe.');
			        $this->form_validation->set_message('required', 'Es obligatorio que indique el tipo de inmuelbe que desea agregar');
		         if($this->form_validation->run()!= false){ 
					$this->admin_model->newTipo($_POST,$id);		
		        	$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Tipo de inmuelbe agregado o editado correctamente', 'bt' => 'info', 'link' => 'admin/opcionesTipos');
					$this->load->view('mensaje',$dat);
		        }else{
		        	$tipo = new stdClass();
					foreach ($_POST as $campo => $valor) {
						$tipo->$campo = $valor;
					}
					$datos = $this->admin_model->accionesTipos();
					$datos['tipo'] = $tipo;
					$datos['errorTipo'] = validation_errors();
					$this->load->view('admin/adminNav');
					$this->load->view('admin/opTp',$datos);
		        }
			}
		}

		public function editTipo($id='')
		{
			if ($id) {
				$datos = $this->admin_model->accionesTipos();
				$datos['tipo'] = $this->admin_model->getTipo($id)[0];		
				$this->load->view('admin/adminNav');
				$this->load->view('admin/opTp',$datos);
			}
		}

}
