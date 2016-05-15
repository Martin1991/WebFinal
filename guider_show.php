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

// get user_id from sign up webpage
$user_id = $_SESSION['userId'];
$result_register = mysqli_query($con, "SELECT * FROM register WHERE user_id = '$user_id';");
$row = mysqli_fetch_array($result_register);
$user_name=$row['user_name'];
$email=$row['email'];
$password=$row['password'];

$result_guider= mysqli_query($con, "SELECT * FROM guider WHERE guider_id = '$user_id';");
$row1 = mysqli_fetch_array($result_guider);
$first_name = $row1['first_name'];
$last_name = $row1['last_name'];
$phone = $row1['phone'];
$occupation = $row1['occupation'];
$sex = $row1['sex'];
$dob = $row1['dob'];
$url = $row1['profile_image'];
//echo $url;


echo "
<!DOCTYPE html>
<html class='guider background size'>
<head>
	<script src='js/jquery-1.6.2.min.js'></script> 
    <script src='js/jquery-ui-1.8.15.custom.min.js'></script>
    <script type='text/javascript' src='js/tour.js'></script>
    
    <link rel='stylesheet' type='text/css' href='css/tour.css'>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='css/profile.css'>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Tangerine'>
    <link rel='stylesheet' href='css/jqueryCalendar.css'></link> 
	<script>
	$(function(){
		$('#datepicker').datepicker();
	});
	</script>
	<meta charset='UTF-8'></meta>
	<title>Local Guider - your private tour search engine ...</title>
</head>
<body>
	<div class='mainArea'>
	<header>
				<div class='navbar navbardefalut'>
					<div class='navbar-header'>
						<div class='navbar-brand navbar-left'>
							<a href='localguider.php'><p>Local Guider</p></a>
						</div>
					</div>
					<div class='navbar-collapse navbar-right hidden-xs'>
						<ul class='nav navbar-nav navbar-list'>
							<li><a href='checkout.php' class='cart'><img  class='shopping-cart' src='images/cart.png'>".$num." Items</a></li>
							<li><a href='userResult.php' class='history'>Book History</a></li>
							<li><a href='profile_main.php' class='username'>Welcome ".$_SESSION['username']."!</a></li>
							<li><a href='#' class='register'>Sign Up</a></li>
							<li><a href='#' class='login'>Sign In</a></li>
							<li><a href='logout.php' class='logout'>Log Out</a></li>
						</ul>
					</div>
				</div>
			</header>
	<div class='topbar'>
		<!--//1170x60-->
		<div class='wrap'>
			<a class='logo' href='homepage.html'></a>

		</div>
	</div>
	<div class='header'>
		<div class='wrap'>
			<div class='icon-box profile'>
			</div>
			<div class='title-box'>
				<h1>Personal Information</h1>
			</div>
		</div>

	</div>
	<div class='steps-container'>
		<div class='step-wrap'>
			<div class='step-position'>
				<div class='step-bar'>
					<ul>
						<li>
							<a class='active' href='localGuider.html'>
								Profile
								<span>The essential info</span>
							</a>
						</li>
					</ul>
				</div>
				<div class='content_form'>
						<div class='profile-image' data-upload-url='".$url."'>
							<img class='image' id='profile-image' src='".$url."'/>
							
								<div class='loaderbg'>
									<div class='loader'></div>

								</div>
							</div>

					    <div class='personal-details-columns'>
					    	User Name: <br>
					    	".$user_name."
					    	<br>
					    	<br>
					    	Email Address: <br>
					    	".$email."
					    	<br>
					    	<br>
					    	Passowrd: <br>
					    	".$password."
					    	<br>
					    	<br>
					    	First Name: <br>
					    	".$first_name."
					    	<br>
					    	<br>
					    	Last Name: <br>
					    	".$last_name."
					    	<br>
					    	<br>
					    	Phone: <br>
					    	".$phone."
					    	<br>
					    	<br>
					    	Occupation: <br>
					    	".$occupation."
					    	<br>
					    	<br>
					    	Sex: <br>
					    	".$sex."
					    	<br>
					    	<br>
					    	Date of Birth: <br>
					    	".$dob."
					    	<br>
					    	<br>


					    	
					    </div>
					    <div class='submit'>
					    <form action='guider.php'>
							<input class='button'   type='submit' value='Update Information>'>
					    </form>
						<form action='guiderResult.php' method='POST'>
							<input type='hidden' class='userId' name='userId' value='".$user_id."'>
							<input class='button'   type='submit' value='Check Tours >'>
					    </form>
					    <form action='guider_operator.php'>
							<input class='button'  name='addsubmit' type='submit' value='Add Tour>'>
					    </form>
					    
					    </div>
					
					</form>	
				</div>
			</div>
		</div>

	</div>
	<div class='footer'>
		<p>Welcome to LocalGuider!</p>
		
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
</html>
";
mysqli_close($con);

// include 'profile.html';
?>