<?php
	include('connection.php');
	$major_id=$_GET['major_id'];
	mysqli_query($con,"delete from major where major_id='$major_id'");
	header('location:emajor.php');
 
?>