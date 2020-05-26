function zoom(tailleecran) /*propose un zoom (1 ou 2) qui s'adapte à la largeur de l'ecran utilise par l'internaute*/
	{ 
		var z;
	    if (tailleecran.matches) {
	        z = 1; 
	    } else {
	        z = 2;
	    }
	    return z;
	}

var tailleecran = window.matchMedia("(max-width: 1024px)") 

var map = L.map('map', { zoomControl: false}).setView([35, 97], zoom(tailleecran));
                        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, under <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a>. Data by <a href="http://openstreetmap.org">OpenStreetMap</a>, under <a href="http://creativecommons.org/licenses/by-sa/3.0">CC BY SA</a>.',
                            maxZoom: 3
                    	}).addTo(map)



function ecole(pays, longitude, latitude) {
  this.pays = pays;
  this.longitude = longitude;
  this.latitude = latitude;
}

/*Coordonee GPS de chaque ecole*/

/*Asie*/
var PolyU = new ecole("Chine", 104.1954, 35.8617);
var Tongji = new ecole("Chine", 104.1954, 35.8617);
var HongKongU = new ecole("Chine", 104.1954, 35.8617);
var Beihang = new ecole("Chine", 104.1954, 35.8617);
var SNU = new ecole("Coree", 126.9779692, 37.566535);
var Chung_Ang = new ecole("Coree", 126.9779692, 37.566535);
var Tohoku = new ecole("Japon", 139.691706, 35.689487);
var Keio = new ecole("Japon", 139.691706, 35.689487);
var Chualongkom = new ecole("Thailande", 100.523186, 13.736717);
var Uni_Indo = new ecole("Indonesia", 108.339537, 14.315424);

/*Europe*/
var Siegen = new ecole("Allemagne", 10.451526, 51.165691);
var AlbertLudwig = new ecole("Allemagne", 10.451526, 51.165691);
var Humboldt = new ecole("Allemagne", 10.451526, 51.165691);
var Syddansk = new ecole("Danemark", 10.40237, 55.4038);
var LaLaguna = new ecole("Espagne", -3.74922, 40.463667);
var Barcelona = new ecole("Espagne", -3.74922, 40.463667);
var Madrid = new ecole("Espagne", -3.74922, 40.463667);
var Valladolid = new ecole("Espagne", -3.74922, 40.463667);
var Roma = new ecole("Italie", 12.56738, 41.87194);
var Bologna = new ecole("Italie", 12.56738, 41.87194);

var Jyvaskyla = new ecole("Finlande", 25.7481511, 61.92411);
var Lyngby = new ecole("Danemark", 10.40237, 55.4038);
var Talinn = new ecole("Estonie", 25.0136071, 58.595272);
var Tampere = new ecole("Finlande", 25.7481511, 61.92411);
var Riga = new ecole("Lettonie", 24.603189, 56.879635);
var Delft = new ecole("Pays-bas", 5.291266, 52.132633);
var Novosibirsk = new ecole("Russie", 105.318756, 61.52401);
var Linköpings = new ecole("Suède", 18.643501, 60.128161);
var Stockholm = new ecole("Suède", 18.643501, 60.128161);

/*Ameriques*/
var Texas = new ecole("USA", -95.7, 37.2);
var Gorgia = new ecole("USA", -95.7, 37.2);
var Montreal = new ecole("Canada", -106.3, 56.1);
var Laval = new ecole("Canada", -106.3, 56.1);
var Sheerbrooke = new ecole("Canada", -106.3, 56.1);
var Bishops = new ecole("Canada", -106.3, 56.1);
var Columbia = new ecole ("Columbie", -74.3, 4.6);
var RioDeJaneiro = new ecole ("Bresil", -51.93, -14.24);
var BuenosAires = new ecole ("Bresil", -51.93, -14.24);

