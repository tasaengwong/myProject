<?php

include "connec.php";
$time = $_POST['time'];
$stu_id = $_POST['stu_id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
// $major = $_POST['major'];
// $year = $_POST['year'];
// $address = $_POST['address'];
// $province = $_POST['province'];
// $amphures = $_POST['amphures'];
// $district = $_POST['district'];
// $zipcode = $_POST['zipcode'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$Job = $_POST['Job'];
$description = $_POST['description'];
$comp_name = $_POST['comp_name'];
$study = $_POST['study'];
$sent = $_POST['sent'];
$sentmail = $_POST['sentmail'];
$status = $_POST['status'];
$Ostatus = $_POST['Ostatus'];
$Cstatus = $_POST['Cstatus'];

$sql = "UPDATE students inner join company on students.comp_id = company.comp_id SET time='$time', stu_id ='$stu_id' ,time='$time', name ='$name' , lastname='$lastname' , phone='$phone' , mail='$mail' , description='$description' , Job ='$Job' , comp_name ='$comp_name' , study='$study' , sent='$sent' , sentmail='$sentmail',time='$time', status='0', Ostatus='0', Cstatus='0' WHERE stu_id ='$stu_id';";
       
  $result = mysqli_query($conn, $sql);
  if($conn->query($sql) === TRUE){
    echo "success";
    header("Location: Board.php");
}else{
        echo "Error: ".$sql."<br>".$conn->error;
}
$conn->close();
?>

<!-- stu_id ='$stu_id' -->