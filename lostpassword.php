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
	<section class="container cont">
	<div class="row">
			<?php if ($_SESSION["login"] == true) {
				echo '<p class="mx-auto mt-5">Welkom ' . $_SESSION["username"] . '</p>';
			}?>
		</div>
		<div class="row">
			<h1 class="header-text mx-auto">Wachtwoord vergeten?</h1>
			<div class="col-sm-12 text-center">
				<p class="header-subtext">Vul hieronder je e-mailadres in:</p>
				<form action="" method="post">
					<input type="text" name="email" maxlength="64" />
					<input type="submit" class="btn btn-CTA-2" name="reset" value="Wachtwoord resetten" autofocus />
				</form>
				<?php
				if (isset($_POST["reset"])) {
					$email = strip_tags(addslashes($_POST["email"]));
					if (!empty($email)) {
						if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$dbemail = base64_encode($email);
							include("connect.php");
							$selectmail = mysqli_query($connect, "SELECT username, email FROM users WHERE email = '$dbemail';") or die ("Opvragen emailadressen uit de database mislukt!");
							if (mysqli_num_rows($selectmail) > 0) {
								while ($row = mysqli_fetch_assoc($selectmail)) {
									$username = base64_decode($row["username"]);
								}
								$token = uniqid("", true);
								$link = "https://www.students.science.uu.nl/~6469175/goal/resetpassword.php?token=".$token;
								$time = strtotime("now");
								$insert = mysqli_query($connect, "INSERT INTO tokens VALUES ('', '$email', '$token', '$time');") or die ("Data opslaan mislukt!");
								mail($email, "Wachtwoord resetten", "Beste $username,<br /><br />
								Er is een verzoek gedaan om je wachtwoord te resetten.<br /><br />
								Als je dit niet hebt gedaan kun je deze email negeren.<br /><br />
								Als je je wachtwoord wilt resetten, klik dan op de volgende link:<br/ >
								$link <br /><br />
								Deze link is een uur geldig.<br /></br />
								Met vriendelijke groet<br /><br />
								Green Our Lives");
							}
							else {
								echo "<div class'container'>
								<div class='row'>
									<div class='col-sm-12 text-center'>
										<p class='error-text'>Dit e-mailadres is niet bij ons bekend!</p>
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
								<p>Vul je e-mailadres in!</p>
							</div>
						</div>
					</div>";
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