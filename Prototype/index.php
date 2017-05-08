<?php 
	require("classes/dbfetch.php");
	$fetchTomteområder = new fetchTomteområder();
	$områder = $fetchTomteområder->fetchAll();
	$fasiliteter = $fetchTomteområder->fetchAllTomtefasiliteter();

	$tomteområder = $fetchTomteområder->mergeTomtefasiliteterArray($områder, $fasiliteter);
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
	<!-- Navigation from navigation.php-->
	<?php include("navigation.php"); ?>
    
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
				<img value="Langrenn" class="btn-filter btn-active" src="img/icons/langrenn.png">
				<img value="Fiske" class="btn-filter btn-inactive" src="img/icons/fiske.png">
				<img value="Alpint" class="btn-filter btn-inactive" src="img/icons/alpint.png">
				<img value="Jakt" class="btn-filter btn-inactive" src="img/icons/jakt.png">
				<img value="Tur" class="btn-filter btn-inactive" src="img/icons/tur.png">
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
	<!--footer from php file-->
	<?php include("footer.php"); ?>
	
	</div>
	<!-- Javascript: Map -->
	<script src="js/index-map.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK90Dd0f4oVwQRhyxmIXiHQhP_5SUQNY0&callback=initMap"></script>

	<!-- Javascript: Filter -->
	<script src="js/searchfilter.js"></script>
	<script type="text/javascript">
		$phpTomteomrader = <?php echo json_encode($tomteområder, JSON_PRETTY_PRINT) ?>;
	</script>
</body>
</html>