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
        <link rel="stylesheet" href="./css/master.css?7">
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
                            <a class="nav-link active" aria-current="page" href="../loginuser/user_page.php">หน้าแรก</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                นักศึกษา
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="../student/Board.php?">ติดตามสถานะ</a></li>
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
        <br>
        <?php
        $conn = new mysqli("localhost", "root", "", "project103");
        $conn->set_charset('utf8');
        $sql = "select * from asses ";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="container">
                <div class="row">
                    <div class="header">
                        <h2 class="text-center">แบบสอบถามนิสิตฝึกงาน</h2>
                        <hr>
                    </div>
                    <div class="col-md-10"><br>
                        <form action="save.php" name="form_asses" method="post" class="justify-content-center">
                            <div class="description">
                                <p><strong>คำชี้แจง :</strong> แบบสำรวจนี้จัดทำขึ้นเพื่อสอบถามข้อมูลการฝึกงานของนิสิตฝึกงาน คณะเทคโนโลยีสารสนเทศและการสื่อสาร
                                    ความคิดเห็นของท่านมีประโยชน์อย่างยิ่งในการปรับปรุงและพัฒนาคุณภาพการจัดฝึกงานของนิสิตในรุ่นต่อ ๆ ไป</p>
                                
                                <label for="company">สถานประกอบการ:</label>&nbsp;
                                <select name="comp_name" class="custom-select col-sm-6" ng-optin=" x for x in comp_id">
                                    <option default>----สถานประกอบการ------</option>
                                    <?php
                                    $sql = "select * from company ";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        if ($row['comp_id'] == $_GET['selectcompany']) {
                                            echo "{$row['comp_name']}<option selected>";
                                        } else {
                                            echo "<option>";
                                        }
                                        echo "{$row['comp_name']}</option>";
                                    }
                                    ?>
                                </select>
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
                                <th colspan="7">ด้านความเหมาะสมของสถานที่ในการฝึกงาน</th>
                                <tr>
                                    <td height="30">&nbsp; 1. ทำเลที่ตั้งของสถานที่ฝึกงาน</td>
                                    <td height="30" ><input class="form-check-input" type="radio" name="es_id1" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id1" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id1" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id1" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id1" value="1" /></td>

                                </tr>
                                <tr>
                                    <td height="30">&nbsp; 2. สิ่งอำนวยความสะดวกภายในสถานที่ฝึกงาน </td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id2" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id2" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id2" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id2" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id2" value="1" /></td>

                                </tr>
                                <th colspan="7">ด้านผู้ประกอบการ / หัวหน้า / เจ้าหน้าที่หน่วยงานที่นิสิตไปฝึกงาน</th>
                                <tr>
                                    <td height="30">&nbsp; 1. อุปนิสัย / การวางตัว / ลักษณะท่าทาง</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id3" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id3" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id3" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id3" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id3" value="1" /></td>

                                </tr>
                                <tr>
                                    <td height="30">&nbsp; 2. ความสามารถในการอธิบาย / ถ่ายทอดงาน</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id4" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id4" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id4" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id4" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id4" value="1" /></td>

                                </tr>
                                <tr>
                                    <td height="30">&nbsp; 3. ความสามารถในการตอบปัญหา / ข้อสงสัย</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id5" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id5" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id5" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id5" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id5" value="1" /></td>

                                </tr>
                                <tr>
                                    <td height="30">&nbsp; 4. การเปิดโอกาสให้แสดงความคิดเห็น</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id6" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id6" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id6" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id6" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id6" value="1" /></td>

                                </tr>
                                <tr>
                                    <td height="30">&nbsp; 5. การให้ความช่วยเหลือเรื่องอื่นๆ.</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id7" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id7" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id7" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id7" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id7" value="1" /></td>

                                </tr>
                                <th colspan="7">ด้านลักษณะงาน / ความรับผิดชอบที่นิสิตฝึกงานได้รับ</th>
                                <tr>
                                    <td height="30">&nbsp; 1. ความสอดคล้อง / เหมาะสมกับความรู้ที่เรียนมา</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id8" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id8" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id8" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id8" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id8" value="1" /></td>

                                </tr>
                                <tr>
                                    <td height="30">&nbsp; 2. ความเหมาะสมของปริมาณงาน / ความรับผิดชอบที่ได้รับ</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id9" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id9" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id9" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id9" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id9" value="1" /></td>

                                </tr>
                                <th colspan="7">ด้านความเหมาะสมของอาจารย์ที่ไปนิเทศการฝึกงาน</th>
                                <tr>
                                    <td height="30">&nbsp; 1. ช่วงเวลาที่อาจารย์เข้าไปนิเทศการฝึกงาน</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id10" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id10" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id10" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id10" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id10" value="1" /></td>

                                </tr>
                                <tr>
                                    <td height="30">&nbsp; 2. ระยะเวลาที่อาจารย์ที่ไปนิเทศฯ ในครั้งนี้</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id11" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id11" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id11" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id11" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id11" value="1" /></td>

                                </tr>
                                <tr>
                                    <td height="30">&nbsp; 3. การให้คำปรึกษาของอาจารย์ที่ไปนิเทศ</td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id12" value="5" required /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id12" value="4" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id12" value="3" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id12" value="2" /></td>
                                    <td height="30"><input class="form-check-input" type="radio" name="es_id12" value="1" /></td>

                                </tr>

                            </table>
                            <button type="submit" name="save" class="btn btn-success"> ส่งแบบประเมิน </button>
                        </form>
                        <br><br>
                    <?php } ?>
                    </div>
                </div>
            </div>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>

    </html>
<?php } ?>