<?php
 include('connection.php');
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery-3.4.1.min"></script>
	<script src="js/bootstrap.min.js"></script>



	<style>
		.box{
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%,-50%);
			border:1px solid lightgrey;
			padding: 20px;
			box-shadow: 5px 5px lightgrey;
		}
		/*.fogotpassandsignup p{
			padding: 10px;
		}*/
	</style>
</head>
<body>
	<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 box">
				<h1 align="center">Login</h1>
				<form method="post" action="login.php">
					<div class="form-group has-feedback has-feedback-left">
						<label>UserName</label>
						<span class="glyphicon glyphicon-user form-control-feedback" ></span>
						<input type="text" class="form-control" placeholder="UserName" name="username">
					</div>
					<div class="form-group has-feedback">
						<label>Password</label>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						<input type="password" class="form-control" placeholder="Password" name="userpassword">
					</div>
					<div class="form-group ">
						<input type="submit" name="btn" class="btn btn-primary btn-block" value="login">
					</div>
				</form>
				<div class="fogotpassandsignup">
					<!-- <p class="bg-primary">Hello</p> -->
					<!-- <div class="alert alert-danger">
						<strong>Warning!</strong>  Invalid Login
					</div> -->
					<a href="#">Forget Password?</a>
					<a href="#" class="pull-right">Doesn't have an account?</a>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
<?php
	if(isset($_POST['btn']))
	{
		$uname = $_POST['username'];
		$upass = $_POST['userpassword'];
		// echo $uname;
		// echo $upass;
		$sql = "SELECT * FROM users where userEmail='$uname' AND userPassword='$upass'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    // while($row = $result->fetch_assoc()) {
		    //     echo "id: " . $row["userId"]. " - Email: " . $row["userEmail"]. " " . $row["userPassword"]. "<br>";
		    // }
		    $row = $result->fetch_assoc();
		    $_SESSION['userId'] =  $row['userId'];
		   header("Location:index.php");
		} else {
		   header("Location:login.php");
		}
		$conn->close();
	}
?>