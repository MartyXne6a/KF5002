
<?php
require_once("default.php");
//content of index.php managed with AJEX
	try{
		echo randomBook($dbConn);
		echo randomBook($dbConn);
		echo randomBook($dbConn);
		
	}catch(Exception $e){
		throw new Exception("Error " . $e->getMessage(), 0, $e);
	}


// store the sql for a random book to output
function randomBook($dbConn){
	try{
				$select = "SELECT concat('<section>\n<img src=\"images/',catDesc,'.jpg\" alt=\"',bookTitle,'\" ><div class=\"text\">\n<h2 >&#8220;',bookTitle,'&#8221;</h2>\n<p><span class=\"category\">',catDesc,'</span></p>\n <p><span class=\"price\">£ ',bookPrice,' </span></p></div></section>\n') as book
				FROM NBL_books JOIN NBL_category ON NBL_books.catID = NBL_category.catID 
				ORDER BY rand() limit 1";
			
				// Prepare the sql statement using PDO
				$stmt = $dbConn->prepare($select);

				// Execute the query using PDO
				$stmt->execute();
				
				$book = $stmt->fetchObject();
			
				
				return $book->book;	
		
	}catch(PDOException $e){
		log_error($e);
		return "<p><span>Something went wrong!</span></p>\n";
	}
}
?>