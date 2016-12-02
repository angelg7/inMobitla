	  	<style type="text/css">
	  		li{list-style: none;}
	  		#map{height: 25em}
	  	</style>
		<br>
		<br>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading ">
					<h3 class="panel-title"><?php echo $anuncio->titulo; ?></h3>
				</div>
				<div class="panel-body panel-info">
					<ul>
						<li><b>Categoria: </b><?= $anuncio->tipos ?></li>
						<li><b>Acci&oacute;n: </b><?= $anuncio->accions ?></li>
						<li><b>Direcci&oacute;n: </b><?= $anuncio->direccion ?></li>
						<li><b>RD$ <?= $anuncio->precio ?></b></li>
						<li><?= $anuncio->descripcion ?></li>
					</ul>
						
						<?php
							foreach ($fotos as $foto) {
								$url = base_url('img/');
								echo "
									<div class='col-md-3'>
								      <div class='thumbnail panel-info'>
								        <a href='{$url}{$foto->foto}' target='_blank'>
								          <img src='{$url}{$foto->foto}' class='imagen' alt='Img'>
								        </a>
								      </div>
								    </div>
								";
							}
						?>
				</div>
				<div class="panel-footer">
					<ul>
						<li><b><?= $anuncio->nombre." ".$anuncio->apellido ?></b></li>
						<li><?= $anuncio->celular ?></li>
						<li><?= $anuncio->email ?></li>
						<li><?= $anuncio->telefono ?></li>
						<li><?= $anuncio->fax ?></li>
					</ul>
				</div>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4 class="panel-title text-center">
						Ubicaci¨®n del anuncio
					</h4>
				</div>
				<div class="panel-body">
					<div id="map"></div>
				</div>
			</div>
	    <script>
			
			function myMap() {
			    var mapCanvas = document.getElementById("map");
			    var mapOptions = {
			        center: new google.maps.LatLng(19, -70.5),
			        zoom: 8
			    };
			    var map = new google.maps.Map(mapCanvas, mapOptions);
				var marker = new google.maps.Marker({
					position: {lat: <?php echo $anuncio->latitud ?>, lng: <?php echo $anuncio->longitud ?>},
					map: map
				});
		}	
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqu2yUntU-GUpg_XWyAQWoFbVjcO9F9lc&signed_in=true&callback=myMap"></script>


		</div>
	</body>
</html>