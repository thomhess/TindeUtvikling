<!-- Til å brukes på tomteside -->
<?php
// Fetching other php-files to be used
require_once('../classes/geopts.php');
require_once('../classes/dblogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Map</title>
    <link rel="stylesheet" type="text/css" href="maps.css">
    <script>
    <?php
        $feltnr = isset($_GET['feltnr']) ? $_GET['feltnr'] : 1;
        
        
        $tomtnummere = $geopts->tomter($feltnr);
    
        $geopointsList = array_map(function($tomtenr) {
            global $feltnr;
            global $geopts;
            return $geopts->fetchgeopts($feltnr, $tomtenr);
        }, $tomtnummere);

        echo 'var geopointsList = ' . json_encode($geopointsList) . ';';
        
        foreach ($geopts->fetcharea($feltnr) as $row ){
            echo 'var maplat = ' . $row['lat'] . ';';
            echo 'var maplng = ' . $row['lng'] . ';';
        }
    ?>
    </script>
    <script src="maps.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK90Dd0f4oVwQRhyxmIXiHQhP_5SUQNY0&callback=initialize"></script>
    
</head>
<body>
  <div id="map-canvas"></div>
  <?php
    
    
    foreach ($geopts->fetchtomt(1,1) as $row ){
        echo $row['status_solgt'];
    }
    
    ?>
  
  

</body>
</html>