<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "";
	$mysql_database = "test";
	
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
		die("Please enter Late Officer's Name");
	}	

	
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}	
	
	$statement = $mysqli->prepare("INSERT INTO users_data (user_name, user_email, user_L_Officer) VALUES(?, ?, ?)"); 
	$statement->bind_param('sss', $u_name, $u_email, $u_L_Officer); 
	
	if($statement->execute()){
		
        alert("Thank you! Your request will be processed shortly");
}else{
		print $mysqli->error; 
	}
}
?>