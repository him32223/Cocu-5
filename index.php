<?php
include_once('include/db.php');

$qry = "SELECT * FROM tb_item";
$sql = mysqli_query($conn, $qry);

if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
	$id=$_GET['id'];
	$Query="DELETE FROM tb_item WHERE item_id='$id'";
	if($result=mysqli_query($conn,$Query)){
		echo "<script>
			  window.location.href = 'index.php';
			  alert('Record Successfully Delete');
			  </script>";
	}else{			
		echo "<script>alert('Record Fails to Delete')</script>";
	}
}
if(isset($_POST['search']) && isset($_POST['search_name'])){
	$qry="SELECT * FROM tb_item where item_name like '%".$_POST['search_name']."%'";
	$sql=mysqli_query($conn,$qry);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

.pull-left {
    float: left;
}

.pull-right {
    float: right;
}

.block {
    background-color: #87CEEB;
    width: 100%;
    float:left;
}
</style>
</head>
<body>
<form action="index.php" method="post">
<input type="button" name="add" value="Add" onclick="window.location.href='add.php'"><input type="button" name="logout" ondblclick="window.location.href='login.php'" value="logout"><br>
Search Product Name: <input type="text" name="search_name"><input type="submit" name="search" value="submit">
<table>
	<thead>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Type</th>
		<th>Edit</th>
		<th>Delete</th>
	</thead>
	<tbody>
		<?php while($row = mysqli_fetch_array($sql)){ ?>
		<tr>
			<td><?=$row['item_name'];?></td>
			<td><?=$row['item_quantity'];?></td>
			<td><?=$row['item_price'];?></td>
			<td><?=$row['item_type'];?></td>
			<td><button type="button" onclick="window.location.href='edit.php?id=<?=$row['item_id']?>'">Edit</button></td>
			<td><a href="index.php?id=<?=$row['item_id']?>&action=delete"  onclick="return confirm('Are you sure you want to Delete?');"><button type="button">Delete</button></a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</form>
</body>
</html>