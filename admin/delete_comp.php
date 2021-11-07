<?php
	include('connection.php');
	$comp_id=$_GET['comp_id'];
	mysqli_query($con,"delete from company where comp_id='$comp_id'");
	header('location:add_company.php');
 
?>