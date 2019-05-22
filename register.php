<?php
session_start();
if (!isset($_SESSION["login"])) {
$_SESSION["login"] = false;
}
?>
<!DOCTYPE html>
<html lang="nl-NL">
	<head>
		<title>Account aanmaken - GOAL</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<nav>
			<button class="menubtn" onclick="window.location.href='index.php'"><img class="menu-icon" src="home.svg" alt /></button>
			<button class="menubtn" onclick="window.location.href='test.php'"><img class="menu-icon" src="test.svg" alt /></button>
			<button class="menubtn" onclick="window.location.href='information.php'"><img class="menu-icon" src="information.svg" alt /></button>
			<button class="menubtn" onclick="window.location.href='about.php'"><img class="menu-icon" src="about.svg" alt /></button>
			<button class="menubtn" onclick="window.location.href='contact.php'"><img class="menu-icon" src="contact.svg" alt /></button>
			<button class="menubtn" onclick="window.location.href='search.php'"><img class="menu-icon" src="search.svg" alt /></button>
			<?php
			if ($_SESSION["login"] != true) {
				echo '<button class="menubtn" onclick="window.location.href=\'login.php\'"><img class="menu-icon" src="login.svg" alt /></button>';
			}
			else {
				echo '<button class="menubtn" onclick="window.location.href=\'logout.php\'"><img class="menu-icon" src="logout.svg" alt /></button><br />
				Welkom ' . $_SESSION["username"];
			}
			?>
		</nav>
		<h1>Account aanmaken</h1>
		<form action="" method="post">
			<table>
				<tr>
					<td>Email</td><td><input type="text" name="email" maxlength="64" /></td>
				</tr>
				<tr>
					<td>Gebruikersnaam</td><td><input type="text" name="username" maxlength="32" /></td>
				</tr>
				<tr>
					<td>Wachtwoord</td><td><input type="password" name="password" maxlength="256"/></td>
				</tr>
				<tr>
					<td>Bevestig wachtwoord</td><td><input type="password" name="pwdcheck" maxlength="256"/></td>
				</tr>
				<tr>
					<td><input type="submit" name="register" value="Account aanmaken" /></td><td></td>
				</tr>
			</table>
		</form><br />
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
				$email = base64_encode($email);
				$username = base64_encode($username);
				$password = md5(md5(sha1(sha1($password))));
				$pwdcheck = "";
				$connect = mysqli_connect("localhost", "root", "", "goal") or die("Verbinding met de database mislukt!");
				$selectmail = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email';") or die ("Opvragen emailadressen uit de database mislukt!");
				if (mysqli_num_rows($selectmail) == 0) {
					$selectusername = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username';") or die ("Opvragen gebruikersnamen uit de database mislukt!");
					if (mysqli_num_rows($selectusername) == 0) {
						$insert = mysqli_query($connect, "INSERT INTO users VALUES ('', '$email', '$username', '$password');") or die ("Aanmaken van het account mislukt!");
						echo "Account succesvol aangemaakt! <a href='login.php'>Ga naar de inlogpagina</a>.";
					}
					else {
						echo "Deze gebruikersnaam is al in gebruik!";
					}
				}
				else {
					echo "Dit emailadres is al in gebruik!";
				}
			}
			else {
				echo "De wachtwoorden komen niet overeen!";
			}
			mysqli_close($connect);
		}
		else {
			echo "Dit emailadres is ongeldig!";
		}
	}
	else {
		echo "Je hebt niet alle velden ingevuld!";
	}
}
?>
		<footer>
			<p>Alle rechten voorbehouden. &copy; <?php echo date("Y");?></p>
		</footer>
	</body>
</html>