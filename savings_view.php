<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "52weeks_savings";

if (isset($_POST ["base_amount"])) {
	
	//Create Connection
	$conn = new mysqli($servername,$username,$password,$dbname);

	//Check Connection
	if ($conn->connect_error){
		die ("Connection Failed:" . $conn->connect_error);
	}
	
	//Select functionality
	$sql = "SELECT base_amount from savings";
	$result = $conn->query($sql);
/*
	if ($result->num_rows > 0){
	
	//Update functionality
	$sql = "UPDATE savings SET base_amount = (".$base_amount.")";
	$result = $conn->query($sql);

	}else {
	
	//Insert functionlaity
	$sql = "INSERT INTO savings (base_amount) VALUES (".$base_amount.")";
	$result = $conn->query($sql);
	}*/
	
	mysqli_close($conn);
}*/




?> 


