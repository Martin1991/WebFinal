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
	$location = $_POST['location'];
	$category = $_POST['category'];
	$status = $_POST['status'];
	
	$tuserid = $_SESSION['userId'];

	

	include("dbcon.php");
	
			//add new trip
				
			$tour_update = mysqli_query($con, "INSERT INTO tour(tuser_id,tour_name,tour_description,location,category) VALUES('$tuserid','$tour_title','$tour_information','$location','$category')");

			$maxtourid = mysqli_query($con,"SELECT MAX(tour_id) AS maxid FROM tour WHERE tuser_id='$tuserid'");
			$row = mysqli_fetch_array($maxtourid);
			
			
			$tour_detail_update = mysqli_query($con, "INSERT INTO tour_details(ttour_id,min_people,max_people,deadline,starting_time,ending_time,price,tour_line,status) VALUES( '".$row['maxid']."','$minimum', '$maximum',  '$deadline',  '$start_date', '$end_date', '$tour_fee', '$tour_line','$status')");
			
			//$result = mysqli_fetch_array($tour_update);

			if($_POST)
			{ 
			// $_FILES["file"]["error"] is HTTP File Upload variables $_FILES["file"] "file" is the name of input field you have in form tag.

			if ($_FILES["file"]["error"] > 0)
			{
			// if there is error in file uploading 
				header("Location: guider_show.php");
			 	echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

			}
			else
			{
			// check if file already exit in "images" folder.
			if (file_exists("images/" . $_FILES["file"]["name"]))
			{
				header("Location: guider_show.php");
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{  //move_uploaded_file function will upload your image.  if you want to resize image before uploading see this link http://b2atutorials.blogspot.com/2013/06/how-to-upload-and-resize-image-for.html
			if(move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $_FILES["file"]["name"]))
			{
				$url = "images/". $_FILES["file"]["name"];
				//echo $url;
			// If file has uploaded successfully, store its name in data base
			 //mysqli_query($con, "UPDATE guider SET profile_image= '$url' WHERE guider_id = 1;");
				mysqli_query($con, "UPDATE tour SET cover_url = '$url' WHERE tour_id = '".$row['maxid']."'");
				header("Location: guider_show.php");
				echo "Stored in: " . "images/" . $_FILES["file"]["name"];

			}
			}


			}
			}
			header("Location: guider_show.php");
	
?>