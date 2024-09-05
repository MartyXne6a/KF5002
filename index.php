<!-- http://unn-w19020174.newnumyspace.co.uk/MartinaPaniW19020174/index.php -->
<?php
require_once("default.php");

$welcome ="";
//check if the user is logged.
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
						<li><a href="index.php" style="color: #b3ffff">Home</a></li> 
						<li><a href="booksList.php">View Books List</a></li> 
						<li><a href="orderBooksForm.php">Order Books</a></li>  
						<li><a href="credits.php">Credits</a></li> 
						<!--logout feature will be included for logged in user, a  in the same location. login feature (form) will be included for users who aren't logged in yet-->
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
				<div class="index"> 
					<aside id="offers"></aside>
					
					<div id="mainContent">
					
					
					</div>
					<aside id="JSONoffers"></aside>
				</div>
				
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
	<script type="text/javascript" src="offers.js"></script>
	<script type="text/javascript" src="indexContent.js"></script>
	<script type="text/javascript" src="slideOutForm.js"></script>
	

</html>
		
		
		