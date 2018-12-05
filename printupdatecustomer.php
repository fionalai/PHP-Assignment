<?php
        include 'connectdb.php';

        //output customer's ID and phone number
        $query = "SELECT customerID, phoneNumber FROM customer;";
        $result = mysqli_query($connection, $query);
	// check to see query valid
        if (!$result){
                die("database query failed");
        }

	// output values	
        while ($row = mysqli_fetch_assoc($result)) {
                echo "Customer: ";
		echo '<option value =' . $row["customerID"] . '>' . $row["customerID"] . ' #' . $row["phoneNumber"] . '</option>';
        }

	// free and close query
        mysqli_free_result($result);
	mysqli_close($connection);
?>
