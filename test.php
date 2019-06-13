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
	$q14a = $_POST["q14"];
	if(empty($q14a)) {
			$q14 = 4;
		}
		else {
			$q14 = 4 - count($q14a);
		}
	$q15 = $_POST["q15"];
	$q16 = $_POST["q16"];
	$points = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15 + $q16;
	echo "<div class='container mx-auto'>
			<div class='row'>
			  <h2 class='mx-auto'>Je score is $points punten! </h2>
			  </row>
		  </div>";
}
else {
	echo '
	<div class="container">
		<div class="row">
			<div class="col-sm-10 offset-sm-2">
				<form action="" method="post">
					
						<table id="test">			
							<tr><th></th><th><h2>1. Met welk vervoersmiddel ga je naar school/werk?</h2></th></tr>
							<tr><td><input type="radio" name="q1" value="0" class="question"/></td><td>Lopen of fiets</td></tr>
							<tr><td><input type="radio" name="q1" value="1" /></td><td>Openbaar vervoer</td></tr>
							<tr><td><input type="radio" name="q1" value="3" /></td><td>Auto</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>2. Met welk vervoersmiddel ga je op vakantie?</h2></th></tr>
							<tr><td><input type="radio" name="q2" value="0" /></td><td>Ik ga niet op vakantie</td></tr>
							<tr><td><input type="radio" name="q2" value="0" /></td><td>Lopend of fiets</td></tr>
							<tr><td><input type="radio" name="q2" value="1" /></td><td>Openbaar vervoer</td></tr>
							<tr><td><input type="radio" name="q2" value="3" /></td><td>Auto</td></tr>
							<tr><td><input type="radio" name="q2" value="6" /></td><td>Vliegtuig</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>3. Hoeveel kilometers rij je in totaal in een gemiddelde week met de auto?</h2></th></tr>
							<tr><td><input type="radio" name="q3" value="0" /></td><td>Ik heb geen auto</td></tr>
							<tr><td><input type="radio" name="q3" value="1" /></td><td>Minder dan 10 km</td></tr>
							<tr><td><input type="radio" name="q3" value="2" /></td><td>10 tot 25 km</td></tr>
							<tr><td><input type="radio" name="q3" value="3" /></td><td>25 tot 50 km</td></tr>
							<tr><td><input type="radio" name="q3" value="4" /></td><td>50 tot 100 km</td></tr>
							<tr><td><input type="radio" name="q3" value="5" /></td><td>Meer dan 100 km</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>4. Hoe veel dagen per week eet je vlees?</h2></th></tr>
							<tr><td><input type="radio" name="q4" value="0" /></td><td>0</td></tr>
							<tr><td><input type="radio" name="q4" value="1" /></td><td>1 of 2</td></tr>
							<tr><td><input type="radio" name="q4" value="3" /></td><td>3 tot 5</td></tr>
							<tr><td><input type="radio" name="q4" value="5" /></td><td>6 of vaker</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>5. Eet je wel eens <a href="https://nl.wikipedia.org/wiki/Vleesvervanger" target="_blank">vleesvervangers</a>?</h2></th></tr>
							<tr><td><input type="radio" name="q5" value="0" /></td><td>Ja</td></tr>
							<tr><td><input type="radio" name="q5" value="3" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>6. Hoe goed is je huis geïosoleerd?</h2></th></tr>
							<tr><td><input type="radio" name="q6" value="0" /></td><td>Goed (dak, muren, vloer)</td></tr>
							<tr><td><input type="radio" name="q6" value="1" /></td><td>Redelijk (gedeeltelijk)</td></tr>
							<tr><td><input type="radio" name="q6" value="2" /></td><td>Slecht (nauwelijks)</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>7. Wat voor <a href="https://www.milieucentraal.nl/energie-besparen/energiezuinig-huis/isoleren-en-besparen/dubbel-glas-hr-glas-en-triple-glas/" target="_blank">glas</a> heb in je huis?</h2></th></tr>
							<tr><td><input type="radio" name="q7" value="3" /></td><td>Enkel</td></tr>
							<tr><td><input type="radio" name="q7" value="2" /></td><td>Dubbel</td></tr>
							<tr><td><input type="radio" name="q7" value="1" /></td><td>HR++</td></tr>
							<tr><td><input type="radio" name="q7" value="0" /></td><td>Triple</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>8. Heb je zonnepanelen op het dak?</h2></th></tr>
							<tr><td><input type="radio" name="q8" value="0" /></td><td>Ja</td></tr>
							<tr><td><input type="radio" name="q8" value="2" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>9. Hoe verwarm je je huis?</h2></th></tr>
							<tr><td><input type="radio" name="q9" value="5" /></td><td>Gas</td></tr>
							<tr><td><input type="radio" name="q9" value="4" /></td><td>Houtkachel</td></tr>
							<tr><td><input type="radio" name="q9" value="3" /></td><td>Stadsverwarming</td></tr>
							<tr><td><input type="radio" name="q9" value="2" /></td><td>Grijze stroom</td></tr>
							<tr><td><input type="radio" name="q9" value="1" /></td><td>Groene stroom</td></tr>
							<tr><td><input type="radio" name="q9" value="0" /></td><td>Warmtepomp</td></tr>
							<tr><td><input type="radio" name="q9" value="0" /></td><td>Zonneboiler</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>10. Hoe verwarm je je water?</h2></th></tr>
							<tr><td><input type="radio" name="q10" value="3" /></td><td>Gas</td></tr>
							<tr><td><input type="radio" name="q10" value="2" /></td><td>Grijze stroom</td></tr>
							<tr><td><input type="radio" name="q10" value="1" /></td><td>Groene stroom</td></tr>
							<tr><td><input type="radio" name="q10" value="0" /></td><td>Warmtepomp</td></tr>
							<tr><td><input type="radio" name="q10" value="0" /></td><td>Zonneboiler</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>11. Wat voor lampen gebruik je het meest in huis?</h2></th></tr>
							<tr><td><input type="radio" name="q11" value="4" /></td><td>Gloeilampen</td></tr>
							<tr><td><input type="radio" name="q11" value="3" /></td><td>Halogeenlampen</td></tr>
							<tr><td><input type="radio" name="q11" value="2" /></td><td>Spaarlampen</td></tr>
							<tr><td><input type="radio" name="q11" value="1" /></td><td>TL-lampen</td></tr>
							<tr><td><input type="radio" name="q11" value="0" /></td><td>LED-lampen</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>12. Laat je de stekkers van apparaten met <a href="https://nl.wikipedia.org/wiki/Sluipverbruik" target="_blank">sluipverbruik</a> in het stopcontact zitten?</h2></th></tr>
							<tr><td><input type="radio" name="q12" value="2" /></td><td>Ja, meerdere</td></tr>
							<tr><td><input type="radio" name="q12" value="1" /></td><td>Ja, enkele</td></tr>
							<tr><td><input type="radio" name="q12" value="0" /></td><td>Nee</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>13. Hoe vaak per week laad je je telefoon op?</h2></th></tr>
							<tr><td><input type="radio" name="q13" value="0" /></td><td>Minder dan 1</td></tr>
							<tr><td><input type="radio" name="q13" value="1" /></td><td>2 tot 4</td></tr>
							<tr><td><input type="radio" name="q13" value="2" /></td><td>Meer dan 5</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>14. Welke afvalsoorten scheid je?</h2></th></tr>
							<tr><td><input type="checkbox" name="q14[]" value="a" /></td><td>Glas</td></tr>
							<tr><td><input type="checkbox" name="q14[]" value="b" /></td><td>Papier</td></tr>
							<tr><td><input type="checkbox" name="q14[]" value="c" /></td><td>Plastic of PMD</td></tr>
							<tr><td><input type="checkbox" name="q14[]" value="d" /></td><td>GFT</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>15. Wat doe je met oude spullen?</h2></th></tr>
							<tr><td><input type="radio" name="q15" value="0" /></td><td>Verkopen/kringloopwinkel/hergebruiken/recyclen</td></tr>
							<tr><td><input type="radio" name="q15" value="2" /></td><td>Weggooien</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><th></th><th><h2>16. Hoeveel minuten douche je gemiddeld?</h2></th></tr>
							<tr><td><input type="radio" name="q16" value="0" /></td><td>Minder dan 5</td></tr>
							<tr><td><input type="radio" name="q16" value="1" /></td><td>5 tot 10</td></tr>
							<tr><td><input type="radio" name="q16" value="2" /></td><td>10 tot 15</td></tr>
							<tr><td><input type="radio" name="q16" value="3" /></td><td>15 tot 20</td></tr>
							<tr><td><input type="radio" name="q16" value="4" /></td><td>Meer dan 20</td></tr>
							<tr><td></td><td><hr /></td></tr>
							<tr><td></td><td><input type="submit" name="submit" value="Bereken je uitslag" /></td></tr>
							</table>
						
				</form><br />
			</div>
		</div>
	</div>	
	';
}
?>
		<?php
			include("footer.php");
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