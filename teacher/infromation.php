<?php

session_start();

if (!$_SESSION['userid']) {
  header("Location: singin.php");
} else {

?>
  <!DOCTYPE html>
  <html lang="en" ng-app="myApp">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลนักศึกษา</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css?5">


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
              <a class="nav-link active" aria-current="page" href="../loginuser/teacher_page.php">หน้าแรก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./infromation.php">รายชื่อนิสิต</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                รายงาน
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="../teacher/report.php">ข้อมูลนักศึกษา</a></li>
                <li><a class="dropdown-item" href="excel.php">Excel</a></li>
              </ul>
            </li>
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
      ini_set('display_errors', 1);
      error_reporting(~0);

      $strKeyword = null;

      if(isset($_POST["txtKeyword"]))
      {
        $strKeyword = $_POST["txtKeyword"];
      }
    ?>
    <?php
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "project103";
    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

    $sql = "SELECT * from students LEFT JOIN company ON students.comp_id = company.comp_id 
    WHERE stu_id LIKE '%".$strKeyword."%' 
    OR name LIKE '%".$strKeyword."%' 
    OR lastname LIKE '%".$strKeyword."%' 
    OR major LIKE '%".$strKeyword."%' 
    OR year LIKE '%".$strKeyword."%'";

    $query = mysqli_query($conn,$sql);
    ?>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm student-detail">
            <!-- select information -->
            <br><br>
            <h4>รายชื่อนิสิต</h4><br>
            <!-- search filter -->

            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
            <table class="float-right"  width="" border="1">
              <tr>
                <th>ค้นหา
                <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
                <input type="submit" value="Search"></th>
              </tr>
            </table>
           </form>

            <br>

            <?php
            $sql = "SELECT  * FROM students LEFT JOIN company ON students.comp_id = company.comp_id 
            WHERE stu_id LIKE '%".$strKeyword."%' 
            OR name LIKE '%".$strKeyword."%' 
            OR lastname LIKE '%".$strKeyword."%' 
            OR major LIKE '%".$strKeyword."%' 
            OR year LIKE '%".$strKeyword."%'
            OR date LIKE '%".$strKeyword."%'
            OR time LIKE '%".$strKeyword."%'
            OR comp_name LIKE '%".$strKeyword."%'
            ";

            $query = mysqli_query($conn,$sql);
            ?>

            <table class="table" id="txtHint">
              <table class="table table-bordered">
                <tr class="bg-light">
                  <th>ลำดับ</th>
                  <th>รหัสนิสิต</th>
                  <th>ชื่อ</th>
                  <th>นามสกุล</th>
                  <th>สาขา</th>
                  <th>ชั้นปี</th>
                  <th>ปีการศึกษา</th>
                  <th>สถานประกอบการ</th>
                  <th>ตำแหน่งงาน</th>
                  <th>วันที่ยื่นเรื่อง</th>
                  <th>เพิ่มเติม</th>
                  <th colspan="6">สถานะ</th>


                </tr>
                <?php
                $i = 0;
                while($data=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                  $i++;
                ?>

                  <form>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['stu_id']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['lastname']; ?></td>
                    <td><?php echo $data['major']; ?></td>
                    <td><?php echo $data['year']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $data['comp_name']; ?></td>
                    <td><?php echo $data['Job']; ?></td>
                    <td><?php echo $data['time']; ?></td>
                    <td>
                    <a href="#edit<?php echo $data['stu_id']; ?>" data-toggle="modal" class="btn btn-light bi bi-file-earmark-text"><span class="glyphicon glyphicon-edit"></span></a>
                      <?php include('button.php'); ?>
                    </td>


                    <td >
                      <?php
                      if ($data['status'] == 0) {
                        // echo '<p id=' . $data['stu_id'] . '&status="" " class = "text fa fa-spinner">กำลังดำเนินการ</a></p>';
                      } else if ($data['status'] == 1) {
                        echo '<p stu_id=' . $data['stu_id'] . '&status="0"  class = "text text-success fa fa-check">อนุมัติ</a></p>';
                      } else {
                        echo '<p stu_id=' . $data['stu_id'] . '&status="2"  class = "text text-danger fa fa-times">ไม่อนุมัติ</p>';
                      }
                      ?>
                   
                      <?php
                      if ($data['status'] == 0) {
                        echo '<p><a href="change.php?stu_id=' . $data['stu_id'] . ' &status=1 " class = "btn btn-outline-success">อนุมัติ</a></p>';
                      }
                      ?>
                   
                      <?php
                      if ($data['status'] == 0) {
                        echo '<p><a href="change.php?stu_id=' . $data['stu_id'] . ' &status=2 "  class = "btn btn-outline-danger">ไม่อนุมัติ</a></p>';
                      }
                      ?>
                    </td>

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

    <script>
      function showdetail(str) {
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
        xhttp.open("GET" + str);
        xhttp.send();
      }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<?php 
mysqli_close($conn);
} ?>

  </body>

  </html>
