<?php
	include('connection.php');
	$id=$_GET['username'];
	mysqli_query($conn,"delete from user where username='$id'");
	header('location:index.php');
 
?>