/*Ecoles de chaque specialite*/
var MIC   = {"id": 1, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Keio, Siegen, AlbertLudwig, Syddansk, LaLaguna, Madrid, Bologna, Jyvaskyla, Tampere, Riga, Linköpings, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var IR    = {"id": 5, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Keio, Siegen, AlbertLudwig, Syddansk, Madrid, Bologna, Jyvaskyla, Lyngby, Tampere, Riga, Novosibirsk, Linköpings, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var GMM   = {"id": 6, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Syddansk, LaLaguna, Madrid, Lyngby, Tampere, Riga, Novosibirsk, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var IMACS = {"id": 2, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Keio, Siegen, AlbertLudwig, Humboldt, Syddansk, LaLaguna, Madrid, Bologna, Talinn, Tampere, Riga, Linköpings, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var GP    = {"id": 7, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Humboldt, Syddansk, Madrid, Talinn, Tampere, Riga, Delft, Novosibirsk, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var AE    = {"id": 8, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Keio, Siegen, AlbertLudwig, Syddansk, LaLaguna, Madrid, Bologna, Tampere, Riga, Linköpings, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var IC    = {"id": 3, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Tongji, Siegen, Syddansk, LaLaguna, Bologna, Tampere, Riga, Delft, Linköpings, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var GC    = {"id": 9, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Tongji, Keio, Siegen, Syddansk, Bologna, Roma, Tampere, Riga, Delft, Linköpings, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var GM    = {"id":10, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Keio, Siegen, Syddansk, LaLaguna, Bologna, Tampere, Riga, Linköpings, Texas, Gorgia, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var ICBE  = {"id": 4, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Tongji, Syddansk, Barcelona, Madrid, Talinn, Tampere, Riga, Stockholm, Texas, Gorgia, Laval, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var GPE   = {"id":11, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Tongji, Syddansk, Madrid, Talinn, Tampere, Riga, Novosibirsk, Stockholm, Texas, Gorgia, Laval, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};
var GB    = {"id":12, "ecoles":[PolyU, Beihang, HongKongU, SNU, Chung_Ang, Chualongkom, Tohoku, Uni_Indo, Syddansk, Barcelona, Madrid, Talinn, Tampere, Riga, Delft, Stockholm, Texas, Gorgia, Laval, Montreal, Sheerbrooke, Bishops, Columbia, RioDeJaneiro, BuenosAires]};



function PAYS(Specialite) /*extrait de la specialite un tableau des pays*/ 
{	
	var n = Specialite.length;
	var Tableau = [];
    for (var iter = 0; iter < n ; iter++) 
    {	
    	lepays = Specialite[iter].pays;
    	Tableau.push(lepays);
    }	
    return Tableau;
}


function CompteOccurence(pays, Specialite) /*compte le nombre d'occurence du pays de chaque ecole de la specialite donnee pour en deduire le rayon à attribuer (proportionnel au nombre d'ecole dans un certein pays)*/
{	
	var tableau = PAYS(Specialite);
	var element = pays;
	var idx = tableau.indexOf(element);
	let compteur = 0;
	while (idx != -1) 
	{	
		compteur += 1;
		idx = tableau.indexOf(element, idx + 1);
	}	
	return compteur;
}


function AfficheCercle(Specialite) /*affiche les cercles sur la carte et adresse la liste des ecoles associes a la specialite au bouton "decouvrir"*/ 
{   

    /*nouvel adressage du bouton decouvrir*/
    allervoir = document.getElementById("voirliste").href = "liste.php?Orientation=" + (Specialite["id"]).toString();

    /*affiche les cercles sur la carte*/
    /*initialisation de la carte*/
    
	map.remove();
	map = L.map('map', { zoomControl:false }).setView([35, 0], zoom(tailleecran));
                        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, under <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a>. Data by <a href="http://openstreetmap.org">OpenStreetMap</a>, under <a href="http://creativecommons.org/licenses/by-sa/3.0">CC BY SA</a>.',
                            maxZoom: 3
                    	}).addTo(map)

	var n = Specialite["ecoles"].length;
	var Longitude_dj_Appelees = [Specialite["ecoles"][0].pays]; /*tableau qui stocke les pays deja renseigne cf ligne 150*/
	var groupedecercles = L.layerGroup();

    for (let iter = 0 ; iter < n ; iter++) 
    {	

    	var latitude = Specialite["ecoles"][iter].latitude;
    	var longitude = Specialite["ecoles"][iter].longitude;
    	var pays = Specialite["ecoles"][iter].pays;

    	if (Longitude_dj_Appelees.indexOf(pays) < 0) /*si le pays n'est pas encore utilise*/
    	{	
    		var cercle = L.circle([latitude, longitude ], 300000 * CompteOccurence(pays, Specialite["ecoles"]), {color: 'rgb(229,36,23)',  fillColor: '#f03', fillOpacity: 0.6}).addTo(groupedecercles); 

    		Longitude_dj_Appelees.push(pays);
    	} 
    }
    groupedecercles.addTo(map);
    return 0;
}