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
      }), 'solgt' : geopoints[0].solgt, 'id' : geopoints[0].tomtenr, 'gnr' : geopoints[0].gnr, 'areal' : geopoints[0].areal, 'pris' : geopoints[0].pris, 'tekst' : geopoints[0].tekst};
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
      
      poly.metadata = {id : triangleCoords.id, gnr : triangleCoords.gnr, areal : triangleCoords.areal, pris : triangleCoords.pris, tekst : triangleCoords.tekst};
      return poly;
  });

  for (var polygon of polygons) {
      polygon.addListener('click', function(){
          //do stuff when a polygon is clicked
          console.log(this.metadata.id);
          console.log(this.metadata.gnr);
          console.log(this.metadata.areal);
          console.log(this.metadata.pris);
          console.log(this.metadata.tekst);
          
          tomtebox = $("#tomtebox");
          tomtebox.html("<h3>Tomt: " + this.metadata.id + " </h3><p>Pris: " + this.metadata.pris + " </p><p>Gårdsnr.: " + this.metadata.gnr + " </p><p>Areal: " + this.metadata.areal + "m2</p><p>Merknad: " + this.metadata.tekst + "</p>");
          
          
      });
      polygon.setMap(map);
  }  
    
}


