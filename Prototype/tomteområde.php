<?php
require('classes/dbfetch.php');
require_once('classes/geopts.php');
require_once('classes/dblogin.php');

$dbtomteområde = new fetchTomteområder();
$tomteområde = checkExist($dbtomteområde);

$dbtomter = new fetchTomter();
$tomter = $dbtomter->fetchPerFeltnr($tomteområde["felt_nr"]);

/**
    * Scanner hva som ligger i filepathen til area_images på det aktive tomteområdet, og tar bort excess punktum.
*/
$tomteområdeImg = array_diff(scandir($tomteområde["area_images"]), array('..', '.'));


function checkExist($dbtomteområde) {
    if(isset($_GET["name"])) {
        if ($fetchTomteområde = $dbtomteområde->fetchSingle($_GET["name"])) {
            return $fetchTomteområde;
        } else {
            Header("Location: ../område.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tinde Utvikling</title>
    
    <!--bootstrap link -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--own css -->
    <link rel="stylesheet" type="text/css" href="../css/tinde.css">
    <link rel="stylesheet" type="text/css" href="../css/maps.css">
    <!--jquery and bootstrap js file-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
    <?php
        $feltnr = $tomteområde["felt_nr"];
        
        
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
    <script src="../js/maps.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK90Dd0f4oVwQRhyxmIXiHQhP_5SUQNY0&callback=initialize"></script>
    
</head>
<body>
    <div class="container">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
       
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="meny-knapp navbar-toggle pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Meny <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <li><a href="../index.php" >Hjem</a></li>
                    <li><a href="../område.php" >Områder</a></li>
                    <li><a href="../omoss.html" >Hvem er vi</a></li>
                    <li><a href="../kontakt.html" class="nav-contact">Kontakt</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
    </nav>

    <div class="container-fluid">
        <!--header-->
        <header>
            <div id="carousel" class="carousel slide carousel-fade" data-interval="0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                    <li data-target="#carousel" data-slide-to="4"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item">
                    </div>
                    <div class="item"></div>
                    <div class="item"></div>
                    <div class="item"></div>
                    <div class="item"></div>
                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="carousel-control right" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </header>
        <!--info tekst-->
        <div class="row"> 
            <div class="col-xs-11 col-xs-offset-1 col-md-4 col-md-offset-4 tomt-info">
                <h1><?php echo $tomteområde["navn"]?></h1>
                <a href="#"><img src="../img/facebooklogo.png " height="25" width="25" class="pull-right"></a>  
                <a href="#"><img src="../img/twitterlogo.png" height="25" width="25" class="pull-right"></a>
                <a href="#"><img src="../img/instalogo.png " height="25" width="25" class="pull-right"></a> 
            </div>      
        </div>
        <div class="row">       
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 tomt-info">              
                <h4>Feltnr: <?php echo $tomteområde["felt_nr"]?></h3>
                <h4>Område: <?php echo $tomteområde["area_name"]?></h3>
                <h4>Pris: Fra 109 000 til 7 000 000</h3>
                <p><?php echo $tomteområde["ingress"]?></p>
                <p><?php echo $tomteområde["tekst"]?></p>
                <a href="../kontakt.html" class="btn btn-default btn-lg btn-kontakt">Send forespørsel om området</a>
            </div>
        </div>
        <!--kart og tomte info-->
        <div class="row kart-row">              
            <div class="col-md-9 col-xs-12 kart-tomter">
                <div id="map-canvas"></div>
            </div>
            <div class="col-md-3 col-xs-12 dialog-boks">
               <div id="tomtebox">
                <h3>Klikk på en tomt i kartet for å få mer informasjon om tomten</h3>
                </div>
                <a href="../kontakt.html" class="btn btn-default btn-lg btn-kontakt">Send forespørsel på Tomt</a>

                <div class="center-block">
                    <a href="#"><img src="../img/facebooklogo.png " height="25" width="25"></a> 
                    <a href="#"><img src="../img/twitterlogo.png" height="25" width="25" ></a>
                    <a href="#"><img src="../img/instalogo.png " height="25" width="25" ></a>   
                </div>
                
            </div>
        </div>
        <!--mobil knapp for tomteliste-->
        <div class="row">
            <div class="col-xs-12 visTomteliste">
                <button type="button" id="filterKnapp" class="btn btn-default btn-md center-block">Vis tomteliste<span class="visLister glyphicon glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
            </div>
        </div>
        <!--tabell over tomtene-->
        <div class="row">
            <div class="col-md-7 col-md-offset-2 liste">            
                <table class="table">
                    <thead>
                      <tr>
                        <th>Tomt</th>
                        <th>Areal</th>
                        <th>Pris</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $tomterCount = count($tomter);

                        for ($i = 0; $tomterCount > $i; $i++) {
                            echo "<tr>";

                            echo "<td>" . $tomter[$i]["tomtenr"] . "</td>";
                            echo "<td>" . $tomter[$i]["areal"] . "</td>";
                            echo "<td>" . $tomter[$i]["pris"] . "</td>";

                            if ($tomter[$i]["status_solgt"] == 1) {
                                echo "<td>" . "Solgt";
                            } else {
                                echo "<td>" . "Ikke solgt" . "</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
                <div class="print">
                    <span class="glyphicon glyphicon-print"></span>
                </div>
            </div>
        </div>
        <!-- Reguleringsplaner og selgere-->
        <div class="row reg-selgere-row">
            <div class="col-xs-11 col-xs-offset-1 col-md-4 col-md-offset-3 planer">
                <h2>Områdeplaner</h2>
                <h4><span class="glyphicon glyphicon-floppy-save"></span>Reguleringskart</h4>
                <h4><span class="glyphicon glyphicon-floppy-save"></span>Reguleringsplan</h4>
            </div>
            <div class="col-xs-11 col-xs-offset-1 col-md-4 selgere">
                <h2>Kontaktinfo selgere</h2>
                <h4><span class="glyphicon glyphicon-user"></span>Jan Jansen</h4>
                <h4><span class="glyphicon glyphicon-user"></span>Siri Siridottir</h4>
            </div>
        </div>
    <!--footer-->
        <footer class="col-xs-12">
            <div class="col-md-3 col-md-offset-2"><h2>Kontakt oss</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nulla non sint in hic tenetur ea ipsam quis vero quia reprehenderit, commodi expedita quibusdam, iste molestias ut libero necessitatibus obcaecati.</p></div>
            <div class="col-md-3 col-md-offset-2 col-xs-12"><img class="img-responsive" src="http://placehold.it/400x300" alt=""></div>
        </footer> 
    </div>
    <script src="../js/carousel.js"></script>
    <script src="../js/visTomteListeMobil.js"></script>
</body>
</html>