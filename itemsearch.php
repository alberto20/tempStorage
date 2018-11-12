<!DOCTYPE html>
<html>
<head>
	<title>We Sell You Buy</title>
	<link rel="stylesheet" type="text/css" href="style/core.css">
	<link rel="stylesheet" type="text/css" href="style/itemsearch.css">
</head>
<body>
	<?php include 'includes/signedOutHeader.php'; 
		$servername = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "shoppingcart";

		/* sets up a variable for the connection using given credentials */
		$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

		/* checks if connection failed, if it did, display error message */
		if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	?>
	
	<div class="searchresults">
		<form method="post" action="itempage.php">
			<ul>
			
			<table class="table">
			<tr>
	  		<td>Item Name</th>
	  		<td>Quanity</th>
	  		<td>Price</th>
			</tr>
				<?php
			$total = 0;
			$i = 0;	
			
			$item = mysqli_query($conn,"SELECT * FROM products");
			while($row = mysqli_fetch_array($item))
			{
				$itemName = $row['name'];
				echo "<tr>";
				echo "<td><li><input type=\"image\" src=\"images/items/" . $itemName . ".png\" name=\"Submit\"/></li></td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['price'] . "</td>";
				echo "<td><button class=\"btnPurchase\">purchase</button></td>";
				echo "</tr>";
			}
				echo "</table>";
				?>
				</tr>
				</table>
			</ul>	
		</form>
	</div>
	
	<footer>
	<p>Footer</p>
	</footer>
	
</body>
</html>