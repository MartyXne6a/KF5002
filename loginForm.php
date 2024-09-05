<!-- http://unn-w19020174.newnumyspace.co.uk/MartinaPaniW19020174/loginForm.php-->
<?php
require_once("default.php");
$return ="";
// login process	
if($_POST){

				$return .= $auth->login();
				if($return == "logged"){
					header('location: index.php');
					exit;
				}
	
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
				</nav>

					<h1>NBL &#8901 Northumbria Books Limited</h1>
				<!--navigation bar -->
				</div>
			</header>
		
			<main id="mainGrid">
				<div class="imgBG">
					<div>
					<section id="error"></section>
					<section  id="mainForm">
					<!--submition is disabled until the checkForm() returns true-->
					<form method="post" action= "loginForm.php" id="loginForm">
						<legend>ADMIN LOGIN</legend>
						<?php echo $return?>
						<input type="text" name="username" placeholder="username">
						<input type="password" name="password" placeholder="password">
						<input type="submit" name="submit" value="Logon">
					</form>
					</section>
					
					</div>
				</div>
				<div> 
					
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
	<script type="text/javascript" src="formProcess.js"></script>
</html>
		
		