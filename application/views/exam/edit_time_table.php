<div class="content-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">Exam
						<a type="button" class="btn btn-primary float-right" href="<?= base_url('exam_ctrl/time_table') ?>">
  Back
</a>
					</div>
					<div class="card-body">
          <form action="<?php echo base_url('exam_ctrl/edit_time_table/'.$time_table[0]['id']); ?>"  enctype="multipart/form-data" id="update_time_table" method="post">
            
            <div class="form-group">
                <label for="exam_id">Select Exam</label>
                <select name="exam_id" id="exam_id" class="form-control">
                  <option value="" disabled selected>Select Exam</option>
                  <?php foreach($exams as $exam){ ?>
                    <option value="<?= $exam['id'] ?>" <?php if($exam['id'] == $time_table[0]['exam_id']){echo 'selected';} ?>><?= $exam['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="time_table_file">Time Table File</label>
                <input type="file" name="time_table_file" class="form-control" id="time_table_file">
                <img src="<?php echo base_url('assets/images/'.$time_table[0]['time_table_file']); ?>" alt="" width="20%">
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
