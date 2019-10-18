<link href="<?php echo base_url('assets/dist/css/bootstrap.min.css') ?>" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo base_url('assets/dist/js/pages/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/dist/js/pages/bootstrap.min.js') ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/login.css') ?>">
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
         <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="<?= base_url('Login_ctrl/login') ?>" method="post">
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" id="email" name="email" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
                  <!-- <button type="submit" class="btn btn-secondary">Register</button> -->
               </form>
            </div>
         </div>
      </div>