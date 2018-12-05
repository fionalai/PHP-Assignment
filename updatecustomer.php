<?php
	// connecting to database
	include 'connectdb.php';
	
	// store user's input into variable
	$newcustomerID = $_POST["customerID"];
	$newphoneNumber = $_POST["phoneNumber"];

	// make query to make sure customer exist
        $customerexist = "SELECT * FROM customer WHERE customerID='$newcustomerID'";
	$customerResult = mysqli_query($connection, $customerexist);
	
	// when there are 0 rows, no customerID exist
	if (mysqli_num_rows($customerResult) == 0){
		die("Non-existant customer ID found");
	}
	// update query
	$update= 'UPDATE customer SET phoneNumber="'.$newphoneNumber.'" WHERE customerID="'.$newcustomerID.'";';
	$result=mysqli_query($connection, $update);	
	// make sure update query is valid
	if (!$result) {
		die ("Error did not update.");
	} else {
		echo "Customer Phone Number Updated!";
		header('Location: list.php');
	}
	
	// free and close
	mysqli_free_result($customerResult);
	mysqli_free_result($result);
	mysqli_close($connection);
?>
