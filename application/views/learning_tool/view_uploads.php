<style type="text/css">
  #all_files_container{
  	margin: auto;
  	width: 600px;
  }
  #all_files{
  	margin:auto;
  }
  .upload_links{
    text-decoration: none;
    color:black;
  }
  .upload_links:hover{
  	color:blue;
  }
  #upload_files{
    min-height: 370px;
  }
</style>
<div class="container text-center" id="upload_files">
  <h1>All Uploads</h1>
  <div id="all_files">
    <h3>Below are the links which you can download them straight to your computer.</h3><br>
  	  <table>
      <?php
          foreach ($get_uploaded_files as $file) {
          	  echo '<tr><td><img src="'.base_url().'/images/arrow-up.png" height="20px" width="20px"></td><td><a class="upload_links" href='.base_url().'/uploads/'.$file['filename'].'>'.$file['filename'].'</a></td></tr><tr><td></td><td></td></tr>';
          }
      ?>
      </table>
  </div>
</div>
