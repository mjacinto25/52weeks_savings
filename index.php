<html>
<body>

<form action = "index.php" method = "get">
Set Base Amount: <input type="number" name = "base_amount">
<input type = "submit">

<table border = "1">
<tr>
<td>Weeks</td>
<td>Reference Amount</td>
<td>Remittance Amount</td>
<td>Action</td>
</tr> 

<?php
if (isset($_GET ["base_amount"])) {
	$base_amount = $_GET ["base_amount"];
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
</form>

</body>
</html>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "52weeks_savings";

if (isset($_GET ["base_amount"])) {
	//Create Connection
	$conn = new mysqli($servername,$username,$password,$dbname);

	//Check Connection
	if ($conn->connect_error){
		die ("Connection Failed:" . $conn->connect_error);
	}
	//echo "Connect";
	
	$sql = "SELECT amount from base_amount";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		while ($row=$result->fetch_assoc()){
			echo "-amount" . $row["amount"]. "<br>";

		}
	}else {
			echo "0";
	 }
	
	 $sql = "INSERT INTO base_amount (amount) VALUES (".$base_amount.")";
	


	/*if (("SELECT amount FROM base_amount") == NULL){
	$sql = "INSERT INTO base_amount (amount) VALUES (".$base_amount.")";
	} else {
	$sql = "UPDATE base_amount 
	SET amount = (".$base_amount.")";
	}*/
	if (mysqli_query ($conn, $sql)){
		echo "saved in db";
	}else{
		echo "Errors:" . $sql . "<br>" .	mysqli_error($conn);
	}

	mysqli_close($conn);
}
?> 
