<?php
/* Php file for connecting to flai26assign2db database */

// connecting database
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "cs3319";
$dbname = "flai26assign2db";
// make connection
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);

// check if connec is correct
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>
