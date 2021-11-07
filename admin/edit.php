<?php
	include('connection.php');
 
	$username=$_GET['username'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$userlevel=$_POST['userlevel'];
 
	mysqli_query($con,"update user set firstname='$firstname', lastname='$lastname', userlevel='$userlevel' where username='$username'");
	header('location:add_acount.php');
 
?>