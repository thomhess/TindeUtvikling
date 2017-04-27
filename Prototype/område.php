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
                    <span class="sr-only">Toggle navigation</span> Meny  <i class="fa fa-bars"></i> 
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
	<!--footer-->
	<footer class="col-xs-12">
		<div class="col-md-3 col-md-offset-2"><h2>Kontakt oss</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi nulla non sint in hic tenetur ea ipsam quis vero quia reprehenderit, commodi expedita quibusdam, iste molestias ut libero necessitatibus obcaecati.</p></div>
		<div class="col-md-3 col-md-offset-2 col-xs-12"><img class="img-responsive" src="http://placehold.it/400x300" alt=""></div>
	</footer>

	<!-- Javascript: Mobil filter -->
	<script src="js/omraade-filter-mobil.js"></script>

	<!-- Javascript: Search filter -->
	<script type="text/javascript">
	$phpTomteomrader = <?php echo json_encode($omrader->tomteomrader, JSON_PRETTY_PRINT) ?>;
	</script>
	<script src="js/searchfilter.js"></script>
</body>
</html>