<?php
function CurrentPage($page) {
	if ($page == $current) {
		echo 'class="current"';
	}
}
?>
<style>
.pr-md-4:hover {
	background-color: #ddd;
}
.pr-md-4:active {
	background-color: #ccc;
}
</style>
<nav class="navbar navbar-expand-xl fixed-top navbar-custom">
			<div class="container-fluid">
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
							<a class="nav-link pr-md-4 " href="index.php">Home <i class="fas fa-home"></i> 
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4 " href="test.php">Doe de test! <i class="fas fa-pen-square"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4 " href="about.php">Over ons  <i class="fas fa-info-circle"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4 " href="contact.php">Contact  <i class="fas fa-envelope"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4 " href="challenges.php">Challenges <i class="fas fa-trophy"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4 " href="forum.php">Forum <i class="fas fa-comments"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link pr-md-4 " href="search.php">Zoeken  <i class="fas fa-search"></i></a>
						</li>
						<?php
						if ($_SESSION["login"] != true) {
							echo '<li class="nav-item">
									  <a class="nav-link pr-md-4" href="login.php">Log in <i class="fas fa-sign-in-alt"></i></a></li>
								  <li class="nav-item">
									  <a class="nav-link pr-md-4" href="register.php">Account aanmaken <i class="fas fa-user-plus"></i></a>
								  </li>';
						}
						else {
							echo '<li class="nav-item">
								  <a class="nav-link pr-md-4" href="profile.php">Profiel <i class="fas fa-user"></i></a>
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