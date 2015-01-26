<?php
#This is where the question will be 

?>
<hr>
<div id="answers">
<div id="answerss" class="container" >
	<div id="">
       <h3>Answers</h3>
		   <?php

           $i = 1;
           foreach($answer_values as $value) {
             $quest_id = $value['question_id'];
             ?>
          <p>Answer <?php echo $i;?></p>
          <div id="voting"><a href="#"><img src="<?php echo base_url();?>/assets/images/plus.png" width="50px" height="50px"></a>
          <span><?php echo $value['rating']?></span><a href="#"><img src="<?php echo base_url();?>/assets/images/minus.png" width="50px" height="50px"></a></div>
          <div id="answer_detail">
              <?php echo '<p>'.$value['answer'].'</p>'?>

          </div>
          <div id="timeStamp">
            
             <p>Answerd at 
                <?php echo $value['time'];?>

             </p>
          </div>
          <div id="username">
          	<h3>Answered By : </h3>
          <p><a href='<?php echo base_url().'main/user_profile/'.$value['id'];?>'><?php echo $value['username'];?></a></p>
          </div><hr>
           	 <?php
            
            $i++;
           }
         
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
</div>
