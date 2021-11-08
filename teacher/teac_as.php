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
        <title>แบบสอบถามนิสิตฝึกงาน</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./css/master.css?68">
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
                                <li><a class="dropdown-item" href="report.php">ข้อมูลนักศึกษา</a></li>
                                <li><a class="dropdown-item" href="../teacher/teac_as.php">แบบประเมินสถานประกอบการ</a></li>
                                <li><a class="dropdown-item" href="excel.php">Excel ข้อมูลนิสิต</a></li>
                                <li><a class="dropdown-item" href="excel2.php">Excel แบบประเมินนิสิต</a></li>
                                <li><a class="dropdown-item" href="excel3.php">Excel แบบประเมินสถานประกอบการ </a></li>
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

        <br>
        <?php
        $conn = new mysqli("localhost", "root", "", "project103");
        $conn->set_charset('utf8');
        $major_id = $_SESSION['major'];
        $sql = "select * from user left join major ON user.major_id = major.major_id WHERE user.major_id ='$major_id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC)
        ?>
        <div class="container">
            <div class="row">
                <div class="header">
                    <h2 class="text-center">แบบประเมินสถานประกอบการสำหรับอาจารย์นิเทศการฝึกงาน</h2>
                    <hr>
                </div>
                <div class="col-md-10 "><br>
                    <form action="save.php" name="form_asses" method="post" class="justify-content-center">
                        <div class="description">
                            <p><strong>คำชี้แจง :</strong> แบบสำรวจนี้จัดทำขึ้นเพื่อประเมินสถานประกอบการสำหรับอาจารย์นิเทศการฝึกงาน คณะเทคโนโลยีสารสนเทศและการสื่อสาร
                                </p>


                            <div class="row">
                                <div class="col">
                                    <label for="name">ชื่อ:</label>&nbsp;
                                    <input name="teac_N" id="teac_N" type="text" class="form-control col-md-3" placeholder="ชื่อ" value=" <?php echo $_SESSION['name']; ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="lastname">นามสกุล:</label>&nbsp;
                                    <input name="teac_L" id="teac_L" type="text" class="form-control col-md-3" placeholder="นามสกุล" value=" <?php echo $_SESSION['lastname']; ?>" readonly>
                                </div>
                                <div class="col">
                                    <label for="major">สาขา:</label>&nbsp;
                                    <input name="major_name" id="major" type="text" class="form-control col-md-4" placeholder="สาขา" value=" <?php echo $row['major_name']; ?>" readonly>

                                </div>
                            </div>
    
                            <div class="col-sm-6">
                                <label for="company">สถานประกอบการ:</label>&nbsp;
                                <input name="comp_name" id="comp_name" type="text" class="form-control col-md-3" placeholder="ชื่อสถานประกอบการ" required>

                            </div><br>

                            <p>*** ระดับความพึงพอใจ : 5 = มากที่สุด 4 = มาก 3 = ปานกลาง 2 = น้อย 1 = ควรปรับปรุง ***</p>

                        </div><br>

                        <table class="table table-bordered table-hover" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="20%" rowspan="2" class="text-center">
                                    <br>
                                    <strong>ประเด็นประเมิน</strong>
                                </td>
                                <td colspan="5" class="text-center"><strong>ระดับความพึงพอใจ</strong></td>
                            </tr>
                            <tr>
                                <td width="5%" class="text-center">มากที่สุด (5)</td>
                                <td width="5%" class="text-center">มาก (4)</td>
                                <td width="5%" class="text-center">ปานกลาง (3)</td>
                                <td width="5%" class="text-center">น้อย (2)</td>
                                <td width="5%" class="text-center">ควรปรับปรุง (1)</td>
                            </tr>

                            <tr>
                                <td height="30">&nbsp; 1. ระดับประเมินความพึงพอใจ</td>
                                <td height="30"><input class="form-check-input" type="radio" name="qs_id1" value="5" required /></td>
                                <td height="30"><input class="form-check-input" type="radio" name="qs_id1" value="4" /></td>
                                <td height="30"><input class="form-check-input" type="radio" name="qs_id1" value="3" /></td>
                                <td height="30"><input class="form-check-input" type="radio" name="qs_id1" value="2" /></td>
                                <td height="30"><input class="form-check-input" type="radio" name="qs_id1" value="1" /></td>

                            </tr>
                       
                        </table>
                        <tr>
                                <label for="">2.ท่านคิดว่าอยากให้คณะฯ เพิ่มเติมองค์ความรู้ด้านใดบ้างให้กับนิสิต เพื่อให้นิสิตสามารถปฏิบัติงานได้ตามงานที่มอบหมาย</label>
                                <textarea type="text" class="form-control" rows="3" name="qs_id2"></textarea><br>
                                <label for="">3.ความคิดเห็นหรือข้อเสนอแนะเพิ่มเติม</label>
                                <textarea type="text" class="form-control" rows="3" name="qs_id3"></textarea><br>

                            </tr>
                        <button type="submit" name="save" class="btn btn-success"> ส่งแบบประเมิน </button>
                    </form>
                    <br><br>

                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>

    </html>
<?php } ?>