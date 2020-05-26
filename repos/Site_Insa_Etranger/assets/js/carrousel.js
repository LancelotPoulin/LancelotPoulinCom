 
var tab_carrousel = document.getElementsByClassName("carrousel")
var defilement_iter= -1 ;

function afficher(i){
	tab_carrousel[i].setAttribute("class","caroussel");
}

function cacher(i){
	tab_carrousel[i].setAttribute("class","caroussel_cache");
}

function informations_defilantes(){

		if(defilement_iter==tab_carrousel.length-1){
			defilement_iter=0 ;
		}else{
			defilement_iter++ ;
		}
		var i ;
		for(i=0;i<tab_carrousel.length;i++){
			tab_carrousel[i].style.display = "none";
		}
		tab_carrousel[defilement_iter].style.display = "block";

    setTimeout(function(){
		informations_defilantes(); // relance la fonction
    }, 5000);

}