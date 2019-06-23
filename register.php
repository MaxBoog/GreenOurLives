<?php
session_start();
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
}
if ($_SESSION["login"] == true) {
	header("Location: index.php");
	exit();
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
				<h1 class="header-text mx-auto">Account aanmaken</h1>
				<div class="col-sm-12 text-center">
				</div>
			</div>
		</section>
		<div class="container">
			<form action="" method="post">
				<div class="form-group">
					<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Emailadres..." autofocus />
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="username" maxlength="32" placeholder="Gebruikersnaam..." />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Wachtwoord..." />
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="pwdcheck" placeholder="Bevestig Wachtwoord..." />
				</div>
				<input type="submit" name="register" value="Account aanmaken" class="btn btn-CTA-2" />
				<a class="btn btn-CTA-3" href="login.php">Of log in <i class="fas fa-sign-in-alt"></i></a>
			</form>
		</div>
<?php
if (isset($_POST["register"])) {
	$email = strip_tags($_POST["email"]);
	$email = str_replace(array("'", '"'), "1", $email);
	$username = strip_tags($_POST["username"]);
	$username = str_replace(array("'", '"'), "1", $username);
	$password = strip_tags($_POST["password"]);
	$password = str_replace(array("'", '"'), "1", $password);
	$pwdcheck = strip_tags($_POST["pwdcheck"]);
	$pwdcheck = str_replace(array("'", '"'), "1", $pwdcheck);
	if (!empty($email && $username && $password && $pwdcheck)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if ($password == $pwdcheck) {
				if (strlen($password) > 11) {
					$email = base64_encode($email);
					$username = base64_encode($username);
					$password = md5(md5(sha1(sha1($password))));
					$pwdcheck = "";
					include("connect.php");
					$selectmail = mysqli_query($connect, "SELECT email FROM users WHERE email = '$email';") or die ("Opvragen emailadressen uit de database mislukt!");
					if (mysqli_num_rows($selectmail) == 0) {
						$selectusername = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username';") or die ("Opvragen gebruikersnamen uit de database mislukt!");
						if (mysqli_num_rows($selectusername) == 0) {
							mysqli_query($connect, "INSERT INTO users VALUES ('', '$email', '$username', '$password', '0', '0');") or die ("Aanmaken van het account mislukt!");
							echo "
							<div class'container'>
								<div class='row'>
									<div class='col-sm-12 text-center'>
										<p class='error-text'>Account succesvol aangemaakt! <a href='Ga naar de inlogpagina <i class='fas fa-external-link-alt'></a>!</p>
									</div>
								</div>
							</div>";
						}
						else {
							echo "<div class'container'>
							<div class='row'>
								<div class='col-sm-12 text-center'>
									<p class='error-text'>Deze gebruikersnaam is al in gebruik!</p>
								</div>
							</div>
						</div>";
						}
					}
					else {
						echo "<div class'container'>
						<div class='row'>
							<div class='col-sm-12 text-center'>
								<p class='error-text'>Dit e-mailadres is al in gebruik!</p>
							</div>
						</div>
					</div>";
					}
					mysqli_close($connect);
				}
				else {
					echo "<div class'container'>
					<div class='row'>
						<div class='col-sm-12 text-center'>
							<p class='error-text'>Het wachtwoord moet minimaal 12 tekens lang zijn!</p>
						</div>
					</div>
				</div>";
				}
			}
			else {
				echo "<div class'container'>
				<div class='row'>
					<div class='col-sm-12 text-center'>
						<p class='error-text'>De wachtwoorden komen niet overeen!</p>
					</div>
				</div>
			</div>";
			}
		}
		else {
			echo "<div class'container'>
			<div class='row'>
				<div class='col-sm-12 text-center'>
					<p class='error-text'>Dit e-mailadres is ongeldig!</p>
				</div>
			</div>
		</div>";
		}
	}
	else {
		echo "<div class'container'>
		<div class='row'>
			<div class='col-sm-12 text-center'>
				<p class='error-text'>U heeft niet alle velden ingevuld!</p>
			</div>
		</div>
	</div>";
	}
}
?>
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