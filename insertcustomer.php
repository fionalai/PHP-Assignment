<?php
	include 'connectdb.php';
	
	$customerID = $_POST["customerID"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$city = $_POST["city"];
	$phoneNumber = $_POST["phoneNumber"];
	$agentID = $_POST["agentID"];

	$query = 'INSERT INTO customer (customerID, firstName, lastName, city, phoneNumber, agentID) VALUES ("'.$customerID.'","'.$firstName.'","'.$lastName.'","'.$city.'","'.$phoneNumber.'","'.$agentID.'");';
	
	
	if (!mysqli_query($connection, $query)) {
        	echo "Error: insert failed. CustomerID exists.";
	}
	else {
		header('Location: list.php');
		exit;
	}
	mysqli_close($connection);
?>
