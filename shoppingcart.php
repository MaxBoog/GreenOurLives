<?php session_start();
error_reporting(E_ALL & ~E_NOTICE); ?>
<!DOCTYPE html>
<head>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="nl"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="nl"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9" lang="nl"> <![endif]-->
	<title>Home - Green Our Lives</title>
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
		}, 1000);
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
							<a class="nav-link pr-md-4" href="contact.php">Contact</a>
						</li>
						<li class="nav-item dropdown">
							<form class="nav-link pr-md-4" action="" method="post">
								<input type="text" name="q" />
								<input type="submit" name="search" value="Zoeken" />
							</form>
							<?php if (isset($_POST["search"])) {
								$q = strip_tags(addslashes($_POST["q"]));
								if (!empty($q)) {
									$url = $_SERVER['PHP_SELF'] + $q;
									echo $url;
								}
								else {
									echo "Je hebt geen zoekterm ingevuld";
								}
							} ?>
						</li>
						<?php
						if ($_SESSION["login"] != true) {
							echo '<li class="nav-item">
									  <a class="nav-link pr-md-4" href="login.php">Inloggen <i class="fas fa-sign-in-alt"></i></a></li>
								  <li class="nav-item">
									  <a class="nav-link pr-md-4" href="register.php">Account aanmaken <i class="fas fa-user-plus"></i></a>
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
			<h1 id="top">Winkelwagen</h1>
<?php
$conn = mysqli_connect("db4free.net", "greenourlives", "TomTom11", "greenourlives") or die ("Verbinding met de database mislukt!");
class DBController {
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	function close($conn) {
	$close = mysqli_close($conn);
	}
}
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
	mysqli_close($conn);
}
}
?>
		<div id="shopping-cart">
			<div class="txt-heading">Uw producten</div>
				<a id="btnEmpty" href="shoppingcart.php?action=empty">Winkelwagen leegmaken</a>
				<?php
					if(isset($_SESSION["cart_item"])){
					$total_quantity = 0;
					$total_price = 0;
				?>	
				<table class="tbl-cart" cellpadding="10" cellspacing="1">
					<tbody>
						<tr>
							<th style="text-align:left;">Naam</th>
							<th style="text-align:left;">Code</th>
							<th style="text-align:right;" width="5%">Aantal</th>
							<th style="text-align:right;" width="10%">Prijs per stuk</th>
							<th style="text-align:right;" width="10%">Totaal</th>
							<th style="text-align:center;" width="5%">Verwijderen</th>
						</tr>	
						<?php		
							foreach ($_SESSION["cart_item"] as $item){
								$item_price = $item["quantity"]*$item["price"];
						?>
						<tr>
							<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
							<td><?php echo $item["code"]; ?></td>
							<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
							<td  style="text-align:right;"><?php echo "€".$item["price"]; ?></td>
							<td  style="text-align:right;"><?php echo "€". number_format($item_price,2); ?></td>
							<td style="text-align:center;"><a href="shoppingcart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
						</tr>
						<?php
							$total_quantity += $item["quantity"];
							$total_price += ($item["price"]*$item["quantity"]);
							}
						?>
						<tr>
							<td colspan="2" align="right">Total:</td>
							<td align="right"><?php echo $total_quantity; ?></td>
							<td align="right" colspan="2"><strong><?php echo "€".number_format($total_price, 2); ?></strong></td>
							<td></td>
						</tr>
					</tbody>
				</table>		
			<?php
			} else {
			?>
			<div class="no-records">Uw winkelwagen is nog leeg. <a href="products.php">Bekijk hier ons assortiment</a></div>
			<?php 
			}
			?>
			<form action="" method="post">
				<input type="submit" name="confirm" value="Door naar overzicht" />
			</form>
			<?php
			if (isset($_POST["confirm"])){
				if ($_SESSION["login"] = true){
					$file = $username.".txt";
					$data = $_SESSION["cart_item"];
					fopen($file, "w");
					fwrite($file, $data);
					fclose($file);
					header("Location: pay.php");
					exit();
				}
				else {
					echo "U moet inloggen om verder te gaan!";
				}
			}
			?>
		</div>
		</center>
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