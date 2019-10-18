<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Edit <?= $student[0]['name'] ?>
						<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#categoryAddModal">
  Edit Category
</button> -->
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('student_ctrl/update_student/'.$student[0]['id']); ?>" id="update_student">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" value="<?= $student[0]['name'] ?>" id="name" class="form-control"
									placeholder="Student Name">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" value="<?= $student[0]['email'] ?>" id="email" class="form-control"
									placeholder="Student Email">
							</div>
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" name="phone" value="<?= $student[0]['phone'] ?>" id="phone" class="form-control"
									placeholder="Student Phone">
							</div>
							<div class="form-group">
								<label for="category_id">Category</label>
								<select name="category_id" id="category_id" class="form-control">
									<option value="">Select Category</option>
									<?php foreach($categories as $category){ ?>
									<option value="<?=$category['id'] ?>" <?php if($category['id'] == $student[0]['category_id']){echo 'selected';} ?>><?=$category['name'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="class_id">Class</label>
								<select name="class_id" id="class_id" class="form-control">
									<option value="">Select Class</option>
									<?php foreach($classes as $class){ ?>
									<option value="<?=$class['id'] ?>" <?php if($class['id'] == $student[0]['class_id']){echo 'selected';} ?>><?=$class['name'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="dob">Date Of Birth</label>
								<input type="date" name="dob" id="dob"  value="<?= date('Y-m-d',strtotime($student[0]['dob'])) ?>" class="form-control">
							</div>
							<div class="form-group">
								<label for="join_date">Join Date</label>
								<input type="date" name="join_date" id="join_date"   value="<?= date('Y-m-d',strtotime($student[0]['join_date'])) ?>" class="form-control">
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="1" class="form-check-input"
										<?php if($student[0]['status'] == 1){echo 'checked';} ?> name="status">Active
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="0" class="form-check-input"
										<?php if($student[0]['status'] == 0){echo 'checked';} ?> name="status">Inactive
								</label>
							</div>

							<div class="from-group">
								<button type='submit' class="btn btn-primary">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
