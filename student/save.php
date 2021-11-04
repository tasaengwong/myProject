<?php
include "connec.php";

$stu_id = $_POST['stu_id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$comp_name = $_POST['comp_name'];
$major = $_POST['major'];
$es_id1 = $_POST['es_id1'];
$es_id2 = $_POST['es_id2'];
$sum1 = $es_id1+ $es_id2;
$es_id3 = $_POST['es_id3'];
$es_id4 = $_POST['es_id4'];
$es_id5 = $_POST['es_id5'];
$es_id6 = $_POST['es_id6'];
$es_id7 = $_POST['es_id7'];
$sum2 = $es_id3+ $es_id4+$es_id5+$es_id6+$es_id7;
$es_id8 = $_POST['es_id8'];
$es_id9 = $_POST['es_id9'];
$sum3 = $es_id8+ $es_id9;
$es_id10 = $_POST['es_id10'];
$es_id11 = $_POST['es_id11'];
$es_id12 = $_POST['es_id12'];
$sum4 = $es_id10+ $es_id11+ $es_id12;
$total1 = $es_id1+$es_id2+$es_id3+$es_id4+$es_id5+$es_id6+$es_id7+$es_id8+$es_id9+$es_id10+$es_id11+$es_id12;

<<<<<<< HEAD
$sql = "INSERT INTO asses (stu_id, name, lastname,comp_name,major, es_id1, es_id2, sum1, es_id3, es_id4, es_id5, es_id6, es_id7,sum2, es_id8, es_id9, sum3, es_id10, es_id11, es_id12, sum4, total1)
 VALUE  ('$stu_id','$name','$lastname','$comp_name','$major','$es_id1', '$es_id2','$sum1', '$es_id3', '$es_id4', '$es_id5', '$es_id6', '$es_id7', '$sum2','$es_id8', '$es_id9','$sum3', '$es_id10', '$es_id11', '$es_id12','$sum4', '$total1')";
=======
$sql = "INSERT INTO asses (stu_id, name, lastname, comp_name, major, es_id1, es_id2, sum1, es_id3, es_id4, es_id5, es_id6, es_id7,sum2, es_id8, es_id9, sum3, es_id10, es_id11, es_id12, sum4, total1)
 VALUE ('$stu_id', '$name', '$lastname', '$comp_name', '$major', '$es_id1', '$es_id2', '$sum1', '$es_id3', '$es_id4', '$es_id5', '$es_id6', '$es_id7', '$sum2', '$es_id8', '$es_id9', $sum3, '$es_id10', '$es_id11', '$es_id12', '$sum4', '$total1')";
>>>>>>> 96f404199e34571274d9ff002baa24fc56c48500


$result = mysqli_query($conn, $sql);
if ($result){
        header("Location: ../loginuser/user_page.php");
       
        }
        else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม
        header("Location: ../student/form_asses.php");
       
        }
$conn->close();