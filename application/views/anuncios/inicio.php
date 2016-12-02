<!DOCTYPE html>
<html>
	<head>
		<title>InmobItla</title>
<link rel="icon" type="image/png" href="<?php echo base_url('img/favicon.png');?> ">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('img/favicon-32x32.png');?> ">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('img/favicon-96x96.png');?> ">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('img/favicon-16x16.png');?> ">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="<?php echo base_url('css/stylea.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
		<link rel="stylesheet" href="<?php echo base_url('css/reset.css'); ?>">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta name="keywords" content="Flat Cart Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<!--google fonts-->
		<link href='https://fonts.googleapis.com/css?family=Kreon:400,700,300' rel='stylesheet' type='text/css'>
	</head>
	<body>	
		<nav class="nav navbar-inverse  navbar-fixed-top">
			<div class="container-fluid">
			    <div class="navbar-header">
				<a href="#" class="navbar-brand"><img src="<?php echo base_url('img/logof.png'); ?>" class="img-responsive" alt="logo" width="100" height="100"></a>
			    </div>
			    <div class="nav navbar-nav navbar-right">
				  	<div class="navbar-form">
				    	<form  role="search" method="post" action="<?php echo base_url('anuncio/filtrar'); ?>">
				    		
				    	   	<div class="input-group">
						      <input type="text" name='filtro' class="form-control" placeholder="Buscar..">
						      <span class="input-group-btn">
						        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"> </span></button>
						      </span>
						    </div>
							<div class="btn-group">
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtrar <span class="caret"></span>
						  	</button>
						  	<ul class="dropdown-menu">
							  	<?php
							  		foreach ($tipos as $tipo) {
							  			echo "<li><a href='". base_url("anuncio/cate/{$tipo->id}") ."'>{$tipo->tipo}</a></li>";
							  		}
							  	
							  	?>
							    <li role="separator" class="divider"></li>
							    <li><a href="<?php echo base_url('anuncio'); ?>">Todas las categorias</a></li>
							    <li><a class="btn-info" href="<?php echo base_url('anuncio/modoMapa'); ?>">Modo mapa</a></li>
						  	</ul>
						</div>
						<div class="btn-group">
							  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  	Perfil <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
							  	<li><a href="<?php echo base_url("usuario"); ?>"><span class="glyphicon">&#xe008;</span> Mi perfil</a></li>
							  	<li><a href="<?php echo base_url('anuncio/misAnuncios'); ?>"><span class="glyphicon glyphicon-paperclip"></span> Mis anuncios</a></li>
                                                                <li><a href="<?php echo base_url('anuncio/pAnuncios'); ?>"><span class="glyphicon glyphicon-send"></span> Publicar Anuncios</a></li>
                                                                <?php 
                                                                	if($_SESSION['tipo'] == 'admin'){
				      			echo "<li><a href=". base_url('admin/usuarios') ."> <span class='glyphicon glyphicon-eye-open'></span> Ver Usuarios</a>
				      			</li>
						      	<li>
						      		<a href=". base_url('admin/opcionesTipos') ."><span class='glyphicon glyphicon-pencil'></span> Acciones y tipos de inmuebles</a>
					      		</li>";
                                                                	}
                                                                ?>
							  	<li role="separator" class="divider"></li>
							    <li><a href="<?php echo base_url('seguridad/logOut'); ?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
							  </ul>
							</div>
		    			</div>
					</form>	
			    </div>
		    </div>
		</nav>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="container">
			<div class="row">
				
				<br>
				<br>
				<div class="panel-group">
					<div class='panel panel-primary'>
						<div class='panel-heading'>
                                                 <h1 class="panel-title">Anuncios</h1>
                                                 </div>
				<?php
				    if(count($anuncios)>0){
				      foreach ($anuncios as $anuncio) {
				        echo "
				          <div class='element-main'>
				            <div class='element-left'>
				            ";
				          foreach ($fotos as $foto) {
				            if ($foto->anuncio == $anuncio->id) {
				                echo "<img src='". base_url('img/').$foto->foto ."' class='img-rounded' width='220' height='200'>
				                      </div>";
				                   break;
				                }
				          	}
					        echo " 
				              	<div class='element-rit'>
					                <h4>propietario</h4>
					                <h2>{$anuncio->titulo}</h2>
					                <p>{$anuncio->descripcion}</p>
					                  <div class='tour'>
					                    <div class='price'>
					                      <h3>{$anuncio->precio}</h3>
					                    </div>
				                 	<div class='clear'> </div>
			                  	</div>
					                 
					            <div class='comprar'>
					                <a href='". base_url("anuncio/detalles/{$anuncio->id}") ."'>Ver Completo</a>
					            </div>
					                  
					        </div>
				     		<div class='clear'> </div>
				            </div>        
					        ";          
					      } 
					    } else{
				          		echo "<div class='panel-footer text-center'><h2>Ningun resultado :(</h2></div>";
				          	}
					          
					   ?>		
					</div>
				</div>
				<div class="text-center">
					<?php
						if (isset($pagination)) {
							echo $pagination;
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>