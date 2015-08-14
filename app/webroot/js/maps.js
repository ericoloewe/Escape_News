var map;
var pointer = new google.maps.LatLng(-29.6887157,-51.1401334);
	
function map_init() {			
    var mapoptions = {
        center: pointer,
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        panControl:false,
        rotateControl:false,
        streetViewControl: false
    };
    map = new google.maps.Map(document.getElementById("map-container"),
        mapoptions);
      
    var contentString = 
		'<div id="mapInfo">'+
		'<p><strong>Escape</strong><br>'+
		'R. Felipe Bernd, 87, sala 01, B. Rio Branco, CEP: 93310-170 <br>'+
        'Novo Hamburgo/RS - Brasil<br>'+
		'P: +55 (51) 3065-2624</p>'+
		'<a href="http://www.escape.ppg.br/" target="_blank">Venha nos visitar</a>'+
		'</div>';
 
    var infowindow = new google.maps.InfoWindow({
    content: contentString
    });
          
    var marker = new google.maps.Marker({
    position: pointer,
    map: map,
    title:"Clique para obter informações sobre o K9",
            maxWidth: 400,
            maxHeight: 200
    });
 
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString);
        infowindow.open(map,marker);
    });
}
 
    google.maps.event.addDomListener(window, 'load', map_init);

    $(function () {
        //start of modal google map
        $('#contato').on('shown.bs.modal', function () {
            google.maps.event.trigger(map, "resize");
            map.setCenter(pointer);
        });
    });