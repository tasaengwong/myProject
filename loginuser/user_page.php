<?php

session_start();

if (!$_SESSION['userid']) {
  header("Location: index.php");
} else {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าแรก</title>
    <link rel="stylesheet" href="../loginuser/css/style.css?2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
              <a class="nav-link active" aria-current="page" href="./user_page.php">หน้าแรก</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                นักศึกษา
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="../student/Board.php?">ติดตามสถานะ</a></li>
                <li><a class="dropdown-item" href="../student/Roundtwocp.php">ยื่นข้อมูลสถานประกอบการ(รอบ 2)</a></li>
                <li><a class="dropdown-item" href="../student/Roundtwo.php">ยื่นคำร้องขอฝึกงาน(รอบ 2)</a></li>
                <li><a class="dropdown-item" href="../student/doc-intern.php">เอกสารที่เกี่ยวข้อง</a></li>
                <li><a class="dropdown-item" href="../student/form_asses.php">แบบสอบถามนิสิตฝึกงาน</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="btn btn-info nav-link dropdown-toggle bi bi-person-circle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['name']; ?>
              </a>
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
    $sql = "SELECT * from students LEFT JOIN company ON students.comp_id = company.comp_id LEFT JOIN major on students.major_id = major.major_id ";
    $result = $con->query($sql);

    ?>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm student-detail">
            <!-- select information -->
            <br><br>
            <h4  class="text-center">ข้อมูลนักศึกษา</h4><br>
            <!-- search filter -->

            <br>
            <!-- end form -->

            <table class="table" id="txtHint">
              <table class="table table-bordered">
                <tr class="bg-light text-center">
                  <th>รหัสนิสิต</th>
                  <th>ชื่อ</th>
                  <th>นามสกุล</th>
                  <th>สาขา</th>
                  <th>ชั้นปี</th>


                </tr>
                <?php
              
                $data = mysqli_fetch_array($result) 
                ?>
              
                  <form class="tabel table-hover ">
                    <td class="text-center"><?php echo $_SESSION['userid']; ?></td>
                    <td class="text-center"><?php echo $_SESSION['name']; ?></td>
                    <td class="text-center"><?php echo $_SESSION['lastname']; ?></td>
                    <td class="text-center"><?php echo $data['major_name']; ?></td>
                    <td class="text-center"><?php echo $_SESSION['year']; ?></td>

                  </form>
                  </tr>
              
                
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