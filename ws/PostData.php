<?php

/*
PostData.php - Lancelot POULIN - 16.09.2017
All request for posting data
*/

session_start();

include_once("Connection.php");

header("content-type: application/json");

$data = array();

if (isset($_POST['Get']))
{
	if ($_POST['Get'] == 'News')
	{
		$query = $connection->query("SELECT n.ID, n.title, n.contents, n.picture1 FROM news n, language l WHERE l.language = '" . $_POST['Language'] . "' AND l.ID = n.language_ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "title" => $r["title"], "contents" => $r["contents"], "picture1" => $r["picture1"]);
		}
	}
	else if ($_POST['Get'] == 'Presentation')
	{
		$query = $connection->query("SELECT p.ID, p.text1, p.text2, p.text3, p.picture1, p.picture2 FROM presentation p, language l WHERE l.language = '" . $_POST['Language'] . "' AND l.ID = p.language_ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "text1" => $r["text1"], "text2" => $r["text2"], "text3" => $r["text3"], "picture1" => $r["picture1"], "picture2" => $r["picture2"]);
		}
	}
	else if ($_POST['Get'] == 'Skill')
	{
		$query = $connection->query("SELECT s.ID, s.skill, s.description, s.icon FROM skill s, language l WHERE l.language = '" . $_POST['Language'] . "' AND l.ID = s.language_ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "skill" => $r["skill"], "description" => $r["description"], "icon" => $r["icon"]);
		}
	}
	else if ($_POST['Get'] == 'Projects')
	{
		$query = $connection->query("SELECT p.ID, p.project, p.info, p.text1, p.text2, p.picture1, p.picture2, p.picture3 FROM project p, language l WHERE l.language = '" . $_POST['Language'] . "' AND l.ID = p.language_ID");
		while ($r = mysqli_fetch_assoc($query))
		{
			$data[] = array("ID" => $r["ID"], "project" => $r["project"], "info" => $r["info"], "text1" => $r["text1"], "text2" => $r["text2"], "picture1" => $r["picture1"], "picture2" => $r["picture2"], "picture3" => $r["picture3"]);
		}
	}
	
	if (empty($data)) { echo "No result found"; http_response_code(400); } else { echo json_encode($data); }
}
else if (isset($_POST['Post']))
{
	if ($_POST['Post'] == 'news')
	{
		$ID = 1;
		if ($_POST['Language'] == "fr") { $ID = 4; }
		if ($connection->query("UPDATE news SET title = '" . $_POST['newsTitle1'] ."', contents = '" . $_POST['newsContents1'] . "', picture1 = '" . $_POST['newsPicture1'] . "' WHERE ID = " . strval($ID)) && $connection->query("UPDATE news SET title = '" . $_POST['newsTitle2'] ."', contents = '" . $_POST['newsContents2'] . "', picture1 = '" . $_POST['newsPicture2'] . "' WHERE ID = " . strval($ID + 1)) && $connection->query("UPDATE news SET title = '" . $_POST['newsTitle3'] ."', contents = '" . $_POST['newsContents3'] . "', picture1 = '" . $_POST['newsPicture3'] . "' WHERE ID = " . strval($ID + 2))) 
		{ echo "Update news OK"; } 
		else { echo "Error update news"; http_response_code(400); }
	}
	else if ($_POST['Post'] == 'portfolio')
	{
		$ID = "1";
		if ($_POST['Language'] == "fr") { $ID = "2"; }
		if ($connection->query("UPDATE presentation SET text1 = '" . $_POST['portfolioText1'] ."', text2 = '" . $_POST['portfolioText2'] ."', text3 = '" . $_POST['portfolioText3'] ."', picture1 = '" . $_POST['portfolioPicture1'] ."', picture2 = '" . $_POST['portfolioPicture2'] ."' WHERE ID = " . $ID)) 
		{ echo "Update presentation OK"; } 
		else { echo "Error update presentation"; http_response_code(400); }
		
		if ($_POST['skillOption'] == "new")
		{
			$ID = "1";
			if ($_POST['Language'] == "fr") { $ID = "2"; }
			if ($connection->query("INSERT INTO skill VALUES (null, '" . $_POST['skillTitle'] . "', '" . $_POST['skillDescription'] . "', '" . $_POST['skillIcon'] . "', '" . $ID . "')")) 
			{ echo "Insert skill OK"; } 
			else { echo "Error insert skill"; http_response_code(400); }
		}
		else if ($_POST['skillOption'] != "0")
		{
			if ($connection->query("UPDATE skill SET skill = '" . $_POST['skillTitle'] . "', description = '" . $_POST['skillDescription'] . "', icon = '" . $_POST['skillIcon'] . "' WHERE ID = '" . $_POST['skillOption'] . "'")) 
			{ echo "Insert skill OK"; } 
			else { echo "Error insert skill"; http_response_code(400); }
		}
	}
	else if ($_POST['Post'] == 'project')
	{
		if ($_POST['projectOption'] == "new")
		{
			$ID = "1";
			if ($_POST['Language'] == "fr") { $ID = "2"; }
			if ($connection->query("INSERT INTO project VALUES (null, '" . $_POST['projectTitle'] . "', '" . $_POST['projectInfo'] . "', '" . $_POST['projectText1'] . "', '" . $_POST['projectText2'] . "', '" . $_POST['projectPicture1'] . "', '" . $_POST['projectPicture2'] . "', '" . $_POST['projectPicture3'] . "', '" . $ID . "')")) 
			{ echo "Insert project OK"; } 
			else { echo "Error insert project"; http_response_code(400); }
		}
		else if ($_POST['projectOption'] != "0")
		{
			if ($connection->query("UPDATE project SET project = '" . $_POST['projectTitle'] . "', info = '" . $_POST['projectInfo'] . "', text1 = '" . $_POST['projectText1'] . "', text2 = '" . $_POST['projectText2'] . "', picture1 = '" . $_POST['projectPicture1'] . "', picture2 = '" . $_POST['projectPicture2'] . "', picture3 = '" . $_POST['projectPicture3'] . "' WHERE ID = '" . $_POST['projectOption'] . "'")) 
			{ echo "Insert project OK"; } 
			else { echo "Error insert project"; http_response_code(400); }
		}
	}
}
else if (isset($_POST['Delete']))
{
	if ($_POST['Delete'] == 'portfolio')
	{
		if ($connection->query("DELETE FROM skill WHERE ID = '" . $_POST['skillOption'] . "'"))
		{ echo "Delete news OK"; } 
		else { echo "Error update news"; http_response_code(400); }
	}
	else if ($_POST['Delete'] == 'project')
	{
		if ($connection->query("DELETE FROM project WHERE ID = '" . $_POST['projectOption'] . "'"))
		{ echo "Delete project OK"; } 
		else { echo "Error update project"; http_response_code(400); }
	}
}
else if (isset($_POST['Username']) && isset($_POST['Password']))
{
	$query = $connection->query("SELECT * FROM administrator");
	while ($r = mysqli_fetch_assoc($query))
	{
		if ($_POST['Username'] == $r["username"] && $_POST['Password'] == $r["password"]) { echo json_encode("OK"); } else { echo json_encode("NOT OK"); }
	}
}
else if (isset($_POST['Subscribe']))
{
	$ID = "1";
	if ($_SESSION['language'] == "fr") { $ID = "2"; }
	if ($connection->query("INSERT INTO subscriber VALUES (null, '" . $_POST['Subscribe'] . "', '" . $ID . "')"))
	{ echo "Insert subscriber OK"; } 
	else { echo "Error insert subscriber"; http_response_code(400); }
}

@mysqli_close($connection);

?>