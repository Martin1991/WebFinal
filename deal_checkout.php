<?php
	session_start();

	//$_SESSION['user_id'] = $_POST["user_id"];
	
include("dbcon.php");
//echo"1";
$userId=$_SESSION["userId"];
$date_time=$_POST["date_time"];
$date_time = substr($date_time,0,33);
$sql="UPDATE tour_order SET checkout = '1', pay_date='$date_time' WHERE customer_id = '$userId' AND checkout='0'";
$result = mysqli_query($con, $sql);

mysqli_close($con);
header("Location:thanks.php");
?>