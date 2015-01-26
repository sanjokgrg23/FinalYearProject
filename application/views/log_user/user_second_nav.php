<style type="text/css">
  #second_nav_container{
    margin-top: 50px;
  }
</style>
<div id="second_nav_container">
    <div class="container" id="second_navigation">
      <nav id="secondNav">
        <ul>
            <li><a href='<?php echo base_url()."questions/list_questions";?>' class="btn btn-info">Question List</a></li>
            
            <li><a href='<?php echo base_url()."questions/ask_questions";?>' class="btn btn-info">Ask Question</a></li>
            <li><a href="<?php echo base_url()."tags/viewAllTags";?>" class="btn btn-info">Search Tags</a></li>
            <li><a href="<?php echo base_url()."files/index";?>" class="btn btn-info">Go to learning Tool</a></li>
        </ul>
      </nav>
    </div>
</div>