<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
				<center>
					<h4 class="modal-title" id="myModalLabel">Add New</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="addnew.php">
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Username:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="username">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">password:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="password">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Firstname:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="firstname">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">Lastname:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="lastname">
							</div>
						</div>

						<?php
						$conn = new mysqli("localhost", "root", "", "project103");
						$conn->set_charset('utf8');
						?>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">สาขา:</label>;
							</div>
							<div class="col-lg-10" method="post">
								<select name="major_id" class="form-select  ">
									<option value="">เลือกสาขา</option>
									<?php
									$sql = "select * from major ";
									$result = $conn->query($sql);
									while ($row = $result->fetch_assoc()) {
										if ($row['major_id'] == $_GET['selectmajor']) {
											echo "{$row['major_id']}&nbsp;{$row['major_name']}<option selected>";
										} else {
											echo "<option>";
										}
										echo "{$row['major_id']}&nbsp;{$row['major_name']}</option>";
									}
									?>
								</select>
							</div><br>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-2">
								<label class="control-label" style="position:relative; top:7px;">userlevel:</label>
							</div>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="userlevel">
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
					</form>
			</div>

		</div>
	</div>
</div>