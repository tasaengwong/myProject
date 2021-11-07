<?php
include "connect.php";

$teac_N = $_POST['teac_N'];
$teac_L = $_POST['teac_L'];
$comp_name = $_POST['comp_name'];
$major_name = $_POST['major_name'];
$qs_id1 = $_POST['qs_id1'];
$qs_id2 = $_POST['qs_id2'];
$qs_id3 = $_POST['qs_id3'];


$sql = "INSERT INTO asses_teac (teac_N, teac_L , comp_name, major_name, qs_id1, qs_id2, qs_id3 )
 VALUE  ('$teac_N', '$teac_L', '$comp_name', '$major_name', '$qs_id1', '$qs_id2', '$qs_id3')";

$result = mysqli_query($conn, $sql);
if ($result){
        header("Location: ../loginuser/teacher_page.php");
       
        }
        else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม
        echo "Error: ".$sql."<br>".$conn->error;
        header("Location: ../teacher/teac_as.php");
       
        }
$conn->close();