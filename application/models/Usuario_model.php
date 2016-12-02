<?php

	defined('BASEPATH') or exit('No direct script access allowed');

	Class Usuario_model extends CI_Model{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function registrar($usuario){
			$usuario['clave'] = "DhjKT{$usuario['clave']}7ThEl";
	        	$usuario['clave'] = md5($usuario['clave']);
	        	//var_dump($usuario);
	        	//echo $usuario['id'];
	        	//exit();
	        	
			if($usuario['id']){
				$this->db->where('id =',$usuario['id']);
				$this->db->update('usuario',$usuario);	
		
			}
			else{
			
				
				$this->db->insert('usuario', $usuario);

				

$para  = $usuario['email']; 

$título = "Hola {$usuario['nombre']} {$usuario['apellido']} Bienbenido a InmoBi Itla";

// mensaje
$mensaje = "

<!DOCTYPE html>
<html>
<head>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 5px solid #4ef4f2;
    width: 80%;
}

.modal-header {
    padding: 2px 16px;
    background-color: #26bdef;
    color: white;
}

.modal-body {padding: 20px 16px;}

.modal-footer {
    padding: 1px 16px;
    background-color: #26bdef;
    color: white;
}
</style>
</head>
<body>


  <!-- Modal content -->
  <div class='modal-content'>
    <div class='modal-header'>
	
      <h2>Bienvenido a inMobi ITLA</h2>
    </div>
    <div class='modal-body'>
	<img src='aventcar.com/img/logof.jpg); ?>'>
      <p>Gracias Por Subscribirte a Nuestra Comunidad</p>
      <p>Para Continuar con Nuestro Servicios <a>Click Aqui.</a></p>
    </div>
    <div class='modal-footer'>
      <h3>Inicia sesion en <a href='Aventcar.com'>Aventcar.com</a></h3>
    </div>
  </div>

</div>

</body>
</html>
";

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);

			}
		}

		function iniciarSesion($usr, $clv)
		{
			$clv = "DhjKT{$clv}7ThEl";
            		$clv = md5($clv); 
			$this->db->where('email=',$usr);
			$this->db->where('clave=',$clv);

			$query = $this->db->get('usuario');
			$rs = $query->result();

			if (count($rs) > 0) {
				$usuario = $rs[0];
				return $usuario;
			}

			return false;
		}
		
		
		function cargarUsuario($id)
		{		
			$this->db->where('id=',$id );
			$usuario = $this->db->get('usuario')->result()[0];
			$this->db->select("count(*) anuncios");
			$this->db->where('usuario =', $id);
			$resultado = $this->db->get('anuncios')->result()[0];
			$usuario->cuenta = $resultado->anuncios;
			
			return $usuario;
	
		}

	}



?>
