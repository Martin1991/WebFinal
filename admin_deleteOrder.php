<?php
	session_start();

	//$_SESSION['user_id'] = $_POST["user_id"];
	
include("dbcon.php");
//echo"1";
$orderId=$_POST["orderId"];
$sql="DELETE FROM tour_order WHERE order_id = '$orderId'";

$result = mysqli_query($con, $sql);
mysqli_close($con);
header("Location:admin_order.php");
?>