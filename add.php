<?php
include_once('include/db.php');

if (isset($_POST['submit'])) {
	$qry="INSERT INTO tb_item (item_name,item_quantity,item_price,item_type) VALUES('".$_POST['name']."','".$_POST['quantity']."','".$_POST['price']."','".$_POST['type']."')";
	if($result=mysqli_query($conn,$qry)){
		echo "<script>window.location.href = 'index.php';
		alert('Successfully Insert');</script>";
	}else{
		echo "<script>alert('Failed Insert');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>
</head>
<body>
<form action="add.php" method="post">
	Product Name:<input type="text" name="name"><br>
	Quantity :<input type="text" name="quantity"><br>
	Price :<input type="text" name="price"><br>
	Type :<input type="text" name="type"><br>

	<input type="submit" value="submit" name="submit">
	<button type="button" onclick="window.location.href='index.php'">Back</button>
</form>
</body>
</html>