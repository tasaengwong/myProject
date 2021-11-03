<?php
include "connec.php";


$comp_name = $_POST['comp_name'];
$stu_id = $_POST['stu_id'];
$stu_n = $_POST['stu_n'];
$stu_lsn = $_POST['stu_lsn'];
$major = $_POST['major'];
$cs_id1 = $_POST['cs_id1'];
$cs_id2 = $_POST['cs_id2'];
$cs_id3 = $_POST['cs_id3'];
$cs_id4 = $_POST['cs_id4'];
$cs_id5 = $_POST['cs_id5'];
$cs_id6 = $_POST['cs_id6'];
$cs_id7 = $_POST['cs_id7'];
$cs_id8 = $_POST['cs_id8'];
$cs_id9 = $_POST['cs_id9'];
$cs_id10 = $_POST['cs_id10'];
$cs_id11 = $_POST['cs_id11'];
$cs_id12 = $_POST['cs_id12'];
$cs_id13 = $_POST['cs_id13'];
$cs_id14 = $_POST['cs_id14'];
$cs_id15 = $_POST['cs_id51'];
$cs_id16 = $_POST['cs_id16'];
$cs_id17 = $_POST['cs_id17'];
$cs_id18 = $_POST['cs_id18'];
$cs_id19 = $_POST['cs_id19'];
$cs_id20 = $_POST['cs_id20'];
$cs_id21 = $_POST['cs_id21'];
$cs_id22 = $_POST['cs_id22'];
$cs_id23 = $_POST['cs_id23'];
$cs_id24 = $_POST['cs_id24'];
$cs_id25 = $_POST['cs_id25'];
$cs_id26 = $_POST['cs_id26'];
$cs_id27 = $_POST['cs_id27'];
$cs_id28 = $_POST['cs_id28'];
$cs_id29 = $_POST['cs_id29'];
$cs_id30 = $_POST['cs_id30'];

$sql = "INSERT INTO asses_comp (comp_name, stu_id, stu_n, stu_lsn, major,
cs_id1, cs_id2, cs_id3, cs_id4, cs_id5, cs_id6, cs_id7, cs_id8, 
cs_id9, cs_id10, cs_id11, cs_id12,cs_id13,cs_id14, cs_id15, cs_id16,
cs_id17, cs_id18, cs_id19, cs_id20,cs_id21, cs_id22, cs_id23, cs_id24, 
cs_id25, cs_id26, cs_id27, cs_id28, cs_id29, cs_id30)
 VALUE  ('$comp_name', '$stu_id','$stu_n','$stu_lsn', '$major',
'$cs_id1', '$cs_id2', '$cs_id3', '$cs_id4', '$cs_id5', '$cs_id6', '$cs_id7', '$cs_id8',
'$cs_id9', '$cs_id10', '$cs_id11', '$cs_id12', '$cs_id13', '$cs_id14', '$cs_id15', '$cs_id16',
'$cs_id17', '$cs_id18', '$cs_id19', '$cs_id20','$cs_id21', '$cs_id22', '$cs_id23', '$cs_id24', 
'$cs_id25', '$cs_id26', '$cs_id27', '$cs_id28', '$cs_id29', '$cs_id30')";
$result = mysqli_query($conn, $sql);

if ($result){
        header("Location: ../index.html");
    

        }
        else {

        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม
        header("Location: ../company/comp_asses.php");
       
}
$conn->close();
