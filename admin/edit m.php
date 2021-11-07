<?php
	include('connection.php');


	$major_id=$_POST['major_id'];
	$major_name=$_POST['major_name'];
 
	mysqli_query($con,"update major set major_id='$major_id', major_name='$major_name' where major_id='$major_id'");
	header('location:add_major.php');
 
?>