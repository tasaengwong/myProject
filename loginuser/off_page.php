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
        <title>User Page</title>
        <link rel="stylesheet" href="./style.css?6">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">

                <img src="../img/ict.png" alt="logoict" class="img" > 

                <h3>ระบบสารสนเทศการฝึกงาน</h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav col-12 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../loginuser/off_page.php">หน้าแรก</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ข้อมูลนักศึกษา
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="../officer/detail.php">รายชื่อนิสิต</a></li>
                            
                            </ul>
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


    <?php
    require('connection.php');
    $sql = "SELECT * from user ";
    $result = $con->query($sql);
    ?>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm student-detail">
            <!-- select information -->
            <br><br>
            <h4>ข้อมูลเจ้าหน้าที่</h4><br>
            <!-- search filter -->
            
            <br>
            <!-- end form -->

            <table class="table" id="txtHint">
              <table class="table table-bordered">
                <tr class="bg-light">
    
                  <th>ชื่อ</th>
                  <th>นามสกุล</th>

                </tr>
                <?php
                  {
                ?>
                  <form>
                               
                    <td><?php echo $_SESSION['name']; ?></td>
                    <td><?php echo $_SESSION['lastname']; ?></td>
                    
  
                  </form>
                  </tr>
                <?php
                  }
                ?>
              </table>
            </table>
          </div>
        </div>
    </section>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </body>

    </html>


<?php } ?>