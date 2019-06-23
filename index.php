<?php
session_start();
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
}
?>
<!DOCTYPE html>
<html lang="nl-NL">
<head>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="nl"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="nl"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9" lang="nl"> <![endif]-->
	<title>Green Our Lives</title>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"
		integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="assets/css/master.min.css" />
</head>
<body>
	<!--[if lte IE 9]>
			<p class="browserupgrade">
				You are using an <strong>outdated</strong> browser. Please
				<a href="https://browsehappy.com/">upgrade your browser</a> to improve
				your experience and security.
			</p>
		<![endif]-->
	<noscript>Schakel JavaScript in om de website optimaal te kunnen gebruiken. 
	<a href="https://www.browserchecker.nl/javascript-aanzetten" target="_blank">Hoe kan ik JavaScript inschakelen?</a></noscript>
	<!-- spinner -->
	<script>
		document.querySelector("body").style.display = "none";
		document.querySelector("html").classList.add("spinner-3");
		setTimeout(function () {
			document.querySelector("html").classList.remove("spinner-3");
			document.querySelector("body").style.display = "block";
		}, 1000);
	</script>
	<!-- body -->
	<button class="btn scrollToTop">
		<i class="fas fa-angle-up fa-2x"></i>
	</button>
	<!-- navigation -->
	<header>
		<?php
		include("nav.php");
		?>
	</header>
	<section class="hero text-center">
		<div class="container">
			<div class="row">
				<div class="col content">
					<h1 class="hero-text">Green Our Lives</h1>
					<p class="hero-subtext">Bekijk hoe jij bij kan dragen aan een groenere toekomst!</p>
					<a href="test.php" class="btn btn-CTA-1 mx-auto">Doe de test!</a>
					<p class="hero-subtext pb-1 pt-5">of lees meer</p>
					<p><a href="#down"><i class="fas fa-chevron-down"></i></a></p>
				</div>
			</div>
		</div>
	</section>
		
	<section class="container pt-5" id="down">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="pb-5"><strong>Wat is een ecologische voetafdruk?</strong></h1>
				<p>
					De voetafdruk, ook wel mondiale of ecologische voetafdruk genoemd, is de ruimte die we per persoon innemen op aarde. 
					Deze ruimte wordt berekend op basis van jouw levensstijl. Alles wat je consumeert kost namelijk ruimte. 
					Eten en drinken neemt bijvoorbeeld ruimte in beslag, omdat het verbouwd en vervoerd moet worden. 
					Maar ook papiergebruik, denk aan bomenkap, en energieverbruik (CO2 uitstoot) kosten veel ruimte.</p>
			</div>	
			<div class="col-sm-6">
				<img src="assets/img/environment.svg" class="img-fluid" alt="Green Our Lives">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-6 order-last order-md-first">
				<img src="assets/img/park.svg" class="img-fluid" alt="Green Our Lives">
			</div>
			<div class="col-sm-6">
				<p>
					Deze voetafdruktest brengt in kaart welke impact jouw persoonlijke levensstijl heeft op onze aarde. 
					Aan het eind van de test krijg je tips om je voetafdruk te verkleinen en kun je XP verdienen waarmee je allerlei ecologische kortingen kunt ontvangen!
				</p>
			</div>
		</div>
	</section>
		<!-- footer -->
		<?php
			include("footer.php")
		?>
	<script src="assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
	<script src="assets/js/jquery-easing.min.js"></script>
	<script src="assets/js/scripts.min.js"></script>
</body>
</html>