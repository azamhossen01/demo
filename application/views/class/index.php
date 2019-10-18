<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Classes(<?php echo count($classes) ?>)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#classAddModal">
  Add New Class
</button>
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($classes as $key=>$class){
          ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $class['cal_name'] ?></td>
                <td><?= $class['cat_name'] ?></td>
                <td><input type="checkbox" <?php if($class['cal_status'] == 1){echo 'checked';} ?> disabled></td>
                <td>
                    <a href="<?php echo base_url('school_ctrl/edit_class/'.$class['cal_id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('school_ctrl/delete_class/'.$class['cal_id']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal" id="classAddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Class</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('school_ctrl/class'); ?>" id="add_class">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"  class="form-control" placeholder="Class Name">
            </div>
            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select name="category_id" id="category_id" class="form-control">
                  <option value="">Select Category</option>
                  <?php foreach($categories as $category){ ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
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