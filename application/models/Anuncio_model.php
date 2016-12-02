<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Anuncio_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function registrarAnuncios($anuncios){
		if($anuncios['id']){
			$this->db->where('id =',$anuncios['id']);
			$this->db->update('anuncios',$anuncios);	
		}
		else{
			$this->db->insert('anuncios', $anuncios);
		}
	}
	
	function guardarFoto($id,$nombreArchivo){
		$datos = array('anuncio' => $id, 'foto' => $nombreArchivo);
		$this->db->insert('fotos',$datos);
	}

	public function getFoto()
	{
		$this->db->group_by('anuncio');
		$fotos = $this->db->get('fotos')->result();
		return $fotos;
	}
	
	
	public function getAnuncios($categoria = '')
	{
		if ($categoria) 
		{
			$this->db->where('anuncios.tipo =',$categoria);
		}
		$this->db->where('est=',1);
		$this->db->select("anuncios.*, tipos.tipo tipos, acciones.accion  accions");
		$this->db->join('tipos','anuncios.tipo = tipos.id');
		$this->db->join('acciones','anuncios.accion = acciones.id');
		$dato = $this->db->get('anuncios')->result();
		return $dato;	
	}
	
	public function getInfo($id)
	{
		$this->db->select("anuncios.*, tipos.tipo tipos, acciones.accion  accions, usuario.*");
		$this->db->join('tipos','anuncios.tipo = tipos.id');
		$this->db->join('acciones','anuncios.accion = acciones.id');
		$this->db->join('usuario', 'anuncios.usuario = usuario.id');
		
		$datos['anuncio'] = $this->db->get('anuncios')->result()[0];
		$this->db->where('anuncio=',$id);
		$datos['fotos'] = $this->db->get('fotos')->result();
		return $datos;
	}

	public function getMisAnuncios()
	{
		$datos = array();
		$this->db->where('usuario=',$_SESSION['id']);
		$datos = $this->db->get('anuncios')->result();
		return $datos;
	}

	public function filtrar($filtro)
	{
		$this->db->where('titulo like',"%{$filtro}%");
		$this->db->select("anuncios.*, tipos.tipo tipos, acciones.accion  accions");
		$this->db->join('tipos','anuncios.tipo = tipos.id');
		$this->db->join('acciones','anuncios.accion = acciones.id');

		$dato = $this->db->get('anuncios')->result();
		return $dato;	
	}

	public function getRows()
	{
		$dato = $this->db->query("select count(*) as numero from anuncios")->row();
		return $dato->numero;
	}

	public function getPaginacion($numeroPorPagina,$categoria = '')
	{
		$this->db->where('anuncios.est=',1);
		$this->db->select("anuncios.*, tipos.tipo tipos, acciones.accion  accions");
		$this->db->join('tipos','anuncios.tipo = tipos.id');
		$this->db->join('acciones','anuncios.accion = acciones.id');
		$dato = $this->db->get('anuncios',$numeroPorPagina, $this->uri->segment(3))->result();
		return $dato;
	}

	public function accionesTipos()
	{
		$datos = array();
		$datos['acciones'] = $this->db->get('acciones')->result();
		$datos['tipos'] = $this->db->get('tipos')->result();
		return $datos;
	}
	
	public function cargarAnuncio($id)
	{
		$anuncio = new stdclass();
		$anuncio->id = "";
		$anuncio->titulo = "";
		$anuncio->direccion = "";
		$anuncio->tipo = "";
		$anuncio->precio = "";
		$anuncio->accion = "";
		$anuncio->descripcion = "";
		$anuncio->longitud = "";
		$anuncio->latitud = "";
		$this->db->where('id=',$id );
		$rs = $this->db->get('anuncios')->result()[0];
		if (count($rs) > 0)
		{
			if($rs->usuario == $_SESSION['id'])
			{
				return $rs;
			}else{
				redirect('seguridad/logOut');
			}
		}
		return $anuncio;
	}

	public function cate($cate){
		$this->db->where('anuncios.tipo=',$cate);
		$this->db->where('anuncios.est=',1);
		$this->db->select("anuncios.*, tipos.tipo tipos, acciones.accion accions");
		$this->db->join('tipos','anuncios.tipo = tipos.id');
		$this->db->join('acciones','anuncios.accion = acciones.id');
		$datos = $this->db->get('anuncios')->result();
		return $datos;
	}
	
	public function est($id)
	{
		$this->db->where('id=', $id);
		$anuncio = $this->db->get('anuncios')->result()[0];
		if ($anuncio->usuario == $_SESSION['id']) {	
			if($anuncio->est==0){
				$anuncio->est = 1;
			}else{
				$anuncio->est = 0;
			}
			$this->db->where('id=',$id);
			$this->db->update('anuncios',$anuncio);
		}else{
			redirect('seguridad/singOut');
		}
		
	}	
}
