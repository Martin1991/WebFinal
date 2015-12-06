<?php
session_start();
include("dbcon.php");
//echo"1";
// get user_id from sign up webpage
$user_id = $_SESSION["userId"];
$email=$_POST["email"];
$password=$_POST["password"];
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$phone=$_POST["phone"];
$occupation=$_POST["occupation"];	
$sex=$_POST["sex"];


if(empty($_POST["email"])){
	$str1 = "";

} else
$str1 = "email='".$email."',";


if(empty($_POST["password"])){
	$str2 = "";
} else
$str2 = "password='".$password."',";

if(empty($_POST["first_name"])){
	$str3 = "";
} else
$str3 = "first_name='".$first_name."',";

if(empty($_POST["last_name"])){
	$str4 = "";
} else
$str4 = "last_name='".$last_name."',";

if(empty($_POST["phone"])){
	$str5 = "";
} else
$str5 = "phone=".$phone.",";

if(empty($_POST["occupation"])){
	$str6 = "";
} else
$str6 = "occupation='".$occupation."',";

if(empty($_POST["sex"])){
	$str7 = "";
} else
$str7 = "sex='".$sex."',";

if(empty($_POST["dob"])){
	$str8 = "";
} else
{
$dob_1=$_POST["dob"];	
$dob_2=DateTime::createFromFormat('m/d/Y', $dob_1);
$dob=$dob_2->format('Y-m-d');
$str8 = "dob='".$dob."',";
}
$stra1 = $str1.$str2;
$stra =substr($stra1, 0,-1);
// echo $stra;
$strb1 = $str3.$str4.$str5.$str6.$str7.$str8;
$strb=substr($strb1, 0,-1);
// echo $strb;

if(empty($_POST["email"])&&empty($_POST["password"])){

} else{
	$sqlc="UPDATE register SET $stra WHERE user_id = '$user_id';";
	mysqli_query($con, $sqlc);
  // echo "a : ".$sqlc;
};

if(empty($_POST["first_name"])&&empty($_POST["last_name"])&&empty($_POST["phone"])&&empty($_POST["occupation"])){

} else{
	$sqld = "UPDATE guider SET $strb WHERE guider_id='$user_id';";
    mysqli_query($con, $sqld);
    // echo "b : ".$sqld;
}
mysqli_close($con);

header ('Location: guider_show.php');
?>