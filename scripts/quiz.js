/* added at the beginning to check the js file is linked
alert("Hello World"); */

var questionNumber = 0;
var score = 0;
function showQuestion(questionNo){
	
	var x = document.getElementsByClassName("question");
	for(var i=0; i<x.length; i++){
		//hide paragraph
		x[i].style.display = "none";		
	}
	// if we are not on the last question display the next question
	// otherwise display the final paragraph
	
	if (questionNo < x.length) {
		x[questionNo].style.display = "block";
	}
	else{
		document.getElementById('complete').style.display = "block";
	}
}

/* This function will only be run if the person clicks
	within one of the spans within a question */
	
	$(".question span").click(function(){
		
		/* jquery checks if the span tag which was clicked has a class name
		of correct. if it does, it adds one to the score */
		
		if ($(this).hasClass("correct")) {
			score++;		
		}
		
		// change the html to show the new score
		// jquery equivalent is $("#score").html(score);
		
		document.getElementById("score").innerHTML = score;
		questionNumber++;
		showQuestion(questionNumber); // run the function to load the next question
	})
	
	window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));