window.addEventListener('load', function(){
"use-strict";
//store the PHP script path in a constant 
const URL_BOOKS = "getIndexContent.php";
	
const htmlContent = function (data) {
	document.getElementById("mainContent").innerHTML = data;
}
const fetchBooks = function(){
	fetch(URL_BOOKS)
	.then(
      function(response) {
      	 const contentType = response.headers.get('content-type');
		  return response.text();
    })
    .then(
      function(data) {
      	 htmlContent(data);
    })
    .catch(
      function(err) {
        console.log("Something went wrong!", err);
    });
}

fetchBooks();
const interval = 1000 * 600;
setInterval(fetchBooks, interval);
	

});