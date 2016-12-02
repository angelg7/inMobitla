		<div class="container">
			<br>
			<br>
			<div class="panel panel-info">
				<div class="panel-heading">	
					<h4 class="panel-title">Agregar usuario administrador</h4>
				</div>
				<div class="panel-body">
					<form method="post" autocomplete="off" action="<?php echo base_url('admin/registro') ?>">	
						<div class="col-sm-6">
							<input type="hidden" name="id" value="<?php echo (isset($usuario->cedula)?$usuario->cedula:''); ?>">
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
								<input type="password" value="<?php echo (isset($usuario->clave)?$usuario->clave:''); ?>" name="clave" class="form-control" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group input-group">
								<label for="clave" class="input-group-addon">Mas informacion</label>
								<textarea row=5 name="informacion" class="form-control" ><?php echo (isset($usuario->informacion)?$usuario->informacion:''); ?></textarea>
							</div>
							<button class="btn btn-info" type="submit">Agregar Usuario</button>
						</div>			
					</form>
				</div>
				<div class="panel-footer">
					<br>
					<form role="search" method="post" action="<?php echo base_url('admin/usuarios'); ?>">   
						<div class="col-sm-4">
				    	   	<div class="input-group">
								<h4 class="input-group-addon">Usuarios</h4>
						      	<input type="text" name='filtro' class="form-control" placeholder="Buscar..">
						      	<span class="input-group-btn">
						        	<button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						      	</span>
						    </div>
						</div> 	
				    </form>
				    <br>
				    <br>
					<div class="container-fluid">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Cedula</th>
									<th>Email</th>
									<th>Telefono</th>
									<th>Celular</th>
									<th>___</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($usuarios as $usuario) {
										$linkDel = base_url("admin/del/{$usuario->id}");
										$linkInfo = base_url("admin/info/{$usuario->id}");
										echo "<tr>
												
												<td>{$usuario->nombre} {$usuario->apellido}</td>
												<td>{$usuario->cedula}</td>
												<td>{$usuario->email}</td>
												<td>{$usuario->telefono}</td>
												<td>{$usuario->celular}</td>
												<td><a href='{$linkInfo}' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a>
												<a href='{$linkDel}' class='btn btn-danger btn-sm'><span class=\"glyphicon glyphicon-trash\"></span></a></td>
											</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
