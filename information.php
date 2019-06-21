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
	<section class="container-fluid">
	<div class="row">
			<?php if ($_SESSION["login"] == true) {
				echo '<p class="mx-auto mt-5">Welkom ' . $_SESSION["username"] . '</p>';
			}?>
		</div>
		<div class="row">
			<h1 class="header-text mx-auto">Meer informatie</h1>
			<div class="col-sm-12 text-center">
				<p class="header-subtext">Hoe zit het nou precies met de ecologische voetafdruk? Vindt het hier uit!</p>
				<p>De Aarde produceert alles wat we nodig hebben om ons in onze voedsel-, energie- en andere levensbehoeften te voorzien. 
				Voor de productie en afvalverwerking hiervan is ruimte nodig. 
				De ecologische voetafdruk geeft inzicht in de hoeveelheid land (mondiale hectares) die jaarlijks nodig is voor onze consumptie. 
				De grootte van je voetafdruk hangt dus af van je leefgewoonten.</p>
				<h2>Waar komt het begrip “voetafdruk” vandaan?</h2>
				<p>Het begrip “ecologische voetafdruk” bestaat al ruim 15 jaar en werd geïntroduceerd aan de Canadese Universiteit van British Colombia door Mathis Wackernagel. 
				De ecologische voetafdruk is een soort meetinstrument waarmee het ruimtebeslag van een mens aan de hand van iemand levenswijze op de Aarde bepaald kan worden. 
				De ruimte die iemands levenswijze inneemt wordt uitgedrukt in hectares. Hoe groot deze voetafdruk is hangt met name af van het consumptiegedrag. 
				De berekening neemt onder andere de oppervlakte mee welke nodig is voor het gebruik van energie en grondstoffen en de productie van voedsel. </p>
				<h2>Leven op een te grote voet</h2>
				<p>Per mens is op basis van een eerlijke verdeling hectare op de wereld beschikbaar. 
				Wereldwijd gebruiken we nu per mens zo ongeveer 2,7 hectare. Een gemiddelde Nederlander gebruikt zelfs 6,2 hectare, veel te veel dus! 
				Op dit moment hebben we ongeveer anderhalve Aarde nodig om te produceren wat we in één jaar nodig zouden hebben. 
				We vragen dus meer van onze Aarde dan wat deze ons te bieden heeft. 
				Hierdoor komen ook de natuur en het ecosysteem onder druk te staan en erven volgende generaties een Aarde die steeds minder leefbaar wordt.</p>
				<h2>Je voetafdruk en CO2</h2>
				<p>Het broeikasgas koolstofdioxide (CO2) beslaat maar liefst de helft van de ecologische voetafdruk. 
				Het gas komt vrij bij verbranding van fossiele brandstoffen zoals aardolie, gas en steenkool, bijvoorbeeld voor elektriciteitsopwekking, verwarming en vervoer. CO2 draagt bij aan de opwarming van de Aarde en klimaatverandering. 
				Gelukkig zijn bomen in staat om CO2 uit de lucht te halen en op te slaan. Daarmee leveren ze een belangrijke bijdrage aan het tegengaan van klimaatverandering. Je CO2-uitstoot wordt doorberekend in je ecologische voetafdruk door uit te rekenen hoeveel hectare bos er nodig is om je CO2 weer uit de lucht te halen.</p>
				<h2>Het Eerlijke Aarde-aandeel</h2>
				<p>Als alle bruikbare ruimte op Aarde verdeeld wordt over alle mensen en de natuur voldoende ruimte krijgt om zichzelf te herstellen, dan zou elke bewoner gemiddeld recht hebben op zo’n 1,8 hectare per persoon. 
				Het Living Planet Report van 2010 geeft de volgende cijfers (die betrekking hebben op 2007) voor de gemiddelde voetafdruk per inwoner per continent en per land. 
				Hier zijn enkele cijfers om een idee te geven hoe de ecologische voetafdruk verdeeld is over de wereld:</p>
				<p>Wil je er zelf iets aan doen? <a href="challenges.php">Bekijk dan eens de challenges!</a></p>
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