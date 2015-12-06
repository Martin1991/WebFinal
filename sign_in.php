<?php

	session_start();
	if(!isset($_POST['submit'])){
	exit('illeagle!');
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
	$newusername = $_POST['newusername'];
	$newpassword = $_POST['newpassword'];
	$newemail = $_POST['newemail'];

	include("dbcon.php");

	$check_query  = mysqli_query($con, "SELECT user_id, user_name FROM register WHERE user_name ='".$username."' and password='".$password."'");
	if ($result = mysqli_fetch_array($check_query)) {
		$_SESSION['username'] = $username;
		$_SESSION['userId'] = $result['user_id'];
		if ($username=='localguider') {
			echo"<script>url='administrator.php';window.location.href=url;</script>"; 
		} else{header("Location: localguider.php");}

		
	} else {
		exit('login failure');
	}
	
?>