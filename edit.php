<?php
include_once('include/db.php');

if (isset($_POST['edit']) && isset($_GET['id'])) {
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$type=$_POST['type'];
$query="UPDATE tb_item SET item_name='$name',item_quantity='$quantity',item_price='$price',item_type='$type' where item_id='".$_GET['id']."'";
	if($result=mysqli_query($conn,$query)){		
		echo "<script>window.location.href = 'index.php';
		alert('Record Success to Edit');</script>";
		}else{			
			echo "<script>alert('Record Fails to Edit')</script>";
		}
}

$qry = "SELECT * FROM tb_item WHERE item_id='".$_GET['id']."'";
$sql = mysqli_query($conn, $qry);
$row = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>
</head>
<body>
	<form action="edit.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
		Product Name:<input type="text" name="name" value="<?=$row['item_name']?>"><br>
		Quantity :<input type="text" name="quantity" value="<?=$row['item_quantity']?>"><br>
		Price:<input type="text" name="price" value="<?=$row['item_price']?>"><br>
		Type:<input type="text" name="type" value="<?=$row['item_type']?>"><br>

		<input type="submit" name="edit" value="submit">
		<button type="button" onclick="window.location.href='index.php'">Back</button>
	</form>
</body>
</html>