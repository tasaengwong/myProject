<?php
	include('connection.php');
 
	$comp_id=$_GET['comp_id'];
	$comp_name =$_POST['comp_name'];
	$contract_name=$_POST['contract_name'];
	$comp_address=$_POST['comp_address'];
	$comp_subdis=$_POST['comp_subdis'];
	$comp_amphure=$_POST['comp_amphure'];
	
	$comp_province =$_POST['comp_province'];
	$comp_zipcode=$_POST['comp_zipcode'];
	$comp_phone=$_POST['comp_phone'];
	$comp_mail=$_POST['comp_mail'];
	$comp_Fax=$_POST['comp_Fax'];
 
	mysqli_query($con,"UPDATE company set comp_name='$comp_name', contract_name='$contract_name', comp_address='$comp_address', comp_subdis='$comp_subdis', comp_amphure='$comp_amphure', comp_province='$comp_province' , comp_zipcode='$comp_zipcode' , comp_phone='$comp_phone' , comp_mail='$comp_mail' , comp_Fax='$comp_Fax' where comp_id='$comp_id'");
	header('location:add_company.php');
 
?>