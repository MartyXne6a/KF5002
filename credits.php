<!-- http://unn-w19020174.newnumyspace.co.uk/MartinaPaniW19020174/editBookForm.php -->
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
						<li><a href="index.php">Home</a></li> 
						<li><a href="booksList.php">View Books List</a></li>
						<li><a href="orderBooksForm.php">Order Books</a></li>  
						<li><a href="credits.php" style="color: #b3ffff">Credits</a></li>
						<li><?php echo $link;?></li>
					</ul> 
				<?php echo $welcome;?>
				</nav>
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
			<div class = "credits">
				
				<div class="studentDetails">
					<h2>Student Details</h2>
					<label>Full Name:</label><p>Martina Pani</p>
					<label>Student ID Number:</label><p>w19020174</p>
					<label>Email address:</label><p>w19020174@northumbria.ac.uk</p>
				</div>
			
			<div class="references">
				<h2>References</h2>
				<p>All Event's descriptions used in the Home Page have been created by the Student.</p>

				<h3>Images and Video</h3>

				<p>Manfred Hofferer, unknown date, <span>Black Framed Wayfarer Eyeglasses on Book</span>, photograph, viewed 13 December 2017
				<a href="https://www.pexels.com/photo/black-framed-wayfarer-eyeglasses-on-book-733252/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels/"><br>&#60;https://www.pexels.com/photo/black-framed-wayfarer-eyeglasses-on-book-733252/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels1/&#62;</a>.&#32;<a href="https://www.pexels.com/license/"> Pexels License</a></p>

				<p>Markus Spiske, taken 12 February 2019, <span>unknown Title</span>, photograph, viewed 10 March 2019 
				<a href="https://www.pexels.com/photo/creative-internet-computer-display-2004161/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels"><br>&#60;https://www.pexels.com/photo/creative-internet-computer-display-2004161/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels/&#62;</a>.&#32;<a href="https://www.pexels.com/license/"> Pexels License</a></p>

				<p>Ravindra Panwar, unknown date, <span>unknown Title</span>, illustration, viewed 3 September 2017
				<a href="https://pixabay.com/images/id-2710335/"><br>&#60;https://pixabay.com/images/id-2710335/&#62;</a>.&#32;<a href="https://pixabay.com/service/license/"> Pixabay License</a></p>

				<p>Pixabay, taken 19 September 2016, <span>Calculator and Pen on Table</span>, photograph, viewed 23 October 2016 
				<a href="https://www.pexels.com/photo/accounting-analytics-balance-black-and-white-209224/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels/">
				<br>&#60;https://www.pexels.com/photo/accounting-analytics-balance-black-and-white-209224/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels//&#62;</a>.&#32;<a href="https://www.pexels.com/license/"> Pexels License</a></p>

				<p>Mudassar Iqbal, unknown date, <span>unknown Title</span>, illustration, viewed 4 May 2018  
				<a href="https://pixabay.com/illustrations/website-responsive-creative-design-3374825/">
				&#60;https://pixabay.com/illustrations/website-responsive-creative-design-3374825/&#62;</a>.&#32;<a href="https://pixabay.com/service/license/"> Pixabay License</a></p>

				<p>Daniel Diaz, unknown date, <span>unknown Title</span>, illustration, viewed 28 February 2017  
				<a href="https://pixabay.com/illustrations/big-data-database-to-stock-data-2103091/">
				<br>&#60;https://pixabay.com/illustrations/big-data-database-to-stock-data-2103091/&#62;</a>.&#32;<a href="https://pixabay.com/service/license/"> Pixabay License</a></p>

				<p>Christina Morillo, unknown date, <span>Woman Holding Dynamic Html Book</span>, photograph, 22 June 2018,   
				<a href="https://www.pexels.com/photo/woman-holding-dynamic-html-book-1181703/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels/">
				<br>&#60;https://www.pexels.com/photo/woman-holding-dynamic-html-book-1181703/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels/&#62;</a>.&#32;<a href="https://www.pexels.com/license/"> Pexels License</a></p>

				<p>Comfreak , unknown date, <span>unknown Title</span> , photograph, viewed 13 December 2017,
				<a href="https://pixabay.com/photos/robot-woman-face-cry-sad-3010309/">
				<br>&#60;https://pixabay.com/photos/robot-woman-face-cry-sad-3010309/&#62;</a>.&#32;<a href="https://pixabay.com/service/license/"> Pixabay License</a></p>

				<p>Pixabay, taken 16 March 2017, <span>Time Lapse Photography of Blue Lights</span> , video, viewed 6 April 2017, 
				<a href="https://www.pexels.com/photo/abstract-art-blur-bright-373543/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels/">
				<br>&#60;https://www.pexels.com/photo/abstract-art-blur-bright-373543/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels/&#62;</a>.&#32;<a href="https://www.pexels.com/it-it/license/"> Pexels Licence</a></p>

				<p>Artem Beliaikin, taken 17 February 2018 <span>Man Wearing Pink Polo Shirt With Text Overlay</span> , photograph, viewed 25 May 2018 
				<a href="https://www.pexels.com/photo/man-wearing-pink-polo-shirt-with-text-overlay-1114376/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexelsww.pexels.com/photo/christmas-scrabbles-bokeh-photography-728458/">
				<br>&#60;https://www.pexels.com/photo/man-wearing-pink-polo-shirt-with-text-overlay-1114376/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels&#62;</a>.&#32;<a href="https://www.pexels.com/it-it/license/"> Pexels License</a></p>

				<h3>Material Consulted</h3>
				<p>Php.net. n.d. PHP: Is_Numeric - Manual. [online] Available at:<br><a href="https://www.php.net">&#60;https://www.php.net&#62;</a></p>
				
				<p>W3schools.com. n.d. W3schools Online Web Tutorials. [online] Available at:<br><a href="https://www.w3schools.com">&#60;https://www.w3schools.com&#62;</a></p>
				
				<p>HTML.it. n.d. HTML.It | Guide, Download, Tutorial E News. [online] Available at:<br><a href="https://www.html.it">&#60;https://www.html.it&#62;</a></p>
				
				<p>Stack Overflow. n.d. Stack Overflow - Where Developers Learn, Share, & Build Careers. [online] Available at:<br><a href="https://stackoverflow.com">&#60;https://stackoverflow.com&#62;</a></p>
				
				<p>MDN Web Docs. [online] Available at:<br><a href="https://developer.mozilla.org/en-US/">&#60;https://developer.mozilla.org/en-US/&#62;</a></p>
				
				<p>CSS-Tricks. [online] Available at:<br><a href="https://css-tricks.com">&#60;https://css-tricks.com&#62;</a></p>
				
				<p>Mrw.it. n.d. MRW.It - Il Network Dei Professionisti ICT. [online] Available at:<br><a href="https://www.mrw.it">&#60;https://www.mrw.it&#62;</a></p>
				
				<p>Waweb (2020).<span>Il sistema di autenticazione 1.0 in PHP</span>Available at:<br><a href="https://www.youtube.com/watch?v=WZ6OtN_lPZA&list=PLdtVpbcGjJ9rPlVO2vkhEm-4dI0ICMBWO">&#60;https://www.youtube.com/watch?v=WZ6OtN_lPZA&list=PLdtVpbcGjJ9rPlVO2vkhEm-4dI0ICMBWO&#62;</a></p>
				
				<p>W3.org. n.d. World Wide Web Consortium (W3C). [online] Available at:<br><a href="https://www.w3.org">&#60;https://www.w3.org&#62;</a> </p> 
				
				<p>Brooke, P., 2020. Security In Practice.</p>
				<p>Brooke, P., 2020. Suggestion for tutorial work.</p>

				<p>Libraryguides.vu.edu.au. n.d. Library Guides: Harvard Referencing: Home. [online] Available at:<br><a href="http://libraryguides.vu.edu.au/harvard ">&#60;http://libraryguides.vu.edu.au/harvard&#62;</a></p>

				<p>2020. Quick Guide To Referencing To Avoid Plagiarism. [online] Available at: <br><a href="https://cragside.northumbria.ac.uk/Everyone/skillsplus/database_uploads/87.pdf">&#60;https://cragside.northumbria.ac.uk/Everyone/skillsplus/database_uploads/87.pdf&#62;</a></p>


			</div> 
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
				<script type="text/javascript" src="slideOutForm.js"></script>
	</body>
</html>
		
		