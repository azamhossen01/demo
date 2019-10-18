<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Edit <?= $course[0]['name'] ?> Course
						<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#categoryAddModal">
  Edit Category
</button> -->
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('school_ctrl/update_course/'.$course[0]['id']); ?>"
							id="update_course">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="name" id="name"
									value="<?php echo $course[0]['name'] ?>">
							</div>

							<div class="form-group">
								<label for="duration">Duration</label>
								<input type="text" name="duration" value="<?= $course[0]['duration'] ?>" id="duration" class="form-control"
									placeholder="Course Duration">
							</div>
							<div class="form-group">
								<label for="fees">Fees</label>
								<input type="number" name="fees" value="<?= $course[0]['fees'] ?>" id="fees" class="form-control"
									placeholder="Course Fees">
							</div>
							<div class="form-group">
								<label for="start_at">Start At</label>
								<input type="date" name="start_at" value="<?= date('Y-m-d',strtotime($course[0]['start_at'])) ?>" id="start_at" class="form-control">
							</div>

							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="1" class="form-check-input"
										<?php if($course[0]['status'] == 1){echo 'checked';} ?> name="status">Active
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="0" class="form-check-input"
										<?php if($course[0]['status'] == 0){echo 'checked';} ?> name="status">Inactive
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
