<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Customer's Purchases</title>
</head>

<body>
<?php
	include 'connectdb.php';
	
	// echo title
	echo "<h2>Here are the Purchases:</h2>";
	echo "<p>Click on a Customer Button Above.</p>";
	// query to list customer purchases
	$customerID= isset($_POST["customerID"]);
	$query1 = 'SELECT * FROM product, customer, purchased WHERE product.productID=purchased.productID AND customer.customerID=purchased.customerID AND purchased.customerID="'.$customerID.'"';

	// check if query is valid
	$result = mysqli_query($connection,$query1);
	if (!$result) {
        	die("database query1 failed.");
	}

	// output product information
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<li>';
        	echo $row["description"]. ' - '. $row["purchased_quantity"];
		echo '</br>';
   	}

	mysqli_free_result($result);
	mysqli_close($connection);
?>
</body>
</html>
