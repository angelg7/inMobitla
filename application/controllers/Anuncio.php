<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Anuncio extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('usuario_model');
			$this->load->library('form_validation');
			$this->load->model('anuncio_model');
		}

		public function index($categoria)
		{
			header('Location: ' . base_url("anuncio/anuncios/{$categoria}"));
		}

		public function anuncios($categoria = '')
		{
			$this->load->library('pagination');

			$config['base_url'] = base_url() . 'anuncio/anuncios/';
			$config['total_rows'] = $this->anuncio_model->getRows();
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['num_links'] = 5;

			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			
		 	$this->pagination->initialize($config);
		
			$datos = $this->anuncio_model->accionesTipos();		
			$datos['anuncios'] = $this->anuncio_model->getPaginacion($config['per_page'],$categoria);	
			$datos['fotos'] = $this->anuncio_model->getFoto();
			$datos['pagination'] = $this->pagination->create_links();
			$this->load->view('anuncios/inicio',$datos);
			$this->load->library('pagination');
		}
		
		public function editarAnuncio($id = '' ){
			$anuncio = new stdClass();
			foreach ($_POST as $campo => $valor) {
				$anuncio->$campo = $valor;
			}
			$data = $this->anuncio_model->accionesTipos();
			$data['anuncio'] = $this->anuncio_model ->cargarAnuncio($id);
			if ($_SESSION['tipo'] == 'admin'){
				$this->load->view('admin/adminNav');	
			}
			else{
				$this->load->view('usuario/userNav');
			}
			$this->load->view('anuncios/publicarAnuncio',$data);		
		}

		public function misAnuncios()
		{
			$datos = array();
			$datos['anuncios'] = $this->anuncio_model->getMisAnuncios();
			$datos['fotos'] = $this->anuncio_model->getFoto();
			if ($_SESSION['tipo'] == 'admin'){
				$this->load->view('admin/adminNav');	
			}else{
				$this->load->view('usuario/userNav');
			}
			$this->load->view('anuncios/misAnuncios',$datos);
		}

		public function modoMapa()
		{
			$datos = array();
			$datos['anuncios'] = $this->anuncio_model->getAnuncios();
			if ($_SESSION['tipo'] == 'admin'){
				$this->load->view('admin/adminNav');	
			}
			else{
				$this->load->view('usuario/userNav');
			}
			$this->load->view('anuncios/modoMapa',$datos);
		}

		public function pAnuncios(){
			$datos = $this->anuncio_model->accionesTipos();
			if ($_SESSION['tipo'] == 'admin'){
				$this->load->view('admin/adminNav');	
			}else{
				$this->load->view('usuario/userNav');
			}
			$datos = $this->anuncio_model->accionesTipos();
			$this->load->view('anuncios/publicarAnuncio', $datos);
			
		}
		
		public function imageType(){
			$nombreArchivo=$_FILES['fotos']['name'];
			for($i = 0; $i < count($nombreArchivo); $i++){
				$cadena_de_texto = $nombreArchivo[$i];
				$cadena_buscada   = '.jpg'  ;
				$cadena_buscada2 = '.png';
				$cadena_buscada3 = '.gif';
				$cadena_buscada4 = '.jpeg';
				$cadena_buscada5 = '.JPG';
				$cadena_buscada6 = '.PNG';
				$cadena_buscada7 = '.GIF';
				$cadena_buscada8 = '.JPEG';
				$valido= strrpos($cadena_de_texto, $cadena_buscada);
				$valido2= strrpos($cadena_de_texto, $cadena_buscada2);
				$valido3= strrpos($cadena_de_texto, $cadena_buscada3);
				$valido4= strrpos($cadena_de_texto, $cadena_buscada4);	
				$valido5= strrpos($cadena_de_texto, $cadena_buscada5);
				$valido6= strrpos($cadena_de_texto, $cadena_buscada6);
				$valido7= strrpos($cadena_de_texto, $cadena_buscada7);
				$valido8= strrpos($cadena_de_texto, $cadena_buscada8);	
				if(!$valido and !$valido2 and !$valido3 and !$valido4 and !$valido5 and !$valido6 and !$valido7 and !$valido8 )
					return FALSE;	
				else
					return TRUE; 	
			}
		}
		
		public function limite(){
			$direccion=$_FILES['fotos']['tmp_name'];
			if (count($direccion) > 10)
				return FALSE;
			else
				return TRUE;
		}
		
		public function requiredd(){
			$direccion=$_FILES['fotos']['tmp_name'];
			if ($direccion[0] == null)
				return FALSE;
			else
				return True;
		}

		public function checkAnuncios(){
	        if($this->input->post()){                                               
	            $this->form_validation->set_rules('titulo', 'Titulo', 'required|min_length[3]');
	            $this->form_validation->set_rules('direccion', 'Direccion', 'required|min_length[3]');
	            $this->form_validation->set_rules('tipo', 'Tipo', 'required');
	            $this->form_validation->set_rules('precio', 'Precio','required|min_length[3]');
	            $this->form_validation->set_rules('accion', 'Accion', 'required');
		    	$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
			    if ($_POST['id']){
			    
			    }else{
			    	$this->form_validation->set_rules('fotos', 'Fotos', 'callback_requiredd|callback_imageType|callback_limite');
			    }
			    $this->form_validation->set_rules('latitud', 'Latitud', 'required');
			    $this->form_validation->set_rules('longitud', 'Longitud', 'required');		

	            $this->form_validation->set_message('min_length[3]','hola');
	            $this->form_validation->set_message('required','El campo %s es obligatorio'); 
	            $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
	            $this->form_validation->set_message('imageType','El Tipo de imagen no es valida , solo se admiten: .JPEG , .PNG , .GIF');
	            $this->form_validation->set_message('limite','No puede subir mas de 10 fotos');	
	            $this->form_validation->set_message('requiredd','El campo %s es obligatorio'); 
	            if($this->form_validation->run()!= false){ 
	            	$_POST['usuario'] = $_SESSION['id'];
	            	$this->anuncio_model->registrarAnuncios($_POST);	
					$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Anuncio publicado', 'bt' => 'info', 'link' => 'anuncio');
					$imagen="img";
					$_FILES['name'] = "fg";
					$direccion=$_FILES['fotos']['tmp_name'];
					$nombreArchivo=$_FILES['fotos']['name'];
					
					$id = $this->db->insert_id();
					for($i = 0; $i < count($direccion); $i++){
						move_uploaded_file($direccion[$i],$imagen."/".$id.$nombreArchivo[$i]);
						
						$datos = array(
						'anuncio' => $id,
						'foto' => $id.$nombreArchivo[$i],
						);
					if($_POST['id']){
					}else{	
					$this->db->insert('fotos',$datos);
					}
					}
					$this->load->view('mensaje',$dat);
	            }else{
	            	$anuncio = new stdClass();
					foreach ($_POST as $campo => $valor) {
						$anuncio->$campo = $valor;
					}
					$data = $this->anuncio_model->accionesTipos();
					$data['anuncio'] = $anuncio;
					$data['error'] = validation_errors();
					if ($_SESSION['tipo'] == 'admin'){
						$this->load->view('admin/adminNav');	
					}else{
						$this->load->view('usuario/userNav');
					}
					$this->load->view('anuncios/publicarAnuncio',$data);
	            }
	        }
		}

		public function detalles($id='')
		{
			if($id){
				$datos = $this->anuncio_model->getInfo($id);
				if ($_SESSION['tipo'] == 'admin'){
					$this->load->view('admin/adminNav');	
				}
				else{
					$this->load->view('usuario/userNav');
				}
				$this->load->view('anuncios/detalles',$datos);
			}else{
				redirect('anuncio');
			}
		}

		public function filtrar()
		{
			if($_POST['filtro'])
			{
				extract($_POST);
				$dato = $this->anuncio_model->accionesTipos();
				$dato['anuncios'] = $this->anuncio_model->filtrar($filtro);
				$dato['fotos'] = $this->anuncio_model->getFoto();
				$this->load->view('anuncios/inicio',$dato);
			}else{
				redirect('anuncio');
			}
		}
		
		public function est($id='')
		{
			if($id){
				$this->anuncio_model->est($id);
				$dat = array('titulo' => 'Mensaje', 'mensaje' => 'El estado de su anuncio ha cambiado', 'bt' => 'info', 'link' => 'anuncio/misAnuncios');
				$this->load->view('mensaje',$dat);
			}else{
				$dat = array('titulo' => 'Error', 'mensaje' => 'Ha ocurrido algun error', 'bt' => 'danger', 'link' => 'anuncio/misAnuncios');
				$this->load->view('mensaje',$dat);
			}
		}
		
		public function cate($cate){
			$datos = $this->anuncio_model->accionesTipos();
			$datos['anuncios'] =  $this->anuncio_model->cate($cate);
			$datos['fotos'] = $this->anuncio_model->getFoto();
			$this->load->view('anuncios/inicio',$datos);
		}
			
	}
?>