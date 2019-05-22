<?php
session_start();
if (!isset($_SESSION["login"])) {
$_SESSION["login"] = false;
}
?>
<!DOCTYPE html>
<html lang="nl-NL">
	<head>
		<title>Inloggen - GOAL</title>
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
		<h1>Inloggen</h1><br />
		<form action="" method="post">
			<table>
				<tr>
					<td>Gebruikersnaam</td><td><input type="text" name="username" maxlength="32" /></td>
				</tr>
				<tr>
					<td>Wachtwoord</td><td><input type="password" name="password" maxlength="256"/></td>
				</tr>
				<tr>
					<td><input type="submit" name="login" value="Inloggen" /></td><td></td>
				</tr>
			</table>
		</form><br />
<?php
if (isset($_POST["login"])) {
	$username = strip_tags($_POST["username"]);
	$username = str_replace(array("'", '"'), "1", $username);
	$password = strip_tags($_POST["password"]);
	$password = str_replace(array("'", '"'), "1", $password);
	if (!empty($username && $password)) {
		$username = base64_encode($username);
		$password = md5(md5(sha1(sha1($password,))));
		$connect = mysqli_connect("localhost", "root", "", "goal") or die("Verbinding met de database mislukt!");
		$select = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
		$query = mysqli_query($connect, $select) or die ("Opvragen aanmeldingsgegevens uit de database mislukt!");
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
				$_SESSION["login"] = true;
				$_SESSION["username"] = base64_decode($row["username"]);
				header("Location: index.php");
				exit();
			}
		}
		else {
			echo "Gebruikersnaam en wachtwoord komen niet overeen!";
		}
		mysqli_close($connect);
	}
	else {
		echo "Je hebt niet alle velden ingevuld!";
	}
}
?>
		<br />
		<a href="register.php">Account aanmaken</a>
		<footer>
			<p>Alle rechten voorbehouden. &copy; <?php echo date("Y");?></p>
		</footer>
	</body>
</html>