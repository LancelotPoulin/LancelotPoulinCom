/*
GetData.js - Lancelot POULIN - 16.09.2017
Get Data from DB for each page
*/

// Handle language change for each page
function ChangeLanguageOnClick(language)
{
	$.ajax
	({
		type: "POST",
		url: "ws/GetData.php",
		data: "Language=" + language
    });
	location.reload();
}

// Index.php - Get news
if (window.location.pathname === '/index.php' || window.location.pathname === '/' || window.location.pathname === '/index')
{
	$.ajax
	({
		type: "POST",
		url: "ws/GetData.php",
		data: "Data=News",
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
				$("#news" + i).append("<h2>" + d1.split('|')[1] + "</h2>");
				$("#news" + i).append("<p>" + d1.split('|')[2] + "</p>");
				$("#newsPic" + i).append("<img src='" + d1.split('|')[3] + "' style='height:300px;'/>");
			});
		}
    });
}

// portfolio.php - Get presentation and skills
if (window.location.pathname === '/portfolio.php' || window.location.pathname === '/portfolio')
{
	$.ajax
	({
		type: "POST",
		url: "ws/GetData.php",
		data: "Data=Presentation",
		success: function(result)
		{
			var d1 = "";
			$.each(result, function(k, v) // v = [{}]
			{
				$.each(v, function(k1, v1) // v1 = {}
				{
					d1 += v1 + "|";
				});
				$("#presentation1").append(d1.split('|')[1]);
				$("#presentation2").append(d1.split('|')[2]);
				$("#presentation3").append(d1.split('|')[3]);
				$("#presentation4").attr('src', d1.split('|')[4]);
				$("#presentation5").attr('src', d1.split('|')[5]);
			});
		}
    });
	
	$.ajax
	({
		type: "POST",
		url: "ws/GetData.php",
		data: "Data=Skill",
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
				$("#skills").append("<li class='icon " + d1.split('|')[3] + "'><h3>" + d1.split('|')[1] + "</h3><p>" + d1.split('|')[2] + "</p></li>");
			});
		}
    });
}

// projects.php - Get projects
if (window.location.pathname === '/projects.php' || window.location.pathname === '/projects')
{
	$.ajax
	({
		type: "POST",
		url: "ws/GetData.php",
		data: "Data=Project",
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
				$(".tiles").append("<article style='cursor:pointer;' class='style" + (i+1) + "'><span class='image'><img src='" + d1.split('|')[5] + "' alt='' style='height:250px;' ></span><a onclick='DisplayDetailOnClick(" + d1.split('|')[0] + ")' ><h2>" + d1.split('|')[1] + "</h2><div class='content'><p>" + d1.split('|')[2] + "</p></div></a></article>");
				$("#detail").append("<div class='projects' id='project" + d1.split('|')[0] +"' style='display:none;'><h5>" + d1.split('|')[1] + "</h5><p align='justify'><span class='image left'><img src='" + d1.split('|')[6] + "' alt='' ' /></span>" + d1.split('|')[3] + "</p><p align='justify'><span class='image right'><img src='" + d1.split('|')[7] + "' alt=''  /></span>" + d1.split('|')[4] + "</p></div>");
			});
		}
    });
}

// projects.php - Hide all projects detail and show the selected one
function DisplayDetailOnClick(id)
{
	$(".projects").hide();
	$("#project" + id).show();
}

// gallery.php - Get pictures
if (window.location.pathname === '/gallery.php' || window.location.pathname === '/gallery')
{
	$.ajax
	({
		type: "POST",
		url: "ws/GetData.php",
		data: "Data=Gallery",
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
				$("#gallery").append("<div class='6u 12u$(xsmall)'><span class='image fit' ><img src='" + d1.split('|')[2] + "' alt='' style='height:350px;' /></span></div>");
			});
		}
    });
}


// Send Email
$("input[type=submit]").click(function()
{
	if ($("input[name=subscribe]").is(":checked")) { OnSubscribeClick(""); }
	$.ajax
	({
		type: "POST",
		url: "ws/SendEmail.php",
		data: $("#EmailForm").serialize(),
		success: function(result){ }
    });
	alert("Sent !");
});

// Subscribe [PostData.php]
function OnSubscribeClick(nb)
{
	$.ajax
	({
		type: "POST",
		url: "ws/PostData.php",
		data: "Subscribe=" + $("#email" + nb).val(),
		success: function(result){ }
    });
	if (nb != "") { $("#email" + nb).val("Subscribe OK !"); }
}