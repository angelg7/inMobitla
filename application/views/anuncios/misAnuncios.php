        <br>
	<br>
	<div class="container">
		<div class="row">
			<a href="<?php echo base_url('anuncio/modoMapa'); ?>" class="btn btn-info">Modo mapa</a>
			<br>		
			<br>
			<div class="panel-group">
				<div class='panel panel-primary'>
					<div class='panel-heading'><h1 class='panel-title'>Mis Anuncios</h1></div>
                   	<?php
                        
				foreach ($anuncios as $anuncio) {
					if ($anuncio->est == 1) {
						$editar = 'Desabilitar';
					}else{
						$editar = 'Habilitar';
					}
					echo "
					
                                              <div class='element-main'>
						<div class='panel-body'>
                                                   ";
                        echo "
				          
				            <div class='element-left'>
                            ";
								foreach ($fotos as $foto) {
									if ($foto->anuncio == $anuncio->id) {
										echo "<img src='". base_url('img/').$foto->foto ."' class='img-rounded' width='220' height='200'>";
										break;
									}

								}
                    echo "
							</div>
                            </div>
					    
						<div class='panel-footer'>
                        
							<a class='btn btn-primary' href=".base_url('anuncio/detalles?id=')."{$anuncio->id}>Verlo Completo</a>
							<a class='btn btn-info' href=".base_url('anuncio/est/')."{$anuncio->id}>{$editar}</a>
							<a class='btn btn-warning' href=".base_url("anuncio/editarAnuncio/{$anuncio->id}")." > Editar</a>
                                         
				            </div>
                            </div>";
				}

			?>	
				</div>
			</div>
		</div>
	</div>
</body>
<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="<?php echo base_url('css/stylea.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
		<link rel="stylesheet" href="<?php echo base_url('css/reset.css'); ?>">
		<link href='https://fonts.googleapis.com/css?family=Kreon:400,700,300' rel='stylesheet' type='text/css'>
	</head>
</html>	