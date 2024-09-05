window.addEventListener('load', function(){
"use-strict";
//store the PHP script path in a constant 
	const URL_OFFERS = "getOffers.php";
	const URL_OFFERS_JSON = URL_OFFERS + "?useJSON";
	
const htmlCallback = function (data) {
	document.getElementById("offers").innerHTML = "<img src='images/htmlOffers.jpg' alt ='booksOffers'>"+data;
}

const jsonCallback = function (data) {
	
	let html = "<img src='images/jsonOffers.jpg' alt ='booksOffers2'><p>&#8220" + data.bookTitle + "&#8221<br><span class=\"category\">Category: " + data.catDesc + "</span><br>\n<span class=\"price\">Price: £ "+data.bookPrice+"</span></p>";
	
	document.getElementById("JSONoffers").innerHTML = html;
}

const fetchOffers = function(URL, callback){
	fetch(URL)
	.then(
      function(response) {
      	 const contentType = response.headers.get('content-type');
        if (contentType.includes('application/json')) {
          return response.json();
        }
        return response.text();
    })
    .then(
      function(data) {
      	 callback(data);
    })
    .catch(
      function(err) {
        console.log("Something went wrong!", err);
    });
}

//fetch a different image every 5 seconds
const htmlInterval = function(){
	fetchOffers(URL_OFFERS, htmlCallback);
}
const jsonInterval = function(){
	fetchOffers(URL_OFFERS_JSON, jsonCallback);
}
htmlInterval();
jsonInterval();
	
setInterval(htmlInterval,5000);
setInterval(jsonInterval,5000);
});