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
			<h1 class="header-text mx-auto">Wachtwoord resetten</h1>
			<div class="col-sm-12 text-center">
				<form action="" method="post">
					<input type="password" name="password" maxlength="64" autofocus />
					<input type="password" name="checkpwd" maxlength="64" />
					<input type="submit" name="resetpwd" value="Wachtwoord resetten" />
				</form>
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "GET") {
					$token = strip_tags(addslashes($_GET["token"]));
					if (!empty($token)) {
						include("connect.php");
						$selecttoken = mysqli_query($connect, "SELECT token, time FROM tokens WHERE token='$token';") or die ("Opvragen tokens uit database mislukt!");
						if (mysqli_num_rows($selecttoken) > 0) {
							while ($row = mysqli_fetch_assoc($selecttoken)) {
								$email = $row["email"];
								$dbtoken = $row["token"];
								$dbtime = $row["time"];
								if ($token == $dbtoken) {
									$time = strtotime("now");
									if ($time - $dbtime < 6400) {
										echo '<form action="" method="post">
											<input type="password" name="password" placeholder="Wachtwoord" maxlength=255 autofocus />
											<input type="password" name="checkpwd" placeholder="Bevestig wachtwoord" maxlength="255" />
											<input type="submit" name="resetpwd" value="Wachtwoord ressetten" />
										</form>';
									}
									else {
										echo "Deze link is verlopen!";
										mysqli_query($connect, "DELETE FROM tokens WHERE token='$token';") or die ("Opschonen van de database mislukt!");
									}
								}
								else {
									echo "Deze link is ongeldig!";
								}
							}
						}
						else {
							echo "Deze link is ongeldig!";
						}
						mysqli_close($connect);
					}
					else {
						echo "Deze link is ongeldig!";
					}
				}
				if (isset($_POST["resetpwd"])) {
					$password = strip_tags(addslashes($_POST["password"]));
					$checkpwd = strip_tags(addslashes($_POST["checkpwd"]));
					if (!empty($password && $checkpwd)) {
						if ($password == $checpwd) {
							include("connect.php");
							$setpwd = mysqli_query($connect, "UPDATE users SET password WHERE email='$email'") or die ("Invoeren nieuw wachtwoord mislukt!");
							echo "Wachtwoord succesvol gereset!";
							mysqli_query($connect, "DELETE FROM tokens WHERE token='$token';") or die ("Opschonen van de database mislukt!");
							mysqli_close($connect);
						}
						else {
							echo "De wachtwoorden komen niet overeen!";
						}
					}
					else {
						echo "Vul alle velden in!";
					}
				}
				?>
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