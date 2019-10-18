<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Attendence
                <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#courseAddModal">
  Add New Student
</button> -->
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Class Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($classes as $key=>$class){
              $students = $this->db->select()->where('class_id',$class['id'])->get('students')->result_array();
              $all_attendence = 0;
              $all_presents = 0;
              foreach($students as $student){
                $total_attendence = count($this->db->select('*')->where('student_id',$student['id'])->get('attendences')->result_array());
                $total_present = count($this->db->select('*')->where(['student_id' => $student['id'],'status' => 'present'])->get('attendences')->result_array());
                $all_attendence +=  $total_attendence;
                $all_presents +=  $total_present;
              }
            ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $class['name'] ?></td>
                <!-- <td><input type="checkbox" <?php if($class['status'] == 1){echo 'checked';} ?> disabled></td> -->
                <td><?php if($all_attendence > 0){
                  echo ($all_presents/$all_attendence)*100;
                }else{
                  echo 0;
                } ?> %</td>
                <td>
                    <a href="<?php echo base_url('attendence_ctrl/class_students/'.$class['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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
        <h4 class="modal-title">Student Registration</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('student_ctrl/student'); ?>" id="add_student">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"  class="form-control" placeholder="Student Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"  class="form-control" placeholder="Student Email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone"  class="form-control" placeholder="Student Phone">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                  <option value="">Select Category</option>
                  <?php foreach($categories as $category){ ?>
                    <option value="<?=$category['id'] ?>"><?=$category['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="class_id">Class</label>
                <select name="class_id" id="class_id" class="form-control">
                  <option value="">Select Class</option>
                  <?php foreach($classes as $class){ ?>
                    <option value="<?=$class['id'] ?>"><?=$class['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob" id="dob"  class="form-control">
            </div>
            <div class="form-group">
                <label for="join_date">Join Date</label>
                <input type="date" name="join_date" id="join_date"  class="form-control">
            </div>
            
            <div class="from-group">
                <button type='submit' class="btn btn-primary">Register</button>
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