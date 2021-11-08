<?php
	include('connection.php');
 
	$username=$_GET['username'];

	$user=$_POST['username'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$major_id=$_POST['major_id'];
	$userlevel=$_POST['userlevel'];
 
	mysqli_query($con,"update user set username='$user', firstname='$firstname', lastname='$lastname', userlevel='$userlevel' where username='$username'");
	header('location:add_acount.php');
 
?>