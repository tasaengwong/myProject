<html>
 <head>
  <title>Export Excel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
 </head>
 <body>
  <div class="container box">
   <h3 align="center">Export  Excel</h3>
   <br />
   <div class="table-responsive">
     
    <table id="customer_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>รหัสนิสิต</th>
       <th>ชื่อ</th>
       <th>นามสกุล</th>
       <th>สาขา</th>
       <th>ชั้นปี</th>
       <th>ปีการศึกษา</th>
       <th>ยื่นคำร้องเมื่อ</th>
       <th>ที่อยู่</th>
       <th>จังหวัด</th>
       <th>อำเภอ</th>
       <th>ตำบล</th>
       <th>รหัสไปรษณี</th>
       <th>เบอร์โทร</th>
       <th>Email</th>
       <th>ตำแหน่งงาน</th>
       <th>รายละเอียดงาน</th>
       <th>สถานะการลงทะเบียนเรียน</th>
       <th>รูปแบบการส่งเอกสาร</th>
       <th>Email สถานประกอบการ</th>
  

       <th>ชื่อสถานประกอบการ</th>
       <th>เรียนถึง</th>
       <th>ที่อยู่</th>
       <th>ตำบล</th>
       <th>อำเภอ</th>
       <th>จังหวัด</th>
       <th>รหัสไปรษณี</th>
       <th>เบอร์โทร</th>
       <th>Email สถานประกอบการ</th>
       <th>FAX</th>
       
       <th>สถานะ 0=รอ 1=ผ่าน 2=ไม่ผ่าน</th>


      </tr>
     </thead>
     
    </table>
   </div>
  </div>
  <br />
  <br />
  <script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
    url:"export.php",
    type:"POST"
   },
   dom: 'lBfrtip',
   buttons: [
    'excel'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>
 </body>
</html>


