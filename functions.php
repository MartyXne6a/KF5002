<?php
//database connection with PDO
function getConnection() {
	try {
			$connection = new PDO("mysql:host=localhost;dbname=unn_w19020174",'unn_w19020174','PnaMtn94');
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connection;
		} catch (PDOException $e) {
			throw new Exception("<p>Connection error ". $e->getMessage(), 0, $e);
		}
}//getConnection()

//trim input
function trim_input($inputs){
	foreach($inputs as $key => $value){
		$inputs[$key] = trim($value);
	}
	return $inputs;
}

// function to check if a text input has a length in a certain range 
function validateLength($input, $minLength, $maxLength) {
    $length = strlen($input);

    if (($length  < $minLength)||($length > $maxLength))
		return false;
     else 
        return true;  
}
//query the db to display a books list
function booksList_Output($dbConn){
			//retrieve books details from database
		try {	
			    //statement to retrieve all details from NBL_books and NBL_category tables
				$select = "SELECT bookISBN, bookTitle, bookYear, bookPrice, catDesc
				FROM NBL_books JOIN NBL_category ON NBL_books.catID = NBL_category.catID  ORDER BY bookTitle";
			
				// Prepare the sql statement using PDO
				$stmt = $dbConn->prepare($select);

				// Execute the query using PDO
				$stmt->execute();
			
				//iteration through the result
				while ($book = $stmt->fetch(PDO::FETCH_ASSOC)) {
					
					//filter records before to output them to the browser 
					$book = filter_BookForList($book);
					
					// store each record in an array
					$output[]="<tr id=''>
								<td>".$book['bookISBN']."</td>
								<td><a href='editBookForm.php?ISBN=".$book['bookISBN']."'>".$book['bookTitle']."</a></td>
								<td>".$book['bookYear']."</td>
								<td>".$book['catDesc']."</td>
								<td>".$book['bookPrice']."</td>
						      </tr>";
				}
			
			//return all the table rows
			return $output;
				
		}catch (PDOException $e){
			log_error($e);
			return "<p><span>A problem occured. Please try again.</span></p>\n";
		}

}

