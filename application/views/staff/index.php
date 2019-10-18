<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Staffs(<?php echo count($staffs) ?>)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staffAddModal">
  Add New Staff
</button>
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Payment</th>
                <th>Join Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($staffs as $key=>$staff){
          ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $staff['name'] ?></td>
                <td><?= $staff['phone'] ?></td>
                <td><?= $staff['payment'] ?></td>
                <td><?= $staff['join_date'] ?></td>
                <td><input type="checkbox" <?php if($staff['status'] == 1){echo 'checked';} ?> disabled></td>
                <td>
                    <a href="<?php echo base_url('staff_ctrl/edit_staff/'.$staff['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('staff_ctrl/delete_staff/'.$staff['id']); ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal" id="staffAddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Staff Registration</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('staff_ctrl/staff'); ?>" id="add_staff">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"  class="form-control" placeholder="Staff Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"  class="form-control" placeholder="Staff Email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone"  class="form-control" placeholder="Staff Phone">
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob" id="dob"  class="form-control">
            </div>
            <div class="form-group">
                <label for="experience">Experience</label>
                <input type="text" name="experience" id="experience"  class="form-control">
            </div>
            <div class="form-group">
                <label for="payment">Payments</label>
                <input type="text" name="payment" id="payment"  class="form-control">
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea name="details" id="details" class="form-control" cols="30" rows="3"></textarea>
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