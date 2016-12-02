<!DOCTYPE html>
<html>
  <head>
    <title>InmobiItla</title>
<link rel="icon" type="image/png" href="<?php echo base_url('img/favicon.png');?> ">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('img/favicon-32x32.png');?> ">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('img/favicon-96x96.png');?> ">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('img/favicon-16x16.png');?> ">

    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  </head>
	<body>	
		<nav class="nav navbar-inverse  ">
			<div class="container-fluid">
			    <div class="navbar-header">
			      <a href="<?php echo base_url(); ?>" class="navbar-brand"><img src="<?php echo base_url('img/logof.png'); ?>" class="img-responsive" alt="logo" width="140" height="140"></a>
			    </div>
			    
			    <div class="nav navbar-nav navbar-right">
				  	<div class="navbar-form">	
						<div class="btn-group">
						  	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Perfil <span class="caret"></span></button>
						  	<ul class="dropdown-menu">
							  	<li><a href="<?php echo base_url("usuario"); ?>"><span class="glyphicon">&#xe008;</span> Mi perfil</a></li>
							  	<li><a href="<?php echo base_url('anuncio/misAnuncios'); ?>"><span class="glyphicon glyphicon-paperclip"></span> Mis anuncios</a></li>
							  	<li><a href="<?php echo base_url('anuncio/pAnuncios'); ?>"><span class="glyphicon glyphicon-send"></span> Publicar anuncio</a></li>
							    <li><a href="<?php echo base_url('seguridad/logOut'); ?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
						  	</ul>
						</div>
					</div>
				</div>
	    	</div>
		</nav>