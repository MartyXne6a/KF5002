window.addEventListener('load', function() {
    'use strict';
    const l_editForm = document.getElementById("editBook");
	//Submitting the function checkForm()
    l_editForm.submit.onclick = checkForm;
	
	const l_title = document.getElementById('title');
	const l_price = document.getElementById('price');
	const l_year = document.getElementById('year');
	
	function checkForm(_evt){
	//Check if all required information has been provided  
	let _canSubmit = true;

	if(!l_editForm.bookTitle.value){
	 		l_title.innerHTML = "Please, insert the title.";
			_canSubmit = false;
	}else if(l_editForm.bookTitle.value.length>255){
			l_title.innerHTML ="The title MUST include no more than 255 characters.";
			_canSubmit = false;
	}else{
		l_title.innerHTML ="";	
	}
		
	if(!l_editForm.bookYear.value){
		l_year.innerHTML = "Please, insert the year of release.";
		_canSubmit = false;
	}else if((l_editForm.bookYear.value.length!=4)||(isNaN(l_editForm.bookYear.value))){
			l_year.innerHTML = "The format required for the year is YYYY and MUST be a numeric digit.";
			_canSubmit = false;
	}else{
		l_year.innerHTML ="";
	}
		
	if(!l_editForm.bookPrice.value){
			l_price.innerHTML = "Please, insert the price";
			_canSubmit = false;
	}else if(isNaN(l_editForm.bookPrice.value))
			{
				l_price.innerHTML ="The price entered is not valid. It MUST be a decimal number.";
				_canSubmit = false;
	}else{
		l_price.innerHTML ="";
	}
	
		if(_canSubmit){
				_evt.stopPropagation;
			}else{
				_evt.preventDefault();
			}
	}//checkForm
});

