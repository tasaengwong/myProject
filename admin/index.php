<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>addmin_page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="main.css?3">
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
    
    <div class="container">
        <div style="height:50px;"></div>
        <div class="well" style="margin:auto; padding:auto; width:80%;">
            <span style="font-size:25px; color:blue">
               
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>