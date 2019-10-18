<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Edit Attendence
						<a href="<?php echo base_url('attendence_ctrl/show_student/'.$attendence['student_id']); ?>" class="btn btn-primary float-right" >
  Back
</a>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('attendence_ctrl/update_attendence/'.$attendence['id']); ?>" id="update_attendence">
							<div class="form-group">
								<label for="date">Date</label>
								<input type="date" name="date" id="date"  value="<?= date('Y-m-d',strtotime($attendence['date'])) ?>" class="form-control">
							</div>
							<input type="hidden" name="student_id" id="student_id" value="<?= $attendence['student_id'] ?>">
							<div class="form-group">
								<label for="remark">Remark</label>
								<textarea name="remark" id="remark" cols="30" rows="3" class="form-control"><?= $attendence['remark']; ?></textarea>
							</div>
							
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control">
									<option value="present" <?php echo $attendence['status'] == 'present'?'selected':'' ?>>Present</option>
									<option value="absent" <?php echo $attendence['status'] == 'absent'?'selected':'' ?>>Absent</option>
								</select>
							</div>

							<div class="from-group mt-4">
								<button type='submit' class="btn btn-warning">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
