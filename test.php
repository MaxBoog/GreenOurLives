<?php
session_start();
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
}
error_reporting(E_ALL & ~E_NOTICE);
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
			<h2 class="header-text mx-auto">Test</h2>
			<div class="col-sm-12 text-center">
				<p class="header-subtext">Bereken hier je ecologische voetafdruk</p>
			</div>
		</div>
	</section>
<?php
function ShowTest() {
	echo '<div class="container">
		<div class="row">
			<div class="col-sm-10 offset-sm-2">
				<form action="" method="post">
					
						<table id="test">			
							<tr><th></th><th><p class="question">1. Met welk vervoersmiddel ga je naar school/werk?</p></th></tr>
							<tr><td><input type="radio" name="q1" value="1" class="question"/></td><td>Lopen of fiets</td></tr>
							<tr><td><input type="radio" name="q1" value="2" /></td><td>Openbaar vervoer</td></tr>
							<tr><td><input type="radio" name="q1" value="4" /></td><td>Auto</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">2. Met welk vervoersmiddel ga je op vakantie?</p></th></tr>
							<tr><td><input type="radio" name="q2" value="1" /></td><td>Ik ga niet op vakantie</td></tr>
							<tr><td><input type="radio" name="q2" value="1" /></td><td>Lopend of fiets</td></tr>
							<tr><td><input type="radio" name="q2" value="2" /></td><td>Openbaar vervoer</td></tr>
							<tr><td><input type="radio" name="q2" value="4" /></td><td>Auto</td></tr>
							<tr><td><input type="radio" name="q2" value="7" /></td><td>Vliegtuig</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">3. Hoeveel kilometers rij je in totaal in een gemiddelde week met de auto?</p></th></tr>
							<tr><td><input type="radio" name="q3" value="1" /></td><td>Ik heb geen auto</td></tr>
							<tr><td><input type="radio" name="q3" value="2" /></td><td>Minder dan 10 km</td></tr>
							<tr><td><input type="radio" name="q3" value="3" /></td><td>10 tot 25 km</td></tr>
							<tr><td><input type="radio" name="q3" value="4" /></td><td>25 tot 50 km</td></tr>
							<tr><td><input type="radio" name="q3" value="5" /></td><td>50 tot 100 km</td></tr>
							<tr><td><input type="radio" name="q3" value="6" /></td><td>Meer dan 100 km</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">4. Hoe veel dagen per week eet je vlees?</p></th></tr>
							<tr><td><input type="radio" name="q4" value="1" /></td><td>0</td></tr>
							<tr><td><input type="radio" name="q4" value="2" /></td><td>1 of 2</td></tr>
							<tr><td><input type="radio" name="q4" value="4" /></td><td>3 tot 5</td></tr>
							<tr><td><input type="radio" name="q4" value="6" /></td><td>6 of vaker</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">5. Eet je wel eens <a href="https://nl.wikipedia.org/wiki/Vleesvervanger" target="_blank">vleesvervangers</a>?</p></th></tr>
							<tr><td><input type="radio" name="q5" value="1" /></td><td>Ja</td></tr>
							<tr><td><input type="radio" name="q5" value="4" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">6. Hoe goed is je huis geïsoleerd?</p></th></tr>
							<tr><td><input type="radio" name="q6" value="1" /></td><td>Goed (dak, muren, vloer)</td></tr>
							<tr><td><input type="radio" name="q6" value="2" /></td><td>Redelijk (gedeeltelijk)</td></tr>
							<tr><td><input type="radio" name="q6" value="3" /></td><td>Slecht (nauwelijks)</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">7. Wat voor <a href="https://www.milieucentraal.nl/energie-besparen/energiezuinig-huis/isoleren-en-besparen/dubbel-glas-hr-glas-en-triple-glas/" target="_blank">glas</a> heb in je huis?</p></th></tr>
							<tr><td><input type="radio" name="q7" value="4" /></td><td>Enkel</td></tr>
							<tr><td><input type="radio" name="q7" value="3" /></td><td>Dubbel</td></tr>
							<tr><td><input type="radio" name="q7" value="2" /></td><td>HR++</td></tr>
							<tr><td><input type="radio" name="q7" value="1" /></td><td>Triple</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">8. Heb je zonnepanelen op het dak?</p></th></tr>
							<tr><td><input type="radio" name="q8" value="1" /></td><td>Ja</td></tr>
							<tr><td><input type="radio" name="q8" value="3" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">9. Hoe verwarm je je huis?</p></th></tr>
							<tr><td><input type="radio" name="q9" value="6" /></td><td>Gas</td></tr>
							<tr><td><input type="radio" name="q9" value="5" /></td><td>Houtkachel</td></tr>
							<tr><td><input type="radio" name="q9" value="4" /></td><td>Stadsverwarming</td></tr>
							<tr><td><input type="radio" name="q9" value="3" /></td><td>Grijze stroom</td></tr>
							<tr><td><input type="radio" name="q9" value="2" /></td><td>Groene stroom</td></tr>
							<tr><td><input type="radio" name="q9" value="1" /></td><td>Warmtepomp</td></tr>
							<tr><td><input type="radio" name="q9" value="1" /></td><td>Zonneboiler</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">10. Hoe verwarm je je water?</p></th></tr>
							<tr><td><input type="radio" name="q10" value="4" /></td><td>Gas</td></tr>
							<tr><td><input type="radio" name="q10" value="3" /></td><td>Grijze stroom</td></tr>
							<tr><td><input type="radio" name="q10" value="2" /></td><td>Groene stroom</td></tr>
							<tr><td><input type="radio" name="q10" value="1" /></td><td>Warmtepomp</td></tr>
							<tr><td><input type="radio" name="q10" value="1" /></td><td>Zonneboiler</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">11. Wat voor lampen gebruik je het meest in huis?</p></th></tr>
							<tr><td><input type="radio" name="q11" value="5" /></td><td>Gloeilampen</td></tr>
							<tr><td><input type="radio" name="q11" value="4" /></td><td>Halogeenlampen</td></tr>
							<tr><td><input type="radio" name="q11" value="3" /></td><td>Spaarlampen</td></tr>
							<tr><td><input type="radio" name="q11" value="2" /></td><td>TL-lampen</td></tr>
							<tr><td><input type="radio" name="q11" value="1" /></td><td>LED-lampen</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">12. Laat je de stekkers van apparaten met <a href="https://nl.wikipedia.org/wiki/Sluipverbruik" target="_blank">sluipverbruik</a> in het stopcontact zitten?</p></th></tr>
							<tr><td><input type="radio" name="q12" value="3" /></td><td>Ja, meerdere</td></tr>
							<tr><td><input type="radio" name="q12" value="2" /></td><td>Ja, enkele</td></tr>
							<tr><td><input type="radio" name="q12" value="1" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">13. Hoe vaak per week laad je je telefoon op?</p></th></tr>
							<tr><td><input type="radio" name="q13" value="1" /></td><td>Minder dan 1</td></tr>
							<tr><td><input type="radio" name="q13" value="2" /></td><td>2 tot 4</td></tr>
							<tr><td><input type="radio" name="q13" value="3" /></td><td>Meer dan 5</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">14. Scheid je je glas?</p></th></tr>
							<tr><td><input type="radio" name="q14" value="1" /></td><td>Ja</td></tr>
							<tr><td><input type="radio" name="q14" value="2" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">15. Scheid je je papier?</p></th></tr>
							<tr><td><input type="radio" name="q15" value="1" /></td><td>Ja</td></tr>
							<tr><td><input type="radio" name="q15" value="2" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">16. Scheid je je plastic / PMD?</p></th></tr>
							<tr><td><input type="radio" name="q16" value="1" /></td><td>Ja</td></tr>
							<tr><td><input type="radio" name="q16" value="2" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">17. Scheid je je GFT?</p></th></tr>
							<tr><td><input type="radio" name="q17" value="1" /></td><td>Ja</td></tr>
							<tr><td><input type="radio" name="q17" value="2" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">18. Wat doe je met oude spullen?</p></th></tr>
							<tr><td><input type="radio" name="q18" value="1" /></td><td>Verkopen/kringloopwinkel/hergebruiken/recyclen</td></tr>
							<tr><td><input type="radio" name="q18" value="3" /></td><td>Weggooien</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><p class="question">19. Hoeveel minuten douche je gemiddeld?</p></th></tr>
							<tr><td><input type="radio" name="q19" value="1" /></td><td>Minder dan 5</td></tr>
							<tr><td><input type="radio" name="q19" value="2" /></td><td>5 tot 10</td></tr>
							<tr><td><input type="radio" name="q19" value="3" /></td><td>10 tot 15</td></tr>
							<tr><td><input type="radio" name="q19" value="4" /></td><td>15 tot 20</td></tr>
							<tr><td><input type="radio" name="q19" value="5" /></td><td>Meer dan 20</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><td></td><td><input type="submit" name="submit" value="Bereken je uitslag" /></td></tr>
							</table>
				</form><br />
			</div>
		</div>
	</div>	';
}
if (isset($_POST["submit"])) {
	$q1 = $_POST["q1"];
	$q2 = $_POST["q2"];
	$q3 = $_POST["q3"];
	$q4 = $_POST["q4"];
	$q5 = $_POST["q5"];
	$q6 = $_POST["q6"];
	$q7 = $_POST["q7"];
	$q8 = $_POST["q8"];
	$q9 = $_POST["q9"];
	$q10 = $_POST["q10"];
	$q11 = $_POST["q11"];
	$q12 = $_POST["q12"];
	$q13 = $_POST["q13"];
	$q14 = $_POST["q14"];
	$q15 = $_POST["q15"];
	$q16 = $_POST["q16"];
	$q17 = $_POST["q17"];
	$q18 = $_POST["q18"];
	$q19 = $_POST["q19"];
	if (!empty($q1 && $q2 && $q3 && $q4 && $q5 && $q6 && $q7 && $q8 && $q9 && $q10 && $q11 && $q12 && $q13 && $q14 && $q15 && $q16 && $q17 && $q18 && $q19)) {
		$points = 74 -($q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15 + $q16 + $q17 + $q18 + $q19);
		echo '<div class="container mx-auto">
			<div class="row">
			<h2 id="testresult" class="mx-auto">Je hebt <b>'.$points.'</b> van de <b>55</b> punten gescoord! </h2><br />
			<p>Wil je de volgende keer meer punten halen?</p><br />
			<p><a href="about.php#tips">Tips om groener te leven</a></p><br />
			<style>
			#testresult {';
			if ($points < 20) {
				echo "background-color: #f00;";
			}
			elseif ($points < 40) {
				echo "background-color: #fa0;";
			}
			elseif ($points < 56) {
				echo "background-color: #0a0;";
			}
			echo '}
			</style>';
			/*echo '<form action="" method="post">
				<input type="submit" name="redo" value="Test opnieuw maken" />
			</form>';*/
		echo '	</div>
			</div>';
		if ($_SESSION["login"] == true) {
				echo '<form action="" method="post">
					<input type="submit" name="save" value="Score opslaan in account" />
				</form>';
		}
	}
	else {
		echo "Je hebt niet alle vragen ingevuld!";
	}
}
if (isset($_POST["redo"])) {
	ShowTest();
}
//login
if (isset($_POST["save"])) {
	if ($points) {
		include("connect.php");
		$username = $_SESSION["username"];
		$save = mysqli_query($connect, "UPDATE users SET score='$points' WHERE username='$username';") or die ("Opslaan score in database mislukt!");
	}
	else {
		echo "Er is geen score om op te slaan!";
	}
}
// max score 74
else {
	ShowTest();
}
?>
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