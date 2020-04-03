<?php
session_start();
include('checkSession.php');
include('connection.php');
$prodId = $_GET['pid'];
$uId =  $_SESSION['userId'];	

//Fetch Record Against Clicking ID
$sql = "SELECT * FROM products WHERE productId='$prodId'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row['productName'];
$price = $row['productPrice'];
$stock = $row['productStock'];
$description = $row['productDescription'];
$image = $row['productImage'];
$qty=1;


// Check for For Duplicate value
$check = "SELECT * FROM cart WHERE cartProductid='$prodId' AND cartUserId='$uId'";
$resultForUpdate = $conn->query($check);
$dealcount=mysqli_num_rows($resultForUpdate);
$rowForQty = $resultForUpdate->fetch_assoc();
if ($dealcount>0) 
{
	$qty=$rowForQty['qty']+1;
	// echo $qty;
	$sqlforInsert = "UPDATE  cart SET qty='$qty' WHERE cartProductId='$prodId' AND cartUserId='$uId'";
	$result = $conn->query($sqlforInsert);
}
else
{
	$sqlforInsert = "INSERT INTO cart VALUES ('$prodId','$uId','$qty')";
	$result = $conn->query($sqlforInsert);
}

header("Location:index.php")
?>