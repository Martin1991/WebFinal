<?php

	session_start();
	
	$q = $_GET['q'];
	$newusername = $_POST['newusername'];
	$newpassword = $_POST['newpassword'];
	$newemail = $_POST['newemail'];
	
	include("dbcon.php");

	$check_query = mysqli_query($con, "SELECT user_name FROM register WHERE user_name='$q' ");
	$num = mysqli_num_rows($check_query);
	echo $num;

	//$insert_query  = mysqli_query($conn, "INSERT INTO register(user_id, user_name, email, password) VALUES ('6','$newusername', '$newemail', '$newpassword')");
	
	if (isset($_POST['guestsubmit'])){
		// $check_query = mysqli_query($conn, "SELECT user_name FROM register WHERE user_name='$q' ");
		// $num = mysqli_num_rows($check_query);
		// echo $num;

		$insert_query  = mysqli_query($con, "INSERT INTO register(user_name, email, password) VALUES ('$newusername', '$newemail', '$newpassword')");
		$select_query = mysqli_query($con,"SELECT user_id FROM register WHERE user_name='$newusername'");
		$result = mysqli_fetch_array($select_query);
		$_SESSION['userId'] = $result['user_id'];
		$_SESSION['username'] = $newusername;
		echo"<script>url='localguider.php';window.location.href=url;</script>"; 
	} else if(isset($_POST['guidersubmit'])){
		$insert_query  = mysqli_query($con, "INSERT INTO register(user_name, email, password) VALUES ('$newusername', '$newemail', '$newpassword')");
		$select_query = mysqli_query($con,"SELECT user_id FROM register WHERE user_name='$newusername'");
		$result = mysqli_fetch_array($select_query);
		$_SESSION['userId'] = $result['user_id'];
		$_SESSION['username'] = $newusername;
		echo"<script>url='profile_main.php';window.location.href=url;</script>"; 

	}
	
?>