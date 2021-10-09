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
$major = $_POST['major'];
$year = $_POST['year'];
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
    echo "<script>alert('Username already exists');</script>";
} else {
    $passwordenc = md5($password);

$query = " INSERT INTO students (stu_id, password, name, lastname, major, year, address, province, amphures, district, zipcode, phone, mail, Job, description, comp_id, study, sent, sentmail)
        VALUES('$stu_id','$passwordenc','$name', '$lastname','$major','$year',' $address' , '$province', '$amphures', '$district', '$zipcode',
        '$phone', '$mail', '$Job', '$description', '$comp_id', '$study', '$sent', '$sentmail')";
  $result = mysqli_query($conn, $query);

  if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      header("Location: ../loginuser/index.php");
  } else {
      $_SESSION['error'] = "Something went wrong";
      header("Location: Regisform.php");
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
