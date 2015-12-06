<?php
	session_start();

	//$_SESSION['user_id'] = $_POST["user_id"];
	
$con=mysqli_connect("localhost","root","199058","localguider");
if(mysqli_connect_errno())
{
	echo"Failed to connect to MySQL:".mysqli_connect_error();
}
//echo"1";
$orderId=$_POST["orderId"];
$sql="DELETE FROM tour_order WHERE order_id = '$orderId'";

$result = mysqli_query($con, $sql);
mysqli_close($con);
header("Location:admin_order.php");
?>