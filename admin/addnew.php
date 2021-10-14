<?php
	include('connection.php');
 
    $username =$_POST['username'];
    $password =$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$userlevel=$_POST['userlevel'];
 
	mysqli_query($con,"insert into user (username,firstname, lastname, userlevel) values ('$username','$firstname', '$lastname', '$userlevel')");
	header('location:index.php');
 
?>