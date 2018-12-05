<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!-- connect new fonts and css file-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Fiona's Assignment 3</title>
</head>

<body>
	<?php 
		include "connectdb.php";
	?>
	
	<h1>FIONA'S ASSIGNMENT 3</h1>
	
	<!-- listing customer's information -->
	<h2>Listing Customer's Information</h2>
	<form action="list.php" method="post">

	<?php 
	include "listcustomer.php";
	?>
	<?php
		include "getCustomerPurchases.php";
		include "listcustomerpurchases.php";
	?>

	<form action="listcustomerpurchases.php" method="post">
		</br>
		<input type="submit" value="Get Customer's Purchases">
		</br>
	</form>

	<!-- ordering the product's information -->
	<h2> Ordering Product Information</h2>
	<?php
		include "orderProduct.php";
	?>
	
	<!-- user picks the order that they want -->
	<form action="orderProduct.php" method="post">
		</br>Order by:</br>
		<input type="radio" name="op1" value="da">Description (Ascending) </br>
		<input type="radio" name="op1" value="dd">Description (Descending) </br>
		<input type="radio" name="op1" value="pa">Price (Ascending) </br>
		<input type="radio" name="op1" value="pd">Price (Descending) </br>
		
		</br>
		<input type="submit" value="Get Order">
	</form>

	<!-- user inserts new purchase-->
	<h2>Insert New Purchases:</h2>
	
	<form action="insertPurchase.php" method="post">
		Customer ID: <input type="text" name="customerID"/></br>
		Product ID: <input type="text" name="productID"/></br>
		Quantity: <input type="text" name="quantity"/></br>
		</br>
		<input type="submit" name"insertPurchase" value="Insert Purchase">
	</form>
	</br>

	<!-- user inserts new customer -->
	<h2>Insert New Customer:</h2>

	<form action="insertcustomer.php" method="post">
		Customer ID: <input type = "text" name="customerID"/></br>
		First Name: <input type = "text" name = "firstName"/></br>
		Last Name: <input type = "text" name="lastName"/></br>
		City:	<input type="text" name="city"/></br>
		Phone Number: <input type="text" name="phoneNumber"/></br>
		Agent ID: <input type="text" name="agentID"/></br>
		</br>
		<input type="submit" name="insertCustomer" value="Insert Customer">
	</form>
	</br>
	
	<!-- user updates customers phone number -->
	<h2>Update Customer's Phone Number:</h2>
	<?php 
		include 'printupdatecustomer.php';
	?>
	</br>
	<form action="updatecustomer.php" method="post">
		Customer ID: <input type="text" name="customerID"/></br>
		Phone Number: <input type="text" name="phoneNumber"/></br>
		</br>
		<input type="submit" name="update" value="Update Customer's Phone Number">	
	</form>	
	</br>

	<!-- delete customer -->
	<h2>Delete Customer:</h2>

	<form action="deletecustomer.php" method="post">
		Customer ID: <input type="text" name="customerID"/></br>
		</br>
		<input type="submit" name="delete" value="Delete Customer">
	</form>
	</br>
	
	<!-- list customer and product info given quantity value -->
	<h2>List Customer and Product Information Given Quantity:</h2>
	<p>Please Enter a Quantity</p>

	<form action="listcustomerquantity.php" method="post">
		Quantity: <input type="text" name="purchased_quantity"/></br>
		</br>
		<input type="submit" name="listquantity" value="List By Quantity">
	</form>
	</br>

	<!-- list of non purhcased products -->
	<h2>List of Non-Purchased Products:</h2>
	<?php
		include 'listnonpurchased.php';
	?>
	</br>

	<!-- list of product's purchased info -->
	<h2>List of Total Number of Purchases for Particular Product</h2>
	<form action="listtotalnumber.php" method="post">
		Product ID: <input type="text" name="productID"/></br>
		</br>
		<input type="submit" name="totalnumber" value="Get Total Number">
	</form>
	</br>

</body>
</html>
