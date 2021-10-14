<?php
	include('connection.php');
 
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['userlevel'];
 
	mysqli_query($conn,"insert into user (firstname, lastname, userlevel) values ('$firstname', '$lastname', '$userlevel')");
	header('location:index.php');
 
?>