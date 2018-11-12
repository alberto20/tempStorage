<!DOCTYPE html>
<html>
<head>
	<title>We Sell You Buy</title>
	<link rel="stylesheet" type="text/css" href="style/core.css">
	<link rel="stylesheet" type="text/css" href="style/cart.css">
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
	
	<h1>WeSellYouBuy<h1>
	<header id="title">
    <h1>My Shopping Cart</h1>
	
	<div class="container">
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<td>Item Name</th>
	  		<td>Quanity</th>
	  		<td>Price</th>
	  	</tr>
		
		
		<?php
			$total = 0;
			$i = 0;	
			
			$item = mysqli_query($conn,"SELECT * FROM cart");
			while($row = mysqli_fetch_array($item))
			{
				$totalprice = $row['quantity'] * $row['price'];
				$itemName = $row['name'];
				echo "<tr>";
				echo "<td><li><input type=\"image\" src=\"images/items/" . $itemName . ".png\" name=\"Submit\"/></li></td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['quantity'] . "</td>";
				echo "<td>" . $totalprice . "</td>";
				echo "</tr>";
				$total = $total + $row['price'];
			}
		echo "</table>";
		?>
		
		<tr>
			<td><strong>Total Price</strong></td>
			<td><strong><?php echo $total;?></strong></td>
			<button class="btnCheckout">Checkout</button>
		</tr>
	  </table>
	</div>
</div>
 
</body>
<footer>
	<p></p>
	</footer>
</html>