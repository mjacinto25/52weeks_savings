<html>
<head>Savings Template</head>
<body>

	<form action = "index.php" method = "post">
	Set Base Amount: <input type="number" name = "base_amount">
	<input type = "submit">
	</form>

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
				<td><input type ="text" name = "remittance_amount" disabled></td>
				<td><input type ="submit" value = "SAVE"></td>
			</tr>
			<?php
			$reference_amount = $reference_amount + $base_amount;

			
		}
			?>
<form action = "" method = "post">
           Do you want to save this template? 
           <input type = "submit" value = "yes">
           <input type = "submit" value = "no">
          </form>
	<?php
	}
	?>	
		
	
	
	</table>


</body>
</html>



