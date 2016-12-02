		<br>
		<br>
		<div class="container">
			<div class="col-sm-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-tile">Acciones</h4>
					</div>
					<div class="panel-body">
						<form autocomplete="off" action="<?php echo base_url('admin/newAccion/'); echo isset($accion->id)?$accion->id:'';; ?>" method="post">
							<div class="input-group form-gorp text-center">
								<label class="input-group-addon" for="accion">Accion</label>
								<input class="form-control" type="text" name="accion" id="accion" value="<?php echo isset($accion->accion)?$accion->accion:''; ?>">
							</div>
							<br>
							<button type="summit" class="btn btn-info">Acerptar</button>
						</form>
					</div>
					<?php
						if (isset($errorAccion)) {
							echo "
							<div class='panel panel-danger'>
								<div class='panel-heading'>
									<h4 class='panel-title'>Algo no esta bien</h4>
								</div>
									{$errorAccion}
								</div>";
							}
						?>
					<div class="panel-footer">
						<div class="container-fluid">
							<table class="table table-hover">
								<thead>
									<tr>	
										<th>ID</th>
										<th>Accion</th>
										<th>__</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($acciones as $accion) {
											$linkEdit = base_url("admin/editAccion/{$accion->id}");
											echo "
											<tr>
												<td>{$accion->id}</td>
												<td>{$accion->accion}</td>
												<td><a href='{$linkEdit}' class='btn btn-info btn-sm' ><span class='glyphicon glyphicon-pencil'></span></a></td>
											</tr>
											";
										}
									?>
								</tbody>
							</table>	
						</div>
					</div>
				</div>
			</div><div class="col-sm-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-tile">Tipos de inmuebles</h4>
					</div>
					<div class="panel-body">
						<form autocomplete="off" action="<?php echo base_url('admin/newTipo/'); echo isset($tipo->id)?$tipo->id:'';; ?>" method="post">
							<div class="input-group form-gorp text-center">
								<label class="input-group-addon" for="tipo">Tipo</label>
								<input class="form-control" type="text" name="tipo" id="tipo" value="<?php echo isset($tipo->tipo)?$tipo->tipo:''; ?>">
							</div>
							<br>
							<button type="summit" class="btn btn-info">Acerptar</button>
						</form>
					</div>
					<?php
						if (isset($errorTipo)) {
							echo "
							<div class='panel panel-danger'>
								<div class='panel-heading'>
									<h4 class='panel-title'>Algo no esta bien</h4>
								</div>
										 {$errorTipo}
								</div>";
							}
						?>
					<div class="panel-footer">
						<div class="container-fluid">
							<table class="table table-hover">
								<thead>
									<tr>	
										<th>ID</th>
										<th>tipo</th>
										<th>__</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($tipos as $tipo) {
											$linkEdit = base_url("admin/editTipo/{$tipo->id}");
											echo "
											<tr>
												<td>{$tipo->id}</td>
												<td>{$tipo->tipo}</td>
												<td><a href='{$linkEdit}' class='btn btn-info btn-sm' ><span class='glyphicon glyphicon-pencil'></span></a></td>
											</tr>
											";
										}
									?>
								</tbody>
							</table>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
			
