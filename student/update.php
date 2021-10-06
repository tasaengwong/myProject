<?php
include "header.php";
include "connec.php";

$stu_id = $_GET['stu_id'];
$comp_id = $_POST['comp_id'];
$Job = $_POST['Job'];
$description = $_POST['description'];
$study = $_POST['study'];
$sent = $_POST['sent'];
$sentmail = $_POST['sentmail'];


$sql ="UPDATE students set comp_id = '$comp_id', Job = '$Job', description ='$description', study = '$study', sent ='$sent' , sentmail ='$sentmail' where stu_id = '$stu_id';";
        
$result = mysqli_query($conn, $sql);
if ($result){
        echo "<script type='text/javascript'>";
        echo"window.location = '../index.html';";
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
