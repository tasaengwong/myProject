<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log-in</title>

    <link rel="stylesheet" href="style.css?">
    <link rel="stylesheet" href="main.css?2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class=" success">
            <?php
            echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php
            echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">

            <div class="col-sm-8 loginbg">
                <form action="login.php" method="post" class="form-login">

                    <div class="col-sm-4 row justify-content-center">
                        <div class="col ">
                            <!-- <label for="username">ชื่อผู้ใช้</label> -->
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <br>
                            <!-- <label for="password">รหัสผ่าน</label> -->
                            <input type="password" class="form-control " name="password" placeholder="Password" required>
                            <br>
                            <input type="submit" name="submit" value="Login" class="btn btn-primary">
                            <br>
                            <a href="../student/Regisform.php" class="btn btn-info">Go to register</a>
                            <br>
                            <a href="singin.php" class="btn btn-info">Go to teacher</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
    session_destroy();
}

?>