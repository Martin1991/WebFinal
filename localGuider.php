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
	    <link href='css/localGuider.css' type='text/css' rel='stylesheet'/>
		<link rel='stylesheet' type='text/css' href='css/tour.css'>
		<link href='css/bootstrap.min.css' type='text/css' rel='stylesheet'/>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Tangerine'>
        <link href='images/my_icon.ico'  type='image/x-icon' rel='icon' />	
		<script src='js/jquery-1.9.1.min.js'></script>
		<script src='js/localGuider.js'></script>
		<script type='text/javascript' src='js/tour.js'></script>
		
		<link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'/> 
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script> 
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script> 
		<script> $(document).ready(function() { $('.datepicker').datepicker(); }); </script>
		<title>Local Guider</title>
	</head>

	<body>
		<div class='main_container'>
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
			<div class='front_Container'>
				<div class='front_Background'>
				   <img src='images/front_Background.jpg' alt='Picture of Front Background' title='Tours by real locals'/>
				   	<!--<p class='signUp'><a href='page2.html'>Sign up</a></p>
						<p class='logIn'><a href='page2.html'>Log in</a></p>
						<p class='logOut'><a href='page2.html'>Log out</a></p> -->
				    <p class='our_saying'>Life can be likened to a journey with an unknown destination !</p>
				    <p class='our_banner'>Tours by real locals, Let's go!</p>
				</div>
			</div>
			<div class='search_Container'>
				<div class='search_Bar col-md-2'>
				  <form id='searchForm' action='preprocessing_searchResult.php' method='POST'>
					  <p>Category:
						<select name='Category' class='form-control'>
						  <option value=''></option>
						  <option value='Natural'>Natural</option>
						  <option value='Cultural'>Cultural</option>
						  <option value='Adventure'>Adventure</option>
						  <option value='Leisure'>Leisure</option>
						  <option value='Religious'>Religious</option>
						  <option value='Business'>Business</option>
						  <option value='Sport and recreation'>Sport and recreation</option>
						  <option value='Health or medical'>Health or medical</option>
						</select>
					  </p>
					  <p>Location: <input type='text' id='Location' name='Location' class='form-control'/></p>
					  <p>Price: <input type='text' id='Price' name='Price' class='form-control'/></p>
					  <p>Start Time: <input type='text' name='StartTime' class='form-control datepicker'/></p>
					  <p>End Time: <input type='text' name='EndTime' class='form-control datepicker'/></p>
					  <input type='submit' value='Search' class='btn btn-default'/>
				  </form>
				</div>
				<div class='search_PopularPlace col-md-10'>
				    <table>
						<tr>
							<td class='popular_pic'>
								<img src='images/pop_location/Beijing.jpg' class='pic_submit' value='Beijing' alt='Picture of Beijing' title='Go to Beijing' action='search.php' method='get'/>
								<p>Beijing</p>
							</td>
							<td class='popular_pic'>
								<img src='images/pop_location/Bangkok.jpg' class='pic_submit' value='Bangkok' alt='Picture of Bangkok' title='Go to Bangkok'/>
								<p>Bangkok</p>
							</td>
							<td class='popular_pic'>
								<img src='images/pop_location/Moscow.jpg' class='pic_submit' value='Moscow' alt='Picture of Moscow' title='Go to Moscow'/>
								<p>Moscow</p>
							</td>
						</tr>
						<tr>
							<td class='popular_pic'>
								<img src='images/pop_location/NewYork.jpg' class='pic_submit' value='NewYork' alt='NewYork' title='Go to NewYork'/>
								<p>NewYork</p>
							</td>
							<td class='popular_pic'>
								<img src='images/pop_location/Paris.jpg' class='pic_submit' value='Paris' alt='Picture of Paris' title='Go to Paris'/>
								<p>Paris</p>
							</td>
							<td class='popular_pic'>
								<img src='images/pop_location/Seoul.jpg' class='pic_submit' value='Seoul' alt='Picture of Seoul' title='Go to Seoul'/>
								<p>Seoul</p>
							</td>
						</tr>
						<tr>
							<td class='popular_pic'>
								<img src='images/pop_location/Tokyo.jpg' class='pic_submit' value='Tokyo' alt='Picture of Tokyo' title='Go to Tokyo'/>
								<p>Tokyo</p>
							</td>
							<td class='popular_pic'>
								<img src='images/pop_location/NewDelhi.jpg' class='pic_submit' value='NewDelhi' alt='Picture of New Delhi' title='Go to New Delhi'/>
								<p>New Delhi</p>
							</td>
							<td class='popular_pic'>
								<img src='images/pop_location/Singapore.jpg' class='pic_submit' value='Singapore' alt='Picture of Singapore' title='Go to Singapore'/>
								<p>Singapore</p>
							</td>
						</tr>
					</table>
				</div>
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
    <div class='clear'></div>
	</body>
</html> ";
?>