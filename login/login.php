<?php
require_once("DBConn.php");
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
// echo $password;
// echo $email;

$sql=mysqli_query($conn,"select name,email,password from signup where name='".$name."' and email='".$email."' and password='".$password."'") or die(mysql_error());
$count = mysqli_num_rows($sql);
if($count>0){
	$row=mysqli_fetch_assoc($sql);
	$_SESSION['vid']=$row['vid'];
	/*echo "<script type='text/javascript'>alert('login successful.');window.location='userservices.php'</script>";*/
	echo "<script type='text/javascript'>alert('login successful.')</script";
	header("location:../payment/payment.html");
	//header("location:userservices.php");
	/*header("location:volunteerhome.php");*/
	/*header("location:userservices.html");*/
	// echo $_SESSION['vid'];
	// echo "success";
}
else{
	
	echo "<script type='text/javascript'>alert('Invalid username or password');window.location='login.html'</script>";
}
?>