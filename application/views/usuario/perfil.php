<!DOCTYPE html>
<html>
<head>
<title>Perfil</title>
<link rel="icon" type="image/png" href="<?php echo base_url('img/favicon.png');?> ">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('img/favicon-32x32.png');?> ">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('img/favicon-96x96.png');?> ">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('img/favicon-16x16.png');?> ">
<style type="text/css">
	.perfilFoto{border-radius: 250px; width: 100px; height: 100px;}
</style>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href="<?php echo base_url('css/stylep.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic'); ?> rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="main">
		<div class="agile_main_grid">
			<div class="agile_main_grid_left">
			<br>
			<br>
				<div class="agile_main_grid_left1">
                    		
                    		<img class="perfilFoto" src="<?php echo base_url("fP/{$usuario->foto}"); ?>"/> 
					<h2>Mi Perfil</h2>
				</div>
				<div class="top-nav">
				<div class="clearfix"></div>
			     </div>
			</div>

        <div class="agile_main_grid_left_grid">
            <div class="agile_main_grid_left2">
                
                <h3><?php echo (isset($usuario->nombre)?$usuario->nombre:'') ; ?> <br><a href="mailto:info@example.com"><?php echo (isset($usuario->email)?$usuario->email:'') ; ?></a></h3>
                <p><?php echo (isset($usuario->informacion)?$usuario->informacion:'') ; ?></p>
                <div class="agile_main_grid_left2_grid">
                    <div class="agile_main_grid_left2_grid_left">
                        <h4>Anuncios</h4>
                        <h2><?php echo (isset($usuario->cuenta)?$usuario->cuenta:'') ; ?></h2>
                        <br>
                    </div>
                    <div class="agile_main_grid_left2_grid_left">
                        <h4>Contactos</h4>
                        <h2>Tel.<?php echo (isset($usuario->telefono)?$usuario->telefono:'') ; ?></h2>
                        <h2>Cel.<?php echo (isset($usuario->celular)?$usuario->celular:'') ; ?></h2>
                        <h2>Fax. <?php echo (isset($usuario->fax)?$usuario->fax:'') ; ?></h2>
                    </div>
                    <div class="agile_main_grid_left2_grid_left">
                        <h4>Cedula</h4>
                        <h2><?php echo (isset($usuario->cedula)?$usuario->cedula:'') ; ?></h2>
                        <br>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="agile_main_grid_left2_grid_bottom">
                    <a href="<?php echo base_url('anuncio/misAnuncios');?>">Mis Anuncios</a>
                </div>
                <br>
                <div class="agile_main_grid_left2_grid_bottom">
                    <a href="<?php echo base_url("usuario/editarPerfil/{$_SESSION['id']}"); ?>">Editar Perfil</a>
                </div>
            </div>
        </div>
       </div>
    </div>
</body>
</html>