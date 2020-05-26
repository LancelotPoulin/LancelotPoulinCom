/*
PostData.js - Lancelot POULIN - 16.09.2017
Get Data from DB and post for modify/insert/delete
*/


var SkillData;
var ProjectData;

				
// Login for admin only
$("#login").click(function()
{
	$.ajax
	({
		type: "POST",
		url: "ws/PostData.php",
		data: "Username=" + $("#username").val()  + "&Password=" + $("#password").val(),
		success: function(result)
		{
			if (result == "OK") 
			{
				$("#section").html("<div class='inner'> <section> <h3>Choose a page:</h3> <div class='row uniform'> <div class='10u 10u'> <div class='select-wrapper'> <select id='pageSelect' name='page'> <option value='0'>- Page -</option> <option value='news'>News</option> <option value='portfolio'>Portfolio</option> <option value='project'>Project</option> <option value='gallery'>Gallery</option> <option value='emailing'>Emailing (Beta)</option> </select> </div> </div> <div class='1u 12u$(small)'> <input type='radio' id='language-en' value='en' name='language' checked> <label for='language-en'>EN</label> </div> <div class='1u 12u$(small)'> <input type='radio' id='language-fr' value='fr' name='language'> <label for='language-fr'>FR</label> </div> <div class='12u 12u$'><hr></div> <!-- News --> <form method='post' id='newsForm'> <div class='row uniform' id='news' style='display:none;'> <div class='12u 12u$(xsmall)'><h5>News 1:</h5></div> <div class='6u 12u$(xsmall)'> <h6>Title:</h6> <input type='text' name='newsTitle1' value='Empty' /><br /> <h6>Picture:</h6> <input type='text' name='newsPicture1' value='Empty' /> </div> <div class='6u 12u$(xsmall)'> <h6>Description:</h6> <textarea name='newsContents1' rows='4'>Empty</textarea> </div> <div class='12u 12u$(xsmall)'></div> <div class='12u 12u$(xsmall)'><h5>News 2:</h5></div> <div class='6u 12u$(xsmall)'> <h6>Title:</h6> <input type='text' name='newsTitle2' value='Empty' /><br /> <h6>Picture:</h6> <input type='text' name='newsPicture2' value='Empty' /> </div> <div class='6u 12u$(xsmall)'> <h6>Description:</h6> <textarea name='newsContents2' rows='4'>Empty</textarea> </div> <div class='12u 12u$(xsmall)'></div> <div class='12u 12u$(xsmall)'><h5>News 3:</h5></div> <div class='6u 12u$(xsmall)'> <h6>Title:</h6> <input type='text' name='newsTitle3' value='Empty' /><br /> <h6>Picture:</h6> <input type='text' name='newsPicture3' value='Empty' /> </div> <div class='6u 12u$(xsmall)'> <h6>Description:</h6> <textarea name='newsContents3' rows='4'>Empty</textarea> </div> <div class='12u 12u$(xsmall)'></div> <div class='12u$'> <ul class='actions'> <li><input type='submit' value='Save changes' class='special post' /></li> </ul> </div> </div> </form> <!-- Portfolio --> <form method='post' id='portfolioForm'> <div class='row uniform' id='portfolio' style='display:none;'> <div class='12u 12u$(xsmall)'><h4>Presentation</h4></div> <div class='6u 12u$(xsmall)'> <h6>Text 1:</h6> <textarea name='portfolioText1' rows='4'>Empty</textarea> </div> <div class='6u 12u$(xsmall)'> <h6>Text 2:</h6> <textarea name='portfolioText2' rows='4'>Empty</textarea> </div> <div class='6u 12u$(xsmall)'> <h6>Text 3:</h6> <textarea name='portfolioText3' rows='4'>Empty</textarea> </div> <div class='6u 12u$(xsmall)'> <br /><h6>Picture 1:</h6> <input type='text' name='portfolioPicture1' value='Empty' /><br /> <h6>Picture 2:</h6> <input type='text' name='portfolioPicture2' value='Empty' /> </div> <div class='12u 12u$(xsmall)'></div> <div class='12u 12u$(xsmall)'><h4>Skills</h4></div> <div class='12u 12u$'> <div class='select-wrapper'> <select name='skillOption'> </select> </div> </div> <div class='6u 12u$(xsmall)'> <h6>Title:</h6> <input type='text' name='skillTitle' value='Empty' /><br /> <h6>Icon:</h6> <input type='text' name='skillIcon' value='fa-code' /><br /> </div> <div class='6u 12u$(xsmall)'> <h6>Description:</h6> <textarea name='skillDescription' rows='4'>Empty</textarea> </div> <div class='12u$'> <ul class='actions'> <li><input type='button' value='Delete' class='' /></li> <li><input type='submit' value='Save changes' class='special' /></li> </ul> </div> </div> </form> <!-- Projects --> <form method='post' id='projectForm'> <div class='row uniform' id='project' style='display:none;'> <div class='12u 12u$'> <div class='select-wrapper'> <select name='projectOption'> </select> </div> </div> <div class='6u 12u$(xsmall)'> <h6>Title:</h6> <input type='text' name='projectTitle' value='Empty' /> <h6>Description:</h6> <input type='text' name='projectInfo' value='Empty' /> </div> <div class='6u 12u$(xsmall)'> <h6>Text 1:</h6> <textarea name='projectText1' value='Empty' rows='4'></textarea> </div> <div class='6u 12u$(xsmall)'> <h6>Text 2:</h6> <textarea name='projectText2' value='Empty' rows='4'></textarea> </div> <div class='6u 12u$(xsmall)'> <h6>Picture 1:</h6> <input type='text' name='projectPicture1' value='Empty' /> <h6>Picture 2:</h6> <input type='text' name='projectPicture2' value='Empty' /> <h6>Picture 3:</h6> <input type='text' name='projectPicture3' value='Empty' /> </div> <div class='12u$'> <ul class='actions'> <li><input type='submit' value='Delete' class='' /></li> <li><input type='submit' value='Save changes' class='special' /></li> </ul> </div> </div> </form> <!-- Gallery --> <form method='post' id='galleryForm'> <div class='row uniform' id='gallery' style='display:none;'> <div class='6u 12u$(xsmall)'> <div class='select-wrapper'> <select name='galleryOption'> <option value='0'>- Nothing -</option> <option value='1'>Add new</option> </select> </div> </div> <div class='6u 12u$(xsmall)'> <h6>Upload picture:</h6> <input type='file' name='galleryPicture' /> </div> <div class='12u$'> <ul class='actions'> <li><input type='submit' value='Delete' class='' /></li> <li><input type='submit' value='Save changes' class='special' /></li> </ul> </div> </div> </form> <!-- Emailing --> <form method='post' id='emailingForm'> <div class='row uniform' id='emailing' style='display:none;'> <div class='6u 12u$(xsmall)'> <h6>Object:</h6> <input type='text' name='emailObject' value='Empty' /><br /> <h6>Picture:</h6> <input type='text' name='emailPicture' value='Empty' /> </div> <div class='6u 12u$(xsmall)'> <h6>Message:</h6> <textarea name='emailMessage' placeholder='Enter your message' rows='6'></textarea> </div> <div class='12u$'> <ul class='actions'> <li><input type='submit' value='Send email' class='special' /></li> </ul> </div> </div> </form> </div> </section> </div>");
			}
			else 
			{
				alert("You're not administrator."); 
			}
		}
	});
});


