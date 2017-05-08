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
	<!-- Navigation from navigation.php-->
	<?php include("navigation.php"); ?>
    <!--header-->
    <div class="row">
		<div class="col-xs-12 header">
		<img class="indexlogo" src="img/tinde-logo.svg"/>
		</div>
	</div>	
	<div class="row headerrow">	
	</div>

	<!--Hvem er vi content-->
	<div class="col-xs-12 innholdDiv">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-xs-9 col-xs-offset-2 header-space">
				<h1>Hvem er vi</h1>
				<br>
				<h4 class="read-length">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure minus, sapiente! Sed hic aliquam excepturi dolores fuga enim quidem et corrupti, adipisci molestias necessitatibus commodi, ipsa deserunt soluta doloremque magni. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, totam, quod! Nihil rem, tempora deleniti. Laborum neque consequatur, obcaecati aperiam quo id molestiae sunt, explicabo officiis unde quasi sed illum.</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h1>Våre selgere</h1>
			</div>
		</div>
		<div class="row selger-info">
			<div class="col-xs-5 col-xs-offset-1 col-md-1 col-md-offset-3">
				<img src="./img/selger1.jpg" alt="">
			</div>
			<div class="col-xs-6 col-md-3 col-md-offset-1">
				<br>
				<br>
				<h2>Lise Hansen</h2>
				<p>Daglig leder</p>
				<p>Tlf: 45 24 81 89</p>
				<a href=""><b>lise_hansen@tindeutvikling.no</b></a>
			</div>
		</div>
		<div class="row selger-info">
		<div class="col-xs-5 col-xs-offset-1 col-md-1 col-md-offset-3">
				<img src="./img/selger2.jpg" alt="">
			</div>
			<div class="col-xs-6 col-md-3 col-md-offset-1">
				<br>
				<br>
				<h2>Jan Jansen</h2>
				<p>Selger</p>
				<p>Tlf: 89 23 81 89</p>
				<a href=""><b>jan_jansen@tindeutvikling.no</b></a>
			</div>
		</div>
		<div class="row selger-info">
		<div class="col-xs-5 col-xs-offset-1 col-md-1 col-md-offset-3">
				<img src="./img/selger3.jpg" alt="">
			</div>
			<div class="col-xs-6 col-md-3 col-md-offset-1">
				<br>
				<br>
				<h2>Knut Hansen</h2>
				<p>Selger</p>
				<p>Tlf: 55 23 81 87</p>
				<a href=""><b>knut_hansen@tindeutvikling.no</b></a>
			</div>
		</div>
		<br>
		<br>
		<div class="col-xs-12">
			<h4 class="text-center">Hovedkontor:</h4>
		</div>
	</div>
	
		<!--kart-->
		<div class="col-lg-12">
			<div id="aboutmap" class="googlemap"></div>
		</div>
		<!--footer-->
		<!--footer from php file-->
	<?php include("footer.php"); ?>
</div>
    <script src="js/about-map.js"></script>
	<script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK90Dd0f4oVwQRhyxmIXiHQhP_5SUQNY0&callback=initMap"></script>
</body>
</html>