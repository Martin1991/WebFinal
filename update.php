<?php
	session_start();
	$tour_title = $_POST['tour_title'];
	$tour_information = $_POST['tour_information'];
	$tour_line = $_POST['tour_line'];
	$tour_fee = $_POST['tour_fee'];
	$start_date = $_POST['StartDate'];
	$deadline = $_POST['Deadline'];
	$end_date = $_POST['EndDate'];
	$maximum = $_POST['maximum'];
	$minimum = $_POST['minimum'];
	$tourid=$_SESSION['atourid'];
	$tuserid = $_SESSION['userId'];
	$location = $_POST['location'];
	$category = $_POST['category'];
	$status = $_POST['status'];
	$tourid = $_SESSION['atourid'];
	
	include("dbcon.php");

		
			$tour_update = mysqli_query($con, "UPDATE tour SET tour_name = '$tour_title', tour_description = '$tour_information', location = '$location', category = 'category' WHERE  tour_id='$tourid' ");
			$tour_detail_update = mysqli_query($con, "UPDATE tour_details SET min_people = '$minimum', max_people = '$maximum', deadline = '$deadline', starting_time = '$start_date', ending_time = '$end_date', price = '$tour_fee', tour_line = '$tour_line', status = '$status' WHERE  ttour_id = '$tourid' ");
			
			//$result = mysqli_fetch_array($tour_update);

			if($_POST)
			{ 
			// $_FILES["file"]["error"] is HTTP File Upload variables $_FILES["file"] "file" is the name of input field you have in form tag.

			if ($_FILES["file"]["error"] > 0)
			{
			// if there is error in file uploading 
			header("Location: admin_tour.php");
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";


			}
			else
			{
			// check if file already exit in "images" folder.
			if (file_exists("images/" . $_FILES["file"]["name"]))
			{
				header("Location: admin_tour.php");
			echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{  //move_uploaded_file function will upload your image.  if you want to resize image before uploading see this link http://b2atutorials.blogspot.com/2013/06/how-to-upload-and-resize-image-for.html
			if(move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $_FILES["file"]["name"]))
			{
				$url = "images/". $_FILES["file"]["name"];
				
			// If file has uploaded successfully, store its name in data base
			 //mysqli_query($con, "UPDATE guider SET profile_image= '$url' WHERE guider_id = 1;");
				mysqli_query($conn, "UPDATE tour SET cover_url = '$url' WHERE tour_id = '$tourid = '$tourid';'");
				header("Location: admin_tour.php");
				echo "Stored in: " . "images/" . $_FILES["file"]["name"];

			}
			}


			}
			}

			header("Location: admin_tour.php");

	
	
?>