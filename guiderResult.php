<?php
	session_start();

	//$_SESSION['user_id'] = $_POST["user_id"];
	
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
//echo"1";
// $profile_image=$_POST["profile_image"];
$userId=$_POST['userId'];

//$userId=2;

//$sql="SELECT tour.tour_name, tour.tour_description, tour.location, tour.cover_url, tour.tour_id, tour_details.price, register.profile_image, tour_details.ending_time-tour_details.starting_time as duration, register.user_name FROM tour, tour_details, register
//	WHERE tour.tour_id=tour_details.ttour_id AND tour.tuser_id=register.user_id AND register.user_id='$userId'";
	
$sql="SELECT tour.tour_name, tour.tour_description, tour.location, tour.cover_url, tour.tour_id, tour_details.price, guider.profile_image, register.user_id, tour_details.ending_time-tour_details.starting_time as duration, register.user_name 
     FROM tour_details
		LEFT OUTER JOIN tour
			ON tour.tour_id = tour_details.ttour_id
		LEFT OUTER JOIN register
			ON register.user_id = tour.tuser_id
		LEFT OUTER JOIN guider
			ON guider.guider_id = register.user_id
	 WHERE tour.tour_id=tour_details.ttour_id AND tour.tuser_id=register.user_id AND register.user_id='$userId'";

$result = mysqli_query($con, $sql);
echo "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN'
'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>

<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
	    <meta name='description' content='This is Local Guider!' />
	    <meta name='keywords' content='Local Guider, travel' />
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'/>
		<link rel='stylesheet' type='text/css' href='tour.css'>
	    <link href='css/guiderResult.css' type='text/css' rel='stylesheet'/>
		<link rel='stylesheet' type='text/css' href='bootstrap.min.css'>
		<link href='css/bootstrap.min.css' type='text/css' rel='stylesheet'/>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Tangerine'>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Varela Round'>
        <link href='images/my_icon.ico'  type='image/x-icon' rel='icon' />	
		<script src='js/jquery-1.9.1.min.js'></script>
		<script src='js/search_tourDetail.js'></script>
		<script type='text/javascript' src='tour.js'></script>
		
		<link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'/> 
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script> 
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script> 
		<title>Local Guider</title>
	</head>
	<body class='main-container'>
			<header>
			<div class='navbar navbardefalut'>
				<div class='navbar-header our_logo'>
					<div class='navbar-brand navbar-left'>
						<a href='localguider.php'><p>Local Guider</p></a>
					</div>
				</div>
				<div class='navbar-collapse navbar-right hidden-xs'>
					<ul class='nav navbar-nav navbar-list'>
						<li><a href='checkout.php' class='cart'><img  class='shopping-cart' src='images/cart.png'><span>".$num." Items</span></a></li>
						<li><a href='userResult.php' class='history'><span>Book History</span></a></li>
						<li><a href='profile_main.php' class='username'><span>Welcome ".$_SESSION['username']."!</span></a></li>	
						<li><a href='#' class='register'><span>Sign Up</span></a></li>
						<li><a href='#' class='login'><span>Sign In</span></a></li>
						<li><a href='logout.php' class='logout'><span>Log Out</span></a></li>
					</ul>
				</div>
			</div>
		</header>
		<div class='result_contain container'>
		<p class='head_title'>Let's travel !</p>
			<div class='item_results'>";
