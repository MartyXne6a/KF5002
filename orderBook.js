window.addEventListener('load', function() {
	
	const l_bookForm = document.getElementById("orderForm");
    const _pTerms = document.getElementById("termsText");
	
	l_bookForm.termsChkbx.onclick = checkTerms;
	l_bookForm.submit.onclick = checkForm;
	
	l_bookForm.customerType.onchange = showDiv;
	
	// get all books available
	const l_booksAv = document.getElementsByName("book[]");
	const l_totalBooks = l_booksAv.length;
	
	//when the user selects a book the total cost of the order is calculated
	for(let i=0; i<l_totalBooks; i++){
		l_booksAv[i].onclick = calculateTotal;
		
	}
	//get the choice of the delivery method and the relative cost
	const l_deliveryMethods = l_bookForm.deliveryType;
	const l_methodsCount = l_deliveryMethods.length;
	for(let i=0; i<l_methodsCount; i++){
		l_deliveryMethods[i].onclick = calculateTotal;
		
	}
	
//Calculate the total check
function calculateTotal(){
	//variable to store the total price
	let l_total = 0;	
		
	/*list all books contained in div tags inside the form.
	querySelectorAll() returns an array of them*/
		
	const l_items = l_bookForm.querySelectorAll('div.item');//indicate tag and class
	const l_itemsCount = l_items.length;
			
	// loop the list of books 
	for(let i=0; i<l_itemsCount; i++){

		/*look for an element (included into the div.item) with type=checkbox and get the attribute "data-price".*/
		const t_itemChecked = l_items[i].querySelector("[type=checkbox]");
				
		//check what book has been selected and add the price to the total 
		if(t_itemChecked.checked){
			l_total += parseFloat(t_itemChecked.getAttribute("data-price"));
		}
				
		for(let i=0; i<l_methodsCount;i++){
			if(l_deliveryMethods[i].checked)
				var _shipCost = l_deliveryMethods[i].getAttribute("data-price");
		}
						
		/*display the total in the "total" box (name='total') by changing its "value" property after added the delivery*/

		l_bookForm.total.value = (l_total+parseFloat(_shipCost)).toFixed(2);
		
		}
};//calculateTotal()
	
/*check if the user has checked the terms and condition*/
function checkTerms(){
	/*if the user checks the terms and conditions checkbox*/
	if(l_bookForm.termsChkbx.checked == true){
		/*active the submit button*/
		l_bookForm.submit.disabled = false;
		
		/*styling the element p */
		_pTerms.style = ("color: #000000; font-weight:lighter;");
	}else{
		/*disable the submit button if the checkbox is unchecked*/
		l_bookForm.submit.disabled = true;
		_pTerms.style = ("color: #FF0000; font-weight: bold;");
			
	}
};//checkTerms()
	
/*depending on the option chose from the user, show the correct div that contains the text input*/
function showDiv(){
			if(l_bookForm.customerType.value == "trd"){
						document.getElementById("tradeCustDetails").style.visibility = " visible";
						document.getElementById("retCustDetails").style.visibility = "hidden";
			}
			if(l_bookForm.customerType.value == "ret"){
						document.getElementById("retCustDetails").style.visibility = "visible";
						document.getElementById("tradeCustDetails").style.visibility = "hidden";
			}
		}
	
		function checkForm(_evt){
				
			let _canSubmit = false;
			/*if no book has been selected launch an alert and set the check variable
			as false to prevent the submition, otherwise, set it as true. */
			if(l_bookForm.total.value==0){
				alert("No book has been selected");
				_canSubmit = false;
			}else{
				_canSubmit = true;
			}
			/*if the user doesn't select the customer type details launch an alert and change the border color of the select element*/
			if(l_bookForm.customerType.value ==""){
				alert("SPECIFY YOUR CUSTOMER DETAILS");
				l_bookForm.customerType.style.borderColor ="red";
				_canSubmit =false;
			}
			/*if the user selects customer, then show the form to insert 
			forename and surname. Make appropriate checks to ensure that the user
			provides all fields requested*/ 
			
			if(l_bookForm.customerType.value == "ret"){
				if(l_bookForm.forename.value.length == 0){
					l_bookForm.forename.style.borderColor = "red";
					_canSubmit =false;
				}else{
					l_bookForm.forename.style.borderColor = "";
					_canSubmit = true;
				}
			
				if(l_bookForm.surname.value.length == 0){
					l_bookForm.surname.style.borderColor = "red";
					_canSubmit = false;
				}else{
					l_bookForm.surname.style.borderColor = "";
					_canSubmit = true;
				}
			}
			/*if the user selects company, then show the form to insert 
			company. Make appropriate checks to ensure that the user
			provides all fields requested*/ 
			if(l_bookForm.customerType.value == "trd"){
				if(l_bookForm.companyName.value == 0){
					l_bookForm.companyName.style.borderColor = "red";
					_canSubmit = false;
				}else{
					l_bookForm.companyName.style.borderColor = "";
					_canSubmit = true;
				}
			}
			
			/*to stop the submition if something isn't right in the form 
			call preventDefault */
			if(_canSubmit){
				_evt.stopPropagation();//permit the submition 
			}else{
				_evt.preventDefault();
			}
		}
		
	
});