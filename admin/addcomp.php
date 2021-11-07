<?php
	include('connection.php');
 
    $comp_name =$_POST['comp_name'];
    $contract_name =$_POST['contract_name'];
	$comp_address=$_POST['comp_address'];
	$comp_subdis=$_POST['comp_subdis'];
	$comp_amphure=$_POST['comp_amphure'];
	$comp_province=$_POST['comp_province'];
	$comp_zipcode=$_POST['comp_zipcode'];
	$comp_phone=$_POST['comp_phone'];
	$comp_mail=$_POST['comp_mail'];
	$comp_Fax=$_POST['comp_Fax'];
    $passwordenc = md5($password);
	mysqli_query($con,"INSERT into company (comp_name,contract_name,comp_address, comp_subdis,comp_amphure,comp_province,comp_zipcode,comp_phone,comp_mail,comp_Fax) values ('$comp_name','$contract_name','$comp_address', '$comp_subdis', '$comp_amphure', '$comp_province', '$comp_zipcode', '$comp_phone', '$comp_mail', '$comp_Fax')");
	header('location:add_company.php');
 
?>