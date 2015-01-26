<?php
#This is where the question will be 

?>

<script type="text/javascript">
 function ajax_post(){
    var hr = new XMLHttpRequest();//Create our XML HttpReq object
    var question_ID = document.getElementById("questionID").value;
    var url = "http://localhost/ci_project/answers/rateUp/"+ question_ID;
    
    //create some variables we need to send to our PHP file
    //var fn = document.getElementById("first_name").value;
    //var ln = document.getElementById("last_name").value;
    
    var vars = "firstname="+"e" +"&lastname="+"f";
    hr.open("POST",url,true);   
    hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");//set content type header information for sending url encoded variables in the request
    //access the onreadystatechange event for the XML HttpRequest object
    hr.onreadystatechange = function(){
      if(hr.readyState == 4 && hr.status == 200){
          var return_data = hr.responseText;
          document.getElementById("question_rating").innerHTML = return_data;

      }
    }
    //Sent the data to PHP now and wait for response to update the status div
    hr.send(vars);
    //document.getElementById("status").innerHTML = "processing......";
} 
function ajax_rateDown(){
    var hr = new XMLHttpRequest();//Create our XML HttpReq object
    var question_ID = document.getElementById("questionID").value;
    var url = "http://localhost/ci_project/answers/rateDown/"+ question_ID;
    
    //create some variables we need to send to our PHP file
    //var fn = document.getElementById("first_name").value;
    //var ln = document.getElementById("last_name").value;
    
    var vars = "firstname="+"e" +"&lastname="+"f";
    hr.open("POST",url,true);   
    hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");//set content type header information for sending url encoded variables in the request
    //access the onreadystatechange event for the XML HttpRequest object
    hr.onreadystatechange = function(){
      if(hr.readyState == 4 && hr.status == 200){
          var return_data = hr.responseText;
          document.getElementById("question_rating").innerHTML = return_data;

      }
    }
    //Sent the data to PHP now and wait for response to update the status div
    hr.send(vars);
    //document.getElementById("status").innerHTML = "processing......";
} 
</script>
<div class="container">
	  <div id="questions">

		   <?php

           foreach ($question_values as $value) {
           	 echo '<h1>'.$value['question_title'].'</h1>';
           	 ?>
             <input id="questionID" type="hidden" value="<?php echo $value['question_id'];?>";
          <div id="voting">
          <a href="#">
            <span class="fa fa-plus fa-lg icon-rate" onclick="ajax_post();"></span>
            
          </a>
          &nbsp;
          <span id="question_rating"><?php echo $value['rating']?></span>
          &nbsp;
          <a href="#">
            <span class="fa fa-minus fa-lg icon-rate" onclick="ajax_rateDown();"></span>
            
          </a>
     </div>
          <h3>Question Details</h3>
          <div id="question_description">
              <?php echo '<p>'.$value['question_detail'].'</p>';?>
          </div>
          <hr>
          <div id="question_tags">
             <h3>Tags</h3>
             <p>
                <?php 
                  $str = $value['question_tags'];
                  $explode_array = explode(',', $str);
                  foreach ($explode_array as $tag) {
                    echo ' '. '<span class="tags">  '.$tag.' </span>';
                  }
                ?>
             </p>
          </div>
          <div id="username">
          	<h3>Asked by: </h3>
            <p><a href="<?php echo base_url()."main/user_profile/".$value['id'];?>"><?php echo $value['username'];?></a></p>
          </div>
           	 <?php
           }
       ?>
	</div>
</div>
