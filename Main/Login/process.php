<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$u_name = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING); 
	$u_email = filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);
	$u_L_Officer = filter_var($_POST["user_L_Officer"], FILTER_SANITIZE_STRING);
	if (empty($u_name)){
		die("Please enter your name");
	}
	if (empty($u_email) || !filter_var($u_email, FILTER_VALIDATE_EMAIL)){
		die("Please enter valid email address");
	}
	if (empty($u_L_Officer)){
		die("Please enter Officer's Name");
	}	
	print "You have successfully created"." " ." ". $u_name . "!,You can proceed further by clicking below ";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$u_name = $_POST["user_name"]; 
	$u_email = $_POST["user_email"];
	$u_L_Officer = $_POST["user_L_Officer"];
	print "You have successfully created"." " ." ". $u_name . "!,You can proceed further by clicking below ";
    header("Location:https://www.google.com/intl/en-GB/gmail/about/#");
}
?>
