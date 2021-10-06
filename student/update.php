<?php

include "connec.php";

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
$comp_id = $_POST['comp_id'];
$study = $_POST['study'];
$sent = $_POST['sent'];
$sentmail = $_POST['sentmail'];

$sql = "UPDATE students SET stu_id ='$stu_id' , name ='$name' , lastname='$lastname' , phone='$phone' , mail='$mail' , description='$description' , Job ='$Job' , comp_id ='$comp_id' , study='$study' , sent='$sent' , sentmail='$sentmail' WHERE stu_id ='$stu_id';";
       
  $result = mysqli_query($conn, $sql);
  if($conn->query($sql) === TRUE){
    echo "success";
    header("Location: ../loginuser/user_page.php");
}else{
        echo "Error: ".$sql."<br>".$conn->error;
}
$conn->close();
?>

<!-- stu_id ='$stu_id' -->