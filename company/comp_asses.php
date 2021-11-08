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
    <link rel="stylesheet" href="master.css?6">
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
                        <a class="nav-link active" aria-current="page" href="../index.html">หน้าแรก</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            นักศึกษา
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../student/Board.php?">ติดตามสถานะ</a></li>
                            <li><a class="dropdown-item" href="../student/Roundtwo.php">ยื่นคำร้องขอฝึกงาน(รอบ 2)</a></li>
                            <li><a class="dropdown-item" href="../student/doc-intern.php">เอกสารที่เกี่ยวข้อง</a></li>
                            <li><a class="dropdown-item" href="../student/form_asses.php">แบบสอบถามนิสิตฝึกงาน</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item dropdown">
                            <a class="btn btn-info nav-link dropdown-toggle bi bi-person-circle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <#?php echo $_SESSION['name']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item bi bi-arrow-right-square-fill" href="../loginuser/logout.php">&nbsp;LOG-OUT</a></li>
                            </ul>
                        </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <div class="container">
        <div class="row">
            <div class="header">
                <h2 class="text-center">แบบสอบถามนิสิตฝึกงาน</h2>
                <hr>
            </div>
            <div class="col-md-10 "><br>
                <form action="save.php" name="form_asses" method="post" class="justify-content-center">
                    <div class="description">
                        <p><strong>คำชี้แจง :</strong></p>
                        <p>1. แบบสำรวจนี้เป็นการสำรวจความพึงพอใจของผู้ใช้นิสิตฝึกงานคณะ ICT ตามที่ได้ไปฝึกปฏิบัติงาน ณ หน่วยงานของท่าน
                            ประเมินโดยอาศัยคุณลักษณะของนิสิตตามกรอบมาตรฐานคุณวุฒิแห่งชาติ 5 ด้าน ของนิสิตฝึกงาน ความคิดเห็นของ
                            ท่านมีความสำคัญอย่างยิ่งในการพัฒนานิสิตให้มีคุณภาพ เพื่อที่จะได้จบออกไปเป็นบัณฑิตที่มีคุณภาพในสังคม</p>
                        <p>2. คะแนนประเมินจากหน่วยงานคิดเป็นร้อยละ 50 ของคะแนนในรายวิชาฝึกงาน</p>


                        <div class="col-md-6">
                            <p><strong> ตอนที่ 1 : ข้อมูลทั่วไปของผู้ใช้นิสิตฝึกงาน</strong></p>&nbsp;
                            <label for="comp_name">ชื่อสถานประกอบการ:</label>&nbsp;
                            <input name="comp_name" id="comp_name" type="text" class="form-control col-md-3" placeholder="ชื่อสถานประกอบการ" required>
                        </div><br>
                        <div class="row">
                            <p><strong>ตอนที่ 2 : รายละเอียดนิสิตฝึกงาน</strong></p>
                            <div class="col">
                                <label for="stu_id">รหัสนิสิต</label>&nbsp;
                                <input name="stu_id" id="stu_id" type="text" class="form-control col-md-3" placeholder="รหัสนิสิต" maxlength="8" pattern="[0-9]*" required>
                            </div>
                            <div class="col">
                                <label for="stu_n">ชื่อ</label>&nbsp;
                                <input name="stu_n" id="name" type="text" class="form-control col-md-3" placeholder="ชื่อ" required>
                            </div>
                            <div class="col">
                                <label for="stu_lsn">นามสกุล</label>&nbsp;
                                <input name="stu_lsn" id="lastname" type="text" class="form-control col-md-3" placeholder="นามสกุล" required>
                            </div>

                            <?php
                            $conn = new mysqli("localhost", "root", "", "project103");
                            $conn->set_charset('utf8');
                            ?>
                            <div class="col" method="post">
                                <label for="major">สาขา:</label>&nbsp;
                                <select name="major_name" required class="form-select col-sm-6" ng-optin=" x for x in major_name">
                                    <option value="">เลือกสาขา</option>
                                    <?php
                                    $sql = "select * from major ";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        if ($row['major_name'] == $_GET['selectmajor']) {
                                            echo "{$row['major_name']}<option selected>";
                                        } else {
                                            echo "<option>";
                                        }
                                        echo "{$row['major_name']}</option>";
                                    } 
                                    ?>
                                </select>&nbsp;&nbsp;
                            </div>
                        </div><br>
                    </div><br>
                    <p><strong>ตอนที่ 3 : ความพึงพอใจของผู้ใช้นิสิตฝึกงาน</strong> </p>
                    <p>*** ระดับความพึงพอใจ : มากที่สุด = 5 , มาก = 4 , ปานกลาง = 3 , น้อย = 2 , ควรปรับปรุง = 1 ***</p>

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
                        <th colspan="7">1. ด้านคุณธรรม จริยธรรม</th>
                        <tr>
                            <td height="30">&nbsp; 1.มีความซื่อสัตย์ สุจริต </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id1" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id1" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id1" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id1" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id1" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 2.มีความเคารพกฎเกณฑ์ และระเบียบของหน่วยงาน </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id2" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id2" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id2" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id2" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id2" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 3.มีความเสียสละและเห็นต่อประโยชน์ส่วนรวม </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id3" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id3" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id3" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id3" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id3" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 4.มีจรรยาบรรณในวิชาชีพของตนเอง </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id4" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id4" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id4" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id4" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id4" value="1" /></td>

                        </tr>

                        <th colspan="7">2. ด้านความรู้</th>
                        <tr>
                            <td height="30">&nbsp; 1.มีความรู้ในหลักวิชาชีพที่เกี่ยวข้องกับหน้าที่ที่รับผิดชอบ </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id5" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id5" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id5" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id5" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id5" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp;2.มีความเข้าใจในขั้นตอนและวิธีการปฏิบัติงาน</td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id6" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id6" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id6" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id6" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id6" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 3.มีความรู้ในระดับที่สามารถปฏิบัติงานให้บรรลุเป้าหมายได้ </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id7" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id7" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id7" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id7" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id7" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 4.มีความสามารถที่จะนำความรู้มาประยุกต์ใช้ในการทำงานได้ </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id8" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id8" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id8" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id8" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id8" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 5.มีความสามารถที่ได้รับมอบหมายให้สำเร็จลุล่วงอย่างมีประสิทธิภาพ </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id9" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id9" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id9" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id9" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id9" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 6.มีความใฝ่รู้ และแสวงหาความรู้เพิ่มเติม </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id10" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id10" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id10" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id10" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id10" value="1" /></td>

                        </tr>
                        <th colspan="7">3. ด้านทักษะทางปัญญา</th>
                        <tr>
                            <td height="30">&nbsp; 1.มีการวางแผนและมีความสามารถในการทำงานให้แล้วเสร็จตามกำหนด </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id11" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id11" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id11" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id11" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id11" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 2.มีความสามารถในการรวบรวมข้อมูลต่างๆ และประเมินได้ </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id12" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id12" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id12" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id12" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id12" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 3.มีความสามารถในการวิเคราะห์และแก้ไขปัญหาในการทำงาน </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id13" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id13" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id13" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id13" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id13" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 4.มีความคิดริเริ่มสร้างสรรค์ </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id14" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id14" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id14" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id14" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id14" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 5.มีความสามารถในการนำเสนอข้อมูลต่างๆ เพื่อใช้ในการตัดสินใจ </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id15" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id15" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id15" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id15" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id15" value="1" /></td>

                        </tr>
                        <th colspan="7">4. ด้านทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ</th>
                        <tr>
                            <td height="30">&nbsp; 1.มีความสามารถปรับตัวให้เข้ากับบุคลากรในหน่วยงาน </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id16" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id16" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id16" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id16" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id16" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 2.มีความสามารถในการติดต่อสื่อสารระหว่างบุคคล </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id17" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id17" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id17" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id17" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id17" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 3.มีความสามารถในการทำงานเป็นทีม </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id18" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id18" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id18" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id18" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id18" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 4.มีความเป็นผู้นำและเป็นผู้ตามที่ดี </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id19" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id19" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id19" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id19" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id19" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 5. ยอมรับความคิดเห็นของผู้อื่นที่แตกต่างจากตนเอง </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id20" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id20" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id20" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id20" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id20" value="1" /></td>

                        </tr>
                        <th colspan="7">5. ด้านทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ</th>
                        <tr>
                            <td height="30">&nbsp; 1.มีทักษะในการวิเคราะห์และจัดการข้อมูลเชิงตัวเลข </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id21" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id21" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id21" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id21" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id21" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 2.มีความสามารถในการสื่อสารด้วยภาษาไทย (ฟัง พูด อ่าน เขียน) </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id22" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id22" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id22" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id22" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id22" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 3.มีความสามารถในการสื่อสารด้วยภาษาอังกฤษ (ฟัง พูด อ่าน เขียน) </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id23" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id23" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id23" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id23" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id23" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 4.มีความสามารถในการใช้คอมพิวเตอร์และโปรแกรมต่างๆ ที่เกี่ยวข้องกับการทำงาน </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id24" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id24" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id24" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id24" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id24" value="1" /></td>

                        </tr>
                        <th colspan="7">6. ด้านอัตลักษณ์นิสิตของมหาวิทยาลัยพะเยา (สุนทรียภาพ สุขภาพ และบุคลิกภาพ)</th>
                        <tr>
                            <td height="30">&nbsp; 1.มีความเข้าใจและภาคภูมิใจในศิลปะและวัฒนธรรมของไทย</td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id25" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id25" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id25" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id25" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id25" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 2.มีสุขภาพที่แข็งแรง และมีสุขอนามัยที่ดี </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id26" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id26" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id26" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id26" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id26" value="1" /></td>

                        </tr>
                        <tr>
                            <td height="30">&nbsp; 3.รู้จักกาลเทศะ วางตนอย่างเหมาะสม และมีบุคลิกภาพที่ดี </td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id27" value="5" required /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id27" value="4" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id27" value="3" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id27" value="2" /></td>
                            <td height="30"><input class="form-check-input" type="radio" name="cs_id27" value="1" /></td>

                        </tr>
                    </table>
                    <br>
                    <tr>
                        <p><strong>ตอนที่ 4 : ความคิดเห็นและข้อเสนอแนะของผู้ใช้นิสิตฝึกงาน</strong></p>
                        <label for="">1.ความคิดเห็นเพิ่มเติมที่มีต่อนิสิตของคณะที่ฝึกงานในองค์กรของท่าน</label>
                        <textarea type="text" class="form-control" rows="3" name="cs_id28"></textarea><br>
                        <label for="">2.ความคิดเห็นเพิ่มเติมที่มีต่อหลักสูตร / การเรียนการสอนของคณะเทคโนโลยีสารสนเทศฯ</label>
                        <textarea type="text" class="form-control" rows="3" name="cs_id29"></textarea><br>
                        <label for="">3. ข้อคิดเห็น / ข้อเสนอแนะเพิ่มเติมอื่น ๆ </label>
                        <textarea type="text" class="form-control" rows="3" name="cs_id30"></textarea>
                    </tr><br>
                    <button type="submit" name="save" class="btn btn-success"> ส่งแบบประเมิน </button>
                </form>
                <br><br>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>