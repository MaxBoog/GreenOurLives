<?php
session_start();
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
}
unset($_SESSION["login"]);
unset ($_SESSION["username"]);
header("Location: index.php");
exit();
?>