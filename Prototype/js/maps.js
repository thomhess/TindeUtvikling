//var myPolygon;
function initialize() {
  // Map Center
  var myLatLng = new google.maps.LatLng(maplat, maplng);
  // General Options
  var mapOptions = {
    zoom: 17,
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.RoadMap
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  
// Polygon Coordinates 
  var triangleCoordsList = geopointsList.map(function(geopoints) {
      return {'geo' : geopoints.map(function(geopoint) {
          return new google.maps.LatLng(geopoint.lat, geopoint.lng);
      }), 'solgt' : geopoints[0].solgt, 'id' : geopoints[0].tomtenr};
  });
    
  var polygons = triangleCoordsList.map(function(triangleCoords) {
      var poly =  new google.maps.Polygon({
            paths: triangleCoords.geo,
            editable: false,
            strokeColor: (triangleCoords.solgt == 0) ? '#FF0000' : "#00CE00",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: (triangleCoords.solgt == 0) ? '#FF0000' : "#00CE00",
            fillOpacity: 0.35
      });
      
      poly.metadata = {id : triangleCoords.id};
      return poly;
  });

  for (var polygon of polygons) {
      polygon.addListener('click', function(){
          //do stuff when a polygon is clicked
          console.log(this.metadata.id);
      });
      polygon.setMap(map);
  }  
}