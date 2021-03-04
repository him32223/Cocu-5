<?php
include_once('include/db.php');

//check if button login is click
if(isset($_POST['submit'])){
  //check username and password is not empty
  if(!empty($_POST['username']) && !empty($_POST['psw'])){
    //get the data using $_POST[], inside the $_POST[] is the name inside the input tag
    $Username=$_POST['username'];
    $Password=$_POST['psw'];
    //select query to check the username and password is match or not
    $Query="SELECT * FROM tb_login WHERE Username='".$Username."' AND password='".$Password."'";
    $result=mysqli_query($conn,$Query);
    $rows=mysqli_num_rows($result);
    //if the username and password is match then to this
    if($rows==1){
      echo "<script>window.location.href='index.php'
            alert('Successfully Login.');</script>";
    //if the username or password is wrong then to this
    }else{      
      echo "<script>alert('Wrong Username or Password!Please try again.');</script>";
    }
  //if the usernmae or password is empty then do below
  }else{
    echo "<script>alert('Please Insert Username or Password');</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
	<h1>Login</h1>
  <form action="login.php" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required><br>

    <label for="psw">Password</label>
    <input type="password" id="psw" name="psw" required><br>

    <input type="submit" value="Login" name="submit">
    <input type="button" value="Register" name="register" onclick="window.location.href='register.php'">
  </form>
</div>
</body>
</html>