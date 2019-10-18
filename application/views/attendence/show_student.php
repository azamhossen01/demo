<div class="content-wrapper">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Attendence of <?php echo $student[0]['name'] ?>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#attendenceAddModal">
  Take Attendence
</button>
<a href="<?php echo base_url('attendence_ctrl/class_students/'.$student[0]['class_id']); ?>" class="btn btn-primary float-right mr-2">Back</a>
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>#Indx</th>
                <th>Date</th>
                <th>Status</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($attendences as $key=>$attendence){
          ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= date('F d Y',strtotime($attendence['date'])); ?></td>
                <td class="text-<?php echo $attendence['status'] == 'present' ? 'success' : 'danger' ?>"><?php echo $attendence['status'] == 'present' ? 'Present' : 'Absent' ?></td>
                <td><?= $attendence['remark'] ?></td>
                <td>
                    <a href="<?php echo base_url('attendence_ctrl/edit_attendence/'.$attendence['id']); ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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
<div class="modal" id="attendenceAddModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $student[0]['name'] ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('attendence_ctrl/attendence'); ?>" id="take_attendence">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                  <option value="present">Present</option>
                  <option value="absent">Absent</option>
                </select>
            </div>
            <input type="hidden" name="student_id" id="student_id" value="<?= $student[0]['id'] ?>">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group">
              <label for="remark">Remark</label>
              <textarea name="remark" id="remark" cols="30" rows="3" class="form-control"></textarea>
            </div>
            
            
            <div class="from-group">
                <button type='submit' class="btn btn-primary">Save</button>
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