<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Edit <?= $staff[0]['name'] ?>
						<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#categoryAddModal">
  Edit Category
</button> -->
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('staff_ctrl/update_staff/'.$staff[0]['id']); ?>"
							id="update_staff">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" value="<?= $staff[0]['name'] ?>" id="name"
									class="form-control" placeholder="staff Name">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" value="<?= $staff[0]['email'] ?>" id="email"
									class="form-control" placeholder="staff Email">
							</div>
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" name="phone" value="<?= $staff[0]['phone'] ?>" id="phone"
									class="form-control" placeholder="staff Phone">
							</div>
							<div class="form-group">
								<label for="dob">Date Of Birth</label>
								<input type="date" name="dob" id="dob"
									value="<?= date('Y-m-d',strtotime($staff[0]['dob'])) ?>" class="form-control">
							</div>
							<div class="form-group">
								<label for="experience">Experience</label>
								<input type="text" name="experience" value="<?= $staff[0]['experience'] ?>"  id="experience" class="form-control">
							</div>
							<div class="form-group">
								<label for="payment">Payments</label>
								<input type="text" name="payment" value="<?= $staff[0]['payment'] ?>"  id="payment" class="form-control">
							</div>
							<div class="form-group">
								<label for="details">Details</label>
								<textarea name="details" id="details" class="form-control" cols="30"
									rows="3"><?= $staff[0]['details']; ?></textarea>
							</div>
							<div class="form-group">
								<label for="join_date">Join Date</label>
								<input type="date" name="join_date" id="join_date"
									value="<?= date('Y-m-d',strtotime($staff[0]['join_date'])) ?>" class="form-control">
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="1" class="form-check-input"
										<?php if($staff[0]['status'] == 1){echo 'checked';} ?> name="status">Active
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="0" class="form-check-input"
										<?php if($staff[0]['status'] == 0){echo 'checked';} ?> name="status">Inactive
								</label>
							</div>

							<div class="from-group">
								<button type='submit' class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
