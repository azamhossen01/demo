<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Categories
						<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#categoryAddModal">
  Edit Category
</button> -->
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('school_ctrl/update_category/'.$category[0]['id']); ?>"
							id="update_category">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="name" id="name"
									value="<?= $category[0]['name'] ?>">
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="1" class="form-check-input" <?php if($category[0]['status'] == 1){echo 'checked';} ?> name="status">Active
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="0" class="form-check-input" <?php if($category[0]['status'] == 0){echo 'checked';} ?> name="status">Inactive
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
