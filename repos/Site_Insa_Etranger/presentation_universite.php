<!doctype html>
<html>
    <head> 
		<title>INSA Etranger | Présentation</title>
		<meta name="viewport" content="width=device-width"> 
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="images/icon.png">                                         <!--icon du site qui s'affiche dans l'onglet de navigation-->
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
		<link rel="stylesheet" href="assets/css/presentation_universite.css" />
	</head>
	<body>
	<!-- Header Lancelot -->
        <header id="header">
            <h1><a href="index.php"><img src="images/logo@medium.png"/></a></h1>
            <nav class="links">
                <ul>
                    <li><a href="liste.php">écoles</a></li>
                    <li><a href="preparersondepart.php">Préparez-vous</a></li>
                </ul>
            </nav>
        </header>

		<br>
		<div id="nomEcole" name="<?php echo $_GET['ID']; ?>">
			<div id="uniTitle">The Hong Kong Polytechnic University</div>
			<image src="images/11logo.png" id="petitLogo"></image>
		</div>
		<br>

		<div id="conteneur">
			<div class="elementgauche" id = "e1">
				<image class="photoUniv" id="ext"></image>
				
				<div class="recap">
					<div class="info" id="villePays">Ville, Pays</div>
					<div class="info" id="description">Description</div>
					<a href="#" class="info" id="programme">Lien vers le programme</a>
				</div>
			</div>

			<div id="elementdroit">
					<div class="recap">
						<div class="info" id="cout">Cout</div>
						<div class="info" id="securite">Securite</div>
						<div class="info" id="classement">Classement</div>
					</div>
					<image class="photoUniv" id="class"></image>
			</div>
					
			<div class ="elementgauche">
				<p><a href="" id="joliBouton">Postuler</a></p>
			</div>
		</div>

	    <!-- Footer Lancelot-->
	    <section id="footer">
	        <p class="copyright">2018 &copy; INSA Toulouse à l'étranger</p>
	    </section>

	    <!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/liste.js"></script>
	</body>
</html>