<?php
	// connect to database
	include "connectdb.php";
	
	// store user input into variable
	$quantity = $_POST["purchased_quantity"];

	// create query to get customer and purchased information
	$query = 'SELECT firstName, lastName, description, purchased_quantity FROM purchased INNER JOIN product ON purchased.productID=product.productID INNER JOIN customer ON customer.customerID = purchased.customerID WHERE purchased_quantity >=' .$quantity;
	$result = mysqli_query($connection, $query);
	
	// check if query valid
	if (!$result){
        	die("database query failed");
	}

	echo "<h2>Customer's Information</h2>";

	// output customer's data
	while ($row = mysqli_fetch_assoc($result)) {
		echo "Name: ".$row["firstName"].' '.$row["lastName"];
		echo "<li>";
		echo "Product: ".$row["description"];
		echo "<li>";
		echo "Quantity: ".$row["purchased_quantity"];
		echo "</br></br>";
	}
	
	// free and close query and database
	mysqli_free_result($result);
	mysqli_close($connection);
?>

