//var myPolygon;
function initialize() {
  // Map Center
  var myLatLng = new google.maps.LatLng(33.5190755, -111.9253654);
  // General Options
  var mapOptions = {
    zoom: 12,
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.RoadMap
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  // Polygon Coordinates
  var triangleCoords = [
    new google.maps.LatLng(33.5362475, -111.9267386),
    new google.maps.LatLng(33.5104882, -111.9627875),
    new google.maps.LatLng(33.5004686, -111.9027061)
  ];
    
   
    
    var triangleCoords2 = [
    new google.maps.LatLng(33.5362500, -111.9067387),
    new google.maps.LatLng(33.5104900, -111.9027876),
    new google.maps.LatLng(33.5105000, -111.9827062),
    new google.maps.LatLng(33.5205000, -111.9927062)
  ];
  // Styling & Controls
  myPolygon = new google.maps.Polygon({
    paths: triangleCoords,
    editable: false,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });
    
    myPolygon2 = new google.maps.Polygon({
    paths: triangleCoords2,
    editable: false,
    strokeColor: '#000000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF22222',
    fillOpacity: 0.35
  });

  myPolygon.setMap(map);
    myPolygon2.setMap(map);
  //google.maps.event.addListener(myPolygon, "dragend", getPolygonCoords);
  google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords);
  //google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
  google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords);
    
    google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords2);
  google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords2);
}