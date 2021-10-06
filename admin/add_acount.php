<?php

session_start();

require_once "connection.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $userlevel = $_POST['userlevel'];

    $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($con, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        $passwordenc = md5($password);

        $query = "INSERT INTO user (username, password, firstname, lastname,  userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', '$userlevel')";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['success'] = "Insert user successfully";
            header("Location: singin.php");
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("Location: singin.php");
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ลงทะเบียนผู้ใช้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="style.css?5">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">

            <img src="../img/ict.png" alt="logoict" class="img">

            <h3>ระบบสารสนเทศการฝึกงาน</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav col-12 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../loginuser/addmin_page.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../admin/add_acount.php">Account ผู้ใช้</a>
                    </li>


                    <li class="nav-item dropdown">
                        <button class="btn btn-info nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> <?php echo $_SESSION['name']; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item bi bi-arrow-right-square-fill" href="../loginuser/logout.php">&nbsp;LOG-OUT</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="contrainer">


        <form class="form-horizontal " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <div class="control-group">
                    <label for="username" class="control-label">Username</label>
                    <div class="control">
                        <input type="text" name="username" class="input-xlarge" id="username" placeholder="ใช้รหัสนิสิต" required>
                    </div>


                    <label for="password" class="control-label">Password</label>
                    <div class="control">
                        <input type="password" name="password" class="input-xlarge" id="password" placeholder="Enter your password" required>
                    </div>

                    <label for="name" class="control-label">ชื่อ</label>
                    <div class="control">
                        <input type="text" name="fistname" class="input-xlarge" id="name" placeholder="ชื่อ" required>
                    </div>

                    <label for="lastname" class="control-label">นามสกุล</label>
                    <div class="control">
                        <input type="text" name="lastname" class="input-xlarge" id="lastname" placeholder="นามสกุล" required>
                    </div>

                    <label for="lastname" class="control-label">สถานะผู้ใช้ </label>
                    <div class="control">
                        <input type="text" name="userlevel" class="input-xlarge" id="lastname" placeholder="ระดับผู้ใช้" required>
                    </div>
                </div>
    </div>



    <div class="control">
        <input type="submit" name="submit" class="btn btn-primary mb-3" value="Submit">
    </div>
    </fieldset>
    </form>
    </div>


    </div>





</body>

</html>