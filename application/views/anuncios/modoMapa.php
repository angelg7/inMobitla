    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 90%; width: 70%; float: right;}
      #accordion {height: 90%; width: 30%; float: left;}
      .panel-info {border: 0px}
      li{list-style: none;}

    </style>    
    <div id="map"></div>
    
    <?php 
    echo "
    <script>
      function initMap() {
        var myLatLng = {lat: 19, lng: -70.5};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: myLatLng
        });

        var array_marcadores = new Array();
      ";

      foreach ($anuncios as $marcador) {
        echo "
          var newMarker = new google.maps.Marker({
            map: map,
            position: {lat: {$marcador->latitud}, lng: {$marcador->longitud} },
            icon: '". base_url("img/iconm1.png") ."'
          });

          google.maps.event.addListener(newMarker,'click',function() {
            ver({$marcador->id});
          });
          array_marcadores.push(newMarker);
        ";
      }
      echo "}
        function ver(id) {
            document.getElementById('c'+id).click();
        }

      </script>";

    ?>
    
   <div class="panel-group panel-info" id="accordion">
    <div class='panel-heading text-center'>
      <h4 class='panel-title'>Resumen de anuncio</h4>
    </div>
    
    
  
    <?php
      foreach ($anuncios as $anuncio) {
        echo "  

      <div class='panel panel-info'>
        <div id='collapse{$anuncio->id}' class='panel-collapse collapse'>
          <div class='panel-body text-center'>
              <li><h4>{$anuncio->titulo}</h4></li>
              {$anuncio->accions} {$anuncio->tipos} en {$anuncio->direccion} por un precio de {$anuncio->precio}
          </div>
          <div class='text-center panel-footer'>
            <a href='". base_url("anuncio/detalles?id={$anuncio->id}") ."' class='btn btn-info'>Ver anuncio completo</a>
          </div>
        </div>
      </div>
      <a id='c{$anuncio->id}' data-toggle='collapse' data-parent='#accordion' href='#collapse{$anuncio->id}'></a>";
      }  
    ?>
	<div class='alert alert-success alert-dismissible fade in'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      Haz click en algún anuncio para ver información previa.
    </div>
  </div>
    
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqu2yUntU-GUpg_XWyAQWoFbVjcO9F9lc&signed_in=true&callback=initMap"></script>  
    
      
  </body>
</html>


