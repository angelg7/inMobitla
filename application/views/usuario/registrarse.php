<!DOCTYPE html>
<html>
	<head>
		<title>Registrarse</title>
<link rel="icon" type="image/png" href="<?php echo base_url('img/favicon.png');?> ">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('img/favicon-32x32.png');?> ">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('img/favicon-96x96.png');?> ">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('img/favicon-16x16.png');?> ">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
		<br>
		<br>
		<div class="panel panel-info">
				<div class="panel-heading">	
					<h4 class="panel-title">Ingresa tus datos</h4>
				</div>
				<div class="panel-body">
					<form method="post"  enctype="multipart/form-data" autocomplete="off" action="<?php echo base_url('seguridad/registro') ?>">	
						<div class="col-sm-6">
							<input type="hidden" name="id" value="<?php echo (isset($usuario->id)?$usuario->id:''); ?>">
							<div class="form-group input-group">
								<label for="nombre" class="input-group-addon">Cedula</label>
								<input type="text" max="13" value="<?php echo (isset($usuario->cedula)?$usuario->cedula:''); ?>" name="cedula" class="form-control" />
							</div>
							<div class="form-group input-group">
								<label for="email" class="input-group-addon">Email</label>
								<input type="email" value="<?php echo (isset($usuario->email)?$usuario->email:''); ?>" name="email" class="form-control" />
							</div>
							<div class="form-group input-group">
								<label for="clave" class="input-group-addon">Nombre</label>
								<input type="text" value="<?php echo (isset($usuario->nombre)?$usuario->nombre:''); ?>" name="nombre" class="form-control" />
							</div>
							<div class="form-group input-group">
								<label for="clave" class="input-group-addon">Apellido</label>
								<input type="text" value="<?php echo (isset($usuario->apellido)?$usuario->apellido:''); ?>" name="apellido" class="form-control" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group input-group">
								<label for="clave" class="input-group-addon">Telefono</label>
								<input type="phone" value="<?php echo (isset($usuario->telefono)?$usuario->telefono:''); ?>" name="telefono" class="form-control" />
							</div>
							<div class="form-group input-group">
								<label for="clave" class="input-group-addon">Celular</label>
								<input type="phone" value="<?php echo (isset($usuario->celular)?$usuario->celular:''); ?>" name="celular" class="form-control" />
							</div>
							<div class="form-group input-group">
								<label for="clave" class="input-group-addon">Fax</label>
								<input type="text" value="<?php echo (isset($usuario->fax)?$usuario->fax:''); ?>" name="fax" class="form-control" />
							</div>
							<div class="form-group input-group">
								<label for="clave" class="input-group-addon">Clave</label>
								<input type="password"  name="clave" class="form-control" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group input-group">
								<label for="clave" class="input-group-addon">Mas informacion</label>
								<textarea row=5 name="informacion" class="form-control" ><?php echo (isset($usuario->informacion)?$usuario->informacion:''); ?></textarea>
							</div>
							
							<div class="form-group input-group">
								<label for="foto" class="input-group-addon">Foto de Perfil</label>
								<input type="file" name="foto" class="form-control"/>
							</div>
						</div>	
					</div>
					<div class="panel-footer">
						<button class="btn btn-info" type="submit">Registrarse</button>
						<a class="btn btn-warning btn-bg" href="<?php echo base_url('seguridad'); ?>">Login</a>
					</div>			
				</form>
			</div>
			<br>
			<br>
			<br>
			<?php
				if(isset($error)){
					echo "
						<div class=\"panel panel-danger\">
						  <div class=\"panel-heading\">Algo no esta bien</div>
						  <div class=\"panel-body\" >{$error}</div>
						</div>
					";
				}
			?>
			</div>				
		</div>
	</body>
</html>





