<?php
session_start();
if (!isset($_SESSION["reload"])) {
	header("Location: index.php");
	exit();
}
if ($_SESSION["reload"] == true) {
	$_SESSION["reload"] = false;
	header("Location: forum.php");
	exit();
}
?>