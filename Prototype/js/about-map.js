function initMap() {
        var ringebu = {lat: 61.529, lng: 10.147};
    
        
        var map = new google.maps.Map(document.getElementById('aboutmap'), {
          zoom: 8,
          center: ringebu
        });
        var marker = new google.maps.Marker({
          position: ringebu,
          map: map
        });
        
        map.setOptions({scrollwheel: false, disableDoubleClickZoom: true});
      }

