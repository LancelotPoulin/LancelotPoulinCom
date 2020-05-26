<?php

/*
GetData.php - Lancelot POULIN - 16.09.2017
All request for getting data
*/

session_start();

include_once("Connection.php");

header("content-type: application/json");

$data = array();

if (isset($_POST['Language']))
{
	$_SESSION['language'] = $_POST['Language'];
}
else if (isset($_POST['Data']))
{

	if ($_POST['Data'] == 'News')
	{
		$query = $connection->query("SELECT n.ID, n.title, n.contents, n.picture1 FROM news n, language l WHERE l.language = '" . $_SESSION['language'] . "' AND l.ID = n.language_ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "title" => $r["title"], "contents" => $r["contents"], "picture1" => $r["picture1"]);
		}
	}
	else if ($_POST['Data'] == 'Presentation')
	{
		$query = $connection->query("SELECT p.ID, p.text1, p.text2, p.text3, p.picture1, p.picture2 FROM presentation p, language l WHERE l.language = '" . $_SESSION['language'] . "' AND l.ID = p.language_ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "text1" => $r["text1"], "text2" => $r["text2"], "text3" => $r["text3"], "picture1" => $r["picture1"], "picture2" => $r["picture2"]);
		}
	}
	else if ($_POST['Data'] == 'Skill')
	{
		$query = $connection->query("SELECT s.ID, s.skill, s.description, s.icon FROM skill s, language l WHERE l.language = '" . $_SESSION['language'] . "' AND l.ID = s.language_ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "skill" => $r["skill"], "description" => $r["description"], "icon" => $r["icon"]);
		}
	}
	else if ($_POST['Data'] == 'Gallery')
	{
		$query = $connection->query("SELECT ID, picture, directory FROM gallery");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "picture" => $r["picture"], "directory" => $r["directory"]);
		}
	}
	else if ($_POST['Data'] == 'Project')
	{
		$query = $connection->query("SELECT p.ID, p.project, p.info, p.text1, p.text2, p.picture1, p.picture2, p.picture3 FROM project p, language l WHERE l.language = '" . $_SESSION['language'] . "' AND l.ID = p.language_ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "project" => $r["project"], "info" => $r["info"], "text1" => $r["text1"], "text2" => $r["text2"], "picture1" => $r["picture1"], "picture2" => $r["picture2"], "picture3" => $r["picture3"]);
		}
	}

	if (empty($data)) { echo "No result found"; http_response_code(400); } else { echo json_encode($data); }

}

@mysqli_close($connection);

?>