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
					<h1 class="hero-text">Zoeken</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$q = strip_tags(addslashes($_GET["q"]));
	if (!empty($q)) {
		$connect = mysqli_connect("db4free.net", "greenourlives", "TomTom11", "greenourlives") or die ("Verbinding met de database mislukt!");
		$query = mysqli_query($connect, "SELECT result FROM search WHERE result LIKE '%$q%';");
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
				$result = $row["result"];
				echo "Zoekresultaten voor " . $result;
			}
		}
		else {
			echo "Er zijn geen resultaten voor " . $q;
		}
	}
	else {
		echo "Je hebt geen zoekterm ingevuld!";
		}
}
?>
				</div>
			</div>
		</div>
	</section>

		<!-- footer -->
		<footer class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="text-center">
						&copy; <?php echo date("Y"); ?> <a href="">GreenOurLives.com</a>
					</p>
				</div>
				<div class="col-md-6 text-center text-md-left">
					<hr />
					<p>
						<a href="index.php">Home</a>
					</p>
					<p>
						<a href="test.php">Doe de test!</a>
					</p>
					<p>
						<a href="about.php">Over ons & het project</a>
					</p>
					<p>
						<a href="shop.php">Beloningen</a>
					</p>
					<p>
						<a href="contact.php">Contact</a>
					</p>
					<p>
						<a href="search.php">Search</a>
					</p>
					<p>
						<a href="login.php">Inloggen</a>
					</p>
					<p>
						<a href="register.php">Account aanmaken</a>
					</p>
				</div>
				<div class="col-md-6 text-center text-md-left">
					<hr />
					<a href="#" target="_blank" class="pr-4">
						<i class="fab fa-facebook-f fa-3x"></i>
					</a>
					<a href="#" target="_blank" class="pr-4">
						<i class="fab fa-instagram fa-3x"></i>
					</a>
					<a href="mailto:info@greenourlives.com">
						<i class="far fa-envelope fa-3x"></i>
					</a>
				</div>
			</div>
		</footer>
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