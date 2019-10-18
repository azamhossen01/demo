<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Courses(<?php echo count($courses) ?>)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#courseAddModal">
  Add New Course
</button>
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Name</th>
                <th>Duraton</th>
                <th>Fees</th>
                <th>Started On</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($courses as $key=>$course){
          ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $course['name'] ?></td>
                <td><?= $course['duration'] ?></td>
                <td><?= $course['fees'] ?></td>
                <td><?= $course['start_at'] ?></td>
                <td><input type="checkbox" <?php if($course['status'] == 1){echo 'checked';} ?> disabled></td>
                <td>
                    <a href="<?php echo base_url('school_ctrl/edit_course/'.$course['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('school_ctrl/delete_course/'.$course['id']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal" id="courseAddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Course</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('school_ctrl/course'); ?>" id="add_course">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"  class="form-control" placeholder="Course Name">
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" name="duration" id="duration"  class="form-control" placeholder="Course Duration">
            </div>
            <div class="form-group">
                <label for="fees">Fees</label>
                <input type="number" name="fees" id="fees"  class="form-control" placeholder="Course Fees">
            </div>
            <div class="form-group">
                <label for="start_at">Start At</label>
                <input type="date" name="start_at" id="start_at"  class="form-control">
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