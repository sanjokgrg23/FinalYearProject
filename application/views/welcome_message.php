
<style type="text/css">
  body{
  /*background-image: url('http://localhost/ci_project-backup/images/bg.jpg');*/
  background-image:url('images/bg.jpg');
  }
  
  #welcome{
  	line-height: 300px;
  	color:white;
  	font-size: 50px;
  }
  #container{
  	margin-top: 40px;
    height: 800px;
    box-shadow: none;
    border:none;
    }
</style>
<div class="container" id="container">
	  <h1 id="welcome" class="text-center">WELCOME</h1>
	  <div class="col-md-offset-5">
	  <a class="btn btn-success  text-center" id="home_btn" href="<?php echo base_url().'main/signup'?>">Sign Up</a>
	  <br><br>
	  <a class="btn btn-success " id="home_btn"href="<?php echo base_url().'main/login'?>">Login</a>
	  </div>
 </div>

	

