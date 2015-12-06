<?php
	session_start();
	include("dbcon.php");
	$tourId = $_POST['tourId'];
	$userid = $_SESSION['userId'];
	if (isset($_POST['cartsubmit'])){
		$cart_insert = mysqli_query($con, "INSERT INTO tour_order(customer_id, otour_id, checkout) VALUES ('$userid', '$tourId', '0')");
		$src_page = $_SERVER['HTTP_REFERER'];
		header("location:".$src_page);
		//echo"<script>url='detail.php';window.location.href=url;</script>"; 
	}
?>