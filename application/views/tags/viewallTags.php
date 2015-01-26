<div class="container">
 <h2 class="text-center">Tags</h2>
  <div class="search_tags col-md-offset-4">
   <form action="#">
     These are all the tags.
		 <p>
		  <input type="hidden" name="searchform" placeholder="e.g Business">
		 </p>
   </form>
  </div>
  <table id="tag_table" class="col-md-offset-4 text-center">
  	<tr>
 <?php 

      $z=0;
   foreach($all_tags as $tag){
   	  if($z==3){
        echo '</tr><tr>';
        $z=0;
   	  }
   	  echo '<td><a class="tags" href="'.base_url().'questions/getTag/'.$tag['tags'].'">'.$tag['tags'].'</a></td>';
   	  $z++;
   }

   
 ?>
 </tr></table>
</div>