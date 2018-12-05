<?php
	// connect to database
	include "connectdb.php";

	// store user input to variable
	$productID = $_POST["productID"];
	
	// create query to get product information
	$query = 'SELECT productID, description FROM product WHERE productID="'.$productID.'"';
	$productQuery = mysqli_query($connection, $query);
	$productTab = mysqli_fetch_assoc($productQuery);
	
	// check if valid
	if (!$productQuery){
	        die("database query failed");
	}

	// give error when user input product that doesn't exist
	if (!isset($productTab["productID"])){
		die("Sorry! Product does not exist.");
	}
	
	echo "<h2>Product's Total Number of Purchases and Total Money Made</h2>";
	echo "Product: ".$productTab["description"];
	echo "</br>";

	//calculate total number purchases
	$sumquery = 'SELECT cost_per_item, SUM(purchased_quantity) AS sumquantity FROM purchased INNER JOIN product WHERE purchased.productID=product.productID AND purchased.productID="'.$productID.'" GROUP BY "'.$productID.'"';
	$totalpurchases = mysqli_query($connection, $sumquery);
	$totalpurchasesTab = mysqli_fetch_assoc($totalpurchases);
	$totalnumberpurchases = $totalpurchasesTab["sumquantity"];

	// output total number of purchases
	echo "Total Number of Purchases: ".$totalnumberpurchases;
	echo "</br>";

	// calculate total number sales for product
	$cost = $totalpurchasesTab["cost_per_item"];
	$totalcost = $cost * $totalnumberpurchases;

	// output money made
	echo "Total Money Made: $".$totalcost;

	// free query and close database 
	mysqli_free_result($productQuery);
	mysqli_free_result($totalpurchases);
	mysqli_close($connection);
?>

