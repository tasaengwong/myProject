<?php

session_start();

if (!$_SESSION['userid']) {
  header("Location: index.php");
} else {

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/docstyle.css?4">
    <title>dev.Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
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
            <a class="nav-link active" aria-current="page" href="../loginuser/user_page.php">หน้าแรก</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              นักศึกษา
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="../student/Board.php">ติดตามสถานะ</a></li>
              <li><a class="dropdown-item" href="../student/doc-intern.php">เอกสารที่เกี่ยวข้อง</a></li>
            </ul>
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
        <div class="container">
            <table class="table table-hover  border-1 ">
                <thead>
                    <tr>
                        <th style="width:30%">Document for student</th>
                        <th style="width: 10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>เอกสารแบบประเมินสถานประกอบการ</td>
                        <td><a href="../doc/เอกสารแบบประเมินสถานประกอบการ (นิสิต).pdf" class="btn btn-info" role="button">dowload</a></td>
                    </tr>
                    <tr>
                        <td>สมุดบันทึกการฝึกงาน</td>
                        <td><a href="../doc/สมุดบันทึกการฝึกงาน.pdf" class="btn btn-info" role="button">dowload</a></td>
                    </tr>
                    <tr>
                        <td>ตัวอย่างรายงานฝึกงาน</td>
                        <td><a href="../doc/ตัวอย่างรายงานฝึกงาน.pdf" class="btn btn-info" role="button">dowload</a></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </section>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>
<?php } ?>