while($row=mysqli_fetch_array($result))
{
	//echo "tour_name:    ".$row['tour_name'] . "<br/>"."tour_description:    ".$row['tour_description'] . "<br/>"."location:    ".$row['location'] . "<br/>"."price:    ".$row['price'] . "<br/>"."duration:    ".$row['duration'] . "<br/>"."user_name:    ".$row['user_name'] . "<br/>";
	echo "
	<div class='item_result container'>
					<div class='tourPic_div col-md-3'>
						<img class='tour_pic' src='".$row['cover_url']."' value='Pairs' alt='tour in Paris' title='tour in Paris' action='tourDetail.php' method='get'/>
					</div>
					<div class='item_content col-md-9'>
						<div class='content_up'>
							<div class='item_head_part'>
								<p class='item_head'>".$row['tour_name']."</p>
								<div class='guidercard_info'>
									<form id='search_guiderProfile' action='guider_for_guest.php' method='POST'>
									<input type='hidden' id='userId' name='userId' value='".$userId."'/>
									<noscript>
									<input id='user_img' type='submit'/>
									</noscript>
									</form>
									<img class='guider_pic' src='".$row['profile_image']."' value='yilou' alt='guider in Paris' title='guider in Paris' action='guiderDetail.php' method='get'/>
									<p class='guider_name'>".$row['user_name']."</p>
								</div>
							</div>
							<p class='item_summary'>".$row['tour_description']."</p>
						</div>
						<div class='content_down '>
							<div class='book_button'>
								<form id='search_tourDetail' action='detail.php' method='POST'>
									<input type='hidden' id='tourId' name='tourId' value='".$row['tour_id']."'/>
									<input type='submit' id='book_button' value='Book tour' class='book_button btn btn-success' disabled/>
								</form>
							</div>
							<div class='button_right'>
								<div class='item_price'>
									<p class='price_from'>PRICE FROM</p>
									<p class='price'>".$row['price']." USD"."</p>
								</div>
								<div class='tourcard_info'>
									<div class='duration'>
										<p class='dura_title'>Duration</p>
										<p class='hours'>".$row['duration']." d"."</p>
									</div>
									<div class='tour_address'>
										<p class='addr_title'>Location</p>
										<p class='addr_place'>".$row['location']."</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	";
}
	echo "
			</div>
		</div>
		<!--login-->
		<div class='overlay' style='display: none;'>
		    <div class='login-wrapper'>
		        <div class='login-content' id='loginTarget'>
		            <a class='close'>x</a>
		            <h3>Sign In</h3>
		            <form method='post' action='sign_in.php'>
		                <label for='username'>
		                    Username:
		                    <input type='text' name='username' id='username' placeholder='Username must be between 8 and 20 characters'>
		                </label>
		                <label for='password'>
		                    Password:
		                    <input type='password' name='password' id='password' placeholder='Password must contain 1 uppercase, lowercase and number'>
		                </label>
		                <button type='submit' name='submit'>Sign in</button>
		            </form>
		        </div>
		    </div>
		</div>
		<!--register-->	
		<div class='register-overlay' style='display: none;'>
		    <div class='login-wrapper'>
		        <div class='login-content' id='loginTarget'>
		            <a class='close'>x</a>
		            <h3>Sign Up</h3>
		            <form method='post' action='sign_up.php' onsubmit='return validateForm();'>
		                <label for='username'>
		                    Username:
		                    <input  type='text' name='newusername' class='required' id='new_username' placeholder='Username must be between 8 and 20 characters'> 
		                    <span id='user-result'></span>
		                </label>
		                <label for='E-mail'>
		                    E-mail:
		                    <input type='text' name='newemail' class='required' id='new_email' placeholder='Email must be between 8 and 20 characters'>
		                </label>
		                <label for='password'>
		                    Password:
		                    <input type='password' name='newpassword' class='required' id='new_password_1' placeholder='Password must contain 1 uppercase, lowercase and number'>
		                    <span id='pswd-info'>
		                    <ul>
						        <li id='letter' class='invalid'>At least <strong>one letter</strong></li>
						        <li id='capital' class='invalid'>At least <strong>one capital letter</strong></li>
						        <li id='number' class='invalid'>At least <strong>one number</strong></li>
						        <li id='length' class='invalid'>Be at least <strong>8 characters</strong></li>
						    </ul>
						    </span>
		                </label>
		                
		                <button type='submit' name='guestsubmit'>Sign Up</button>
		                <button type='submit' name='guidersubmit'>Sign Up As Guider</button>
		            </form>
		        </div>
		    </div>
		</div>
	</body>
	";
mysqli_close($con);
?>