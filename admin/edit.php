<?php
	include('connection.php');
 
	$id=$_GET['username'];
 
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['userlevel'];
 
	mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', userlevel='$userlevel' where username='$id'");
	header('location:index.php');
 
?>