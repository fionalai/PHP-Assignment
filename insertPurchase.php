<?php
        include 'connectdb.php';

	// user values
        $customerID = $_POST["customerID"];
        $productID = $_POST["productID"];
        $quantity = $_POST["quantity"];
	
	// make query to check if customerID exists
        $customerexist = "SELECT * FROM customer WHERE customerID='$customerID'";
        $customerResult = mysqli_query($connection, $customerexist);

	// when 0 rows = no customerID found
        if (mysqli_num_rows($customerResult) == 0){
                echo "Non-existant customer ID found";
		echo "</br>";
        }

	// make query to check if productID exists			
        $productexist = "SELECT * FROM product WHERE productID='$productID'";
        $productResult = mysqli_query($connection, $productexist);
	
	// when 0 rows = no productID found
        if (mysqli_num_rows($productResult) == 0){
                die("Non-existant product ID found");
		echo "</br>";
        }

	// make query to check if purchased exists
	$purchasedexist= 'SELECT * FROM purchased WHERE customerID="'.$customerID.'" AND productID="'.$productID.'"';
	$purchasedResult = mysqli_query($connection, $purchasedexist);

	// when 1 row = purchase record exists so update purchased quantity
	if(mysqli_num_rows($purchasedResult) == 1){
		// update query
		$update= 'UPDATE purchased SET purchased_quantity = purchased_quantity + '.$quantity.' WHERE customerID="'.$customerID.'" AND productID="'.$productID.'"';
		echo "Updated!";
		header('Location: list.php');
		$updateresult = mysqli_query($connection, $update);
		
		// check if update query is valid
		if (!$updateresult){
			die("database update query failed.");
		} 
        }
	// when 0 row = purchase record doesn't exist so insert purchase record
	else {
		// insert query
                $insert = 'INSERT INTO purchased VALUES("'.$customerID.'","'.$productID.'",'.$quantity.')';
		echo "Inserted!";
		header('Location: list.php');

		$insertresult=mysqli_query($connection, $insert);
	
		// check if insert query is valid
		if(!$insertresult){
			die("database insert query failed.");
		}
	}
	
	// free results and close connection
	mysqli_free_result($customerResult);
	mysqli_free_result($productResult);
	mysqli_free_result($purchasedResult);
	mysqli_free_result($updateresult);
	mysqli_free_result($insertresult);
        mysqli_close($connection);
?>
