/*
	POULIN Lancelot - 08/12/18
*/


// liste.php - Récupère les écoles depuis DB
if (window.location.pathname.split("/").pop() === 'liste.php')
{
	var Orientation = $("#tri").attr("name");
	$.ajax
	({
		type: "POST",
		url: "ws/GetData.php",
		data: "Data=Liste&Orientation=" + Orientation,
		success: function(result)
		{
			var i = 0; var d1 = "";
			$.each(result, function(k, v) // v = [{}]
			{
				i++; d1 = "";
				$.each(v, function(k1, v1) // v1 = {}
				{
					d1 += v1 + "|";
				});

				var indiceCout = "";
				if (d1.split('|')[3] < 500) { indiceCout = "green"; }
				else if (d1.split('|')[3] < 900) { indiceCout = "orange"; }
				else { indiceCout = "red"; }
				
				$(".tiles").append("<article id='" + indiceCout + "' name='" + d1.split('|')[6] + "'><header><h3><a href='presentation_universite.php?ID=" + d1.split('|')[0] + "'>" + d1.split('|')[1] + "</a></h3><time>" + d1.split('|')[2] + ", " + d1.split('|')[5] + "</time><p style='color: " + indiceCout + ";'>€</p></header><a href='presentation_universite.php?ID=" + d1.split('|')[0] + "' class='image'><img src='/repos/Site_Insa_Etranger" + d1.split('|')[4] + "' /></a></article>");
			});
		}
    });
}


// presentation_universite.php - Récupère les écoles depuis DB
if (window.location.pathname.split("/").pop() === 'presentation_universite.php')
{
	var ID = $("#nomEcole").attr("name");
	$.ajax
	({
		type: "POST",
		url: "ws/GetData.php",
		data: "Data=Detail&ID=" + ID,
		success: function(result)
		{
			var i = 0; var d1 = "";
			$.each(result, function(k, v) // v = [{}]
			{
				i++; d1 = "";
				$.each(v, function(k1, v1) // v1 = {}
				{
					d1 += v1 + "|";
				});
				
				$("#uniTitle").text(d1.split('|')[0]);
				$("#villePays").text(d1.split('|')[1] + ", " + d1.split('|')[11]);
				$("#description").text(d1.split('|')[2]);
				$("#programme").attr('href', d1.split('|')[3]);
				$("#cout").text("Cout de la vie: " + d1.split('|')[4] + "€ par mois");
				$("#securite").text("Indice de sécurité: " + d1.split('|')[7] + " / 90");
				$("#classement").text("Classement mondial: " + d1.split('|')[6] + "ème");
				
				$("#joliBouton").attr('href', d1.split('|')[5]);
				
				$("#ext").attr('src', "/repos/Site_Insa_Etranger" + d1.split('|')[9]);
				$("#petitLogo").attr('src', "/repos/Site_Insa_Etranger" + d1.split('|')[8]);
				$("#class").attr('src', "/repos/Site_Insa_Etranger" + d1.split('|')[10]);
			});
		}
    });
}


// liste.php - trie les écoles selon critères
function SearchListe()
{
	$("article").hide();
	var cout = $("input[name='coutRadio']:checked").attr('id');
	if (cout == "demo-priority-a") { cout = "green"; }
	else if (cout == "demo-priority-b") { cout = "orange"; }
	else if (cout == "demo-priority-c") { cout = "red"; }
	var langage = $("select[name='langage'] option:selected").val();
	
	if (cout == "demo-priority-all" && langage == "all")
	{
		$("article").show();
	}
	else if (cout == "demo-priority-all")
	{
		$("article[name=" + langage + "]").show();
	}
	else if (langage == "all")
	{
		$("article#" + cout).show();
	}
	else
	{
		$("article#" + cout + "[name=" + langage + "]").show();
	}
}