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

//echo"1";

$_SESSION['Category']=$_POST["Category"];
$_SESSION['Location']=$_POST["Location"];
$_SESSION['Price']=$_POST["Price"];
$_SESSION['StartTime']=$_POST["StartTime"];
$_SESSION['EndTime']=$_POST["EndTime"];
header('Location:searchResult.php');
?>