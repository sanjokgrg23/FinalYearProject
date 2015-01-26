<style type="text/css">
  #signup{
    margin-top: 90px;
    height: 580px;
  }
</style>
<div class="container space_top" id="signup">
	
	

  <div id="body" class="col-md-12">
      <div class="form-horizontal">
        <fieldset>
        <legend>Sign Up. It only Takes a min !!{elapsed_time}</legend>
	<?php
      echo form_open('main/signup_validation');
      echo validation_errors();
      echo '<div class="form-group">
             <label for="inputName" class="col-lg-2 control-label">Full Name</label>
              <div class="col-lg-10">
               <input type="text" class="form-control" name="name" id="inputEmail" placeholder="Full Name">
              </div>
            </div>';
      echo '<div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
               <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
              </div>
            </div>';
      echo '<div class="form-group">
             <label for="inputPassword" class="col-lg-2 control-label">Password</label>
              <div class="col-lg-10">
               <input type="password" class="form-control" name="password" id="inputPass" >
              </div>
            </div>';
      echo '<div class="form-group">
             <label for="cPassword" class="col-lg-2 control-label">Confirm Password</label>
              <div class="col-lg-10">
               <input type="password" class="form-control" name="cpassword" id="inputcPass" >
              </div>
            </div>';
      echo '<div class="form-group">
             <label for="username" class="col-lg-2 control-label">Your Username</label>
              <div class="col-lg-10">
               <input type="text" class="form-control" name="username" id="username" placeholder="Your Username">
              </div>
            </div>';
      echo '<div class="form-group">
            
              <div class="col-lg-10 col-lg-offset-2">
               <input type="submit" name="signup_submit" value="Signup" class="btn btn-primary">
              </div>
            </div>';
      echo '<div class="form-group">
            
              <div class="col-lg-10 col-lg-offset-2">
               <p><i>By signing up, you agree to our terms and services</i></p>
              </div>
            </div>';
      echo form_close();
	?>
       </fieldset>
     </div>
  </div>

	
</div>
