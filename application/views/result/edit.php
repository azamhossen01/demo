<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Edit Result
						<a href="<?= base_url('result_ctrl/edit_result/'.$result[0]['id']); ?>" class="btn btn-primary float-right">
  Back
</a>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('result_ctrl/edit_result/'.$result[0]['id']); ?>"
							id="update_result">
							

							<div class="form-group">
								<label for="student_id">Student</label>
								<select name="student_id" id="student_id" class="form-control">
									<option value="" disabled selected>Select Student</option>
									<?php foreach($students as $student){ ?>
										<option value="<?= $student['id']; ?>" <?php if($student['id'] == $result[0]['student_id']){echo 'selected';} ?>><?= $student['name'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="exam_id">Exam</label>
								<select name="exam_id" id="exam_id" class="form-control">
									<option value="" disabled selected>Select Exam</option>
									<?php foreach($exams as $exam){ ?>
										<option value="<?= $exam['id']; ?>" <?php if($exam['id'] == $result[0]['exam_id']){echo 'selected';} ?>><?= $exam['name'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="grade">Grade</label>
								<input type="text" name="grade" id="grade" class="form-control" value="<?= $result[0]['grade'] ?>">
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="1" class="form-check-input"
										<?php if($result[0]['status'] == 1){echo 'checked';} ?> name="status">Active
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="0" class="form-check-input"
										<?php if($result[0]['status'] == 0){echo 'checked';} ?> name="status">Inactive
								</label>
							</div>
							<div class="form-group">
								<button type='submit' class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
