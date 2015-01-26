<div id="container">
<?php
//Stuck in this one
  foreach ($tag_question as $val) {
  	$str = 	$val['question_tags'];
  	$explode_array = explode(',', $str);
  	echo '<div id="question">';
    echo '<h2><a href="'.base_url().'answers/get_quest/'.$val['quest_key'].'">'.$val['question_title'].'</a></h2>';
    echo '<br>';
      foreach($explode_array as $tag){
         echo '<a href='.base_url().'questions/getTag/'.$tag.'>'.$tag.'</a> - ';
         }
    echo '</div><hr>';
   }
?>
</div>