<?php

/*
GetData.php - Lancelot POULIN - 2.11.2018
All requests for getting data
*/

session_start();

include_once("Connection.php");

header("content-type: application/json");

$data = array();

if (isset($_POST['Data']))
{

	if ($_POST['Data'] == 'Liste')
	{
		if ($_POST['Orientation'] != '0')
		{
			$query = $connection->query("SELECT e.ID, e.Nom, e.Ville, e.Cout, e.ImgExterieur, p.Pays, l.Langage FROM ecole e, orientation o, ecole_has_orientation eho, pays p, langage l WHERE e.ID = eho.ecole_ID AND o.ID = eho.orientation_ID AND o.ID = '" . $_POST['Orientation'] . "' AND p.ID = e.pays_ID AND l.ID = e.langage_ID");
		}
		else
		{
			$query = $connection->query("SELECT e.ID, e.Nom, e.Ville, e.Cout, e.ImgExterieur, p.Pays, l.Langage FROM ecole e, pays p, langage l WHERE p.ID = e.pays_ID AND l.ID = e.langage_ID");
		}
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "Nom" => $r["Nom"], "Ville" => $r["Ville"], "Cout" => $r["Cout"], "ImgExterieur" => $r["ImgExterieur"], "Pays" => $r["Pays"], "Langage" => $r["Langage"]);
		}
	}
	else if ($_POST['Data'] == 'Detail')
	{
		$query = $connection->query("SELECT e.Nom, e.Ville, e.Description, e.Programme, e.Cout, e.Contact, e.Classement, e.Securite, e.ImgLogo, e.ImgExterieur, e.ImgClassement, p.Pays, l.Langage FROM ecole e, pays p, langage l WHERE p.ID = e.pays_ID AND l.ID = e.langage_ID AND e.ID = '" . $_POST['ID'] . "'");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("Nom" => $r["Nom"], "Ville" => $r["Ville"], "Description" => $r["Description"], "Programme" => $r["Programme"], "Cout" => $r["Cout"], "Contact" => $r["Contact"], "Classement" => $r["Classement"], "Securite" => $r["Securite"], "ImgLogo" => $r["ImgLogo"], "ImgExterieur" => $r["ImgExterieur"], "ImgClassement" => $r["ImgClassement"], "Pays" => $r["Pays"]);
		}
	}
	else if ($_POST['Data'] == 'Index')
	{
		$query = $connection->query("SELECT p.COUNT(*) FROM pays p, ecole e WHERE e.pays_ID = p.ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "text1" => $r["text1"], "text2" => $r["text2"], "text3" => $r["text3"], "picture1" => $r["picture1"], "picture2" => $r["picture2"]);
		}
	}

	if (empty($data)) { echo "No result found"; http_response_code(400); } else { echo json_encode($data); }
}

@mysqli_close($connection);

?>