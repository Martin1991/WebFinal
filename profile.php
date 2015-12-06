<?php
session_start();
$con=mysqli_connect("localhost","root","199058","localguider");
if(mysqli_connect_errno())
{
	echo"Failed to connect to MySQL:".mysqli_connect_error();
}
//echo"1";



// $profile_image=$_POST["profile_image"];


$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$phone=$_POST["phone"];
$occupation=$_POST["occupation"];
$sex=$_POST["sex"];
$dob_1=$_POST["dob"];
$dob_2=DateTime::createFromFormat('m/d/Y', $dob_1);
$dob=$dob_2->format('Y-m-d');	

// $guider_id=$_POST["user_id"];
$guider_id=$_SESSION['userId'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if($_POST)
{ 
// $_FILES["file"]["error"] is HTTP File Upload variables $_FILES["file"] "file" is the name of input field you have in form tag.

if ($_FILES["file"]["error"] > 0)
{
// if there is error in file uploading 
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

}
else
{
// check if file already exit in "images" folder.
if (file_exists("images/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{  //move_uploaded_file function will upload your image.  if you want to resize image before uploading see this link http://b2atutorials.blogspot.com/2013/06/how-to-upload-and-resize-image-for.html
if(move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $_FILES["file"]["name"]))
{
	$url = "images/". $_FILES["file"]["name"];
	echo $url;
// If file has uploaded successfully, store its name in data base
 mysqli_query($con, "UPDATE guider SET profile_image= $url WHERE guider_id = '$guider_id';");

echo "Stored in: " . "images/" . $_FILES["file"]["name"];

}
}


}
}

$url = "images/". $_FILES["file"]["name"];


	// $sql ="INSERT INTO guider VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$occupation', '$sex', '$dob', '$profile_image');";
	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone, occupation, sex, dob, profile_image) VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$occupation', '$sex', '$dob', '$url');";
	$result = mysqli_query($con, $sql);
	
	


mysqli_close($con);

include "guider_show.php";
?>