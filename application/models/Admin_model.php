<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function cargarUsuarios($filtro = '')
	{
		if ($_SESSION['tipo'] == 'admin') {	
			if ($filtro){
				$this->db->where('nombre like', "%{$filtro}%");
				$this->db->where('apellido like', "%{$filtro}%");
			}	
			$this->db->where('tipo =','normal');
			$usuarios = $this->db->get('usuario')->result();
			return $usuarios;
		}else{
			redirect('seguridad/logOut');
		}
	}
	
	public function getAnuncios()
	{
		$this->db->where('est=',1);
		$this->db->select("anuncios.*, tipos.tipo tipos, acciones.accion  accions");
		$this->db->join('tipos','anuncios.tipo = tipos.id');
		$this->db->join('acciones','anuncios.accion = acciones.id');
		$dato = $this->db->get('anuncios')->result();
		return $dato;	
	}
	
	public function getFoto()
	{
		$this->db->group_by('anuncio');
		$fotos = $this->db->get('fotos')->result();
		return $fotos;
	}
	
	
	public function info($id = '')
	{
		if ($_SESSION['tipo'] == 'admin') {
			if($id){
				$this->db->where('id =', $id);	
				$datos['usuario'] = $this->db->get('usuario')->result()[0];
				$this->db->where('usuario=',$id);
				$this->db->select("anuncios.*, tipos.tipo tipos, acciones.accion  accions");
				$this->db->join('tipos','anuncios.tipo = tipos.id');
				$this->db->join('acciones','anuncios.accion = acciones.id');
				$datos['anuncios'] = $this->db->get('anuncios')->result();
				
				if($datos['usuario']->tipo == 'normal'){
					return $datos;
				}
				return null;
			}
		}else{
			redirect('seguridad/logOut');
		}
	}
	
	public function del($id){
		if ($_SESSION['tipo'] == 'admin') {
			$this->db->where('id =', $id);	
			$usuario = $this->db->get('usuario')->result()[0];
			if($usuario->tipo == 'normal'){
				$this->db->where('id=',$id);
				$this->db->delete('usuario');
				return true;
			}
			return false;
		}
		else
		{
			redirect('seguridad/logOut');
		}
	}
	
	public function delAnuncio($id){
		if ($_SESSION['tipo'] == 'admin') {
			$this->db->where('anuncio=',$id);
			$fotos = $this->db->get('fotos')->result();
			foreach ($fotos as $foto) {
				unlink("img/{$foto->foto}");	
			}
			$this->db->where('id=',$id);
			if($this->db->delete('anuncios')){
				return true;
			}
			return false;
		}else{
			redirect('seguridad/logOut');
		}
	}
	
	public function accionesTipos()
	{
		$datos = array();
		$datos['acciones'] = $this->db->get('acciones')->result();
		$datos['tipos'] = $this->db->get('tipos')->result();
		return $datos;
	}

	public function getAccion($id='')
	{
		$this->db->where('id=',$id);
		$accion = $this->db->get('acciones')->result();
		return $accion;

	}

	public function getTipo($id='')
	{
		$this->db->where('id=',$id);
		$tipo = $this->db->get('tipos')->result();
		return $tipo;
	}

	public function newAccion($accion,$id='')
	{
		if ($id) {
			$this->db->where('id=', $id);
			$this->db->update('acciones', $accion);
		}else{
			$this->db->insert('acciones', $accion);
		}
	}

	public function newTipo($tipo,$id='')
	{
		if ($id) {
			$this->db->where('id=', $id);
			$this->db->update('tipos', $tipo);
		}else{
			$this->db->insert('tipos', $tipo);
		}
	}
}

