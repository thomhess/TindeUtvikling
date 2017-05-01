<?php 
	include("classes/dbfetch.php");
	$omrader = new fetchTomteområder();
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
	<link rel="stylesheet" type="text/css" href="css/tinde.css">
	<!--jquery and bootstrap js file-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
					<li><a href="index.php" >Hjem</a></li>
					<li><a href="område.php" >Områder</a></li>
					<li><a href="omoss.html" >Hvem er vi</a></li>
					<li><a href="kontakt.html" class="nav-contact">Kontakt</a></li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
    </nav>
    <!--header-->
    <div class="row">
		<div class="col-xs-12 header">
		<img class="indexlogo" src="img/tinde-logo.svg"/>
		</div>
	</div>
	<!--intro text -->	
	<div class="row headerrow">	
		<div class="col-xs-12 intro">
			<h1>Flotte tomter!</h1>
			<h3>Lorem lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui veniam reiciendis nulla necessitatibus debitis nisi obcaecati, minima blanditiis perspiciatis, saepe dolor ullam autem nobis veritatis cumque tempore ducimus dignissimos, quis.</h3>
			<a href="område.php">Se våre tomteområder <span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
	<!-- Filter-->
	<div class="row">
		<div class="col-xs-12 areas">
			<div class="area-filter">
				<ul class="nav nav-pills" role="tablist">
					<li role="presentation" class="active btn-filter"><a value="Langrenn">Langrenn<span class="badge"></span></a></li>
					<li role="presentation" class="inactive btn-filter"><a value="Fiske">Fiske<span class="badge"></span></a></li>
					<li role="presentation" class="inactive btn-filter"><a value="Alpint">Alpint<span class="badge"></span></a></li>
					<li role="presentation" class="inactive btn-filter"><a value="Jakt">Jakt<span class="badge"></span></a></li>
					<li role="presentation" class="inactive btn-filter"><a value="Tur">Tur<span class="badge"></span></a></li>
				</ul>
			</div>
			<!-- area images -->
			<div class="col-lg-10 col-lg-offset-1" id="area-cont">
			</div>
		</div>	
	</div>
	<!--map-->
	<div class="row">
		<div class="col-xs-12">
			<div id="indexmap" class="googlemap"></div>
		</div>
	</div>
	<!--footer-->
	<footer class="col-xs-12 text-center">
		<h3>KONTAKT OSS</h3>
		<div><span class="glyphicon glyphicon-phone-alt"></span><p>45 24 81 89</p></div>
		<div><span class="glyphicon glyphicon-envelope"></span><p>Post@tinde.no</p></div>
		<div><span class="glyphicon glyphicon-map-marker"></span><p>Frøya 2630 Ringbu</p></div>
		<br>
		<div><a href="#">www.tindehytter.no</a></div>
		<div class="bottom-footer-div">
			<h4>Våres sosiale medier</h4>
			<a href="#"><img src="./img/facebook-icon.png " height="25" width="25" ></a>	
			<a href="#"><img src="./img/twitter-icon.png" height="25" width="25" ></a>
			<a href="#"><img src="./img/insta-icon.png " height="25" width="25" ></a>
		</div>
		

	</footer>
	</div>

	<!-- Javascript: Map -->
	<script src="js/index-map.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK90Dd0f4oVwQRhyxmIXiHQhP_5SUQNY0&callback=initMap"></script>

	<!-- Javascript: Filter -->
	<script src="js/searchfilter.js"></script>
	<script type="text/javascript">
		$phpTomteomrader = <?php echo json_encode($omrader->tomteomrader, JSON_PRETTY_PRINT) ?>;
	</script>
</body>
</html>