<!-- http://unn-w19020174.newnumyspace.co.uk/MartinaPaniW19020174/admin.php -->
<?php
require_once("default.php");

$welcome ="";
//check if the user is logged. If not deny the access 
if(!$auth->checkLogin()){
	header('location: loginForm.php');
	exit;
}else{
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
						<li><a href="orderBooksForm.php">Order Books</a></li>  
						<li><a href="credits.php">Credits</a></li> 
						<li><?php echo $link;?></li>
					</ul> 
					<?php echo $welcome; ?>
				</nav>

					<h1>NBL &#8901 Northumbria Books Limited</h1>
				<!--navigation bar -->
				</div>
			</header>
		
			<main id="mainGrid">
				<div class="imgBG">
				</div>
				<div class= "overview">
				
		<?php
			
			/* Get each parameter value from the request stream and check to see if it was set. If it is, store it in a variable. Otherwise store a value of null in the variable */
			$input['bookISBN'] =  filter_has_var(INPUT_POST, 'bookISBN' ) ? $_POST['bookISBN'] : null;
			$input['bookTitle'] =  filter_has_var(INPUT_POST, 'bookTitle' ) ? $_POST['bookTitle'] : null;
			$input['bookYear'] =  filter_has_var(INPUT_POST, 'bookYear' ) ? $_POST['bookYear'] : null;
			$input['bookPrice'] =  filter_has_var(INPUT_POST, 'bookPrice') ? $_POST['bookPrice'] : null;
			$input['catID'] =  filter_has_var(INPUT_POST, 'catID') ? $_POST['catID'] : null;
			$input['pubID'] =  filter_has_var(INPUT_POST, 'pubID') ? $_POST['pubID'] : null;
					
			 $return = validate_inputEditBook($dbConn,$input);
		
		    
			 echo $return;
		?> 
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
	</body>
</html>
		
		