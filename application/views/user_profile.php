<style type="text/css">
  #user_profile{
    min-height: 560px;
  }
</style>
<hr>
<div class="container" id="user_profile">
    <h3>Hi this is your profile page</h3>

    <?php

      foreach($user_values as $row){
      	 $row['name'];
      	 $row['email'];
      	 $row['password'];
      	 $row['username'];
        
      }
      if($this->session->userdata('email')==$row['email']){
            echo "<h2>My Name :".$row['name'].'</h2><br>';
            echo "<h2>My email is ".$row['email'].'</h2><br>';
            echo "<h2>and my username is: ".$row['username']."</h2>";

      }else{

           echo $row['name'].'s page';
           echo $row['name'].'<h2>\'s email address is '.$row['email'].'</h2>';

    ?>


    <h3>Welcome<?php echo $row['name'];?>. We have been Expecting you.</h3>
    <h2>Your Username is <?php echo $row['username']?>.! Please Enjoy</h2>
    

<?php
      }

?>
</div>