<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Time Table(5)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#examTimeTable">
  Add Exam Time Table
</button>
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Exam Name</th>
                <th>File</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($time_tables as $key=>$tt){
          ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $tt['exam_name'] ?></td>
                <td><a href="<?php echo base_url('assets/images/'.$tt['time_table_file']) ?>" target="-blink"><i class="fas fa-folder-open"></i></a></td>
                <td><input type="checkbox" <?php if($tt['status'] == 1){echo 'checked';} ?> disabled></td>
                <td><?= date('',strtotime($tt['created_at'])); ?></td>
                <td>
                    <a href="<?php echo base_url('exam_ctrl/edit_time_table/'.$tt['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('exam_ctrl/delete_time_table/'.$tt['id']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal start here -->
<div class="modal" id="examTimeTable">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Exam Time Table</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('exam_ctrl/time_table'); ?>" id="add_time_table" enctype="multipart/form-data" method="post">
            
            <div class="form-group">
                <label for="exam_id">Select Exam</label>
                <select name="exam_id" id="exam_id" class="form-control">
                  <option value="" disabled selected>Select Exam</option>
                  <?php foreach($exams as $exam){ ?>
                    <option value="<?= $exam['id'] ?>"><?= $exam['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="time_table_file">Time Table File</label>
                <input type="file" name="time_table_file" class="form-control" id="time_table_file">
            </div>
            <div class="from-group">
                <button type='submit' class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- modal end here -->
</div>