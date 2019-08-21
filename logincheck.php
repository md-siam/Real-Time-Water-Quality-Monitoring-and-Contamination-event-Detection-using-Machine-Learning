<?php
	session_start();
	if(!isset($_SESSION['user']) || empty($_SESSION['user'])){ //to prevent direct access to this page
		header("location:index.php");	
	}
	else {
		
		// echo $_SESSION['user']."<br>";
		// echo $_SESSION['userid'];
	
	}
?>