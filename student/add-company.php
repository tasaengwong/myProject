<?php

session_start();

?>
<!doctype html>
<html lang="th-TH" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <title>contract</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/comp.css">
</head>

<body >
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">

      <img src="../img/ICT_UP_Logo.png" alt="logoict" class="img"> 
      &nbsp;
      <h3>ระบบสารสนเทศการฝึกงาน</h3>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav col-12 justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.html">หน้าแรก</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              นักศึกษา
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="../student/add-company.php">ยื่นข้อมูลสถานประกอบการ</a></li>
              <li><a class="dropdown-item" href="../student/Regisform.php">ยื่นคำร้องขอฝึกงาน</a></li>
             
            </ul>
          
            

        </ul>
      </div>
    </div>
  </nav>


    <section>
        <!-- ข้อมูลสถานประกอบการ -->
       
        <form class="form-horizontal" action="./add_comp_bd.php" method="POST" enctype="multipart/form-data" name="add">
            <div class="form-inline justify-content-center">
                <h4>บันทึกข้อมูลสถานประกอบการ</h4>
            </div>
            <hr><br>
           <div class="form-inline">
           <h6>ข้อมูลสถานประกอบการ</h6>
           </div><br>
            <div class="form-inline col-sm-10">
                <label for="name">ชื่อสถานประกอบการ:</label>&nbsp;
                <input name="comp_name" id="comp_name" type="text" class="form-control col-sm-5">
            </div><br>

            <div class="form-inline col-sm-8">
                <label for="name">เรียน:</label>&nbsp;
                <input name="contract_name" id="industry_contract" type="text" class="form-control col-5"  placeholder="ระบุชื่อบุคคลหรือตำแหน่ง">&nbsp;
                <span>สำหรับส่งหนังสือขอความอนุเคราะห์</span>
            </div><br>

            <div class="form-inline col-sm-10">
                <label for="addr">ที่อยู่:</label>&nbsp;
                <textarea name="comp_address" id="addr" cols="40" rows="5" class="form-control" ></textarea>
            </div><br>

            <div class="form-inline col-sm-12">
                <label for="subdistrict">ตำบล:</label>&nbsp;
                <input name="comp_subdis" id="comp_subdis" type="text" class="form-control col-sm-3" >&nbsp;
                <label for="district">อำเภอ:</label>&nbsp;
                <input name="comp_amphure" id="comp_amphure" type="text" class="form-control col-sm-3" >&nbsp;
                <label for="province">จังหวัด:</label>&nbsp;
                <input name="comp_province" id="comp_provice" type="text" class="form-control col-sm-3" >
            </div><br>

            <div class="form-inline col-sm-12">
                <label for="district">รหัสไปรษณีย์:</label>&nbsp;
                <input name="comp_zipcode" id="comp_zipcode" type="text" class="form-control col-sm-3" >&nbsp;
            </div><br>

            <div class="form-inline col-sm-12">
                <label for="phone">โทรศัพท์มือถือ :</label>&nbsp;
                <input name="comp_phone" id="comp_phone" type="text" class="form-control " placeholder="เบอร์ติดต่อ" maxlength="15" >&nbsp;
            
                <label for="email">E-mail :</label>&nbsp;
                <input name="comp_mail" id="comp_mail" type="text" class="form-control col-sm-3 " placeholder="E-mail" >&nbsp;
            
                <label for="FAx">FAX :</label>&nbsp;
                <input name="comp_Fax" id="comp_Fax" type="text" class="form-control " placeholder="FAX" >
            </div><br>

            <div class="bnt col-10">
                <button class="btn btn-success" type="submit" ><i class="fas fa-plus-circle">&nbsp;</i>บันทึกข้อมูล</button>
                
            </div><br><hr>
        </form>

    </section><br>
    

    <!--container script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="./js/scrip.js?2"></script>
</body>

</html>
