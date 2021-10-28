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

$check = "SELECT comp_name FROM company WHERE comp_name = '$comp_name'";
$result1 = mysqli_query($conn, $check) or die(mysqli_error($conn));
$num = mysqli_num_rows($result1);
if ($num > 0) {
        echo "<script>";
        echo "alert(' สถานประกอบการนี้มีอยู่แล้ว! **ดำเนินการขั้นตอนต่อไป**');";
        echo "window.location = 'Regisform.php';";
        echo "</script>";
} else {

        $sql = "INSERT INTO company ( comp_name, contract_name, comp_address, comp_subdis, comp_amphure, comp_province, comp_zipcode, comp_phone, comp_mail, comp_Fax)
        VALUES ('$comp_name', '$contract_name', '$comp_address', '$comp_subdis', '$comp_amphure', '$comp_province', '$comp_zipcode', '$comp_phone', '$comp_mail', '$comp_Fax')";
        $result = mysqli_query($conn, $sql);
}
if ($result) {
        echo "<script type='text/javascript'>";
        echo "window.location = 'Regisform.php';";
        echo "</script>";
} else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม
        echo "<script type='text/javascript'>";
        echo "window.history.back();";
        // echo "window.location = 'add-company.php'; ";
        echo "</script>";
}
$conn->close();
