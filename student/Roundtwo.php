<?php

session_start();

if (!$_SESSION['userid']) {
    header("Location: index.php");
} else {

?>
    <!doctype html>
    <html lang="th-TH" ng-app="myApp">

    <head>
        <meta charset="UTF-8">
        <title>ยื่นคำร้องขอฝึกงาน</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./css/style.css?65">
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
                                <li><a class="dropdown-item" href="../student/add-company.php">ยื่นข้อมูลสถานประกอบการ</a></li>
                                <li><a class="dropdown-item" href="../student/Regisform.php">ยื่นคำร้องขอฝึกงาน</a></li>
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

        <section>
            <div class="container ">
                <h4>แบบขอข้อมูลเบื้องต้นการฝึกประสบการณ์วิชาชีพ นักศึกษา<br>คณะเทคโนโลยีสารสนเทศและการสื่อสาร มหาวิทยาลัยพะเยา
                </h4>
                <hr><br>
                <h6>คำชี้แจง : แบบฟอร์มนี้จัดทำขึ้นเพื่อขอข้อมูลเบื้องต้นการฝึกประสบการณ์วิชาชีพ นักศึกษา</h6><br>

                <h5>1.รายละเอียดการฝึกงานและสถานประกอบการ</h5>
                <?php
                $conn = new mysqli("localhost", "root", "", "project103");
                $conn->set_charset('utf8');
                ?>
                <form action="update.php" method="POST" enctype="multipart/form-data" name="add">
                    <div class="form-inline col-sm-12" method="get">
                        <label for="company">สถานประกอบการ:</label>&nbsp;
                        <select name="comp_id" class="custom-select col-sm-6" ng-optin=" x for x in comp_id">
                            <option default>----สถานประกอบการ------</option>
                            <?php
                            $sql = "select * from company ";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                if ($row['comp_id'] == $_GET['selectcompany']) {
                                    echo "{$row['comp_id']}&nbsp;{$row['comp_name']}<option selected>";
                                } else {
                                    echo "<option>";
                                }
                                echo "{$row['comp_id']}&nbsp;{$row['comp_name']}</option>";
                            }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-inline col-sm-12">
                        <label for="Job">ตำแหน่งที่ฝึก:</label>&nbsp;
                        <input type="text" class="form-control col-sm-4" name="Job">&nbsp;&nbsp;
                        <label for="description">รายละเอียดหรือลักษณะงาน:</label>&nbsp;
                        <textarea name="description" id="description" cols="40" rows="2" class="form-control"></textarea>

                    </div><br>

                            
                        <!-- ข้อมูลนักศึกษา -->
                        <h5>2.ข้อมูลนักศึกษา</h5><br>

                        <div class="form-inline col-sm-12">
                            <label for="student_id">รหัสนิสิต :&nbsp; <?php echo $_SESSION['userid']; ?> </label>&nbsp;
                        </div><br>


                        <div class="form-inline  col-sm-12">

                            <label for="name">ชื่อ:&nbsp; <?php echo $_SESSION['name']; ?></label>&nbsp;
                            &nbsp;

                            <label for="lastname">นามสกุล:&nbsp; <?php echo $_SESSION['lastname']; ?></label>&nbsp;
                        </div><br>

                        <!-- <#?php
          $conn = new mysqli("localhost", "root", "", "itpro");
          $conn->set_charset('utf8');
          ?> -->

                        <div class="form-inline col-sm-12" method="get">
                            <label for="major">สาขา:&nbsp; <?php echo $_SESSION['major']; ?></label>&nbsp;
                            <!-- <select name="major" class="custom-select col-sm-5" ng-optin=" x for x in major">
                                <option value="">--สาขา--</option>
                                <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                                <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                                <option value="วิศวกรรมซอฟร์แวร์">วิศวกรรมซอฟร์แวร์</option>
                                <option value="วิศวกรรมคอมพิวเตอร์">วิศวกรรมคอมพิวเตอร์</option>
                                <option value="คอมพิวเตอร์กราฟและมัลติมีเดีย">คอมพิวเตอร์กราฟฟิกและมัลติมีเดีย</option>
                                <option value="ภูมิศาสตร์สารสนเทศ">ภูมิศาสตร์สารสนเทศ</option>

                            </select>&nbsp;&nbsp; -->

                            <label for="year">ชั้นปี:&nbsp; <?php echo $_SESSION['year']; ?></label>&nbsp;
                        </div><br>

                        <div class=" form-inline col-sm-12">
                            <label for="studentAddress">ที่อยู่: &nbsp; <?php echo $_SESSION['address']; ?></label>&nbsp;
                        </div>&nbsp;&nbsp;&nbsp;

                        <div class="form-inline col-sm-12">
                            <label for="provinces">จังหวัด:&nbsp; <?php echo $_SESSION['province']; ?> </label>&nbsp;
                            
                            <label for="amphuer">อำเภอ:&nbsp; <?php echo $_SESSION['amphures']; ?> </label>&nbsp;
                       
                            <label for="district">ตำบล:&nbsp; <?php echo $_SESSION['district']; ?> </label>&nbsp;
                          
                            <label for="zipcode">รหัสไปรษณีย์:&nbsp; <?php echo $_SESSION['zipcode']; ?> </label>&nbsp;
                      
                        </div><br>

                        <div class="form-inline">
                            <label for="phone">โทรศัพท์มือถือ :&nbsp; <?php echo $_SESSION['phone']; ?></label>&nbsp;&nbsp;
                            &nbsp;
                            <label for="email">E-mail :&nbsp; <?php echo $_SESSION['email']; ?></label>&nbsp;&nbsp;
                        </div><br>
                        <div class="form-inline col-sm-6">
                            <label for="study">การลงทะเบียนเรียน:</label>&nbsp;
                            <select name="study" id="study" class="form-select col-sm-6" aria-label=".form-select">
                                <option value="ลงทะเบียนฝึกงาน" selected>ลงทะเบียนฝึกงาน</option>
                                <option value="ลงทะเบียนเรียนพร้อมฝึกงาน">ลงทะเบียนเรียนพร้อมฝึกงาน</option>
                            </select>
                        </div><br>
                        <div class="form-inline col-sm-12">
                            <label for="plan-study">การจัดส่งเอกสาร:</label>&nbsp;
                            <select name="sent" id="sent" class="form-select col-sm-4" aria-label=".form-select">
                                <option value="ส่งด้วยตัวเอง" selected>ส่งด้วยตัวเอง</option>
                                <option value="คณะเป็นผู้จัดส่ง">คณะเป็นผู้จัดส่ง</option>
                                <option value="จัดส่งทางEmail">จัดส่งทางE-mail</option>
                            </select>&nbsp;
                            <label for="sentmail">E-mail:</label>&nbsp;
                            <input type="text" class="form-control col-sm-5" name="sentmail" placeholder="ระบุอีเมลที่ต้องการจัดส่ง">
                        </div><br>
                
                    <hr>
                    <div class="bnt col-10">

                        <button class="btn btn-success" type="submit"><i class="fas fa-plus-circle">&nbsp;</i>บันทึกข้อมูล</button>
                        <a href="../index.html" class="btn btn-light col-sm-4">ย้อนกลับ</a>
                    </div><br>
            </div>

            </form>

        </section><br>
        <!-- Footer -->
        <footer class="footer card-footer">
            <div class="col-lg-6 text-lg-right">@ version beta</div>
        </footer>

        <!--container script-->
        <!-- sweetalert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- close sweetalert -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
        <script src="./js/scrip.js?4"></script>
    </body>

    </html>
<?php } ?>