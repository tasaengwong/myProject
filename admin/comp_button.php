<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['comp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <h4 class="modal-title text-center" id="myModalLabel">Delete</h4>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($con,"select * from company where comp_id='".$row['comp_id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5>Are you sure to delete <strong><?php echo ucwords($drow['comp_id'].' '.$row['comp_name']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete_comp.php?comp_id=<?php echo $row['comp_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
 
            </div>
        </div>
    </div>
<!-- /.modal -->
 
<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['comp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($con,"select * from company where comp_id='".$row['comp_id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit_comp.php?comp_id=<?php echo $erow['comp_id']; ?>">
                <div class="row">
					
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">ชื่อบริษัท:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_name" class="form-control" value="<?php echo $erow['comp_name']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">เรียน:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="contract_name" class="form-control" value="<?php echo $erow['contract_name']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">ที่อยู่:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_address" class="form-control" value="<?php echo $erow['comp_address']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">ตำบล:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_subdis" class="form-control" value="<?php echo $erow['comp_subdis']; ?>">
						</div>
					</div>

					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">อำเภอ:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_amphure" class="form-control" value="<?php echo $erow['comp_amphure']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">จังหวัด:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_province" class="form-control" value="<?php echo $erow['comp_province']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">รหัสไปรษณี:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_zipcode" class="form-control" value="<?php echo $erow['comp_zipcode']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">เบอร์โทร:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_phone" class="form-control" value="<?php echo $erow['comp_phone']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Email:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_mail" class="form-control" value="<?php echo $erow['comp_mail']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">FAX:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comp_Fax" class="form-control" value="<?php echo $erow['comp_Fax']; ?>">
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->