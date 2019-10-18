<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Categories(<?php echo count($categories) ?>)
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#categoryAddModal">
  Add New Category
</button>
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($categories as $key=>$category){
          ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $category['name'] ?></td>
                <td><input type="checkbox" <?php if($category['status'] == 1){echo 'checked';} ?> disabled name="status"></td>
                <td>
                    <a href="<?php echo base_url('school_ctrl/edit_category/'.$category['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo base_url('school_ctrl/delete_category/'.$category['id']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal" id="categoryAddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('school_ctrl/category'); ?>" id="add_category">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"  class="form-control" placeholder="Category Name">
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