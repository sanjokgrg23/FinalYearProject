
<div id="question_container" class="container">
  
<?php
  $i=1;
  foreach ($all_question as $row) {
  	$str = 	$row['question_tags'];
  	$explode_array = explode(',', $str);
    
   ?>
  <div id="question">
    
    <h2><?php echo "Q ".$i;?>. <a href='<?php echo base_url().'answers/get_quest/'.$row['quest_key'].'';?>'><?php echo $row['question_title'];?></a></h2>
    
    <div id="question_tags">
       <?php
         foreach($explode_array as $tag){
         	echo '<a class="tags" href='.base_url().'questions/getTag/'.$tag.'>'.$tag.'</a> - ';
         }
       ?>
    </div>
  </div><hr>

<?php
  $i++;
  }
?>
</div>