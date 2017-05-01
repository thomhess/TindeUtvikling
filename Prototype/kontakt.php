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
	<!--Kontakt tekst -->
	<div class="col-xs-12 innholdDiv">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Kontakt</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure minus, sapiente! Sed hic aliquam excepturi dolores fuga enim quidem et corrupti, adipisci molestias necessitatibus commodi, ipsa deserunt soluta doloremque magni.  </p>
			</div>
		</div>
		<!--skjema -->
		<div class="row kontakt-bokser">
			<div class="col-md-6 col-md-offset-3">
				<form class="kontakt-form" id="myForm">
				  <div class="form-group">
				    <label for="navn" >Navn</label>
				    <input type="email" class="form-control" id="name">
				    <span id="errorMsgName" class="error"></span>
				  </div>
				  <div class="form-group">
				    <label for="epost" >Epost</label>
				    <input type="email" class="form-control" id="epost">
				    <span id="errorMsgEmail" class="error"></span>
				  </div>
					<div class="form-group">
					  <label for="comment" >Melding</label>
					  <textarea class="form-control" rows="8" id="comment"></textarea>
					  <span id="errorMsgComment" class="error">Dette feltet er tomt</span>
					</div>
					<h4>Hvilke krav har du til en hyttetomt?</h4>
					<div class="checkboxes">
					    <label for="strøm"><input type="checkbox" id="#" /> <span>Strøm</span></label>
					    <label for="avløp"><input type="checkbox" id="#" /> <span>Avløp</span></label>
					    <label for="vei"><input type="checkbox" id="#" /> <span>Vei</span></label>
				  </div>
				  <br>
				  <h4>Hvilke muligheter burde hytteområdet tilby?</h4>
				   <div class="checkboxes">
				    <label for="langrenn"><input type="checkbox" id="" /> <span>Langren</span></label>
				    <label for="fiske"><input type="checkbox" id="" /> <span>Fiske</span></label>
				    <label for="alpint"><input type="checkbox" id="" /> <span>Alpint</span></label>
				    <label for="jakt"><input type="checkbox" id="" /> <span>Jakt</span></label>
				    <label for="tur"><input type="checkbox" id="" /> <span>Tur</span></label>
				  </div>
				  <br>
				  <br>
				  <button type="submit" id="kontaktSubmit" class="btn btn-default btn-lg">SEND</button>
				</form>
			</div>
		</div>
		</div>
	</div>
		<!--footer from php file-->
	<?php include("footer.php"); ?>
    <script src="js/formval.js"></script>
</body>

</html>