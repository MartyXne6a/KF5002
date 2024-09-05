<?php
require_once("default.php");
try{
	if($auth->logout()){
		header('location: loginForm.php');
		exit;
	}
}catch(Exception $e){
	echo $e->getMessage();
}
?>
