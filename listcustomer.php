<?php
include "connectdb.php";


$query = "SELECT * FROM customer ORDER BY lastname;";
$result = mysqli_query($connection, $query);
if (!$result){
	die("database query failed");
}

echo "</br>";
echo "<table>";
//<th>CustomerID</th>
//<th>First Name</th>
//<th>Last Name</th>
//<th>City</th>
//<th>Phone Number</th>
//<th>AgentID</th>";


// output data in table
while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
//	echo "<option value='";
//	echo $row["customerID"] . "'>";
	echo ("<td>".$row["customerID"]."<td>");
	echo ("<td>".$row["firstName"]. "<td>");
	echo ("<td>".$row["lastName"]. "<td>");
	echo ("<td>".$row["city"]. "<td>");
	echo ("<td>".$row["phoneNumber"]. "<td>");
	echo ("<td>".$row["agentID"]. "<td>");
	echo "</option>";
	echo "</tr>";
}
echo "</table>";

mysqli_free_result($result);
mysqli_close($connection);
?>
