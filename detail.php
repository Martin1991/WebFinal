<?php

	session_start();
	include("dbcon.php");
	if (isset($_POST['tourId'])) {
		$tourid = $_POST['tourId'];
		$_SESSION['atourid']=$tourid;
	} else{
		$tourid=$_SESSION['atourid'];
	}
	$userid = $_SESSION['userId'];
	$tour_query = mysqli_query($con, "SELECT first_name, profile_image, tour_name, cover_url, tour_description, tour_line, price, starting_time, ending_time, min_people, max_people, deadline FROM tour, tour_details, guider WHERE tour.tour_id = tour_details.ttour_id AND tour.tuser_id=guider.guider_id AND tour_id='$tourid' ");
	$result = mysqli_fetch_array($tour_query);
	$order_query = mysqli_query($con, "SELECT order_id FROM tour_order WHERE customer_id = '$userid' AND checkout = 0");
	$num = mysqli_num_rows($order_query);
	
	echo "<html>
	<head>
		<title>Local Guider</title>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Tangerine'>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Varela Round'>
		<link rel='stylesheet' type='text/css' href='bootstrap.min.css'>
		<link rel='stylesheet' type='text/css' href='tour.css'>
		<link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'/> 
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script> 
		<script type='text/javascript' src='tour.js'></script>
	</head>
	<body>
		<div class = 'main-contatiner'>
			<header>
				<div class='navbar navbardefalut'>
					<div class='navbar-header'>
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
			
			<div id = 'tour-image-container' >
				<img class='title-image' src='".$result['cover_url']."'>
				<a class = 'tour-host-img' style='background-image: url(".$result['profile_image'].");'>

					<p class='host-name'>".$result['first_name']."</p>
				</a>
			</div>
			<div class = 'tour-titlebar'>
				<h2 class='title'>".$result['tour_name']."</h2>
				
			</div>
			<div class='container tour-page'>
			<div class = 'col-md-8'> 
				<div class = 'inforamtion_container'>
					<div class = 'informaiton_row'>
						<div class='tour_description'>
							<h4>Tour Information</h4>
							<pre>".$result['tour_description']."</pre>
						</div>
						<div class='tour_line'>
							<h4>Tour Line</h4>
							<pre>".$result['tour_line']."</pre>
						</div>
						
						<div class='tour_fee'>
							<h4>Tour Fee</h4>
							<pre>$".$result['price']."</pre>
						</div>

						<div class='tour_duration'>
							<h4>Tour Duration</h4>
							<pre>".$result['starting_time']." to ".$result['ending_time']."</pre>
						</div>

						<div class='tour_enrollment'>
							<h4>Enrollment Number</h4>
							<pre>".$result['min_people']." to ".$result['max_people']. "</pre>
							
						</div>

						<div class='tour_deadline'>
							<h4>Enrollment Deadline</h4>
							<pre>".$result['deadline']. "</pre>
							
						</div>
						
					</div>
				</div>
				

			</div>
			<div class='col-md-4'>
				<div class='center-block'>
					<form method='post' action='cart.php'>
						<div class='feebar form-group' >
							<span>$".$result['price']."</span>
						</div>
						<div>
							<div class='form-group'>
							<input type='hidden' class='tourId' name='tourId' value='".$tourid."'>
							
							<input class = 'btn btn-default' type='submit' name='cartsubmit' value='Add to Cart'>
							</div>
						</div>	
					</form>
				</div>
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

		
	</body>
</html>
";
	
	
?>

