<?php 
require_once("default.php");
//class to manage the logon functionality
class Authentication{
	//define a private variable to maintain the connection reference
	private $PDO;
	
	public function __construct(\PDO $PDOconn){
		$this->PDO = $PDOconn;
	}//constructor
	
	/*manage the login attempt*/
	public function login(){
		
			$input['password'] = filter_has_var(INPUT_POST, 'password') ? $_POST['password'] : null;
			$input['username'] = filter_has_var(INPUT_POST, 'username') ? $_POST['username'] : null;
		
            $input = trim_input($input);
		    
		try{
				//check if the input required has been inserted
				if(empty($input['username'])||empty($input['password']))
				{
					throw new Exception("Missing credentials");
				}

				/* Query the NBL_users database table to get the password hash for the username entered by the user, using a PDO named placeholder for the username */

				$querySQL = "SELECT passwordHash FROM NBL_users WHERE username = :username";

				// Prepare the sql statement using PDO
				$stmt = $this->PDO->prepare($querySQL);

				// Execute the query using PDO
				$stmt->execute(array(':username' => $input['username']));

				/* Check if a record was returned by the query. If yes, then there was a username matching what was entered in the logon form and we can test to see if the password entered in the logon form was correct. Otherwise, throw a new exception. */

				$user = $stmt->fetchObject();

				if (!$user) {
					/* Set a message to say that no matching was found */
						throw new Exception("Your credentials don't match.");
				}
				//fetch the passwordHash of the user
				$passwordHash = $user->passwordHash;

				if(!password_verify($input['password'],$passwordHash )){
					/* Set a message to say the username or password were incorrect. Don’t say which. */
						throw new Exception("Your credentials don't match.");
				}
				
				$_SESSION['logged-in'] = true;
				$_SESSION['username'] = $input['username'];

			}catch (PDOException $e) {
				log_error($e);
				//return instead to echo -> stop instead to continue compiling the code
				return"<p><span>There was a problem with the connection. Try again after few minutes</span></p>";
			}catch(Exception $e){
				return "<p><span>".$e->getMessage()."</span></p>";
			}
			return "logged";
		}//login()

		/*manage the logout from the restricted area*/
		public function logout(){
			
        // remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy(); 
			
		return true;
		}//logout

		/*check the user authentication in each webpage*/
		public function checkLogin(){
			
		    if(isset($_SESSION['logged-in']))
			return true;
			
			return false;
		}	
	    
	    /*Basing on the return of the checkLogin(), return the login/logout feature to be display in each page*/
		public function viewLink(){
			
		    if($this->checkLogin())
			return  "<a href='logout.php'>Logout</a>\n";
			
			return "<a href='#' id='openSlide'>Login</a>";
		}
	}

?>
