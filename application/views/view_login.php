<style type="text/css">
  #login{
    margin-top: 90px;
    height: 580px;
  }
</style>
<div class="container" id="login">
  <div id="body" class="col-md-12">
   <div class="form-horizontal">
     <fieldset>
	    
    <legend>Login</legend>
    <?php
     echo form_open('main/login_validation');
     echo validation_errors();
     
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
            
              <div class="col-lg-10 col-lg-offset-2">
               <input type="submit" name="Login_submit" value="Login" class="btn btn-primary">
              </div>
            </div>';
    
     echo form_close();
    ?>
    <div class="form-group">
     <div class="col-lg-10 col-lg-offset-2">
      <a href='<?php echo base_url()."main/signup";?>' class="btn btn-primary">SignUp</a>
     </div>
    </div>
  </fieldset>
  </div>
</div>
	

</div>