// Hide and show current admin tab selected
$(document.body).on('change', '#pageSelect', function()
{
	$(".row .uniform").hide();
	$("#" + $("#pageSelect").val()).show();
	
	GetData();
});

$(document.body).on('change', 'input[name=language]', function()
{
	GetData();
});


// Reset selects and get data from db
function GetData()
{
	$("select[name=skillOption]").empty().append('<option value="0">- Nothing -</option><option value="new">Add new</option>');
	$("select[name=projectOption]").empty().append('<option value="0">- Nothing -</option><option value="new">Add new</option>');
	
	if ($("#pageSelect").val() == "news") { GetNews(); }
	else if ($("#pageSelect").val() == "portfolio") { GetPortfolio(); }
	else if ($("#pageSelect").val() == "project") { GetProjects(); }
}


// Post new data in db
$(document.body).on('click', 'input[type=submit]',function()
{
	$.ajax
	({
		type: "POST",
		url: "ws/PostData.php",
		data: "Post=" + $("#pageSelect").val() + "&Language=" + $("input[name=language]:checked").val() + "&" + $("#" + $("#pageSelect").val() + "Form").serialize(),
		success: function(result){ }
    });
});

$(document.body).on('click', 'input[value=Delete]', function()
{
	$.ajax
	({
		type: "POST",
		url: "ws/PostData.php",
		data: "Delete=" + $("#pageSelect").val() +"&Language=" + $("input[name=language]:checked").val() + "&" + $("#" + $("#pageSelect").val() + "Form").serialize(),
		success: function(result){ }
    });
	location.reload();
});


