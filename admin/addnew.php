<?php
	include('connection.php');
 
    $username =$_POST['username'];
    $password =$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$userlevel=$_POST['userlevel'];
    $passwordenc = md5($password);
	mysqli_query($con,"insert into user (username,password,firstname, lastname, userlevel) values ('$username','$passwordenc','$firstname', '$lastname', '$userlevel')");
	header('location:index.php');
 
?>