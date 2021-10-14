<?php
	include('connection.php');
	$username=$_GET['username'];
	mysqli_query($con,"delete from user where username='$username'");
	header('location:add_acount.php');
 
?>