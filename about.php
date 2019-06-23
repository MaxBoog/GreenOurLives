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
		}, 800);
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
	<section class="container">
	<div class="row">
			<?php if ($_SESSION["login"] == true) {
				echo '<p class="mx-auto mt-5">Welkom ' . $_SESSION["username"] . '</p>';
			}?>
		</div>
		<div class="row">
			<h1 class="header-text mx-auto">Over Ons & Het Project</h1>
			<div class="col-sm-12">
				<p class="header-subtext text-center">Lees hier meer over wie wij zijn en wat wij doen.</p>

				<p>Green Our Lives is geboren uit een project die wij, Max Boog, Jesse Borghardt, Govert Hagelaar, Martijn Jansen, Jorrit Lenssinck, Jenny Lin en William de Rooij, uit moesten voeren voor het Informatiekunde introductieproject van de bachelor Informatiekunde aan de Universiteit Utrecht. 
				Gezamenlijk zijn wij aan de gang gegaan met dit project, waarbij wij in een periode van ongeveer twee maanden een geheel werkend systeem moeten ontwikkelen, waarbij we de gedachte “designing for social goods” in ons achterhoofd moeten houden. 
				Dit houdt in het kort in dat wij een systeem moeten ontwikkelen dat ervoor gaat zorgen dat sociale verandering bevordert gaat worden, zodat uitdagingen van vandaag de dag aangepakt kunnen worden en mensen in de toekomst hun leven zinvol kunnen verbeteren.</p>

				<hr>
			</div>
			<div class="col-lg-6">
				<img src="assets/img/park.svg" class="img-fluid" alt="Green Our Lives">
			</div>
			<div class="col-lg-6">
			
				<p>In de huidige maatschappij wordt het milieu steeds belangrijker. De druk om ons aan te passen op een zodanige manier dat de aarde minder beschadigd raakt, loopt op. Daarom is ervoor gekozen om met dit project te gaan richten op een onderwerp dat met het milieu te maken heeft. 
				Het gewenste effect is hierdoor een steentje bij te kunnen dragen aan een betere toekomst. Hiermee zal het project ook voornamelijk vallen onder het social-impact domain environment. 
				Met dit uitgangspunt zijn we uiteindelijk op het idee gekomen om een website te creëren waarmee de gebruiker zijn of haar ecologische voetafdruk kan meten door middel van een test. </p>
				
			</div>
			<div class="col-sm-12">
			<p>
				Het doel wat we hiermee willen bereiken is dat mensen ten eerste bewuster worden van hun ecologische voetafdruk en ten tweede dat de levenswijze van mensen verandert zodat hun ecologische voetafdruk verkleind wordt.</p>
				<p>Uiteindelijk hebben wij met elkaar de huidige website ontwikkeld die op dit moment door jou gebruikt wordt en kunnen wij met trots zeggen dat ons introductieproject van onze studie met succes afgerond is! </p>
				<a href="information.php">Meer informatie over de ecologische voetafdruk</a>
			</div>

			</div>
		</div>
	</section>
	<main role="main">
		<!-- footer -->
		<?php
			include("footer.php")
		?>
	</main>
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