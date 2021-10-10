<?php
    /*กำหนด username password และ database name ของ mysql */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project103";

    /*------เชื่อมต่อ Database----*/
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection Error: " . $conn->connect_error);
    }

 /*สร้างปุ่มสำหรับ Download ไฟล์ excel โดยกำหนดว่าเมื่อกดปุ่ม Downlaod แล้วจะทำงานที่ javascript function ชื่อว่า ExcelReport()*/
     echo "<a href='#' id='download_link' type='button'  onClick='javascript:ExcelReport();''>Download</a>";

    echo "<table id='myTable'>";
         echo "<tr>";
                echo "<td>รหัสนิสิต</td>";
                echo "<td>ชื่อ</td>";
                echo "<td>นามสกุล</td>";
                echo "<td>สาขา</td>";
                echo "<td>ชั้นปี</td>";
                // echo "<td>ที่อยู่</td>";
                // echo "<td>ตำบล</td>";
                // echo "<td>อำเภอ</td>";
                // echo "<td>จังหวัด</td>";
                // echo "<td>รหัสไปรษณีย์</td>";
                echo "<td>เบอร์โทรศัพท์</td>";
                echo "<td>E-mail</td>";
                echo "<td>ตำแหน่งที่ฝึก</td>";
                echo "<td>รายละเอียด</td>";

                echo "<td>ชื่อสถานประกอบการ</td>";
                echo "<td>ติอต่อ</td>";
                echo "<td>ที่อยู่</td>";
                echo "<td>ตำบล/แขวง</td>";
                echo "<td>อำเภอ</td>";
                echo "<td>จังหวัด</td>";
                echo "<td>รหัสไปรษณีย์</td>";
                echo "<td>เบอร์โทรศัพท์</td>";
                echo "<td>E-mail</td>";
                echo "<td>โทรสาร</td>";

                echo "<td>การลงทะเบียนเรียน</td>";
                echo "<td>การจัดส่ง</td>";
                echo "<td>E-mail สำหรับจัดส่ง</td>";

        echo "</tr>";
    /*นำข้อมูลจากตาราง มาแสดง*/
    $sql = "SELECT * FROM students left join company on students.comp_id = company.comp_id";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
            echo "<td>$row[stu_id]</td>";
            echo "<td>$row[name]</td>";
            echo "<td>$row[lastname]</td>";
            echo "<td>$row[major]</td>";
            echo "<td>$row[year]</td>";
            echo "<td>$row[address]</td>";
            echo "<td>$row[district]</td>";
            echo "<td>$row[amphures]</td>";
            echo "<td>$row[province]</td>";
            echo "<td>$row[zipcode]</td>";
            echo "<td>$row[phone]</td>";
            echo "<td>$row[mail]</td>";
            echo "<td>$row[Job]</td>";
            echo "<td>$row[description]</td>";
           
            echo "<td>$row[comp_name]</td>";
            echo "<td>$row[contract_name]</td>";
            echo "<td>$row[comp_address]</td>";
            echo "<td>$row[comp_subdis]</td>";
            echo "<td>$row[comp_amphure]</td>";
            echo "<td>$row[comp_province]</td>";
            echo "<td>$row[comp_zipcode]</td>";
            echo "<td>$row[comp_phone]</td>";
            echo "<td>$row[comp_mail]</td>";
            echo "<td>$row[comp_Fax]</td>";

            echo "<td>$row[study]</td>";
            echo "<td>$row[sent]</td>";
            echo "<td>$row[sentmail]</td>";
        

        echo "</tr>";
    }
    echo "</table>";

    $conn->close();

?>
<!-- เรียกใช้ javascript สำหรับ export ไฟล์ excel  -->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"  ></script>
<script src="https://unpkg.com/file-saver@1.3.3/FileSaver.js"  ></script>

<script>
function ExcelReport()//function สำหรับสร้าง ไฟล์ excel จากตาราง
{
    var sheet_name="excel_sheet";/* กำหหนดชื่อ sheet ให้กับ excel โดยต้องไม่เกิน 31 ตัวอักษร */
    var elt = document.getElementById('myTable');/*กำหนดสร้างไฟล์ excel จาก table element ที่มี id ชื่อว่า myTable*/

    /*------สร้างไฟล์ excel------*/
    var wb = XLSX.utils.table_to_book(elt, {sheet: sheet_name});
    XLSX.writeFile(wb,'report.xlsx');//Download ไฟล์ excel จากตาราง html โดยใช้ชื่อว่า report.xlsx
}
</script>
<style type="text/css">

table {
  border-collapse: collapse;
  width:60%;
}

table, th, td {
  border: 1px solid black;
}

</style>