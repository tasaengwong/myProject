<?php
	include('connection.php');
 
    $username =$_POST['username'];
    $password =$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$major_id=$_POST['major_id'];
	$userlevel=$_POST['userlevel'];
    $passwordenc = md5($password);
	mysqli_query($con,"insert into user (username,password,firstname, lastname,major_id,userlevel) values ('$username','$passwordenc','$firstname', '$lastname', '$major_id','$userlevel')");
	header('location:add_acount.php');
 
?>