<!-- Edit -->
<div class="modal fade " id="edit<?php echo $data['stu_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">ข้อมูลนิสิต</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <?php
                $edit = mysqli_query($conn, "select * from students left join company on students.comp_id = company.comp_id LEFT JOIN  major ON students.major_id = major.major_id where stu_id='" . $data['stu_id'] . "'");
                $erow = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form method="POST" action="edit.php?id=<?php echo $erow['stu_id']; ?>">
                        <div class="row">
                            <div class="col-lg-10">
                                <label style="position:relative; top:7px;">รหัสนิสิต:&nbsp;<?php echo $erow['stu_id']; ?></label>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-9 ">
                                <label>ชื่อ-นามสกุล:&nbsp;<?php echo $erow['name']; ?>&nbsp;<?php echo $erow['lastname']; ?></label>
                            </div>

                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-9">
                                <label>สาขา:&nbsp;<?php echo $erow['major_name']; ?></label>&nbsp;
                                <label>ชั้นปี:&nbsp;<?php echo $erow['year']; ?></label>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-10">
                                <label>ที่อยู่:&nbsp;<?php echo $erow['address']; ?></label>
                            </div>

                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-10">
                                <label>ตำบล:&nbsp;<?php echo $erow['district']; ?></label>
                                <label>อำเภอ:&nbsp;<?php echo $erow['amphures']; ?></label>
                                <label>จังหวัด:&nbsp;<?php echo $erow['province']; ?></label>

                            </div>

                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-9">
                                <label>รหัสไปรษณีย์:&nbsp;<?php echo $erow['zipcode']; ?></label>
                            </div>

                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">เบอร์โทรศัพท์:&nbsp;<?php echo $erow['phone']; ?></label>
                            </div>

                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">E-mail:&nbsp;<?php echo $erow['mail']; ?></label>
                            </div>

                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">ตำแหน่งงาน:&nbsp;<?php echo $erow['Job']; ?></label>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">รายละเอียด:&nbsp;<?php echo $erow['description']; ?></label>
                            </div>

                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">สถานประกอบการ:&nbsp;<?php echo $erow['comp_name']; ?></label>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">ที่อยู่สถานประกอบการ:&nbsp;<?php echo $erow['comp_address']; ?></label>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">ผู้ติดต่อ:&nbsp;<?php echo $erow['contract_name']; ?></label>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">การลงทะเบียนเรียน:&nbsp;<?php echo $erow['study']; ?></label>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="position:relative; top:7px;">การจัดส่งเอกสาร:&nbsp;<?php echo $erow['sent']; ?></label>
                                <label style="position:relative; top:7px;"><?php echo $erow['sentmail']; ?></label>
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <!-- <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button> -->
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->