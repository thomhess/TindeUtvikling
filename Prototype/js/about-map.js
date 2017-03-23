function initMap() {
        var venabygd = {lat: 61.529, lng: 10.147};
        
        var map = new google.maps.Map(document.getElementById('aboutmap'), {
          zoom: 8,
          center: venabygd
        });
        var marker = new google.maps.Marker({
          position: venabygd,
          map: map
        });
      }