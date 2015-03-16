var map;
var pointer = new google.maps.LatLng(-29.6932058,-51.2229969);
	
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
		'<p><strong>K9StreetPoker</strong><br>'+
		'Rua Professor Miguel de Vargas, 285<br>'+
        'Portao/RS - Brasil<br>'+
		'P: +55 (51) 9834-0648</p>'+
		'<a href="http://www.k9streetpoker.com/" target="_blank">Venha nos visitar</a>'+
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