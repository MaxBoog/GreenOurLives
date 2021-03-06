<?php
session_start();
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
}
if (!isset($_SESSION["reload"])) {
	$_SESSION["reload"] = false;
}
if ($_SESSION["reload"] == true) {
	echo '<script>window.location.href="reload.php";</script>';
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
			<h1 class="header-text mx-auto">Forum</h1>
			<div class="col-sm-12">
				<p class="header-subtext text-center">Praat met anderen over een groener bestaan.</p>
				<div id="forum">
				<?php
				include("connect.php");
				$select = mysqli_query($connect, "SELECT message, postedby, date, time FROM forum ORDER BY postedby;") or die ("Ophalen berichten uit database mislukt!");
				while ($row = mysqli_fetch_assoc($select)) {
					 $message = nl2br($row["message"]);
					 $postedby = $row["postedby"];
					 $date = $row["date"];
					 $time = $row["time"];
					 echo "$postedby op $date om $time:<br />$message<hr />";
				}
				mysqli_close($connect);
				if ($_SESSION["login"] == true) {
					if (isset($_SESSION["username"])) {
						echo '<form action="" method="post">
							<textarea name="msg" maxlength="10000"></textarea>
							<input type="submit" class="btn btn-CTA-2" name="sendmsg" value="Post!" />
						<form>';
					}
				}
				if (isset($_POST["sendmsg"])) {
					$msg = strip_tags(nl2br($_POST["msg"]));
					if (!empty($msg)) {
						include("connect.php");
						$msg = mysqli_real_escape_string($connect, $msg);
						$postedby = $_SESSION["username"];
						$date = date("d-m-Y");
						$time = date("H:i:s");
						mysqli_query($connect, "INSERT INTO forum VALUES('', '$msg', '$postedby', '$date', '$time');") or die ("Bericht versturen mislukt!");
						mysqli_close($connect);
						$_SESSION["reload"] = true;
						echo '<script>window.location.href="reload.php";</script>';
					}
					else {
						echo "<p class='error-text'>Je hebt geen bericht geschreven!</p>";
					}
				}
				?>
				</div>
			</div>
		</div>
	</section>
	<main role="main">
		<!-- footer -->
		<?php include("footer.php"); ?>
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