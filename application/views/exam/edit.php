<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Exam
						<a type="button" class="btn btn-primary float-right" href="<?= base_url('exam_ctrl/exam') ?>">
  Back
</a>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('exam_ctrl/edit_exam/'.$exam[0]['id']); ?>"
							id="update_exam">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="name" id="name" value="<?php echo $exam[0]['name'] ?>">
							</div>

							<div class="form-group">
								<label for="start_date">Start Date</label>
								<input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo date('Y-m-d',strtotime($exam[0]['start_date'])); ?>">
							</div>

							<div class="form-group">
								<label for="category_id">Select Category</label>
								<select name="category_id" id="category_id" class="form-control">
								<?php foreach($categories as $category){ ?>
									<option value="<?= $category['id'] ?>" <?php if($exam[0]['category_id'] == $category['id']){echo 'selected';} ?>><?= $category['name'] ?></option>

								<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="class_id">Select Class</label>
								<select name="class_id" id="class_id" class="form-control">
								<?php foreach($classes as $class){ ?>
									<option value="<?= $class['id'] ?>" <?php if($exam[0]['class_id'] == $class['id']){echo 'selected';} ?>><?= $class['name'] ?></option>

								<?php } ?>
								</select>
							</div>
							

							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="1" class="form-check-input" <?php if($exam[0]['status'] == 1){echo 'checked';} ?> name="status">Active
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" value="0" class="form-check-input" <?php if($exam[0]['status'] == 0){echo 'checked';} ?> name="status">Inactive
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
