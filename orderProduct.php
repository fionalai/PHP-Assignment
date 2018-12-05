<?php
	include "connectdb.php";

	// include css file
	echo "<style>";
		include "style.css";
	echo "</style>";


	// query all product order by ascending description
	$query = "SELECT * FROM product ORDER BY description ASC;";
	$result = mysqli_query($connection, $query);
	// check if query valid
	if (!$result){
	        die("database query failed");
	}
	
	$whichorder = "da";
	if(isset($_POST["op1"])) {
		$whichorder = $_POST["op1"];
	}


	// query all product order by descending description
	if ($whichorder=="dd"){
		// query of products in description desccending order
        	$query = "SELECT * FROM product ORDER BY description DESC;";
		// check if query valid
        	$result = mysqli_query($connection, $query);
        	if (!$result){
        	        die("database query failed");
        	}
	}


	//query all product ordered by ascending price
	if ($whichorder=="pa"){
		// query of products in cost ascending order
	        $query = "SELECT * FROM product ORDER BY cost_per_item ASC;";
	        $result = mysqli_query($connection, $query);
		// check valid
	        if (!$result){
	                die("database query failed");
	        }
	}

	//query all product ordered by descending price
	if ($whichorder=="pd"){
		// query of products in cost descending order
	        $query = "SELECT * FROM product ORDER BY cost_per_item DESC;";
	        $result = mysqli_query($connection, $query);
		// check if valid
	        if (!$result) {
	                die("database query failed");
	        }
	}


	// output product info
	echo "<table>";
	while ($row = mysqli_fetch_assoc($result)){
	        echo "<tr>";
	        echo ("<td>".$row["productID"]."<td>");
	        echo ("<td>".$row["description"]."<td>");
	        echo ("<td>".$row["cost_per_item"]."<td>");
	        echo ("<td>".$row["quantity"]."<td>");
	        echo "</tr>";
	}

	echo "</table>";
	
	// free and close
	mysqli_free_result($result);
	mysqli_close($connection);
?>
