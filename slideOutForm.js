window.addEventListener('load', function(){
"use-strict";
	
	const loginLink = document.getElementById("openSlide");
	//clicking on "login" a slide, that contains a login form, will be opened 
	loginLink.onclick = function(e){
		const slide = document.getElementById("slideOut");
		slide.style.width = "205px";
	}
	//clicking on the "times" simble, the slide will be closed
	const times = document.getElementById("closeSlide");
	times.onclick = function(e){
		const slide = document.getElementById("slideOut");
		slide.style.width = "0";
	}
	
});