<?php
	// connect to database
	include "connectdb.php";

	// create query to get non purchased purchases
	$query = 'SELECT description FROM product WHERE productID NOT IN (SELECT productID FROM purchased)';

	$result = mysqli_query($connection, $query);
	
	// check for valid database query
	if (!$result){
	        die("database query failed");
	}

	// output data in table
	while ($row = mysqli_fetch_assoc($result)) {
	        echo "<li>";
	        echo $row["description"];
	}
	
	// free and close
	mysqli_free_result($result);
	mysqli_close($connection);
?>
