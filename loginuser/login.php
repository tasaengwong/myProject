<?php 

    session_start();

    if (isset($_POST['username'])) {

        include('connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $sql = "SELECT * FROM students  WHERE stu_id = '$username' AND password = '$passwordenc' ";
        $result = mysqli_query($con, $sql);


        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
            $_SESSION['userid'] = $row['stu_id']; 
            $_SESSION['name'] = $row['name'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['major'] = $row['major_id'];
            $_SESSION['year'] = $row['year'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['province'] = $row['province'];
            $_SESSION['amphures'] = $row['amphures'];
            $_SESSION['district'] = $row['district'];
            $_SESSION['zipcode'] = $row['zipcode'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['email'] = $row['mail'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['Ostatus'] = $row['Ostatus'];
            $_SESSION['C_status'] = $row['Cstatus'];
            $_SESSION['comp_id'] = $row['comp_id'];
            if ($_SESSION['userid'] ==  $username ) {
                header("Location: user_page.php");
            }
        } 

        else {
            echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
            header("Location: index.php");
        }
       

    }
    
    else {
        header("Location: index.php");
    }

?>
