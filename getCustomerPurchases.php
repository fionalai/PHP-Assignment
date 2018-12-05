<?php

include "connectdb.php";

// order customers by last name query
$query = "SELECT * FROM customer ORDER BY lastName;";
$result = mysqli_query($connection, $query);

// check if query is correct
if (!$result){
        die("database query failed");
}

// output the first and last name of the customers
while ($row = mysqli_fetch_assoc($result)){
        echo '<input type = "radio" name="customerID" value="';
        echo $row["customerID"];
        echo '">'.$row["firstName"]." ".$row["lastName"]."</br>";
}

// free and close
mysqli_free_result($result);
mysqli_close($connection);
?>
