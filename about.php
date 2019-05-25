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
		<nav class="navbar navbar-expand-lg fixed-top navbar-custom">
			<div class="container">
				<a class="navbar-brand" href="index.php">Green Our Lives</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
					data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
					<span class="sr-only">Toggle navigation</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link pr-md-4" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4" href="test.php">Doe de test!</a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4" href="about.php">Over ons</a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4" href="shop.php">Beloningen</a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4" href="shop.php">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4" href="shop.php">Search</a>
						</li>
						<?php
						if ($_SESSION["login"] != true) {
							echo '<li class="nav-item">
									  <a class="nav-link pr-md-4" href="login.php">Inloggen  <i class="fas fa-sign-in-alt"></i></a></li>
								  <li class="nav-item">
									  <a class="nav-link pr-md-4" href="register.php">Account aanmaken  <i class="fas fa-user-plus"></i></a>
								  </li>';
						}
						else {
						echo '<li class="nav-item">
								  <a class="nav-link pr-md-4" href="profile.php">Profiel</a>
							  </li>
							  <li class="nav-item">
								  <a class="nav-link pr-md-4" href="logout.php">Log uit <i class="fas fa-sign-out-alt"></i></a>
							  </li><br />';
						}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<section class="container-fluid">
	<div class="row">
			<?php if ($_SESSION["login"] == true) {
				echo '<p class="mx-auto mt-5">Welkom ' . $_SESSION["username"] . '</p>';
			}?>
		</div>
		<div class="row">
			<h1 class="header-text mx-auto">Over Ons & Het Project</h1>
			<div class="col-sm-12 text-center">
				<p class="header-subtext">Lees hier meer over wie wij zijn en wat wij doen.</p>
			</div>
		</div>
	</section>
	<main role="main">
		<!-- footer -->
		<footer class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="text-center">
						&copy; Copyright |
						<a href="greenourlives.com">GreenOurLives.com</a>
					</p>
				</div>
				<div class="col-md-6 text-center text-md-left">
					<hr />
					<p>
						<a href="index.php">home</a>
					</p>
					<p>
						<a href="test.php">doe de test!</a>
					</p>
					<p>
						<a href="about.php">over ons & het project</a>
					</p>
					<p>
						<a href="shop.php">beloningen</a>
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