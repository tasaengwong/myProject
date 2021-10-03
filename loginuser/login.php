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
            $_SESSION['status'] = $row['status'];
            $_SESSION['username'] = $row['username'];

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
