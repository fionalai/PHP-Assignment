<?php
	// connect to database
        include 'connectdb.php';
	
	// store user input into variable
        $customerID = $_POST["customerID"];

	// create query to check if customerID exist
	$customerexist = 'SELECT customerID FROM customer WHERE customerID="'.$customerID.'"';
	$customerResult = mysqli_query($connection, $customerexist);
	
	// delete query
        $query = 'DELETE FROM customer WHERE customerID="'.$customerID.'"';
	$result = mysqli_query($connection, $query);
	
	// check if query valid
        if(!$result){
		die("Cannot delete.");
	}
	elseif(mysqli_num_rows($customerResult) == 0){
		die("customerID doesn't exist");
	}
	else{
		// when deleted customer
		echo "deleted";
		header('Location: list.php');
	}
	
	// free and close queries
	mysqli_free_result($customerResult);
	mysqli_free_result($result);
        mysqli_close($connection);
?>
