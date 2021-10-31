<?php

session_start();
if (!$_SESSION['userid']) {
  header("Location: index.php");
} else {

?>
<!doctype html>
<html lang="th-TH" >

<head>
  <meta charset="UTF-8">
  <title>ยื่นคำร้องขอฝึกงาน</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/master.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <img src="../img/ICT_UP_Logo.png" alt="logoict" class="img">
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
                <li><a class="dropdown-item" href="../student/Board.php">ติดตามสถานะ</a></li>
                <li><a class="dropdown-item" href="../student/Roundtwocp.php">ยื่นข้อมูลสถานประกอบการ(รอบ 2)</a></li>
                <li><a class="dropdown-item" href="../student/Roundtwo.php">ยื่นคำร้องขอฝึกงาน(รอบ 2)</a></li>
                <li><a class="dropdown-item" href="../student/doc-intern.php">เอกสารที่เกี่ยวข้อง</a></li>
                <li><a class="dropdown-item" href="../student/form_asses.php">แบบสอบถามนิสิตฝึกงาน</a></li>
            </ul>


              <li class="nav-item dropdown">
              <a class="btn btn-info nav-link dropdown-toggle bi bi-person-circle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['name']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <a class="dropdown-item bi bi-arrow-right-square-fill" href="../loginuser/logout.php">&nbsp;LOG-OUT</a>
                </li>
              </ul>
            </li> 
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section>
    <!-- ข้อมูลสถานประกอบการ -->

    <form class="form-horizontal" action="./add_comp_bd2.php" method="POST" enctype="multipart/form-data" name="add">
      <div class="form-inline justify-content-center">
        <h4>บันทึกข้อมูลสถานประกอบการ</h4>
      </div>
      <hr><br>
      <div class="form-inline">
        <h5><strong>ข้อมูลสถานประกอบการ</strong></h5>
      </div><br>
      <div class="form-inline col-sm-10">
        <label for="name">ชื่อสถานประกอบการ:</label>&nbsp;
        <input name="comp_name" id="comp_name" type="text" class="form-control col-sm-5" required>
      </div><br>

      <div class="form-inline col-sm-8">
        <label for="name">เรียน:</label>&nbsp;
        <input name="contract_name" id="industry_contract" type="text" class="form-control col-5" placeholder="ระบุชื่อบุคคลหรือตำแหน่ง" required>&nbsp;
        <span>สำหรับส่งหนังสือขอความอนุเคราะห์</span>
      </div><br>

      <div class="form-inline col-sm-10">
        <label for="addr">ที่อยู่:</label>&nbsp;
        <textarea name="comp_address" id="addr" cols="40" rows="5" class="form-control" required></textarea>
      </div><br>

      <div class="form-inline col-sm-12">
        <label for="subdistrict">ตำบล:</label>&nbsp;
        <input name="comp_subdis" id="comp_subdis" type="text" class="form-control col-sm-3" required>&nbsp;
        <label for="district">อำเภอ:</label>&nbsp;
        <input name="comp_amphure" id="comp_amphure" type="text" class="form-control col-sm-3" required>&nbsp;
        <label for="province">จังหวัด:</label>&nbsp;
        <input name="comp_province" id="comp_provice" type="text" class="form-control col-sm-3" required>
      </div><br>

      <div class="form-inline col-sm-12">
        <label for="district">รหัสไปรษณีย์:</label>&nbsp;
        <input name="comp_zipcode" id="comp_zipcode" type="text" class="form-control col-sm-3" maxlength="5" pattern="[0-9]*" required>&nbsp;
      </div><br>

      <div class="form-inline col-sm-12">
        <label for="phone">โทรศัพท์มือถือ :</label>&nbsp;
        <input name="comp_phone" id="comp_phone" type="text" class="form-control " placeholder="เบอร์ติดต่อ" maxlength="10" pattern="[0-9]*" required>&nbsp;

        <label for="email">E-mail :</label>&nbsp;
        <input name="comp_mail" id="comp_mail" type="email" class="form-control col-sm-3 " placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>&nbsp;

        <label for="FAx">FAX :</label>&nbsp;
        <input name="comp_Fax" id="comp_Fax" type="text" class="form-control " placeholder="FAX" >
      </div><br>
     
      <div class="bnt col-10">
      <hr>
        <button class="btn btn-success" type="submit"><i class="fas fa-plus-circle">&nbsp;</i>บันทึกข้อมูล</button>
      </div><br>
      <hr>
    </form>

  </section><br>


  <!--container script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/scrip.js?2"></script>
</body>

</html>
<?php
}
?>