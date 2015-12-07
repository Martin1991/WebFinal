<?php
	session_start();
	include("dbcon.php");
	// $tourid = $_POST['tourId'];

	// $_SESSION['atourid'] = $tourid;
	
	
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
			<form action = 'guider_add_tour.php' method='post' enctype='multipart/form-data'>
			<div class = 'tour-titlebar'>
				<h2 class='title'><input type='text' name='tour_title' value='".$result['tour_name']."'></h2>
				
			</div>
			<div class='container tour-page'>
			<div class = 'col-md-8'> 
				<div class = 'inforamtion_container'>
					<div class = 'informaiton_row'>
						<div class='tour_description'>
							<h4>Tour Information</h4>

							<pre><input type='text' name='tour_information' class='form-control' value='".$result['tour_description']."'></pre>
						</div>
						<div class='tour_line'>
							<h4>Tour Line</h4>
							<pre><input type='text' name='tour_line' class='form-control' value='".$result['tour_line']."'></pre>
						</div>
					</div>
				</div>
				

			</div>
			<div class='col-md-4'>
				<div class='center-block'>
					
						<div class='form-group' >
						 	<label>Trip Fee</label>
							<input type='text' name='tour_fee' class='form-control' value='".$result['price']."'>
							
						</div>
						<div >
							<div class='form-group'>
							<label>Trip Start Date</label>
							<input type='date' name='StartDate' id='datepicker' class='form-control' value='".$result['starting_time']."'>
							</div>

							<div class='form-group'>
							<label>Trip End Date</label>
							<input type='date' name='EndDate' id='datepicker' class='form-control' value='".$result['ending_time']."' >
							</div>

							<div class='form-group'>
							<label>Enrollment Deadline</label>
							<input type='date' name='Deadline' id='datepicker' class='form-control'  value='".$result['deadline']."'>
							</div>

							<div class='form-group'>
							<label>Maximum Enrollment</label>
							<input type='text' name='maximum' class='form-control' value='".$result['max_people']."'>
							</div>

							<div class='form-group'>
							<label>Minimum Enrollment</label>
							<input type='text' name='minimum' class='form-control' value='".$result['min_people']."'>
							</div>

							<div class='form-group'>
							<label>Location</label>
							<input type='text' name='location' class='form-control'>
							</div>

							<div class='form-group'>
							<label>Category</label>
							<select name='category' class='form-control'>
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
							</div>

							<div class='form-group'>
							<label>Status</label>
							<select name='status' class='form-control'>
								<option value = ''></option>
								<option value = 'Open'>Open</option>
								<option value = 'Closed'>Closed</option> 
							</select>	
							</div>

							<div class='form-group'>
							<label for='file'>Upload Cover:</label>
							<input type='file' name='file' id='file' />
							</div>
					
							<div class='form-group'>
							<input class = 'btn btn-default' type='submit' value='Add Trip'>
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
		            <form method='post' action='sign_up.php' onsubmit='return mandatory_check()'>
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