<style type="text/css">
   #container{
   	  margin:auto;
   	  width: 800px;

   }
   #block{
      width: 300px;
      height: 300px;
      float: left;
      background: salmon;
      margin: 30px;

   }
  #block a{
  	  line-height: 300px;
  	  text-align: center;
  }
   
</style>
<div id="container">
  <div id="block">
      <a href="<?php echo base_url().'admin/view_question';?>">View/Delete a Question</a>
  </div>
  <div id="block">
    <a href="<?php echo base_url().'admin/view_files';?>">View/Delete Uploaded Files</a>
  </div>
</div>