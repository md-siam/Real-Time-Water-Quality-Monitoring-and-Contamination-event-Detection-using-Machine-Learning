<?php
	$error="";
	if(isset($_POST['button'])){
		if(empty(trim($_POST['user-name']))|| empty(trim($_POST['user-pass']))){
			$error = "User or Password is invalid!";
		}
		else{
			$user = validate($_POST['user-name']);
			$pass = validate($_POST['user-pass']);
			include_once 'masterdb.php';
			$db = new DB();
			$res = $db->login_user($user,$pass);
			if($res == true){ //login successful
				date_default_timezone_set('Asia/Dhaka'); //set default time zone to Dhaka
				session_start();
				$_SESSION['user'] = $user; //save username
				$userid = $db->getUserIdWithName($user); //get the user id using name
				$_SESSION['userid'] = $userid;
				$lassAccessDate =  $db->getLastAccessDate($userid);
				$_SESSION['lastaccessdate'] = $lassAccessDate;
				$res2 = $db->addNewLoginInfo($userid);
				if ($res2 == true) {
					header("location: home.php");
					//$error = "username and password is correct!";				
				}
			}
			else{
				$error = "username or password is incorrect!"; 
			}
		}
	}

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
?>