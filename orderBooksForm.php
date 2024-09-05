<!-- http://unn-w19020174.newnumyspace.co.uk/MartinaPaniW19020174/admin.php -->
<?php
require_once("default.php");
$welcome ="";
//check if the user is logged. If not deny the access 
if($auth->checkLogin()){
	$welcome = "<p>Welcome ".$_SESSION['username']."</p>";
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!--tell mobile browsers to make the size of the layout viewport equal to the device width or the size of the screen-->
		<meta name="viewport" content="width=device-width">
		
		<!--to fix this modify the meta element that you just added so that it is as follows-->
    	<meta name="viewport" content="width=device-width,maximum-scale=1.0">
		
		<title>NBL - Northumbria Books Limited</title> 
		<link href='style.css' rel="stylesheet" type="text/css">
	</head>
		
	<body>
		<div id="gridContainer">
			<header>
				<div id="gridHeader">
				<nav>
					<ul> 
						<li><a href="index.php">Home</a></li>
						<li><a href="booksList.php">View Books List</a></li> 
						<li><a href="orderBooksForm.php" style="color: #b3ffff">Order Books</a></li>  
						<li><a href="credits.php">Credits</a></li> 
						<li><?php echo $link;?></li>
					</ul> 
					<?php echo $welcome;?>
				</nav>
					<!--aside slide out login form-->
				<div id="slideOut">
					<a href="#" id="closeSlide">&times;</a>
					<form method="post" action= "loginForm.php" id="slideForm">
						<legend>LOGIN</legend>
						<input type="text" name="username" placeholder="username">
						<input type="password" name="password" placeholder="password">
						<input type="submit" name="submit" value="Logon">
					</form>
				</div>
					
					<h1>NBL &#8901 Northumbria Books Limited</h1>
				<!--navigation bar -->
				</div>
			</header>
		
			<main id="mainGrid">
				<div class="imgBG">
				</div>
				<div class="orderBooks">
					<h2>Order Books</h2>
					<legend>Select Books</legend>
					<form id="orderForm" action="javascript:alert('form submitted');" method="get">
	<section id="orderBooks">
	<div class="th" style="background-color: #3d5c5c;">
			<span>Title</span>
			<span>Year</span>
			<span>Category</span>
			<span>Publisher</span>
			<span>Price</span>
			<span>&#9745;</span>
	</div>
<?php
/* DO NOT ALTER the code in this php block.
It dynamically generates the html required to display one checkbox for each of the records currently held in the NBL_books database table. The user can select one or more records that they are interested in ordering by clicking the checkboxes.Use the browser to look at the structure of the html generated by the php code. */

try {
	// include the file with the function for the database connection
	require_once('functions.php');
	// get database connection
	$dbConn = getConnection();
	$sqlBooks = 'SELECT bookISBN, bookTitle, bookYear, catDesc, pubName, bookPrice FROM NBL_books b INNER JOIN NBL_category c ON b.catID = c.catID INNER JOIN NBL_publisher p ON b.pubID = p.pubID ORDER BY bookTitle';

	// execute the query
	$rsBooks = $dbConn->query($sqlBooks);

	while ($book = $rsBooks->fetchObject()) {
		$bookTitle = $book->bookTitle;
		echo "\t<div class='item'>
				<span class='bookTitle'>".filter_var($bookTitle, FILTER_SANITIZE_SPECIAL_CHARS)."</span>
				<span class='bookYear'>{$book->bookYear}</span>
	            <span class='catDesc'>{$book->catDesc}</span>
	         	<span class='pubName'>{$book->pubName}</span>
	            <span class='bookPrice'>{$book->bookPrice}</span>
	            <span class='chosen'><input type='checkbox' name='book[]' value='{$book->bookISBN}' data-price='{$book->bookPrice}'></span>
	      		</div>\n";
	}
}
catch (Exception $e) {
	throw new Exception("Problem " . $e->getMessage(), 0, $e);
}
?>
	</section>
	<section id="collection">
		<h2>Collection method</h2>
		<p>Please select whether you want your chosen book(s) to be delivered to your home address (a charge applies for this) or whether you want to collect them yourself.</p>
		<p>
		Home address - &pound;5.99 <input type="radio" name="deliveryType" value="home" data-price="5.99" checked>&nbsp; | &nbsp;
		Collect from shop - no charge <input type="radio" name="deliveryType" value="shop" data-price="0">
		</p>
	</section>
	<section id="checkCost">
		<h2>Total cost</h2>
		<label>Total </label><input type="text" name="total" size="10" readonly>
	</section>
	<section id="placeOrder">
		<h2>Place Order</h2>
		<h3>Your details</h3>
		<label>Customer Type</label>
		<select name="customerType">
			<option value="">Customer Type?</option>
			<option value="ret">Customer</option>
			<option value="trd">Trade</option>
		</select>
		<div id="retCustDetails" class="custDetails">
			<label>Forename </label><input type="text" name="forename">
			<label>Surname</label> <input type="text" name="surname">
		</div>
		<div id="tradeCustDetails" class="custDetails" style="visibility:hidden">
			<label>Company Name</label> <input type="text" name="companyName">
		</div>
		<p style="color: #FF0000; font-weight: bold;" id='termsText'>I have read and agree to the terms and conditions
		<input type="checkbox" name="termsChkbx"></p>
		<p><input type="submit" name="submit" value="Book now!" disabled></p>
	</section>
</form>	
<!-- Here you need to add Javascript or a link to a script (.js file) to process the form as required for the assignment -->

				</div>
				<aside></aside>
				<aside></aside>
			</main>

			<footer class="copyR">
					<p>NBL - Northumbria Books Limited&copy; 2020</p>
					<nav>
						<ul>
							<li><a href="#">Site Map</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms and Conditions</a></li>
						</ul>
					</nav>
				</footer>
		</div>
		<script type="text/javascript" src="slideOutForm.js"></script>
		<script type="text/javascript" src="orderBook.js"></script>
	</body>
</html>
		
		