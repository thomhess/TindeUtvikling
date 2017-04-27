<!-- Til å brukes på tomteside -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Map</title>
    <link rel="stylesheet" type="text/css" href="maps.css">
    <script src="maps.js"></script>
    <script>
         
        var triangleCoords = [
             <?php foreach($database as $row) { ?>
                new google.maps.LatLng( <?= $row['lat'] ?>,  <?= $row['lng'] ?>),
             <?php } ?>
          ];
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK90Dd0f4oVwQRhyxmIXiHQhP_5SUQNY0&callback=initMap"></script>
</head>
<body onload="initialize()">
  <div id="map-canvas"></div>

</body>
</html>