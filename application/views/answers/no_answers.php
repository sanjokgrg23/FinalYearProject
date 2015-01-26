<?php
#This is where the question will be 

?>

<div class="container">
	<div id="answers">
    <?php
       $quest_id = $question_id;
       $msg = $message;
      echo "<h3> ".$message." </h3>";
    ?>
    
	</div>
  <div id="post_answer">
       <h2>Your Answer</h2>
       <form action="<?php echo base_url();?>answers/post_answers" method="post">
        <p><textarea name="answer_input" cols="50px" rows="10px"></textarea></p>
        <input type="hidden" name="quest_id" value="<?php echo $quest_id;?>">
        <input type="hidden" name="user_email" value="<?php echo $this->session->userdata('email');?>">

        <p><input type="submit" name="submit" value="Submit Answer"> </p>
       </form>
  </div>
</div>