// Get news
function GetNews()
{
	$.ajax
	({
		type: "POST",
		url: "ws/PostData.php",
		data: "Get=News&Language=" + $("input[name=language]:checked").val(),
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
				$("input[name=newsTitle" + i + "]").val(d1.split('|')[1]);
				$("input[name=newsPicture" + i + "]").val(d1.split('|')[3]);
				$("textarea[name=newsContents" + i + "]").val(d1.split('|')[2]);
			});
		}
    });
}


// Get presentation and skills
function GetPortfolio()
{
	$.ajax
	({
		type: "POST",
		url: "ws/PostData.php",
		data: "Get=Presentation&Language=" + $("input[name=language]:checked").val(),
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
				$("textarea[name=portfolioText1]").val(d1.split('|')[1]);
				$("textarea[name=portfolioText2]").val(d1.split('|')[2]);
				$("textarea[name=portfolioText3]").val(d1.split('|')[3]);
				$("input[name=portfolioPicture1]").val(d1.split('|')[4]);
				$("input[name=portfolioPicture2]").val(d1.split('|')[5]);
			});
		}
    });
	
	$.ajax
	({
		type: "POST",
		url: "ws/PostData.php",
		data: "Get=Skill&Language=" + $("input[name=language]:checked").val(),
		success: function(result)
		{
			SkillData = result;
			var i = 0; var d1 = "";
			$.each(result, function(k, v) // v = [{}]
			{
				i++; d1 = "";
				$.each(v, function(k1, v1) // v1 = {}
				{
					d1 += v1 + "|";
				});
				$("select[name=skillOption]").append("<option value='" + d1.split('|')[0] + "'>" + d1.split('|')[1] + "</option>");
			});
		}
    });
}

// Make selected skill data in html
$(document.body).on('change', 'select[name=skillOption]', function()
{
	var i = 0; var d1 = "";
	$.each(SkillData, function(k, v) // v = [{}]
	{
		i++; d1 = "";
		$.each(v, function(k1, v1) // v1 = {}
		{
			d1 += v1 + "|";
		});
		if (d1.split('|')[0] == $("select[name=skillOption]").val())
		{
			$("input[name=skillTitle]").val(d1.split('|')[1]);
			$("input[name=skillIcon]").val(d1.split('|')[3]);
			$("textarea[name=skillDescription]").val(d1.split('|')[2]);
		}
	});
});


// Get projects
function GetProjects()
{
	$.ajax
	({
		type: "POST",
		url: "ws/PostData.php",
		data: "Get=Projects&Language=" + $("input[name=language]:checked").val(),
		success: function(result)
		{
			ProjectData = result;
			var i = 0; var d1 = "";
			$.each(result, function(k, v) // v = [{}]
			{
				i++; d1 = "";
				$.each(v, function(k1, v1) // v1 = {}
				{
					d1 += v1 + "|";
				});
				$("select[name=projectOption]").append("<option value='" + d1.split('|')[0] + "'>" + d1.split('|')[1] + "</option>");
			});
		}
    });
}

// Make selected project data in html
$(document.body).on('change', 'select[name=projectOption]', function()
{
	var i = 0; var d1 = "";
	$.each(ProjectData, function(k, v) // v = [{}]
	{
		i++; d1 = "";
		$.each(v, function(k1, v1) // v1 = {}
		{
			d1 += v1 + "|";
		});
		if (d1.split('|')[0] == $("select[name=projectOption]").val())
		{
			$("input[name=projectTitle]").val(d1.split('|')[1]);
			$("input[name=projectInfo]").val(d1.split('|')[2]);
			$("textarea[name=projectText1]").val(d1.split('|')[3]);
			$("textarea[name=projectText2]").val(d1.split('|')[4]);
			$("input[name=projectPicture1]").val(d1.split('|')[5]);
			$("input[name=projectPicture2]").val(d1.split('|')[6]);
			$("input[name=projectPicture3]").val(d1.split('|')[7]);
		}
	});
});
