<?php
include "header.php";
include "connec.php";

$comp_name = $_POST['comp_name'];
$contract_name = $_POST['contract_name'];
$comp_address = $_POST['comp_address'];
$comp_subdis = $_POST['comp_subdis'];
$comp_amphure = $_POST['comp_amphure'];
$comp_province = $_POST['comp_province'];
$comp_zipcode = $_POST['comp_zipcode'];
$comp_phone = $_POST['comp_phone'];
$comp_mail = $_POST['comp_mail'];
$comp_Fax = $_POST['comp_Fax'];

$sql ="INSERT INTO company ( comp_name, contract_name, comp_address, comp_subdis, comp_amphure, comp_province, comp_zipcode, comp_phone, comp_mail, comp_Fax)
        VALUES ('$comp_name', '$contract_name', '$comp_address', '$comp_subdis', '$comp_amphure', '$comp_province', '$comp_zipcode', '$comp_phone', '$comp_mail', '$comp_Fax')";

if ($result){
        echo "<script type='text/javascript'>";
        echo"window.location = 'Regisform.php';";
        echo "</script>";
        }
        else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม
        echo "<script type='text/javascript'>";
        echo "alert('error!');";
        echo"window.location = 'add-company.php'; ";
        echo"</script>";
        }
$conn->close();
