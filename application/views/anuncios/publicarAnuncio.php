		<br>
		<br>
		<div class="container text-center">
			<div class="panel panel-info">
				<div class="panel-heading">	
					<h3 class="panel-title">Datos del anuncio</h3>
				</div>
				<div class="panel-body">
					<form method="post" autocomplete="off" action="<?php echo base_url('anuncio/checkAnuncios') ?>" enctype="multipart/form-data">	
						<div class="row">
							<div class="col col-sm-6">
								<input type="hidden" value="1" name="est"/>
								<input type="hidden" value="<?php echo isset($anuncio->id)?$anuncio->id:'';?>" name="id"/>
								<div class="form-group input-group">
									<label for="titulo" class="input-group-addon">Titulo</label>
									<input type="text" value="<?php echo isset($anuncio->titulo)?$anuncio->titulo:''; ?>" name="titulo" class="form-control" />
								</div>
								<div class="form-group input-group">
									<label for="direccion" class="input-group-addon">Direccion</label>
									<input type="text" value="<?php echo isset($anuncio->direccion)?$anuncio->direccion:''; ?>" name="direccion" class="form-control" />
								</div>
								<div class="form-group input-group">
									<label for="tipo" class="input-group-addon">Tipo</label>
									<select type="text" name="tipo" class="form-control" >
										<option></option>
									<?php
										foreach ($tipos as $tipo) {
											if ($anuncio->tipo == $tipo->id) {
												echo "<option value=\"{$tipo->id}\" selected>{$tipo->tipo}</option>";
											}else{
												echo "<option value=\"{$tipo->id}\" >{$tipo->tipo}</option>";
											}

										}

									?>
									</select>
								</div>
								<div class="form-group input-group">
									<label for="precio" class="input-group-addon">Precio</label>
									<input type="number" value="<?php echo isset($anuncio->precio)?$anuncio->precio:''; ?>" name="precio" class="form-control" />
								</div>
							</div>
							<div class="col col-sm-6">
								<div class="form-group input-group">
									<label for="accion" class="input-group-addon">Accion</label>
									<select type="text" name="accion" class="form-control" >
										<option></option>
									<?php
										foreach ($acciones as $accion) {
											if ($anuncio->accion == $accion->id) {
												echo "<option value=\"{$accion->id}\" selected>{$accion->accion}</option>";
											}else{
												echo "<option value=\"{$accion->id}\" >{$accion->accion}</option>";
											}

										}

									?>
									</select>
								</div>
								<div class="form-group input-group">
									<label for="descripcion" class="input-group-addon">Descripcion</label>
									<input type="text" value="<?php echo isset($anuncio->descripcion)?$anuncio->descripcion:''; ?>" name="descripcion" class="form-control" />
								</div>
								<div class="form-group input-group">
									<label for="latitud" class="input-group-addon">Latitud</label>
									<input type="text" readonly name="latitud" id="latitud" class="form-control" value="<?php echo isset($anuncio->latitud)?$anuncio->latitud:''; ?>" >
								</div>
								<div class="form-group input-group">
									<label for="longitud" class="input-group-addon">Longitud</label>
									<input type="text" readonly name="longitud" id="longitud" class="form-control" value="<?php echo isset($anuncio->longitud)?$anuncio->longitud:''; ?>" >
								</div>
							</div>
						</div> 
						<div class="col">
							<div class="form-group input-group">
								<label for="fotos" class="input-group-addon">Fotos</label>
								<input type="file" multiple="true" name="fotos[]" accept="image/*" class="form-control" />
							</div>
						</div>
						<div class="panel panel-default">
					        <div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#collapse1">Seleccionar ubicacion</a>
								</h4>
					        </div>
							<div id="collapse1" class="panel-collapse">
								<div id="map" style="width:100%;height:400px"></div>
							</div>
			  			</div>	
						<div class="text-center">
							<button class="btn btn-primary" type="submit">Publicar</button>			
						</div>	
					</div>
				</div>
			</form>	
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
	</body>
</html>
<script>
  function initMap() {
    var myLatLng = {lat: 19, lng: -70.5};
    
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: myLatLng
    });

    google.maps.event.addListener(map, 'click', function(event) {
      placeMarker(map, event.latLng);
    });

    var marcado = false;
    var array_marcadores = new Array();
    
    function placeMarker(map, location) {
  		if(marcado){  
            array_marcadores[0].setMap(null);
            array_marcadores.splice(0);
  		}
        var newMarker = new google.maps.Marker({
      		map: map,
      		position: location
      	});
		document.getElementById("latitud").value = location.lat();
		document.getElementById("longitud").value = location.lng(); 
		array_marcadores.push(newMarker);
      
        var infowindow = new google.maps.InfoWindow({
          content: 'Latitude: ' + location.lat() +
          '<br>Longitude: ' +location.lng()
        });
        infowindow.open(map,newMarker);
        marcado = true;    
    }
	}

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqu2yUntU-GUpg_XWyAQWoFbVjcO9F9lc&signed_in=true&callback=initMap"></script>