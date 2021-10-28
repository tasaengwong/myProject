<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log-Page</title>

    <link rel="stylesheet" href="style.css?">
    <link rel="stylesheet" href="main.css?8">
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
        <div class="row  justify-content-xl-center main-content ">
            <div class="row justify-content-xl-center">
                <div class="logo">
                    <img src="../img/uplogo.png" alt="up" id="uplogo">&nbsp;&nbsp;
                    <img src="../img/ict.png" alt="ict" id="ictlogo">
                    <img src="../img/ictnext.png" alt="next" id="nextlogo">
                </div>
                <div class="text-header sub-text">
                    <h2 class="text-center">การพัฒนาระบบสารสนเทศเพื่อการจัดการฝึกงานแบบออนไลน์ </h2>
                    <h4>สำหรับอาจารย์และเจ้าหน้าที่</h4>
                </div>

            </div>
            <div class="col-sm-4 ">
                <form action="singup.php" method="post" class="form-login ">
                    <div class="col-sm-12 row ">
                        <div class="col-12">
                            <!-- <label for="username">UserName</label> -->
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <br>
                            <!-- <label for="password">Password</label> -->
                            <input type="password" class="form-control " name="password" placeholder="Password" required>
                            <br>
                            <input type="submit" name="submit" value="Login" class="btn btn-primary">
                        </div>
                    </div><br>
                    <div class=" col-12 back-btn">
                        <a href="../index.html" class="btn btn-light">back</a>
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