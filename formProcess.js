window.addEventListener('load', function() {
    'use strict';
    const l_form = document.getElementById("loginForm");
	const l_errorBox = document.getElementById("error");
	//Submitting the function checkForm()
    l_form.submit.onclick = checkForm;
	
	//Check if all required information has been provided  
	function checkForm(){	
		
	//Check if the user has entered the password and username
	if(!l_form.username.value){
		//create a message to inform the user
	    l_errorBox.classList.add("alert");
		l_errorBox.innerHTML = "<p>You need to insert your username</p>";
		return false;
	}	
	if(!l_form.password.value){
		l_errorBox.classList.add("alert");
		l_errorBox.innerHTML = "<p>You need to insert your password</p>";
		return false;
	}
	
	return true;
}//checkForm
});
