<?php
session_start();
?>
<?php
include "header.php";
include "connec.php";

$stu_id = $_POST['stu_id'];
$password = $_POST['password'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$major_id = $_POST['major_id'];
$year = $_POST['year'];
$date = $_POST['date'];
$time = $_POST['time'];
$address = $_POST['address'];
$province = $_POST['province'];
$amphures = $_POST['amphures'];
$district = $_POST['district'];
$zipcode = $_POST['zipcode'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$Job = $_POST['Job'];
$description = $_POST['description'];
$comp_id = $_POST['comp_id'];
$study = $_POST['study'];
$sent = $_POST['sent'];
$sentmail = $_POST['sentmail'];




$user_check = "SELECT * FROM students WHERE stu_id = '$username' LIMIT 1";
$result = mysqli_query($conn, $user_check);
$user = mysqli_fetch_assoc($result);

if ($user['stu_id'] === $stu_id) {
    echo "<script type='text/javascript'>";
    echo "alert ('รหัสนิสิตไม่ถูกต้อง');";
    echo "</script>";
    echo "Error: ".$user_check."<br>".$conn->error;
} else {
    $passwordenc = md5($password);
    echo "<script type='text/javascript'>";
    echo "alert ('รหัสผ่านไม่ถูกต้อง');";
    echo "</script>";
    echo "Error: ".$user_check."<br>".$conn->error;

$query = " INSERT INTO students (stu_id, password, name, lastname, major_id, year, date, time, address, province, amphures, district, zipcode, phone, mail, Job, description, comp_id, study, sent, sentmail)
        VALUES('$stu_id','$passwordenc','$name', '$lastname','$major_id','$year','$date','$time',' $address' , '$province', '$amphures', '$district', '$zipcode',
        '$phone', '$mail', '$Job', '$description', '$comp_id', '$study', '$sent', '$sentmail')";
  $result = mysqli_query($conn, $query);

  if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      echo "<script>";
      echo "alert('บันทึกข้อมูลสำเร็จ');";
      echo "</script>";
      header("Location: ../loginuser/index.php");
  } else {
    //   $_SESSION['error'] = "Something went wrong";
      echo "<script type='text/javascript'>";
      echo "window.history.back();";
      echo "alert ('รหัสนิสิตซ้ำ');";
      echo"</script>";
  }
}



?>
<!-- 

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
$conn->close();

if ($result){
        echo "<script type='text/javascript'>";
        echo"window.location = 'Board.php';";
        echo "</script>";
        }
        else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม
        echo "<script type='text/javascript'>";
        echo "alert('error!');";
        echo"window.location = 'member_add.php'; ";
        echo"</script>";
        }
        ?>
    
     -->
