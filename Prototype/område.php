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
	<!--Filtrering-->
	<div class="col-xs-12 innholdDiv ">
		<div class="row">
			<div class="col-xs-12">
				<h1>Tomteområder</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<button type="button" id="filterKnapp" class="btn btn-default btn-md center-block">Filtrering<span class="glyphicon glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
			</div>
		</div>
		<div class="row filtreringcol">
			<div class="col-md-3 col-md-offset-2 col-xs-12 filterDiv">
				<h2>Sted</h2>
				<div class="checkbox">
					<input class="cb-omrade" type="checkbox" value="Gudbrandsdalen Sør">
				</div>
				<h4>Gudbrandsdalen Sør</h4>
				<div class="checkbox">
					<input class="cb-omrade" type="checkbox" value="Gudbrandsdalen Nord">
				</div>
				<h4>Gudbrandsdalen Nord</h4>
				<div class="checkbox">
					<input class="cb-omrade" type="checkbox" value="Valdres">
				</div>
				<h4>Valdres</h4>
				<div class="checkbox">
					<input class="cb-omrade" type="checkbox" value="Sør-Trøndelag">
				</div>
				<h4>Sør-Trøndelag</h4>
				<div class="checkbox">
					<input class="cb-omrade" type="checkbox" value="Hedmark">
				</div>
				<h4>Hedmark</h4>
				<br>
				<h2>Akiviteter</h2>
				<div class="checkbox">
					<input class="cb-fasilitet" type="checkbox" value="Langrenn">
				</div>
				<h4>Langrenn</h4>
				<div class="checkbox">
					<input class="cb-fasilitet" type="checkbox" value="Fiske">
				</div>
				<h4>Fiske</h4>
				<div class="checkbox">
					<input class="cb-fasilitet" type="checkbox" value="Alpint">
				</div>
				<h4>Alpint</h4>
				<div class="checkbox">
					<input class="cb-fasilitet" type="checkbox" value="Tur">
				</div>
				<h4>Tur</h4>
				<div class="checkbox">
					<input class="cb-fasilitet" type="checkbox" value="Jakt">
				</div>
				<h4>Jakt</h4>
				<br>
				<h2>Fasiliteter</h2>
				<div class="checkbox">
					<input class="cb-fasilitet" type="checkbox" value="Strøm">
				</div>
				<h4>Strøm</h4>
				<div class="checkbox">
					<input class="cb-fasilitet" type="checkbox" value="Avløp">
				</div>
				<h4>Avløp</h4>
				<div class="checkbox">
					<input class="cb-fasilitet" type="checkbox" value="Vei">
				</div>
				<h4>Vei</h4>
			</div>
			<!--Områdene-->
			<div class="col-md-7 col-xs-12" id="search-result">
			</div>
		</div>
	</div>
	<!--footer from php file-->
	<?php include("footer.php"); ?>

	<!-- Javascript: Mobil filter -->
	<script src="js/omraade-filter-mobil.js"></script>

	<!-- Javascript: Search filter -->
	<script type="text/javascript">
	$phpTomteomrader = <?php echo json_encode($omrader->tomteomrader, JSON_PRETTY_PRINT) ?>;
	</script>
	<script src="js/searchfilter.js"></script>
</body>
</html>