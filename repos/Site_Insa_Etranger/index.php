<!--partie faite par Jeremie GANTET-->
<!doctype html>
<html>
    <head>
        <title>INSA Etranger | Accueil</title>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css"/> <!--style necessaire pour la carte-->
        <link rel="stylesheet" href="assets/css/index.css" />
        <link rel="shortcut icon" href="images/icon.png">                                         <!--icon du site qui s'affiche dans l'onglet de navigation-->
		<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>          <!--script necessaire pour la carte-->
	</head>    

    <body>
        <!-- Header de Lancelot-->
        <header id="header">
            <h1><a href="index.php"><img src="images/logo@medium.png" /></a></h1>
            <nav class="links">
                <ul>
                    <li><a href="liste.php">Accueil</a></li>
                    <li><a href="preparersondepart.php">Préparez-vous</a></li>
                </ul>
            </nav>
        </header>

        <div id="secteur">
            <div id="blocgauche">
                <div id="blocspe">
                    <h1>Semestre a l'étranger - Specialité</h1>
                    <span id="anneesmartphone"><h4>2<sup>ème</sup> annee</h4></span>
                    <div id="annee2">
                        <span id="anneeordi"><h4>2<sup>ème</sup> annee</h4></span>
                        <button onClick="AfficheCercle(MIC);"><div class="spe">MIC</div></button>       <!-- "id" : 1  -->
                        <button onClick="AfficheCercle(IMACS);"><div class="spe">IMACS</div></button>   <!-- "id" : 2  -->
                        <button onClick="AfficheCercle(IC);"><div class="spe">IC</div></button>         <!-- "id" : 3  -->
                        <button onClick="AfficheCercle(ICBE);"><div class="spe">ICBE</div></button>     <!-- "id" : 4  -->
                    </div>
                    <span id="anneesmartphone"><h4>3<sup>ème</sup> annee</h4></span>
                    <div id="annee3-4">
                        <span id="anneeordi"><h4>3<sup>ème</sup> annee</h4></span>
                        <div id="PO">
                            <button onClick="AfficheCercle(IR);"><div class="spe">IR</div></button>     <!-- "id" : 5  -->
                            <button onClick="AfficheCercle(GMM);"><div class="spe">GMM</div></button>   <!-- "id" : 6  -->                     
                        </div>
                        <div id="PO">
                            <button onClick="AfficheCercle(AE);"><div class="spe">AE</div></button>     <!-- "id" : 7  -->
                            <button onClick="AfficheCercle(GP);"><div class="spe">GP</div></button>     <!-- "id" : 8  -->                     
                        </div>
                        <div id="PO">
                            <button onClick="AfficheCercle(GC);"><div class="spe">GC</div></button>     <!-- "id" : 9  -->
                            <button onClick="AfficheCercle(GM);"><div class="spe">GM</div></button>     <!-- "id" : 10 -->
                        </div>
                        <div id="PO">
                            <button onClick="AfficheCercle(GPE);"><div class="spe">GPE</div></button>   <!-- "id" : 11 -->
                            <button onClick="AfficheCercle(GB);"><div class="spe">GB</div></button>     <!-- "id" : 12 -->
                        </div>
                    </div>
                </div>
                <div id="map"></div>                     
                <a href="liste.php" id="voirliste"><div id="decouvrir">découvrir</div></a>              <!-- si aucune ecole choisie : dirige par defaut vers liste.php -->
            </div>

            <aside>
                <h1>Infos générales</h1>

                <div id="Actu">
                    <h2>Actualités</h2>
                    <ul>
                        <li class="carrousel"><b>11/10/18</b> 13h30 Univ. Novossibirsk (Russie), présentation générale des Univ. bresiliennes et mexicaines</li>
                        <li class="carrousel"><b>10/10/18</b> 18h Univ. of Cardiff (Royaume-Uni), Petru Major di Targu Mures (Roumanie), Northwestern Polyt. Univ. Xian (Chine)</li> 
                        <li class="carrousel"><b>09/10/18</b> 18h St Petersburg Polytech. Univ. (Russie), Univ. of Skövde (Suède)</li>
                        <li class="carrousel"><b>08/10/18</b> 18h Univ. Malaya (Malaisie), Univ. Autonoma Metropolitana (Mexique), Univ. Nationale de Colombie (Colombie)</li>
                        <li class="carrousel"><b>18/09/18</b> Réunion d’information Amphi Vinci</li>
                    </ul>
                </div>

                <div id="info">
                    <h2>Info pratiques</h2>
                    <ul>
                        <li><a href="prepdepart.html">Suivre les 7 étapes pour réussir son semestre à l’étranger</a></li>
                        <li>Témoignage au retour de PUC RIO</li> 
                        <li>Témoignage au retour de ETS Montreal</li>
                        <li>Témoignage au retour de UGI Castellon</li>
                    </ul>               
                </div>
            </aside>

        </div>
		
        <!-- Footer de Lancelot-->
        <section id="footer">
            <p class="copyright">2018 &copy; INSA Toulouse à l'étranger</p>
        </section>
		
		<script src="assets/js/carrousel.js"></script>
        <script>informations_defilantes() ;</script>
		<script type="text/javascript" src="assets/js/index.js"></script>               <!-- dessine les cercles de la carte et attribue au bouton decouvrir une addresse, associees a la specialite choisie -->
	</body>
</html> 