		<link href="<?php echo base_url('css/stylea.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		
		<div class="container">
			<br>
			<br>
			<div class="panel panel-info">
				<div class="panel-heading">	
					<h4 class="panel-title"><?php echo "{$usuario->nombre} {$usuario->apellido}"; ?></h4>
				</div>
				<div class="panel-body">
					<ul>
					<?php
						echo "
						<li><b>Cedula: </b>{$usuario->cedula}</li>
						<li><b>Email: </b>{$usuario->email}</li>
						<li><b>Telefono: </b>{$usuario->telefono}</li>
						<li><b>Celular: </b>{$usuario->celular}</li>
						<li><b>Fax: </b>{$usuario->fax}</li>
						<li><b>Informacion: </b>{$usuario->informacion}</li>
						";
					?>
					</ul>
				</div>
				<div class="panel-footer">				
					<div class='panel-info'>
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
					                <h4>{$usuario->nombre} {$usuario->apellido}</h4>
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
				          	echo "<div text-center'><h2>Ningun anuncio :(</h2></div>";
			          	}
					          
					   ?>		
					</div>
				</div>
			</div>
		</div>
	</body>
</html>