//filter the query result before output 
function filter_BookForList($book){
	
					$book['bookISBN'] = filter_var($book['bookISBN'], FILTER_SANITIZE_STRING);
					$book['bookTitle'] = filter_var($book['bookTitle'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
					$book['bookYear'] = filter_var($book['bookYear'], FILTER_SANITIZE_STRING);
					$book['bookPrice'] = filter_var($book['bookPrice'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
					$book['catDesc'] = filter_var($book['catDesc'], FILTER_SANITIZE_STRING);
	
	return $book;
}

//filter the query result before output
function filter_bookToEdit($book){
 
					$book['bookTitle'] = filter_var($book['bookTitle'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
					$book['bookYear'] = filter_var($book['bookYear'], FILTER_SANITIZE_STRING);
					$book['bookPrice'] = filter_var($book['bookPrice'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION); 
					$book['catDesc'] = filter_var($book['catDesc'], FILTER_SANITIZE_STRING);
					$book['catID'] = filter_var($book['catID'], FILTER_SANITIZE_STRING);
					$book['pubID'] = filter_var($book['pubID'], FILTER_SANITIZE_STRING);
					$book['pubName'] = filter_var($book['pubName'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	
	return $book;
}

//categories drop-down list
function catList($dbConn,$catID){
	
					//retrieve all categories from NBL_category to create drop-down list
					$select    = "SELECT * FROM NBL_category WHERE catID != '$catID' ORDER BY catDesc";
					// Prepare the sql statement using PDO
					$stmt = $dbConn->prepare($select);
				
					// Execute the query using PDO
					$stmt->execute(array(':catID'=>$catID));
				
					while($catOption = $stmt->fetch(PDO::FETCH_ASSOC)) {
						//filter records
						$catOption['catDesc'] = filter_var($catOption['catDesc'], FILTER_SANITIZE_STRING);
						$catOption['catID'] = filter_var($catOption['catID'], FILTER_SANITIZE_STRING);
						
						$options[] = "<option value=".$catOption['catID'].">".$catOption['catDesc']."</option>";
					}
				
					return $options;
	
}//catList()

//publishers drop-down list
function pubList($dbConn, $pubID){
	
			
					//retrieve all publishers from NBL_publisher to create drop-down list
					$select  = "SELECT * FROM NBL_publisher WHERE pubID != '$pubID' ORDER BY pubName";
					// Prepare the sql statement using PDO
					$stmt = $dbConn->prepare($select);
				
					// Execute the query using PDO
					$stmt->execute();
				
					while($pubOption = $stmt->fetch(PDO::FETCH_ASSOC)) {
						
						//filter records
						$pubOption['pubName'] = filter_var($pubOption['pubName'], FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
						$pubOption['pubID'] = filter_var($pubOption['pubID'], FILTER_SANITIZE_STRING);
						$pubOption['location'] = filter_var($pubOption['location'], FILTER_SANITIZE_STRING);
						
						$options[] = "<option value=".$pubOption['pubID'].">".$pubOption['pubName']."</option>
						<p>".$pubOption['location']."</p>";
					}
				
					return $options;

}//pubList()

//retrieve the details from the database of the book selected 
function bookDetails($dbConn,$bookISBN){
		
			    //statement to retrieve all details from NBL_books of the book chosen
				$select = "SELECT *
				FROM NBL_books JOIN NBL_category ON NBL_books.catID = NBL_category.catID JOIN NBL_publisher on NBL_books.pubID = NBL_publisher.pubID 
				WHERE bookISBN ='$bookISBN' ORDER BY bookTitle";
			
				// Prepare the sql statement using PDO
				$stmt = $dbConn->prepare($select);

				// Execute the query using PDO
				$stmt->execute();
				
				$book = $stmt->fetch(PDO::FETCH_ASSOC);
			
					//filter record before to output them to the browser 
					$book = filter_bookToEdit($book);
			
					return $book;
				
		
}//bookDetails()

//edit book form
function createBookForm($dbConn){
					
		$bookISBN = filter_has_var(INPUT_GET, 'ISBN')? $_GET['ISBN'] : null;
	
	// check if the user has accessed to the page through booksList.php
    	try{
				if(empty($bookISBN))
					{
						throw new Exception ("Something going wrong. You have entered the web address directly through the Web Browser bar instead to select the book you want to edit.");	
					}
		
			$book = bookDetails($dbConn,$bookISBN);
	
			$form ="
			<label>ISBN</label><input type='text' name ='bookISBN' value ='$bookISBN' readonly required>
			
			<label>Year</label> <input type='text' name='bookYear' value=".$book['bookYear'].">
			<span id = 'year'></span>
			<label>Title</label> <textarea name='bookTitle' value=".$book['bookTitle'].">".$book['bookTitle']."</textarea>
			<span id='title'></span>
			<label>Category</label>
			<select name='catID'required>
				<option value = ".$book['catID']." selected>".$book['catDesc']."</option>";
			        
					$categories= catList($dbConn,$book['catID']);
									 foreach($categories as $cat)
										$form .=  $cat;
			$form .="
			</select>

			<label>Publisher</label>
			<select name='pubID'required>
				<option value =".$book['pubID']." selected >".$book['pubName']."</option>";
			
				$publishers = pubList($dbConn, $book['pubID']);
								foreach($publishers as $pub)
									$form .=  $pub;
				$form .="</select>
 
			<label>Price £</label><input type='text' name='bookPrice' value =".$book['bookPrice']." >
			<span id ='price'></span>";
			
			}catch (PDOException $e){
				header('refresh: 5, url = booksList.php');
				log_error($e);
				return "<p><span>A problem occured. Please try again.<span></p>\n";
			}catch(Exception $e){
				header('refresh: 5, url = booksList.php');
				return "<p></span>".$e->getMessage()."</span></p>";
			}
			return $form;

}//createBookForm
	
//update the record of the NBL_books table								
function updateBook($dbConn,$book){
	
		//Substitute placeholders $input['var'] with :var
		$insert  = "UPDATE NBL_books SET bookTitle = :bookTitle, bookYear = :bookYear, bookPrice = :bookPrice, catID = :catID, pubID = :pubID
		WHERE bookISBN = :bookISBN ";
		
		//prepare the SQL statement and store the result
	    $stmt = $dbConn->prepare($insert);
			
		//execute the prepared statement, passing it an array of values to be substituted for the placeholders
		$stmt->execute(array
					 (':bookISBN'=>$book['bookISBN'],':bookTitle'=>$book['bookTitle'], ':bookYear'=>$book['bookYear'], ':bookPrice'=>$book['bookPrice'], ':catID'=>$book['catID'], ':pubID'=>$book['pubID']));
}//updateBook

//check input from the editBookForm.php
function checkInput($input){
	if(empty($input["bookTitle"])||empty($input["bookYear"])||empty($input["bookPrice"]))
			throw new Exception("You don't enter all requested fields");
	
	if(strlen($input['bookTitle']>255))
			throw new Exception("The book's title MUST include no more than 255 characters.");
		
	if((strlen($input['bookYear'])!=4)||!is_numeric($input['bookYear']))
			throw new Exception("Input not valid. The format required for the year is YYYY and MUST be a numeric digit.");	
		
	if(!is_numeric($input['bookPrice']))
			throw new Exception("The price entered is not valid. It MUST be a decimal number.");
}//checkInput

//output an overview of the updated book
function overviewBook($dbConn,$bookISBN){
    $book = bookDetails($dbConn,$bookISBN);
	$output = "	<legend>Book successfully updated </legend><img src='images/".$book['catDesc'].".jpg' alt='".$book['bookTitle']."'><div class='text'>
					<h2>".$book['bookTitle']."</h2>
					<p><span>ISBN: </span>".$book['bookISBN']."</p>
					<p class='category'><span>Category: </span>".$book['catDesc']."</p>
					<p><span>Publisher:</span> ".$book['pubName']." ".$book['location']."</p>
					<p><span>Year: </span>".$book['bookYear']."</p>
					<p class='price'><span>Price: </span>£ ".$book['bookPrice']."</p></div>";
	return $output;
}

function validate_inputEditBook($dbConn,$input){
	
	//use trim() to ensure that space without text is not considered a valid input
	
	$input = trim_input($input);
	$ISBN = $input['bookISBN'];
	try{
			//check if all requested parameters have been inserted 
			checkInput($input);
	
			updateBook($dbConn,$input);
		
	}catch(PDOException $e){
				header("refresh: 5, url = editBookForm.php?ISBN=$ISBN");
				log_error($e);
				return "<p><span>Update failed</span></p>\n";
				
	}catch(Exception $e){
				header("refresh: 5, url = editBookForm.php?ISBN=$ISBN");
				return "<p><span>".$e->getMessage()."</span></p>\n";			
	}	
	
	return overviewBook($dbConn,$ISBN);
}

/** 
* define a function to be the global exception handler that 
* will fire if no catch block is found
* @param $e
*/
function exceptionHandler ($e) {
	echo "<p><strong>Problem occured</strong></p>";
log_error($e);
}
/* set the php exception handler to be the one above */
set_exception_handler('exceptionHandler');

/**
* define a function to be the global error handler, this will
* convert errors into exceptions.
*/

function errorHandler ($errno, $errstr, $errfile, $errline) {
// check error isn’t excluded by server settings
  if(!(error_reporting() & $errno)) { 
return; 
}
  throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}
/* set the php error handler to be the one above */
set_error_handler('errorHandler');

/*function to log detailed error messages with technical details to an error log file*/
function log_error($e){
	//open a file; 'ab' mode doesn’t overwrite older errors with new ones
	$fileHandle = fopen("error_log_file.log ","ab");
	
	if($fileHandle === false)
	{
		throw new Exception("Could not open the file.");
	}
	//store the date and time that the error occurred in a variable, say 
	$errorDate = date('D M j G:i:s T Y');

	//store the error details
	$errorMessage = $e->getMessage();

	
	//separate ‘records’ to prevent problems caused when the file is read
	$toReplace = array("\r\n", "\n", "\r"); //chars to replace
	$replaceWith = '';
	$errorMessage = str_replace($toReplace, $replaceWith, $errorMessage);

	//write a line to the file
	fwrite($fileHandle, $errorDate."|".$errorMessage.PHP_EOL);
	
	//close the file
	fclose($fileHandle);
}

//to read a given file passed as parameter in a php script.
function read_error_log_file($filePath){
		// "rb" -> reading mode
		$fileHandle = fopen($filePath,"rb");
		if($fileHandle === false)
		{
			throw new Exception("Could not open the file.");
		}
		/* iterate through each line of the file of error details using a while loop provided that we have not reached the end of the file*/
	
		while(!feof($fileHandle)){
			// read the line and store it in a variable
			$line = fgets($fileHandle);
			
			// if line has content then 
			echo "<ul>";
			if($line){
				//trim it
				$line = trim($line);
				// split the content on the | character into an array
				$part = explode('|',$line);
				// html code to display the error message
				echo "<li>Date: ".$part[0]. " Error Details: " .$part[1]." </li>\n";
			}
			echo "</ul>";
		}
		fclose($fileHandle);
}


?>