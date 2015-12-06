<?php
session_start();
$con=mysqli_connect("localhost","root","199058","localguider");
if(mysqli_connect_errno())
{
	echo"Failed to connect to MySQL:".mysqli_connect_error();
}
//echo"1";

// $profile_image=$_POST["profile_image"];
$profile_image='/image/james.jpg';

$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$phone=$_POST["phone"];

// $guider_id=$_POST["user_id"];
$guider_id=4;


if(empty($gender)||empty($occupation)||empty($dob)){
	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone)
	VALUES ('$guider_id', '$first_name', '$last_name', '$phone');";
	$result = mysqli_query($con, $sql);
	echo $guider_id;
	echo $first_name;
	echo $last_name;
	echo $phone;

}

else if(empty($gender)||empty($occupation)){

$dob_1=$_POST["dob"];
$dob_2=DateTime::createFromFormat('m/d/Y', $dob_1);
$dob=$dob_2->format('Y-m-d');
	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone, dob)
	VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$dob');";
	$result = mysqli_query($con, $sql);


}

else if(empty($occupation)||empty($dob)){
	$occupation=$_POST["occupation"];
$sex=$_POST["gender"];

	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone, sex)
	VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$sex');";
	$result = mysqli_query($con, $sql);

}

else if(empty($gender)||empty($dob)){

$sex=$_POST["gender"];
$dob_1=$_POST["dob"];
$dob_2=DateTime::createFromFormat('m/d/Y', $dob_1);
$dob=$dob_2->format('Y-m-d');
	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone, occupation)
	VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$occupation');";
	$result = mysqli_query($con, $sql);

}

else if(empty($gender)){
	$occupation=$_POST["occupation"];

$dob_1=$_POST["dob"];
$dob_2=DateTime::createFromFormat('m/d/Y', $dob_1);
$dob=$dob_2->format('Y-m-d');
	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone, occupation, dob)
	VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$occupation', '$dob');";
	$result = mysqli_query($con, $sql);

}

else if(empty($occupation)){

$sex=$_POST["gender"];
$dob_1=$_POST["dob"];
$dob_2=DateTime::createFromFormat('m/d/Y', $dob_1);
$dob=$dob_2->format('Y-m-d');
	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone, sex, dob)
	VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$sex', '$dob');";
	$result = mysqli_query($con, $sql);

}

else if(empty($dob)){

$dob_1=$_POST["dob"];
$dob_2=DateTime::createFromFormat('m/d/Y', $dob_1);
$dob=$dob_2->format('Y-m-d');
	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone, occupation, sex)
	VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$occupation', '$sex');";
	$result = mysqli_query($con, $sql);

}

else {
	$occupation=$_POST["occupation"];
$sex=$_POST["gender"];
$dob_1=$_POST["dob"];
$dob_2=DateTime::createFromFormat('m/d/Y', $dob_1);
$dob=$dob_2->format('Y-m-d');
	// $sql ="INSERT INTO guider VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$occupation', '$sex', '$dob', '$profile_image');";
	$sql ="INSERT INTO guider (guider_id, first_name, last_name, phone, occupation, sex, dob) VALUES ('$guider_id', '$first_name', '$last_name', '$phone', '$occupation', '$sex', '$dob');";
	$result = mysqli_query($con, $sql);
	
	

}

mysqli_close($con);


?>

