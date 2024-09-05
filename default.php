<?php
/*This code:
 1) specifies that session files should be stored in the sessionData folder and then starts a new session.
 2) requires the files needed 
 3) creates a PDO connection with the database 
 4) creates a new object of Authentication
 5) checks if the user is a logged in user
 6) calls the viewLink function and assign to a variable the return of it. It will be used in each page to echo the appropriate link in the nav bar.
 */
	ini_set("session.save_path", "/home/unn_w19020174/sessionData");
	session_start();

	require_once("functions.php");
	require_once("Authentication.php");

	$dbConn=getConnection();

	$auth = new Authentication($dbConn);

	$link = $auth->viewLink();
?>