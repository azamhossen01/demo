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
						<form action="<?php echo base_url('school_ctrl/update_class/'.$class[0]['id']); ?>"
							id="update_class">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="name" id="name" value="<?php echo $class[0]['name'] ?>">
							</div>

							<div class="form-group">
								<label for="category_id">Select Category</label>
								<select name="category_id" id="category_id" class="form-control">
								<?php foreach($categories as $category){ ?>
									<option value="<?= $category['id'] ?>" <?php if($class[0]['category_id'] == $category['id']){echo 'selected';} ?>><?= $category['name'] ?></option>

								<?php } ?>
								</select>
							</div>

							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="1" class="form-check-input" <?php if($class[0]['status'] == 1){echo 'checked';} ?> name="status">Active
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="0" class="form-check-input" <?php if($class[0]['status'] == 0){echo 'checked';} ?> name="status">Inactive
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
