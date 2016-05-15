<?php
	session_start();
	include("dbcon.php");
	$admin_query = mysqli_query($con,"SELECT order_id, customer_id, otour_id, checkout FROM tour_order ORDER BY order_id");

	// if(empty($_SESSION['userId']))
	// {
	// 	$_SESSION['userId']=-1;
	// }
	// if(empty($_SESSION['username']))
	// {
	// 	$_SESSION['username']="";
	// }
	$userid = $_SESSION['userId'];
	$order_query = mysqli_query($con, "SELECT order_id FROM tour_order WHERE customer_id = '$userid' AND checkout = 0");
	$num = mysqli_num_rows($order_query);

	$admin_query = mysqli_query($con,"SELECT tour_id, tuser_id, tour_name, min_people, max_people, starting_time, ending_time, price, tour_line FROM tour, tour_details WHERE tour_id=ttour_id ORDER BY tour_id");
	
echo "<html>
	<head>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Tangerine'>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Varela Round'>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
		<link rel='stylesheet' type='text/css' href='css/tour.css'>
		<link href='css/administrator.css' type='text/css' rel='stylesheet'/>
		<link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'/> 
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script> 
		<script type='text/javascript' src='js/tour.js'></script>
	</head>
	<body>
			<header>
				<div class='navbar navbardefalut'>
					<div class='navbar-header'>
						<div class='navbar-brand navbar-left'>
							<a href='administrator.php'><p>Local Guider</p></a>
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
		<div class = 'main-contatiner'>
			<div class = 'container'>
						<p class='admin_head'>Tour Management</p>
			<table class='table table-striped'>
			 <tr>
				<th>Tour_ID</th>
				<th>Guider_ID</th>
				<th>Tour_NAME</th>
				<th>Min_People</th>
				<th>Max_People</th>
				<th>Starting_Time</th>
				<th>Ending_Time</th>
				<th>Price</th>
				<th>Tour_Line</th>
				<th>Operation</th>
			 </tr>";
			 while ($row = mysqli_fetch_array($admin_query)) {
			 	echo "
			 	<tr>
			 	<td>".$row['tour_id']."</td>
				<td>".$row['tuser_id']."</td>
				<td>".$row['tour_name']."</td>
				<td>".$row['min_people']."</td>
				<td>".$row['max_people']."</td>
				<td>".$row['starting_time']."</td>
				<td>".$row['ending_time']."</td>
				<td>$".$row['price']."</td>
				<td>".$row['tour_line']."</td>
				<td colspan='4'>
					<form method='post' action='admin_operator.php' class='form_1'>
						<input type='hidden' class='tourId' name='tourId' value='".$row['tour_id']."'>
						<button type='submit' name='editsubmit' class='adminbutton touredit btn btn-success'>Edit</button>
						<button type='submit' name='deletesubmit' class='adminbutton tourdelete btn btn-success'>Delete</button>	
					</form>
				</td>
			 </tr>
			 ";
			}
			 echo "
			 <td colspan='10'>
			 		<form method='post' action='admin_operator.php'>
						
						<button type='submit' name='addsubmit'>Add New Tour</button>	
					</form>
			 <td>
			</table>
			
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
</html>";
?>