function initMap() {
        var venabygd = {lat: 61.668, lng: 10.240};
        var gala = {lat: 61.517, lng: 9.777}
        
        var map = new google.maps.Map(document.getElementById('indexmap'), {
          zoom: 8,
          center: venabygd
        });
        var marker = new google.maps.Marker({
          position: venabygd,
          map: map
        });
    
        var marker2 = new google.maps.Marker({
          position: gala,
          map: map
        });
        
        map.setOptions({scrollwheel: false, disableDoubleClickZoom: true});
      }