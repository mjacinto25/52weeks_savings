<html>
<body>

<table border = "1">
	<tr>
	<td>Weeks</td>
	<td>Reference Amount</td>
	<td>Remittance Amount</td>
	<td>Action</td>
	</tr> 

<?php
if (isset($_POST ["base_amount"])) {
	$base_amount = $_POST ["base_amount"];
	$reference_amount = $base_amount; 
	for ($i = 1 ; $i <= 52; $i++){
?>

	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $reference_amount; ?></td>
		<td><input type ="text" name = "remittance_amount"></td>
		<td><input type ="submit" value = "SAVE"></td>

	</tr>

	<?php
	$reference_amount = $reference_amount + $base_amount;
	}
}
    ?>
</table>

</body>
</html>

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
	$sql = "SELECT amount from base_amount";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
	
	//Update functionality
	$sql = "UPDATE base_amount SET amount = (".$base_amount.")";
	$result = $conn->query($sql);

	}else {
	
	//Insert functionlaity
	$sql = "INSERT INTO base_amount (amount) VALUES (".$base_amount.")";
	$result = $conn->query($sql);
	}
	
	mysqli_close($conn);
}
?> 


