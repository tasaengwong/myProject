<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['username']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <h4 class="modal-title text-center" id="myModalLabel">Delete</h4>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($con,"select * from user where username='".$row['username']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5>Are you sure to delete <strong><?php echo ucwords($drow['firstname'].' '.$row['lastname']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete.php?username=<?php echo $row['username']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
 
            </div>
        </div>
    </div>
<!-- /.modal -->
 
<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['username']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($con,"select * from user where username='".$row['username']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?username=<?php echo $erow['username']; ?>">
                <div class="row">
					
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Username:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="username" class="form-control" value="<?php echo $erow['username']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">ชื่อ:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="firstname" class="form-control" value="<?php echo $erow['firstname']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">นามสกุล:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="lastname" class="form-control" value="<?php echo $erow['lastname']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">สถานะ:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="userlevel" class="form-control" value="<?php echo $erow['userlevel']; ?>">
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