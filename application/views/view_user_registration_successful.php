<style type="text/css">
  #signup_process{
    margin-top: 90px;
    height: 580px;
  }
</style>
<div class="container space top" id="signup_process">
  <?php
     echo '<p>'.$message.'</p>';
     header( 'refresh:5;url='. base_url().'main/login');
  ?>
</div>