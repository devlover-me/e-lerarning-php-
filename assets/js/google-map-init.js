var locations = [
      ['Head Office', 41.38506389999999, 2.1734034999999494, 'https://dl.dropboxusercontent.com/u/157053521/marker-blue.png'],
      ['Sub Office', 41.3850519497068, 2.1846485137939453, 'https://dl.dropboxusercontent.com/u/157053521/marker-green.png'],
      ['Local Office', 41.37487637142832, 2.1726322174072266, 'https://dl.dropboxusercontent.com/u/157053521/marker-red.png']
    ];

var map = new google.maps.Map(document.getElementById('trd-map'), {
    scrollwheel: false,
    styles: [{"featureType":"administrative.neighborhood","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"hue":"#ffa900"}]}],
        center: new google.maps.LatLng(41.38376398983456,  2.1755504608154297)
    });

var infowindow = new google.maps.InfoWindow();
var marker, i;
var markers = new Array();
for (i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map,
    icon: locations[i][3]
  });
  markers.push(marker);
  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent(locations[i][0]);
      infowindow.open(map, marker);
    }
  })(marker, i));
}

function AutoCenter() {
  var bounds = new google.maps.LatLngBounds();
  $.each(markers, function (index, marker) {
  bounds.extend(marker.position);
  });
  map.fitBounds(bounds);
  var listener = google.maps.event.addListener(map, "idle", function() { 
  if (map.getZoom() > 6) map.setZoom(13); 
      google.maps.event.removeListener(listener); 
});
}
AutoCenter();