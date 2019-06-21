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
			<h1 class="header-text mx-auto">Challenges</h1>
			<div class="col-sm-12 text-center">
				<p class="header-subtext">Wat kun je zelf doen? Probeer om de onerstaande challanges te voltooien!</p>
				<ul>
					<li>Eet komende week maximaal maar één keer vlees.</li>
					<li>Eet komende week twee vleesvervangers.</li>
					<li>Ga komende week twee keer met OV naar werk.</li>
					<li>Zet de verwarming een standje lager deze week en trek een extra aan trui.</li>
					<li>Douche een week lang minder dan 5 minuten bij elke douchebeurt</li>
					<li>Lever je (oude) kleren, die je nooit meer draagt, in bij een verzamelpunt (goede doel) of geef ze aan vrienden/familie.</li>
					<li>Vervang verlichting die veel verbruikt door LED.</li>
					<li>Begin met plastic scheiden. </li>
					<li>Gebruik twee weken lang geen droger maar hang je was op.</li>
					<li>Bedenk zelf een manier om je levenswijze te verbeteren.</li>
					<li>Controleer bij daglicht of er geen onnodige lampen aan staan </li>
					<li>Wanneer je een stekker niet meer gebruikt, trek hem dan ook uit het stopcontact </li>
					<li>Zorg ervoor dat je niet steeds alleen de televisie uitschakelt maar ook de ontvanger </li>
					<li>Pak deze week twee keer de fiets bij een rit die je normaal met de auto zou doen</li>
					<li>Carpool deze week één keer met een collega</li>
					<li>Haal apparaten uit het stopcontact wanneer ze opgeladen zijn, laat ze niet een hele nacht opladen (plan je “oplaadmomenten” beter)</li>
					<li>Zet de verwarming ‘s nachts op 15 graden celsius.</li>
					<li>Kies liever voor verse seizoens producten in plaats van diepgevroren en ingeblikt groente en fruit.</li>
					<li>Wees zuinig met papier; plak een nee-nee sticker op je brievenbus, stap over op een digitaal abonnement op een krant of tijdschrift en gebruik gerecycled papier.</li>
					<li>Eet de komende maand geen kant-en-klare maaltijden.</li>
					<li>Lees goed de etiketten in de supermarkt: zo weet u waar de producten vandaan komen; koop eten dat uit Europa komt.</li>
					<li>Kies voor vis die op duurzame wijze is gevangen en indien mogelijk voor vis met het MSC-keurmerk. </li>
					<li>Kies voor herlaadbare batterijen en recycleer die wanneer ze niet meer bruikbaar zijn.</li>
				</ul>

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