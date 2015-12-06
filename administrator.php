<?php
session_start();
include("dbcon.php");
if(empty($_SESSION['userId']))
{
	$_SESSION['userId']=-1;
}
if(empty($_SESSION['username']))
{
	$_SESSION['username']="";
}
$userid = $_SESSION['userId'];
//$tour_query = mysqli_query($con, "SELECT first_name, profile_image, tour_name, cover_url, tour_description, tour_line, price, starting_time, ending_time, min_people, max_people, deadline FROM tour, tour_details, guider WHERE tour.tour_id = tour_details.ttour_id AND tour.tuser_id=guider.guider_id AND tour_id='$tour_id' ");
//$result = mysqli_fetch_array($tour_query);
$order_query = mysqli_query($con, "SELECT order_id FROM tour_order WHERE customer_id = '$userid' AND checkout = 0");
$num = mysqli_num_rows($order_query);

echo "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN'
'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>

<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
	    <meta name='description' content='This is Local Guider!' />
	    <meta name='keywords' content='Local Guider, travel' />
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'/>
	    <link href='css/administrator.css' type='text/css' rel='stylesheet'/>
		<link href='css/bootstrap.min.css' type='text/css' rel='stylesheet'/>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Tangerine'>
        <link href='images/my_icon.ico'  type='image/x-icon' rel='icon' />	
		<script src='js/jquery-1.9.1.min.js'></script>
		<script src='js/search_tourDetail.js'></script>
		
		<link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'/> 
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script> 
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script> 
		<script> $(document).ready(function() { $('.datepicker').datepicker(); }); </script>
		<title>Administrator</title>
	</head>
	<body>
			<header>
				<div class='navbar navbardefalut'>
					<div class='navbar-header'>
						<div class='navbar-brand navbar-left'>
							<a href='localguider.php'><p>Local Guider</p></a>
						</div>
					</div>
					<div class='navbar-collapse navbar-right hidden-xs'>
						<ul class='nav navbar-nav navbar-list'>
							<li><a href='#' class='cart'><img  class='shopping-cart' src='images/cart.png'><span>".$num."</span></a></li>
							<li><a href='#' class='history'>Book History</a></li>
							<li><a href='administrator.php' class='username'>Welcome ".$_SESSION['username']."!</a></li>
							<li><a href='#' class='register'>Sign Up</a></li>
							<li><a href='#' class='login'>Sign In</a></li>
							<li><a href='logout.php' class='logout'>Log Out</a></li>
						</ul>
					</div>
				</div>
			</header>
		<div class='container'>
			<p class='admin_head'>Administrator</p>
				<div class='pic_div'>
					<a href='admin_register.php'><img src='images/admin/admin1.jpg' id='admin_pic1' class='admin_pic' value='Bangkok' alt='Picture of Bangkok' title='Go to Bangkok'/></a>
					<p>Registers Management</p>
				</div>
				<div class='pic_div'>
					<a href='admin_tour.php' ><img src='images/admin/admin2.jpg' id='admin_pic2' class='admin_pic' value='Bangkok' alt='Picture of Bangkok' title='Go to Bangkok'/></a>
					<p>Tours Management</p>
				</div>
				<div class='pic_div'>
					<a href='admin_order.php'><img src='images/admin/admin3.jpg' id='admin_pic3' class='admin_pic' value='Bangkok' alt='Picture of Bangkok' title='Go to Bangkok'/></a>
					<p>Orders Management</p>
				</div>
		</div>
	</body>
</html>  ";
?>