<?php
	include('connection.php');
 
	$username=$_GET['username'];
<<<<<<< HEAD
=======
	$user=$_POST['username'];
>>>>>>> bedd3feb8b8a2841e4bf9be8aae30b25ee6e1675
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$userlevel=$_POST['userlevel'];
 
	mysqli_query($con,"update user set username='$user', firstname='$firstname', lastname='$lastname', userlevel='$userlevel' where username='$username'");
	header('location:add_acount.php');
 
?>