<?php
include "connec.php";
$userid = $_POST['stu_id'];
$comp_id = $_POST['comp_id'];
$es_id1 = $_POST['es_id1'];
$es_id2 = $_POST['es_id2'];
$es_id3 = $_POST['es_id3'];
$es_id4 = $_POST['es_id4'];
$es_id5 = $_POST['es_id5'];
$es_id6 = $_POST['es_id6'];
$es_id7 = $_POST['es_id7'];
$es_id8 = $_POST['es_id8'];
$es_id9 = $_POST['es_id9'];
$es_id10 = $_POST['es_id10'];
$es_id11 = $_POST['es_id11'];
$es_id12 = $_POST['es_id12'];

$sql = "INSERT INTO asses ( stu_id, comp_id, es_id1, es_id2, es_id3, es_id4, es_id5, es_id6, es_id7, es_id8, es_id9, es_id10, es_id11, es_id12)
 VALUE  ('$userid','$comp_id','$es_id1', '$es_id2', '$es_id3', '$es_id4', '$es_id5', '$es_id6', '$es_id7', '$es_id8', '$es_id9', '$es_id10', '$es_id11', '$es_id12')";
$result = mysqli_query($conn, $sql);
if ($result){
        header("Location: ../loginuser/user_page.php");
       
        }
        else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม
        header("Location: ../students/form_asses.php");
       
        }
$conn->close();