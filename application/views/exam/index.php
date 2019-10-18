<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Classes(<?php echo count($exams) ?>)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#examAddModal">
  Add New Class
</button>
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Exam Name</th>
                <th>Category</th>
                <th>Class</th>
                <th>Start Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($exams as $key=>$exam){
          ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $exam['name'] ?></td>
                <td><?= $exam['cat_name'] ?></td>
                <td><?= $exam['cal_name'] ?></td>
                <td><?= $exam['start_date'] ?></td>
                <td><input type="checkbox" <?php if($exam['status'] == 1){echo 'checked';} ?> disabled></td>
                <td>
                    <a href="<?php echo base_url('exam_ctrl/edit_exam/'.$exam['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('exam_ctrl/delete_exam/'.$exam['id']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal" id="examAddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Exam</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('exam_ctrl/exam'); ?>" id="add_exam">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"  class="form-control" placeholder="Exam Title">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date"  class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select name="category_id" id="category_id" class="form-control">
                  <option value="" disabled selected>Select Category</option>
                  <?php foreach($categories as $category){ ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="class_id">Select Class</label>
                <select name="class_id" id="class_id" class="form-control">
                  <option value="" disabled selected>Select Clas</option>
                  <?php foreach($classes as $class){ ?>
                    <option value="<?= $class['id'] ?>"><?= $class['name'] ?></option>
                  <?php } ?>
                </select>
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