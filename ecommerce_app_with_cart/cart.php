<?php
include('checkSession.php');
?>

<?php
$uid = $_SESSION['userId'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery-3.4.1.min"></script>
	<script src="js/bootstrap.min.js"></script>


</head>
<body>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-4">
			<a href="index.php" class="btn btn-primary btn-block">Back to catlog</a>
		</div>
		<div class="col-md-4">
			<a href="logout.php" class="btn btn-primary btn-block">Logout</a>
		</div>
		<div class="col-md-2"></div>
	</div>
	<h1 align="center">Your cart</h1>
	<?php
	include('connection.php');
		// $sql = "SELECT * FROM orders";
		// $result = $conn->query($sql);
		// $dealcount=mysqli_num_rows($result);
	?>



	<table align="center" class="table">
		<tr>
			<th>S. No</th>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Product Description</th>
			<th>Quantity</th>
			<th>Update/Delete</th>
		</tr>
<?php


// $sql1 = "SELECT * FROM cart WHERE cartUserId='$uid'";
// $result1 = $conn->query($sql);

// $test = "SELECT * FROM products WHERE productId=(SELECT cartProductId From cart WHERE cartUserId='$uid')";
$test = "SELECT p.productId,p.productName,p.productPrice,p.productDescription,c.qty from products as p INNER JOIN cart as c on p.productId=c.cartProductId where c.cartUserId='$uid'";
$result = $conn->query($test);
$i=1;
while ($row = $result->fetch_assoc()) {

?>
	
		<tr align="center">
			<td><?php echo $i ?></td>
			<td><?php echo $row['productId'] ?></td>
			<td><?php echo $row['productName'] ?></td>
			<td><?php echo $row['productPrice'] ?></td>
			<td><?php echo $row['productDescription'] ?></td>
			 <td><input type="text"  value="<?php echo $row['qty'] ?>" style="width:40px;"></td>
			<td><input type="button" class="btn btn-success" value="Update">&nbsp<input type="button" class="btn btn-danger" value="Delete" onclick="confirm();"></td>
		</tr>
<?php
$i++;
}
?>	
	
	</table>


</body>
</html>