<?php
session_start();
if (!isset($_SESSION["login"])) {
$_SESSION["login"] = false;
}
if ($_SESSION["login"] != true) {
	header("Location: login.php");
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
	<noscript>Schakel JavaScript in om de website optimaal te kunnen gebruiken. 
	<a href="https://www.browserchecker.nl/javascript-aanzetten" target="_blank">Hoe kan ik JavaScript inschakelen?</a></noscript>
		<?php
			include("nav.php");
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Profiel</h1><br />
					<h2>Profiel van <?php echo $_SESSION["username"]; ?></h2>
					<h1>Instellingen</h1><br />
					<h3><?php echo "Je level is xp / iets!
					Je hebt ook points punten, waarmee je leuke dingen kan doen!"; ?></h3><br />
					<h3>Wachtwoord wijzigen</h3>
					<form action="" method="post">
						<table>
							<tr><td>Oud wachtwoord</td><td><input type="password" name="oldpwd" maxlength="256"/></td></tr>
							<tr><td>Nieuw wachtwoord</td><td><input type="password" name="newpwd" maxlength="256"/></td></tr>
							<tr><td>Bevestig wachtwoord</td><td><input type="password" name="checkpwd" maxlength="256"/></td></tr>
							<tr><td><input type="submit" name="changepwd" value="Wachtwoord wijzigen" /></td><td></td></tr>
						</table>
					</form><br />
				</div>
			</div>
		</div>
<?php
if (isset($_POST["changepwd"])) {
	$oldpwd = strip_tags($_POST["oldpwd"]);
	$oldpwd = str_replace(array("'", '"'), "1", $oldpwd);
	$newpwd = strip_tags($_POST["newpwd"]);
	$newpwd = str_replace(array("'", '"'), "1", $newpwd);
	$checkpwd = strip_tags($_POST["checkpwd"]);
	$newpwd = str_replace(array("'", '"'), "1", $newpwd);
	if (!empty($oldpwd && $newpwd && $checkpwd)) {
		if ($newpwd == $checkpwd) {
			if (strlen($newpwd) > 11) {
				$oldpwd = md5(md5(sha1(sha1($oldpwd))));
				$newpwd = md5(md5(sha1(sha1($newpwd))));
				$checkpwd = "";
				include("connect.php");
				$username = base64_encode($_SESSION["username"]);
				$selectpwd = mysqli_query($connect, "SELECT password FROM users WHERE username = '$username' AND password = '$oldpwd';") or die ("Controleren van het oude wachtwoord mislukt!" . mysqli_error($connect));
				if (mysqli_num_rows($selectpwd) > 0) {
					if ($oldpwd == $newpwd) {
						echo "Het nieuwe wachtwoord mag niet hetzelfde zijn als het oude!";
					}
					else {
						mysqli_query($connect, "UPDATE users SET password = '$newpwd' WHERE username = '$username' AND password = '$oldpwd';") or die ("Veranderen van het wachtwoord is mislukt!");
						echo "Wachtwoord succesvol gewijzigd!";
					}
				}
				else {
					echo "Het oude wachtwoord is niet correct!";
				}
				mysqli_close($connect);
			}
			else {
				echo "Het wachtwoord moet minimaal 12 tekens lang zijn!";
			}
		}
		else {
			echo "De nieuwe wachtwoorden komen niet overeen!";
		}
	}
	else {
		echo "Je hebt niet alle velden ingevuld!";
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