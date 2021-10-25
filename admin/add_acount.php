<?php

session_start();
if (!$_SESSION['userid']) {
    header("Location: singin.php");
} else {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ลงทะเบียนผู้ใช้</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../loginuser/style.css?8">

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">

                <img src="../img/ict.png" alt="logoict2" class="img" id="logoict2">

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
                            <a class="nav-link active" aria-current="page" href="../admin/add_acount.php">บัญชีผู้ใช้</a>
                        </li>
&nbsp;

                        <li class="nav-item dropdown">
                            <button class="btn btn-info nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> <?php echo $_SESSION['name']; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item bi bi-arrow-right-square-fill" href="../loginuser/logout.php">&nbsp;LOG-OUT</a></li>
                            </ul>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-info nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i> <?php echo $_SESSION['name']; ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item bi bi-arrow-right-square-fill" href="../loginuser/logout.php">&nbsp;LOG-OUT</a></li>

                                </ul>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div style="height:50px;"></div>
            <div class="well" style="margin:auto; padding:auto; width:80%;">
                <span style="font-size:30px; color:blue">

                </span>
                <span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
                <div style="height:50px;"></div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>username</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>สถานะ</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        include('connection.php');


                        $query = mysqli_query($con, "select * from `user`");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo ucwords($row['username']); ?></td>
                                <td><?php echo ucwords($row['firstname']); ?></td>
                                <td><?php echo ucwords($row['lastname']); ?></td>
                                <td><?php echo $row['userlevel']; ?></td>
                                <td>
                                    <a href="#edit<?php echo $row['username']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
                                    <a href="#del<?php echo $row['username']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                    <?php include('button.php'); ?>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <?php include('add_modal.php'); ?>
        </div>



    </body>

    </html>
<?php }
?>