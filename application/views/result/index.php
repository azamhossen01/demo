<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Result(5)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#ResultAddModal">
  Add New Result
</button>
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Exam</th>
                <th>Student</th>
                <th>Class</th>
                <th>Date</th>
                <th>Status</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($results as $key=>$result){
          ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $result['exam_name'] ?></td>
                <td><?= $result['student_name'] ?></td>
                <td><?= $result['cal_name'] ?></td>
                <td><?= $result['created_at'] ?></td>
                <td><input type="checkbox" <?php if($result['status'] == 1){echo 'checked';} ?> disabled></td>
                <td><?= $result['grade'] ?></td>
                <td>
                    <a href="<?php echo base_url('result_ctrl/edit_result/'.$result['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('result_ctrl/delete_result/'.$result['id']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal" id="ResultAddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Result</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('result_ctrl/result'); ?>" id="add_result">
            <div class="form-group">
                <label for="class_id">Class</label>
                <select name="class_id" id="class_id" class="form-control" onchange="get_student(this.value)">
                  <option value="" disabled selected>Select Class</option>
                  <?php foreach($classes as $class){ ?>
                    <option value="<?= $class['id'] ?>"  ><?= $class['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="student_id">Student</label>
                <select name="student_id" id="student_id" class="form-control">
                    <option value="" disabled selected>Select Class First</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exam_id">Exam</label>
                <select name="exam_id" id="exam_id" class="form-control" >
                  <option value="" disabled selected>Select Class First</option>
                 
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="text" name="grade" id="grade"  class="form-control" placeholder="Grade Point">
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