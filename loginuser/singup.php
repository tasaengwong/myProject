<?php 

    session_start();

    if (isset($_POST['username'])) {

        include('connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $sql = "SELECT * FROM user  WHERE username = '$username' AND password = '$passwordenc' ";
        $result = mysqli_query($con, $sql);


        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
            $_SESSION['userid'] = $row['username']; 
            $_SESSION['name'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['userlevel'] = $row['userlevel'];

            if ($_SESSION['userlevel'] ==  'teacher' ) {
                header("Location: teacher_page.php");
            }
            if ($_SESSION['userlevel'] ==  'officer' ) {
                header("Location: off_page.php");
            }
            if ($_SESSION['userlevel'] ==  'admin' ) {
                header("Location: addmin_page.php");
            }
        } 

        else {
            echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
            header("Location: singin.php");
        }
       

    }
    
    else {
        header("Location: singin.php");
    }

?>