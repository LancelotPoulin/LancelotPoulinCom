<!DOCTYPE HTML>

<!--
	POULIN Lancelot - 08/12/18
-->

<html>
	<head>
		<title>Insa Etranger | Liste</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="assets/css/liste.css" />
		<link rel="shortcut icon" href="images/icon.png">
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php"><img src="images/logo@medium.png" /></a></h1>
						<nav class="links">
							<ul>
								<li><a href="index.php">Accueil</a></li>
								<li><a href="preparersondepart.php">Préparez-vous</a></li>
							</ul>
						</nav>
					</header>


				<!-- Liste -->
					<section id="liste">

						<!-- Tri -->
							<section id="tri" name="<?php if (isset($_GET['Orientation'])) { echo $_GET['Orientation']; } else { echo 0; }; ?>">
								<header>
								
									<div class="row" >
										<div class="col-5 col-12-small col-5-medium"><a href="index.php" class="button icon fa-arrow-left">CHOIX ORIENTATION</a></div>
										<div class="col-7 col-12-small col-7-medium"><h2>Liste des écoles</h2></div>
									</div>
									
									<form method="post" action="#">
										<div class="row">
											<div class="col-3 col-12-small col-6-medium" style="padding-top: 40px;"><p>Affinez vos critères ici:</p></div>
											<div class="col-3 col-12-small col-6-medium" style="padding-top: 20px;">
												<select name="langage" id="demo-category" >
													<option value="all">Toutes les langues</option>
													<option value="ENG">Anglais</option>
													<option value="FRA">Français</option>
													<option value="ESP">Espagnol</option>
													<option value="POR">Portugais</option>
													<option value="GER">Allemand</option>
												</select>
											</div>
											<div class="col-1 col-3-small col-2-medium" style="margin-top: 15px;">
												<input type="radio" id="demo-priority-all" name="coutRadio" checked>
												<label for="demo-priority-all">Ø</label>
											</div>
											<div class="col-1 col-3-small col-2-medium" style="margin-top: 15px;">
												<input type="radio" id="demo-priority-a" name="coutRadio">
												<label for="demo-priority-a" style="color: green;font-weight: 600;">€</label>
											</div>
											<div class="col-1 col-3-small col-2-medium" style="margin-top: 15px;">
												<input type="radio" id="demo-priority-b" name="coutRadio">
												<label for="demo-priority-b" style="color: orange;font-weight: 600;">€</label>
											</div>
											<div class="col-1 col-3-small col-2-medium" style="margin-top: 15px;">
												<input type="radio" id="demo-priority-c" name="coutRadio">
												<label for="demo-priority-c" style="color: red;font-weight: 600;">€</label>
											</div>
											<div class="col-2 col-12-small col-4-medium" style="padding-top: 20px;">
												<a onclick="SearchListe()" class="button icon fa-search">RECHERCHER</a>
											</div>
										</div>
									</form>
									
								</header>
							</section>

						<!-- Tiles -->
							<section>
								<div class="tiles" style="">
								
									<!-- DB -->

								</div>
							</section>

							
						<!-- Footer -->
							<section id="footer">
								<p class="copyright">2018 &copy; INSA Toulouse à l'étranger</p>
							</section>

					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/liste.js"></script>

	</body>
</html>