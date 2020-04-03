<?php
include('checkSession.php');
include('connection.php');
// echo $_SESSION['userId'];
?>

<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  float: left;
  padding: 60px;
}

.price {
  color: grey;
  font-size: 22px;
}

.card input[type="submit"] {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card input[type="submit"]:hover {
  opacity: 0.7;
}
#goToCart{
	border: none;
  outline: 0;
  padding: 12px;
  color: White;
  background-color: green;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
span{
  background-color: red;
  padding: 3px;
  border-radius: 10px;
}
</style>
</head>
<body>

	<h1 align="center">Product Catlogs</h1>	
	<hr>
  <?php
  //Printing number of products in carts of user
    $uid = $_SESSION['userId'];
    $sql = "SELECT * FROM cart where cartUserId='$uid'";
    $result = $conn->query($sql);
    $dealcount=mysqli_num_rows($result);
  ?>
	<p><a href="cart.php"><button id="goToCart">Go to Cart <span><?php echo $dealcount?><span></button></a></p>
	<?php
		$sql = "SELECT * FROM products";
		$result = mysqli_query($conn, $sql);
		while($row = $result->fetch_assoc())
		{?>
		     <div class="card">
		    <img src="product_images/<?php echo $row['productImage']?>" height="230" style="width:100%">
		    <h1><?php echo $row['productName'] ?></h1>
		    <p class="price">RS-<?php echo $row['productPrice']?></p>
		    <p><?php echo $row['productDescription']?></p>
		    	<p>Product Id:<input type="text" value="<?php echo $row['productId']?>" disabled></p>
		    	<p><a href="add_to_cart.php?pid=<?php echo $row['productId'] ?>"><input type="submit" value="Add to cart" name="" onclick="alert('Product Added to your cart');"></a></p>
		  </div>
		  <?php
		}

	?>

</body>
</html>
