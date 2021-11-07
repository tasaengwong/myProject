<?php
	include('connection.php');
 
   
	$major_id=$_POST['major_id'];
	$major_name=$_POST['major_name'];
    $passwordenc = md5($password);
	mysqli_query($con,"insert into major (major_id ,major_name) values ( '$major_id','$major_name')");
	header('location:add_major.php');
 
?>