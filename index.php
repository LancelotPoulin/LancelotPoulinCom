<?php

/*
Index.php - Lancelot POULIN - 16.09.2017
Home page
*/

session_start();

// Set language to navigator language if not already set
if (!isset($_SESSION['language']))
{
	$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$language = $language{0} . $language{1};
	$_SESSION['language'] = $language;
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Lancelot Poulin | Official Site</title>
		<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120-precomposed.jpg" />
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152-precomposed.jpg" />
		<meta name="description" content="Bienvenue sur le site web officiel de Lancelot Poulin. Vous y trouverez son portfolio, ses projets, sa gallerie et un moyen de le contacter." />
		<meta name="keywords" content="Lancelot Poulin, Lancelot Poulin Ponnelle, Lancelot Poulin-Ponnelle">
		<meta name="author" content="Lancelot Poulin">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="/">Lancelot Poulin</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<img onclick="ChangeLanguageOnClick('en')" style="cursor: pointer;" class="icon icons8-Great-Britain" width="40" height="40" src="data:image/png;base64,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">
											<img onclick="ChangeLanguageOnClick('fr')" style="cursor: pointer;" class="icon icons8-France" width="40" height="40" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAABcklEQVR4Xu3cMUoDURQF0D+rcANZgL1Ml0YJdq5FsHIBLiNLiCsI9jauR0kn/Ex4PxcthpP63Qk5cwkvnzBT84oEpigt3ACGJQAIMBQI4xoIMBQI4xoIMBQI4xqYAj6+vH+H1yjHn+ab8mwyuHl7TuJD2ekEOM93Q6Frho/Hj7Z/fbgmOpz5ut+2291uODca+DwcGsBRtV/zAAO8UxQgwPMCvgPDZgAE2AtYY8JWAATYCVhjwlIABGgPDDsAEGBVwBpTlVqYAwjQHhh2ACDAooDjrCLU0hhAgM4Dww4ABFgQcJxVQLo0AhCg46ywAwABVgUcZ1WlnAeGUgABVgXsgVWphTmAAO2BYQcAAqwKWKSrUvbAUAogwKqAPbAqZZEOpQACHBLwz4Qhrn4YIMBewC+RsBUAAXYCFumwFAABOlANOwBwHYB/8inOXHSVj376L7y1vo+nt4V3FiDAUCCMayDAUCCMayDAUCCMayDAUCCM/wBE05g/V6MgnQAAAABJRU5ErkJggg==">
											<li><a href="/"><?php if ($_SESSION['language'] === 'en') echo "Home"; if ($_SESSION['language'] === 'fr') echo "Accueil"; ?></a></li>
											<li><a href="portfolio"><?php if ($_SESSION['language'] === 'en') echo "Portfolio"; if ($_SESSION['language'] === 'fr') echo "Portfolio"; ?></a></li>
											<li><a href="projects"><?php if ($_SESSION['language'] === 'en') echo "Projects"; if ($_SESSION['language'] === 'fr') echo "Projets"; ?></a></li>
											<li><a href="gallery"><?php if ($_SESSION['language'] === 'en') echo "Gallery"; if ($_SESSION['language'] === 'fr') echo "Gallerie"; ?></a></li>
											<li><a href="contacts"><?php if ($_SESSION['language'] === 'en') echo "Contacts"; if ($_SESSION['language'] === 'fr') echo "Contact"; ?></a></li>
											<li></li>
											<a href="https://www.instagram.com/lancelotpoulin/" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="https://twitter.com/lancelotpoulin" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="https://www.linkedin.com/in/lancelot-poulin-ponnelle/" target="_blank" class="icon fa-linkedin"><span class="label">Linkedin</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="contacts" class="icon fa-envelope-o"><span class="label">Email</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="admin" class="icon fa-gear"><span class="label">Admin</span></a>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2>Lancelot Poulin</h2>
							<p><?php if ($_SESSION['language'] === 'en') echo "IT student at Institut"; if ($_SESSION['language'] === 'fr') echo "Étudiant en informatique à l'Institut"; ?> <br />
							<?php if ($_SESSION['language'] === 'en') echo "National des Sciences Appliquées of Toulouse"; if ($_SESSION['language'] === 'fr') echo "National des Sciences Appliquées de Toulouse"; ?> <br /></p>
							<p><?php if ($_SESSION['language'] === 'en') echo "Receive my latest news"; if ($_SESSION['language'] === 'fr') echo "Recevez mes dernières nouveautés"; ?> </p>
							<ul class="actions">
								<li><input id="email1" type="email" value="" placeholder="Email"></li>
							</ul>
							<ul class="actions">
								<li><a onclick="OnSubscribeClick('1')" class="button" ><?php if ($_SESSION['language'] === 'en') echo "Subscribe"; if ($_SESSION['language'] === 'fr') echo "S'abonner"; ?></a></li>
							</ul>
						</div>
						<a href="#intro" class="more scrolly"><?php if ($_SESSION['language'] === 'en') echo "News"; if ($_SESSION['language'] === 'fr') echo "Nouveautés"; ?></a>
					</section>

				<!-- One -->
					<section id="intro" class="wrapper style1 special">
						<div class="inner">
							<header class="major">
								<h2>Introduction</h2>
								<p><?php if ($_SESSION['language'] === 'en') echo "Welcome to the official website of Lancelot Poulin."; if ($_SESSION['language'] === 'fr') echo "Bienvenue sur le site web officiel de Lancelot Poulin."; ?>
								<br /><?php if ($_SESSION['language'] === 'en') echo "You will find his portfolio, his projects,"; if ($_SESSION['language'] === 'fr') echo "Vous y trouverez son portfolio, ses projets,"; ?>
								<br /><?php if ($_SESSION['language'] === 'en') echo "his gallery and a way to contact him."; if ($_SESSION['language'] === 'fr') echo "sa gallerie et un moyen de le contacter."; ?></p>
							</header>
							<ul class="icons major">
								<li><span class="icon fa-user major style3"><span class="label">Portfolio</span></span></li>
								<li><span class="icon fa-code major"><span class="label">Projects</span></span></li>
								<li><span class="icon fa-picture-o major style2"><span class="label">Gallery</span></span></li>
							</ul>
						</div>
					</section>
					
				<!-- Two -->
					<section class="wrapper style2 alt">
						<section class="spotlight">
							<div class="image" id="newsPic1" ></div><div class="content" id="news1" >
								<!-- From DDB -->
							</div>
						</section>
						<section class="spotlight">
							<div class="image" id="newsPic2" ></div><div class="content" id="news2" >
								<!-- From DDB -->
							</div>
						</section>
						<section class="spotlight">
							<div class="image" id="newsPic3" ></div><div class="content" id="news3" >
								<!-- From DDB -->
							</div>
						</section>
					</section>

				<!-- CTA -->
					<section id="cta" class="wrapper style4">
						<div class="inner">
							<header>
								<h3><?php if ($_SESSION['language'] === 'en') echo "Stay informed about news"; if ($_SESSION['language'] === 'fr') echo "Restez informé des nouveautés"; ?></h3>
								<p><?php if ($_SESSION['language'] === 'en') echo "Add your Email in subscriber list and receive the latest Lancelot Poulin news."; if ($_SESSION['language'] === 'fr') echo "Ajoutez votre Email a la liste des abonnés et recevez les nouveautés de Lancelot Poulin."; ?></p>
							</header>
							<ul class="actions vertical">
								<li><input id="email2" type="email" value="" placeholder="Email"></li>
								<li><a onclick="OnSubscribeClick('2')" class="button fit subscribe"><?php if ($_SESSION['language'] === 'en') echo "Subscribe"; if ($_SESSION['language'] === 'fr') echo "S'abonner"; ?></a></li>
							</ul>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="https://www.instagram.com/lancelotpoulin/" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://twitter.com/lancelotpoulin" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.linkedin.com/in/lancelot-poulin-ponnelle/" target="_blank" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
							<li><a href="contacts" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>2018 &copy; Lancelot Poulin</li><li>Design from <a href="http://html5up.net" target="_blank" >HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/GetData.js"></script>

	</body>
</html>