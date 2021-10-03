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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../student/css/master.css?9">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container-fluid">

        <img src="../img/ICT_UP_Logo.png" alt="logoict" class="img">
        &nbsp;
        <h3>ระบบสารสนเทศการฝึกงาน</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav col-12 justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../loginuser/user_page.php">หน้าแรก</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                นักศึกษา
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="../student/add-company.php">ยื่นข้อมูลสถานประกอบการ</a></li>
                <li><a class="dropdown-item" href="../student/Regisform.php">ยื่นคำร้องขอฝึกงาน</a></li>
                <li><a class="dropdown-item" href="../student/Board.php">ติดตามสถานะ</a></li>
                <li><a class="dropdown-item" href="../student/doc-intern.php">เอกสารที่เกี่ยวข้อง</a></li>
              </ul>
            <li class="nav-item dropdown">
              <a class="btn btn-success nav-link dropdown-toggle bi bi-person-circle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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



    <h1>สถานะการยื่นคำร้อง</h1>
    <hr>



    <section>


      <div class="container">
        <div class="row">
          <div class="col-sm student-detail">
            <!-- select information -->

            <table>
              <table class="table table-striped">
                <tr>
                  <th>ลำดับ</th>
                  <th>หมายเหตุ</th>
                  <th></th>
                  <th>สถานะ</th>
                  <th></th>
                  <th></th>
                </tr>


                <form>

                  <td>  <?php echo $_SESSION['userid']; ?></td>
                  <td>  <?php echo $_SESSION['name']; ?></td>
                  <td></td>
                  <td>

                    <?php
                   
                      if ($_SESSION['status'] == 0) 
                      {
                        echo '<p><a 
                                id=' . $_SESSION['status'] . '&status="" " class = "text fa fa-spinner">
                                กำลังดำเนินการ</a></p>';
                      } else if ($_SESSION['status'] == 1)
                       {
                        echo '<p><a
                                id=' . $_SESSION['status'] . '&status=0"  class = "text text-success fa fa-check">
                                อนุมัติ</a></p>';
                      } else 
                      {
                        echo '<p><a
                                id=' .$_SESSION['status'] . '&status=2"  class = "text text-danger fa fa-times">
                                ไม่อนุมัติ</a></p>';
                      }
                    
                    ?>
                  </td>


                </form>
                </tr>
           
              </table>
            </table>

          </div>
        </div>

      </div>
    </section>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="./js/master.js"></script> -->
  </body>

  </html>
  <?php } ?>