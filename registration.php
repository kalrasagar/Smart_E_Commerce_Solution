<?php

session_start();
header('location:login_signup.html');

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'shopee');

$name = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];

$s = "select * from user where name = '$name'";
$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
	{
	echo "Already Taken";
	}
else
{	
	//$reg = "insert into user(name,email,password) values ('$name','$email','$password')";
	$reg = "insert into user(name,email,password) values ('$name','$email',aes_encrypt('$password','key'))";
	mysqli_query($con,$reg);
	echo "Registration Done";
}    

?>