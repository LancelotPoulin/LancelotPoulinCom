window.onscroll = function() {jauge()};

function jauge() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("progression").style.width = scrolled + "%";
  document.getElementById("progression").style.backgroundColor = "rgb(" + (255 - 255*(scrolled/100)).toString() + "," +(255*(scrolled/100)).toString() + "," + (0).toString() + ")";

  /*if (scrolled <= 30)
  {
  	document.getElementById("progression").style.backgroundColor = "red";
  }
  if (scrolled > 30 && scrolled <= 50)
  {
  	document.getElementById("progression").style.backgroundColor = "orange";
  }
  if (scrolled > 50 && scrolled <= 75)
  {
  	document.getElementById("progression").style.backgroundColor = "yellow";
  }
  if (scrolled > 75)
  {
  	document.getElementById("progression").style.backgroundColor = "green";
  }*/
}

/**/