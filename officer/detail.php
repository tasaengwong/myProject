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
    <title>studenlist</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

  </head>

  <body ng-controller="Ctrl">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container-fluid">

        <img src="../img/ict.png" alt="logoict" class="img">
        &nbsp;
        <h3>ระบบสารสนเทศการฝึกงาน</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav col-12 justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../loginuser/admin_page.php">หน้าแรก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./infromation.php">รายชื่อนิสิต</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./report.php">รายงาน</a>
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
    require('connect.php');
    $sql = "SELECT * from students LEFT JOIN company ON students.comp_id = company.comp_id";
    $result = $conn->query($sql);
    ?>

    <section>

      <div class="container">
        <div class="row">
          <div class="col-sm student-detail">
            <!-- select information -->
            <br><br>
            <h4>รายชื่อนิสิต</h4><br>
            <!-- search filter -->
            <form name="search_form" id="search_form" class="d-flex justify-content-end">
              <select name='select_major' id="categories" class=" btn btn-light select_filter">
                <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                <option value="วิศวกรรมซอฟร์แวร์">วิศวกรรมซอฟร์แวร์</option>
                <option value="วิศวกรรมคอมพิวเตอร์">วิศวกรรมคอมพิวเตอร์</option>
                <option value="คอมพิวเตอร์กราฟและมัลติมีเดีย">คอมพิวเตอร์กราฟฟิกและมัลติมีเดีย</option>
              </select>
              <button type="submit" class="bi bi-search"></button>
            </form>
            <br>
            <!-- end form -->

            <table class="table"> 
              <table class="table table-striped">
                <tr>
                  <th>ลำดับ</th>
                  <th>รหัสนิสิต</th>
                  <th>ชื่อ</th>
                  <th>นามสกุล</th>
                  <th>สาขา</th>
                  <th>ชั้นปี</th>
                  <th>สถานประกอบการ</th>
                  <th>ตำแหน่งงาน</th>
                  <th></th>
                  <th>สถานะ</th>
                  <th></th>
                  <th></th>
                  <th>หมายเหตุ</th>

                </tr>
                <?php
                $i = 0;
                while ($data = mysqli_fetch_assoc($result)) {
                $i++;
                ?>

                  <form>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['stu_id']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['lastname']; ?></td>
                    <td><?php echo $data['major']; ?></td>
                    <td><?php echo $data['year']; ?></td>
                    <td><?php echo $data['comp_name']; ?></td>
                    <td><?php echo $data['Job']; ?></td>
                    <td>

                    </td>

                    <td>
                      <?php
                      if ($data['status'] == 0) {
                        // echo '<p id=' . $data['stu_id'] . '&status="" " class = "text fa fa-spinner">กำลังดำเนินการ</a></p>';
                      } else if ($data['status'] == 1) {
                        echo '<p stu_id=' . $data['stu_id'] . '&status=0"  class = "text text-success fa fa-check">อนุมัติ</a></p>';
                      } else {
                        echo '<p stu_id=' . $data['stu_id'] . '&status=2"  class = "text text-danger fa fa-times">ไม่อนุมัติ</p>';
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($data['status'] == 0) {
                        echo '<p><a href="change.php?stu_id=' . $data['stu_id'] . ' &status=1 " class = "btn btn-outline-success">อนุมัติ</a></p>';
                      }
                      ?>
                    <td>
                      <?php
                      if ($data['status'] == 0) {
                        echo '<p><a href="change.php?stu_id=' . $data['stu_id'] . ' &status=2 "  class = "btn btn-outline-danger">ไม่อนุมัติ</a></p>';
                      }
                      ?>
                    </td>
                    </td>
                    <td>
                      <a href="#edit<?php echo $data['stu_id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>เพิ่มเติม</a>
                      <?php include('button.php'); ?>
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


    <!-- Modal -->
    <!-- <script>
      $('.select_filter').on('change', function() {
        $.ajax({
          type: "POST",
          url: "search.php",
          data: $('#search_form').serialize(), // You will get all the select data..
          success: function(data) {
            $("#projects").html(data);
          }
        });
      });
    </script> -->



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



  </body>

  </html>
<?php } ?>